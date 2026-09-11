<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrdersExport;
use App\Exports\TodayOrdersExport;
use App\Exports\TodayTransactionsExport;
use App\Http\Controllers\Controller;
use App\Jobs\CreateParcelJob;
use App\Models\Customer;
use App\Models\OrderStatusHistory;
use App\Services\WhatsAppService;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\SiteSetting;
use App\Models\State;
use App\Services\Order\DelhiveryService;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;


class OrderController extends Controller
{
    /**
     * Display listing of orders (admin).
     * Route example: Route::get('admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
     */
    public function index(Request $request)
    {
        // filters
        $perPage = (int) $request->get('per_page', 1000);
        $search = trim((string) $request->get('search', ''));
        $status = $request->get('status'); // e.g. pending, completed, cancelled
        $paymentStatus = $request->get('payment_status'); // paid, pending
        $customerId = $request->get('customer_id');
        $from = $request->get('from'); // yyyy-mm-dd
        $to = $request->get('to');

        // base query
        $query = Order::with([
            'items' => function ($q) {
                $q->select(
                    'id',
                    'order_id',
                    'product_title',
                    'quantity',
                    'unit_price',
                    'product_variant_id'
                )->orderBy('id', 'asc');
            },
            'user:id,name,email',
            'payments:id,order_id,amount,status,method,created_at',
        ])
            ->select('orders.*')
            ->latest('orders.id');

        if ($customerId) {
            $query->where('user_id', (int) $customerId);
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        if (!empty($paymentStatus)) {
            $query->where('payment_status', $paymentStatus);
        }

        if (!empty($from)) {
            try {
                $query->whereDate('created_at', '>=', Carbon::parse($from)->toDateString());
            } catch (\Throwable $e) {
            }
        }
        if (!empty($to)) {
            try {
                $query->whereDate('created_at', '<=', Carbon::parse($to)->toDateString());
            } catch (\Throwable $e) {
            }
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('invoice_id', 'like', "%{$search}%")
                    ->orWhere('id', (int) $search)
                    ->orWhere('shipping_address->name', 'like', "%{$search}%")
                    ->orWhereHas('user', fn($qq) => $qq->where('name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%")->orWhere('mobile', 'like', "%{$search}%"));
            });
        }

        // paginate
        $orders = $query->paginate($perPage)->appends($request->query());

        // Pass to blade view (admin.sales.index)
        return view('admin.orders.orders', compact('orders'));
    }

    public function show(Request $request, Order $order)
    {
        // Eager load everything needed for detail page
        $order->load([
            'items.variant.media',
            'items.variant.attributeValues.attribute',
            'items.variant.product',
            'payments',
        ]);
        $states = State::get();
        return view('admin.orders.show', compact('order', 'states'));
    }

    public function updateStatus(Request $request)
    {
        $data = $request->validate([
            'status' => 'sometimes|string',
            'payment_status' => 'sometimes|string',
        ]);

        $order = Order::find($request->id);

        if (!$order) {
            Alert::toast('Order Details Not Found', 'warning');
            return redirect()->back();
        }

        $oldStatus = $order->status;

        // Check if anything actually changed
        $statusChanged = isset($data['status']) && $oldStatus != $data['status'];
        $paymentChanged = isset($data['payment_status']) && $order->payment_status != $data['payment_status'];

        if (!$statusChanged && !$paymentChanged) {
            Alert::toast('No Changes Found', 'info');
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            // Update order fields
            if (isset($data['status'])) {
                $order->status = $data['status'];
            }

            if (isset($data['payment_status'])) {
                $order->payment_status = $data['payment_status'];
            }

            $order->save();

            // Update payment table
            if (isset($data['payment_status'])) {
                Payment::where('order_id', $order->id)
                    ->update([
                        'status' => $data['payment_status']
                    ]);
            }

            // Send WhatsApp only if status changed
            if ($statusChanged) {

                $user = Customer::find($order->customer_id);

                if ($user) {

                    $template = null;

                    if ($data['status'] == 'shipped') {
                        $template = 'order_shipped_template';
                    } elseif ($data['status'] == 'delivered') {
                        $template = 'order_delivered_template';
                    } elseif ($data['status'] == 'cancelled') {
                        $template = 'order_cancel_template';
                    }

                    if ($template) {

                        $message = $this->sendWhatsAppMessage(
                            $user->mobile,
                            $template,
                            [
                                'field_1' => $user->name ?? 'Customer',
                                'field_2' => $order->invoice_id,
                                'field_3' => $order->grand_total,
                            ]
                        );

                        try {

                            $whatsappService = new WhatsAppService();
                            $result = $whatsappService->sendTemplateMessage($message);

                            Log::info('WhatsApp Sent', [
                                'order_id' => $order->id,
                                'status' => $data['status'],
                                'response' => $result
                            ]);

                        } catch (\Exception $e) {

                            Log::error('WhatsApp Error: ' . $e->getMessage());
                        }
                    }
                }
            }

            DB::commit();

            Alert::toast('Order Updated Successfully', 'success');

            return redirect()->back();

        } catch (\Throwable $e) {

            DB::rollBack();

            Log::error('Order Update Error: ' . $e->getMessage());

            Alert::toast('Unable To Update Order', 'error');

            return redirect()->back();
        }
    }

    // public function updateStatus(Request $request)
    // {
    //     $data = $request->validate([
    //         'status' => 'sometimes|string',
    //         'payment_status' => 'sometimes|string',
    //     ]);
    //     $order = Order::where('id', $request->id)->first();
    //     if (!isset($order->id)) {
    //         Alert::toast('Order Details Not Found', 'warning');
    //         return redirect()->back();
    //     }
    //     $oldstatus = $order->status;
    //     if (!empty($data['status']) && $oldstatus != $data['status']) {
    //         DB::beginTransaction();
    //         try {
    //             if (isset($data['status'])) {
    //                 $order->status = $data['status'];
    //             }
    //             if (isset($data['payment_status'])) {
    //                 $order->payment_status = $data['payment_status'];
    //             }


    //             $order->save();

    //             $user = Customer::where('id', $order->customer_id)->first();
    //             $name = $user->name ?? 'Customer';
    //             $invoiceId = $order->invoice_id;
    //             $amount = $order->grand_total;
    //             if (isset($user->id)) {
    //                 if ($data['status'] == 'shipped') {
    //                     $message = $this->sendWhatsAppMessage(
    //                         $user->mobile,
    //                         'order_shipped_template',
    //                         [
    //                             'field_1' => $name,
    //                             'field_2' => $invoiceId,
    //                             'field_3' => $amount,
    //                         ]
    //                     );
    //                     try {
    //                         $whatsappService = new WhatsAppService();
    //                         $result = $whatsappService->sendTemplateMessage($message);
    //                         Log::info($result);
    //                     } catch (Exception $e) {
    //                         $result = false;
    //                         Log::info($e->getMessage());
    //                     }
    //                 } else if ($data['status'] == 'delivered') {
    //                     $message = $this->sendWhatsAppMessage(
    //                         $user->mobile,
    //                         'order_delivered_template',
    //                         [
    //                             'field_1' => $name,
    //                             'field_2' => $invoiceId,
    //                             'field_3' => $amount,
    //                         ]
    //                     );
    //                     try {
    //                         $whatsappService = new WhatsAppService();
    //                         $result = $whatsappService->sendTemplateMessage($message);
    //                         Log::info($result);
    //                     } catch (Exception $e) {
    //                         $result = false;
    //                         Log::info($e->getMessage());
    //                     }
    //                 } else if ($data['status'] == 'cancelled') {
    //                     $message = $this->sendWhatsAppMessage(
    //                         $user->mobile,
    //                         'order_cancel_template',
    //                         [
    //                             'field_1' => $name,
    //                             'field_2' => $invoiceId,
    //                             'field_3' => $amount,
    //                         ]
    //                     );
    //                     try {
    //                         $whatsappService = new WhatsAppService();
    //                         $result = $whatsappService->sendTemplateMessage($message);
    //                         Log::info($result);
    //                     } catch (Exception $e) {
    //                         $result = false;
    //                         Log::info($e->getMessage());
    //                     }
    //                 }
    //             }


    //             if (isset($data['payment_status'])) {
    //                 Payment::where('order_id', $order->id)->update(['status' => $data['payment_status']]);
    //             }

    //             DB::commit();
    //             Alert::toast('Order Updated', 'success');
    //             return redirect()->back();
    //         } catch (\Throwable $e) {
    //             Log::error('Error updating order: ' . $e->getMessage());
    //             DB::rollBack();
    //             Alert::toast('Unable To Update', 'warning');
    //             return redirect()->back();
    //         }
    //     } else {
    //         Alert::toast('Update Success', 'success');
    //         return redirect()->back();
    //     }
    // }
    public function updateOrder(Request $request)
    {
        $data = $request->validate([
            'customer_note' => 'sometimes|string',
            'order_note' => 'sometimes|string',
            'tracking_link' => 'sometimes|string',
        ]);
        $order = Order::where('id', $request->id)->first();
        if (!isset($order->id)) {
            Alert::toast('Order Details Not Found', 'warning');
            return redirect()->back();
        }
        DB::beginTransaction();
        try {


            if (isset($data['customer_note'])) {
                $order->customer_note = $data['customer_note'];
            }
            if (isset($data['order_note'])) {
                $order->order_note = $data['order_note'];
            }
            if (isset($data['tracking_link'])) {
                $order->tracking_link = $data['tracking_link'];
            }

            $order->save();

            DB::commit();
            Alert::toast('Order Updated', 'success');
            return redirect()->back();
        } catch (\Throwable $e) {
            Log::error('Error updating order: ' . $e->getMessage());
            DB::rollBack();
            Alert::toast('Unable To Update', 'warning');
            return redirect()->back();
        }
    }

    public function destroy(Order $order)
    {
        DB::beginTransaction();
        try {
            $order->items()->delete();
            $order->payments()->delete();
            $order->shipments()->delete();

            $order->delete();

            DB::commit();
            return redirect()->route('admin.orders.index')->with('success', 'Order deleted');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Unable to delete order: ' . $e->getMessage());
        }
    }

    /**
     * Simple helper to compute paid/due across orders if needed.
     */
    protected function computePaidForOrder(Order $order): float
    {
        return (float) $order->payments()->sum('amount');
    }

    public function createDelhiveryMPS(Request $request, DelhiveryService $delhivery)
    {
        $order = Order::findOrFail($request->order_id);

        $address = (object) json_decode($order->shipping_address);

        // ✅ Eager loading
        $order_items = OrderItem::with('variant.product')
            ->where('order_id', $order->id)
            ->get();

        if ($order_items->isEmpty()) {
            return redirect()->back()->with('error', 'No order items found');
        }

        $totalWeight = 0;
        $totalAmount = 0;
        $totalQty = 0;

        $height = 0;
        $width = 0;
        $length = 0;

        foreach ($order_items as $item) {

            $product = $item->variant->product;
            $stock = $item->variant;

            // ✅ Calculate totals
            $itemWeight = ($stock->weight ?? 0) * $item->quantity;
            $totalWeight += $itemWeight;

            $totalAmount += $item->subtotal;
            $totalQty += $item->quantity;

            // ✅ Dimensions (take max)
            $height = max($height, $stock->height ?? 8);
            $width = max($width, $stock->width ?? 25);
            $length = max($length, $stock->length ?? 8);

            // ✅ Build order_items (IMPORTANT)
            $orderItemsPayload[] = [
                "name" => $product->title,
                "sku" => $stock->sku,
                "units" => (int) $item->quantity,
                "selling_price" => (float) $item->unit_price,
            ];
        }

        $pickup = [
            'name' => 'veenasilks',
        ];

        // ✅ SINGLE shipment
        $shipments = [
            [
                'order' => $order->invoice_id,
                'weight' => $totalWeight * 1000, // grams
                'pin' => $address->pincode,
                'add' => $address->address . ',' . $address->address_2 . ',' . $address->landmark,
                'city' => $address->city,
                'state' => $address->state,
                'phone' => $address->mobile,
                'name' => $address->name,
                'payment_mode' => 'Prepaid',
                'total_amount' => $order->grand_total ?? $totalAmount,
                'country' => 'India',

                // ✅ Dimensions
                "shipment_height" => $height ?: 8,
                "shipment_width" => $width ?: 25,
                "shipment_length" => $length ?: 8,
                "shipping_mode" => "Surface",

                'quantity' => $totalQty,

                // ✅ KEY FIX
                // "invoice"          => true,
                // "invoice_amount"   => $order->grand_total,
                // "cod_amount"       => 0,

                // ✅ KEY PART (for label items)
                "order_items" => $orderItemsPayload,

                // ✅ fallback (optional but recommended)
                "products_desc" => implode("\n", array_map(function ($item) {
                    return $item['name'] . " (" . $item['sku'] . ")" . "-" . $item['units'] . " x " . $item['selling_price'] . "=" . $item['units'] * $item['selling_price'];
                }, $orderItemsPayload)),
                // "products_desc" => implode("\n", array_map(function ($item) {
                //     return $item['name'] . " (" . $item['sku'] . ") x" . $item['units'];
                // }, $orderItemsPayload)),
            ]
        ];


        // ✅ Call API
        $result = $delhivery->createShipments($pickup, $shipments);

        $data = $result['data'] ?? [];
        $pkg = $data['packages'][0] ?? null;

        $freshOrder = Order::find($order->id);

        if ($pkg && ($pkg['status'] ?? '') === 'Success') {
            // $freshOrder->carrier = 'delhivery';
            // $freshOrder->awb = $pkg['waybill'] ?? null;
            // $freshOrder->courier_shipment_id = $pkg['refnum'] ?? null;
            // $freshOrder->status = 'shipping';
            // $freshOrder->save();
            $freshOrder->update([
                'carrier' => 'delhivery',
                'awb' => $pkg['waybill'] ?? null,
                'courier_shipment_id' => $pkg['refnum'] ?? null,
                'status' => 'shipping',          // your order status
                'shipment_status' => 'Success',  // new column
                'shipment_message' => 'Shipment created successfully',
                'shipment_response' => json_encode($pkg)
            ]);
            try {
                $orderstatushistory = new OrderStatusHistory();
                $orderstatushistory->order_id = $order->id;
                $orderstatushistory->status = 'shipping';
                $orderstatushistory->remark = 'Shipment created successfully';
                $orderstatushistory->save();
            } catch (Exception $e) {
                Log::info($e->getMessage());
            }

            Alert::toast("Shipment created successfully", 'success');

            return redirect()->back()->with('success', 'Shipment created successfully');
        } else {
            $remarkMessage = '';

            if (!empty($pkg['remarks'])) {
                // If it's array, take first element
                if (is_array($pkg['remarks'])) {
                    $remarkMessage = $pkg['remarks'][0];
                } else {
                    $remarkMessage = $pkg['remarks'];
                }
            }
            $freshOrder->update([
                'shipment_status' => 'Fail',
                'shipment_message' => $remarkMessage ?? 'Shipment failed',
                'shipment_response' => json_encode($pkg)
            ]);
            Alert::toast("Shipment Creation Failed", 'warning');
            return redirect()->back()->with('warning', 'Shipment Creation Failed');
        }
    }

    public function createBulkParcel(Request $request)
    {
        $orderIds = $request->order_ids;

        if (!$orderIds || count($orderIds) == 0) {
            return response()->json([
                'status' => false,
                'message' => 'No orders selected'
            ]);
        }
        $delaySeconds = 0;
        // Dispatch one job for each order
        foreach ($orderIds as $orderId) {
            CreateParcelJob::dispatch($orderId)->delay(now()->addSeconds($delaySeconds));
            $delaySeconds += 1;
        }

        return response()->json([
            'status' => true,
            'message' => 'Orders added to queue one by one'
        ]);
    }

    public function refreshAwbStatus(Request $request)
    {
        $orderIds = $request->order_ids;
        if (!$orderIds || count($orderIds) === 0) {
            return response()->json([
                'status' => false,
                'message' => 'No orders selected'
            ]);
        }

        $orders = Order::whereIn('id', $orderIds)
            ->whereNotNull('awb')
            ->get();
        foreach ($orders as $order) {
            try {
                $dlv = app(DelhiveryService::class);
                $resp = $dlv->track($order->awb);
                $tracking = $this->normalizeDelhiveryTracking($resp);

                $status = strtolower($tracking['status'] ?? '');
                // Optional mapping
                if ($status === 'delivered') {
                    $order->status = 'delivered';
                } elseif (in_array($status, ['in transit', 'shipped'])) {
                    $order->status = 'shipped';
                } elseif ($status === 'returned') {
                    $order->status = 'returned';
                }

                $order->shipment_status = !empty($tracking['status']) ? 'Success' : 'Failed';
                $order->shipment_message = $tracking['instructions'] ?? ($tracking['status'] ?? 'No update');
                $order->shipment_response = json_encode($resp);

                $order->save();
            } catch (Exception $e) {
                Log::error("AWB update failed for Order {$order->id}: " . $e->getMessage());
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'AWB statuses refreshed successfully'
        ]);
    }


    public function print($id)
    {
        $order = Order::with(['items', 'payments', 'user'])->findOrFail($id);
        $site = SiteSetting::first();

        return view('admin.orders.print', compact('order', 'site'));
    }

    public function downloadInvoice($orderId)
    {
        $order = Order::with(['user', 'items', 'payments'])->findOrFail($orderId);
        $site = SiteSetting::first();

        $pdf = Pdf::loadView('admin.orders.invoice', compact('order', 'site'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('Invoice-' . $order->invoice_id . '.pdf');
    }

    public function export(Request $request)
    {
        $query = Order::where('order_type', 'preorder');
        if ($request->status) {
            $query->where('status', $request->status);
        }
        /* ✅ DATE FILTER */
        if ($request->date) {
            $query->whereDate('bill_date', $request->date);
        }
        $data = $query->latest()->get(); // no pagination

        return Excel::download(
            new OrdersExport($data),
            'orders.xlsx'
        );
    }


    public function todayOrdersExport(Request $request)
    {
        $query = Order::query();

        // ✅ Only today's data
        $query->whereDate('created_at', Carbon::today());

        // Optional filters (if needed later)
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $data = $query->latest()->get();

        return Excel::download(
            new TodayOrdersExport($data),
            'today_orders.xlsx'
        );
    }

    public function todayTransactionsExport(Request $request)
    {
        $query = Payment::where('status', 'paid');

        // ✅ Only today's data
        $query->whereDate('created_at', Carbon::today());

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $data = $query->latest()->get();

        return Excel::download(
            new TodayTransactionsExport($data),
            'today_transactions.xlsx'
        );
    }

    private function sendWhatsAppMessage($cust_mobile, $templateName, array $fields = [])
    {

        $data = [
            "from_phone_number_id" => "1039154362623617",
            "phone_number" => '91' . $cust_mobile,
            "template_name" => $templateName,
            "template_language" => "en_Us",
            "header_image" => "https://cdn.pixabay.com/photo/2015/01/07/15/51/woman-591576_1280.jpg",
            "header_video" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            "header_document" => "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4",
            "header_document_name" => "",
            "header_field_1" => "{full_name}",
            "location_latitude" => "",
            "location_longitude" => "",
            "location_name" => "",
            "location_address" => "",
            "field_1" => $fields['field_1'] ?? '',
            "field_2" => $fields['field_2'] ?? '',
            "field_3" => $fields['field_3'] ?? '',
            "field_4" => $fields['field_4'] ?? '',
            "field_5" => $fields['field_5'] ?? '',
            "button_0" => $fields['field_1'],
            "button_1" => "{phone_number}",
            "copy_code" => $fields['field_1'],
        ];

        return $data;
    }
    public function updateAddress(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();

        if (!$order) {
            Alert::toast('Order Not Found', 'warning');
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            // Update fields
            $addressSnapshot = [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'gst' => $request->gst,
                'address' => $request->address,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'landmark' => $request->landmark,
                'state' => $request->state,
                // 'state_id' => $request->state_id,
            ];
            // if (!empty($request->state_id)) {
            //     $state = State::find($request->state_id);
            //     $addressSnapshot['state'] = $state->name ?? null;
            // }
            $order->shipping_address = json_encode($addressSnapshot);
            $order->billing_address = json_encode($addressSnapshot);

            $order->save();

            DB::commit();

            Alert::toast('Address Updated Successfully', 'success');
            return redirect()->back();

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('Error updating address: ' . $e->getMessage());

            Alert::toast('Unable To Update Address', 'warning');
            return redirect()->back();
        }
    }


    protected function normalizeDelhiveryTracking(array $resp): array
    {
        $shipments = Arr::get($resp, 'ShipmentData', []);
        $shipment = is_array($shipments) && count($shipments)
            ? Arr::get($shipments, '0.Shipment', [])
            : [];

        // Primary status block
        $statusTitle = trim((string) Arr::get($shipment, 'Status.Status', ''));
        $statusTime = Arr::get($shipment, 'Status.StatusDateTime');
        $statusLoc = (string) (Arr::get($shipment, 'Status.StatusLocation', '')
            ?: Arr::get($shipment, 'Origin', ''));
        $instructions = (string) Arr::get($shipment, 'Status.Instructions', '');

        // Build events from Scans[]
        $scans = Arr::get($shipment, 'Scans', []);
        $events = [];
        foreach ($scans as $wrap) {
            $s = Arr::get($wrap, 'ScanDetail', []);
            $scanTime = Arr::get($s, 'ScanDateTime', Arr::get($s, 'StatusDateTime'));
            $scanLoc = (string) (Arr::get($s, 'ScannedLocation', Arr::get($s, 'ScanLocation', '')));

            $events[] = [
                'status' => (string) Arr::get($s, 'Scan', ''),
                'description' => (string) (Arr::get($s, 'Instructions', '') ?: Arr::get($s, 'Instructions_r', '')),
                'time' => $this->fmtTime($scanTime),
                'location' => trim($scanLoc),
            ];
        }

        // Add synthesized “current status” event
        if ($statusTitle !== '') {
            $events[] = [
                'status' => $statusTitle,
                'description' => $instructions,
                'time' => $this->fmtTime($statusTime),
                'location' => trim($statusLoc),
            ];
        }

        // Sort latest → oldest
        usort($events, fn($a, $b) => strcmp($b['time'] ?? '', $a['time'] ?? ''));

        // Compute last_update
        $lastUpdate = $this->fmtTime($statusTime) ?: ($events[0]['time'] ?? null);

        // Optional extras
        $destination = (string) (Arr::get($shipment, 'Destination', Arr::get($shipment, 'Consignee.City', '')));
        $orderType = (string) Arr::get($shipment, 'OrderType', '');
        $invoiceAmt = Arr::get($shipment, 'InvoiceAmount');

        // Delivery-related dates
        $expectedDelivery = $this->fmtTime(Arr::get($shipment, 'ExpectedDeliveryDate'));
        $actualDelivery = $this->fmtTime(Arr::get($shipment, 'DeliveryDate'));

        return [
            'status' => $this->normalizeDelhiveryStatus($statusTitle, $events),
            'last_update' => $lastUpdate,
            'destination' => $destination ?: null,
            'order_type' => $orderType ?: null,
            'invoice_amount' => $invoiceAmt,
            'expected_delivery' => $expectedDelivery,
            'delivery_date' => $actualDelivery, // ✅ Delivered date if available
            'events' => $events,
            'raw' => $resp, // remove if not needed
        ];
    }

    protected function normalizeDelhiveryStatus(string $title, array $events): string
    {
        $t = mb_strtolower($title);

        // Common explicit states
        if ($t !== '') {
            if (str_contains($t, 'delivered'))
                return 'delivered';
            if (str_contains($t, 'out for delivery'))
                return 'out_for_delivery';
            if (str_contains($t, 'rto') || str_contains($t, 'return'))
                return 'rto';
            if (str_contains($t, 'cancel'))
                return 'cancelled';
            if (str_contains($t, 'manifest'))
                return 'in_transit';   // e.g., "Manifested"
            if (str_contains($t, 'picked'))
                return 'in_transit';
            if (str_contains($t, 'dispatched') || str_contains($t, 'received at') || str_contains($t, 'transit'))
                return 'in_transit';
        }

        // Fallback to latest event text
        $latest = mb_strtolower((string) ($events[0]['status'] ?? ''));
        if ($latest !== '') {
            if (str_contains($latest, 'delivered'))
                return 'delivered';
            if (str_contains($latest, 'out for delivery'))
                return 'out_for_delivery';
            if (str_contains($latest, 'rto') || str_contains($latest, 'return'))
                return 'rto';
            if (str_contains($latest, 'cancel'))
                return 'cancelled';
            if (str_contains($latest, 'manifest') || str_contains($latest, 'picked') || str_contains($latest, 'dispatched') || str_contains($latest, 'received at') || str_contains($latest, 'transit'))
                return 'in_transit';
        }

        // Nothing concrete → created (label made but no movement)
        return $title ? 'in_transit' : 'created';
    }

    protected function fmtTime($raw): ?string
    {
        if (!$raw)
            return null;
        try {
            return Carbon::parse($raw)->toIso8601String();
        } catch (\Throwable $e) {
            return null;
        }
    }
    public function uploadAwbPage()
    {
        return view('admin.orders.upload-awb');
    }

    public function importAwbCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');

        $header = fgetcsv($file);

        $updated = 0;
        $notFound = 0;

        while (($row = fgetcsv($file)) !== false) {

            $data = array_combine($header, $row);

            $awb = trim($data['Waybill'] ?? '');
            $ref = trim($data['Reference No.'] ?? '');

            if (!$awb || !$ref) {
                continue;
            }

            $order = Order::where('invoice_id', $ref)->whereNull('awb')
                ->first();

            if ($order) {

                $order->update([
                    'carrier' => 'delhivery',
                    'awb' => $awb,
                    'courier_shipment_id' => $ref,
                    'status' => 'shipped',
                    'shipment_status' => 'Success'
                ]);

                $updated++;
            } else {
                $notFound++;
            }
        }

        fclose($file);

        return back()->with('success', "$updated updated, $notFound not found.");
    }
}
