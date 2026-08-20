<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\SiteSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Razorpay\Api\Api;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    //

    public function orders(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            Alert::toast('Please Login', 'warning');
            return redirect()->route('login');
        }

        $customer = Auth::guard('customer')->user();

        $orders = Order::with([
            'items',
            'payments',
        ])
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();

        return view('website.orders', compact('orders'));
    }
    public function show($id)
    {
        if (!Auth::guard('customer')->check()) {
            Alert::toast("Please Login", 'warning');
            return redirect()->route('login');
        }
        $userId = Auth::guard('customer')->id();
        $user = Customer::where('id', $userId)->first();
        $order = Order::where('customer_id', $user->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('website.order-details', compact('order'));
    }
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CUSTOMER LOGIN
        |--------------------------------------------------------------------------
        */

        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login to continue.');
        }


        $user = Auth::guard('customer')->user();

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validator = Validator::make(
            $request->all(),
            [
                'address_id' => [
                    'required',
                    'integer',
                    'exists:addresses,id',
                ],

                'payment_method' => [
                    'required',
                    'in:cod,online_payment',
                ],
            ],
            [
                'address_id.required' =>
                    'Please select a delivery address.',

                'address_id.exists' =>
                    'Selected address was not found.',

                'payment_method.required' =>
                    'Please select a payment method.',

                'payment_method.in' =>
                    'Invalid payment method.',
            ]
        );


        if ($validator->fails()) {

            return redirect()
                ->route('checkout')
                ->withErrors($validator)
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | GET CUSTOMER ADDRESS
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        | Only allow an address belonging to this customer.
        |
        */

        $address = Address::where('id', $request->address_id)
            ->where('customer_id', $user->id)
            ->first();


        if (!$address) {

            return redirect()
                ->route('checkout')
                ->with('error', 'Please select a valid delivery address.')
                ->withInput();
        }


        /*
        |--------------------------------------------------------------------------
        | SHIPPING ADDRESS
        |--------------------------------------------------------------------------
        */

        $shippingAddress = [

            'name' => $address->name
                ?? $user->name,

            'phone' => $address->mobile
                ?? $user->mobile,

            'mobile' => $address->mobile
                ?? $user->mobile,

            'email' => $address->email
                ?? $user->email,

            'address' => $address->address,

            'landmark' => $address->landmark,

            'address_2' => $address->address_2,

            'city' => $address->city,

            'state' => $address->state,

            'pincode' => $address->pincode,

        ];


        /*
        |--------------------------------------------------------------------------
        | GET CART
        |--------------------------------------------------------------------------
        */

        $cartItems = CartItem::with([
            'variant.product'
        ])
            ->where('user_id', $user->id)
            ->get();


        if ($cartItems->isEmpty()) {

            return redirect()
                ->route('cart')
                ->with(
                    'error',
                    'Your cart is empty.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | CALCULATE TOTAL
        |--------------------------------------------------------------------------
        */

        $subtotal = $cartItems->sum(function ($item) {

            return (float) $item->unit_price
                * (int) $item->quantity;

        });


        $shipping = 0;

        $discount = 0;

        $grandTotal =
            $subtotal
            + $shipping
            - $discount;


        /*
        |--------------------------------------------------------------------------
        | START TRANSACTION
        |--------------------------------------------------------------------------
        */

        DB::beginTransaction();


        try {

            /*
            |--------------------------------------------------------------------------
            | CREATE ORDER
            |--------------------------------------------------------------------------
            */

            $order = Order::create([

                'invoice_id' => '',

                'customer_id' => $user->id,

                'subtotal' => $subtotal,

                'tax_total' => 0,

                'discount_total' => $discount,

                'delivery_total' => $shipping,

                'grand_total' => $grandTotal,

                'payment_method' =>
                    $request->payment_method,

                'payment_status' => 'pending',

                'status' => 'pending',

                'shipping_address' =>
                    json_encode($shippingAddress),

                'billing_address' =>
                    json_encode($shippingAddress),

            ]);


            /*
            |--------------------------------------------------------------------------
            | GENERATE INVOICE
            |--------------------------------------------------------------------------
            */

            $invoiceId =
                'VS' .
                str_pad(
                    $order->id,
                    5,
                    '0',
                    STR_PAD_LEFT
                );


            $order->update([
                'invoice_id' => $invoiceId
            ]);


            /*
            |--------------------------------------------------------------------------
            | CREATE ORDER ITEMS
            |--------------------------------------------------------------------------
            */

            foreach ($cartItems as $item) {

                $variant = $item->variant;

                $product = $variant?->product;


                if (!$variant || !$product) {

                    throw new \Exception(
                        'Product information is missing for one of the cart items.'
                    );
                }


                /*
                |--------------------------------------------------------------------------
                | STOCK CHECK
                |--------------------------------------------------------------------------
                */

                if (
                    isset($variant->stock) &&
                    $variant->stock < $item->quantity
                ) {

                    throw new \Exception(
                        $product->title .
                        ' is out of stock.'
                    );
                }


                OrderItem::create([

                    'order_id' =>
                        $order->id,

                    'product_variant_id' =>
                        $item->product_variant_id,

                    'seller_id' => 0,

                    'product_title' =>
                        $product->title,

                    'sku' =>
                        $variant->sku,

                    'unit_price' =>
                        $item->unit_price,

                    'quantity' =>
                        $item->quantity,

                    'subtotal' =>
                        $item->unit_price *
                        $item->quantity,

                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | CREATE PAYMENT
            |--------------------------------------------------------------------------
            */

            $payment = Payment::create([

                'order_id' =>
                    $order->id,

                'user_id' =>
                    $user->id,

                'amount' =>
                    $grandTotal,

                'currency' =>
                    'INR',

                'status' =>
                    'pending',

                'method' =>
                    $request->payment_method,

                'reference_no' =>
                    $order->invoice_id,

            ]);


            /*
            |--------------------------------------------------------------------------
            | COD
            |--------------------------------------------------------------------------
            */

            if (
                $request->payment_method === 'cod'
            ) {

                $order->update([

                    'status' =>
                        'placed',

                    'payment_status' =>
                        'pending',

                ]);


                /*
                |--------------------------------------------------------------------------
                | REDUCE STOCK
                |--------------------------------------------------------------------------
                */

                foreach ($cartItems as $item) {

                    if ($item->variant) {

                        $item->variant
                            ->decrement(
                                'stock',
                                $item->quantity
                            );
                    }
                }


                /*
                |--------------------------------------------------------------------------
                | CLEAR CART
                |--------------------------------------------------------------------------
                */

                CartItem::where(
                    'user_id',
                    $user->id
                )->delete();


                DB::commit();


                Alert::success(
                    'Success',
                    'Order placed successfully.'
                );


                return redirect()
                    ->route('customer.orders');
            }


            /*
            |--------------------------------------------------------------------------
            | ONLINE PAYMENT
            |--------------------------------------------------------------------------
            */

            if (
                $request->payment_method ===
                'online_payment'
            ) {

                $api = new Api(
                    env('RAZORPAY_KEY'),
                    env('RAZORPAY_SECRET')
                );


                $razorpayOrder =
                    $api->order->create([

                        'receipt' =>
                            $order->invoice_id,

                        'amount' =>
                            (int) round(
                                $grandTotal * 100
                            ),

                        'currency' =>
                            'INR',

                        'payment_capture' =>
                            1,

                    ]);


                /*
                |--------------------------------------------------------------------------
                | SAVE RAZORPAY ORDER ID
                |--------------------------------------------------------------------------
                */

                $payment->update([

                    'provider' =>
                        'razorpay',

                    'provider_order_id' =>
                        $razorpayOrder['id'],

                ]);


                DB::commit();


                /*
                |--------------------------------------------------------------------------
                | RAZORPAY PAGE
                |--------------------------------------------------------------------------
                */

                return view(
                    'website.razorpay-payment',
                    [
                        'order' =>
                            $order,

                        'payment' =>
                            $payment,

                        'razorpayOrder' =>
                            $razorpayOrder,

                        'grandTotal' =>
                            $grandTotal,

                        'user' =>
                            $user,
                    ]
                );
            }


            /*
            |--------------------------------------------------------------------------
            | UNKNOWN PAYMENT METHOD
            |--------------------------------------------------------------------------
            */

            DB::rollBack();


            return redirect()
                ->route('checkout')
                ->with(
                    'error',
                    'Invalid payment method.'
                )
                ->withInput();


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | ROLLBACK
            |--------------------------------------------------------------------------
            */

            DB::rollBack();


            Log::error(
                'Order creation failed',
                [
                    'customer_id' =>
                        $user->id,

                    'address_id' =>
                        $request->address_id,

                    'payment_method' =>
                        $request->payment_method,

                    'error' =>
                        $e->getMessage(),

                    'file' =>
                        $e->getFile(),

                    'line' =>
                        $e->getLine(),

                ]
            );


            return redirect()
                ->route('checkout')
                ->with(
                    'error',
                    'Unable to place order. Please try again.'
                )
                ->withInput();
        }
    }

    public function paymentSuccess(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | CUSTOMER LOGIN
        |--------------------------------------------------------------------------
        */

        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }


        /*
        |--------------------------------------------------------------------------
        | VALIDATE RAZORPAY RESPONSE
        |--------------------------------------------------------------------------
        */

        $validator = Validator::make(
            $request->all(),
            [
                'order_id' => 'required|integer',

                'razorpay_payment_id' =>
                    'required|string',

                'razorpay_order_id' =>
                    'required|string',

                'razorpay_signature' =>
                    'required|string',
            ]
        );


        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid payment response.',
                'errors' => $validator->errors(),
            ], 422);
        }


        try {

            /*
            |--------------------------------------------------------------------------
            | FIND PAYMENT
            |--------------------------------------------------------------------------
            */

            $payment = Payment::where(
                'provider_order_id',
                $request->razorpay_order_id
            )
                ->where(
                    'user_id',
                    Auth::guard('customer')->id()
                )
                ->first();


            if (!$payment) {

                Log::error(
                    'Razorpay payment not found',
                    [
                        'customer_id' =>
                            Auth::guard('customer')->id(),

                        'razorpay_order_id' =>
                            $request->razorpay_order_id,

                        'razorpay_payment_id' =>
                            $request->razorpay_payment_id,

                        'request' =>
                            $request->all(),
                    ]
                );


                return response()->json([
                    'success' => false,
                    'message' =>
                        'Payment record not found.'
                ], 404);
            }


            /*
            |--------------------------------------------------------------------------
            | GET ORDER
            |--------------------------------------------------------------------------
            */

            $order = Order::where(
                'id',
                $payment->order_id
            )
                ->where(
                    'customer_id',
                    Auth::guard('customer')->id()
                )
                ->first();


            if (!$order) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Order not found.'
                ], 404);
            }


            /*
            |--------------------------------------------------------------------------
            | VERIFY RAZORPAY SIGNATURE
            |--------------------------------------------------------------------------
            */

            $api = new Api(
                env('RAZORPAY_KEY'),
                env('RAZORPAY_SECRET')
            );


            $api->utility->verifyPaymentSignature([
                'razorpay_order_id' =>
                    $request->razorpay_order_id,

                'razorpay_payment_id' =>
                    $request->razorpay_payment_id,

                'razorpay_signature' =>
                    $request->razorpay_signature,
            ]);


            /*
            |--------------------------------------------------------------------------
            | UPDATE PAYMENT
            |--------------------------------------------------------------------------
            */

            $payment->update([

                'status' =>
                    'paid',

                'provider_payment_id' =>
                    $request->razorpay_payment_id,

                'provider_signature' =>
                    $request->razorpay_signature,

            ]);


            /*
            |--------------------------------------------------------------------------
            | UPDATE ORDER
            |--------------------------------------------------------------------------
            */

            $order->update([

                'status' =>
                    'placed',

                'payment_status' =>
                    'paid',

            ]);


            /*
            |--------------------------------------------------------------------------
            | REDUCE STOCK
            |--------------------------------------------------------------------------
            */

            $cartItems = CartItem::with('variant')
                ->where(
                    'user_id',
                    $payment->user_id
                )
                ->get();


            foreach ($cartItems as $item) {

                if ($item->variant) {

                    $item->variant->decrement(
                        'stock',
                        $item->quantity
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | CLEAR CART
            |--------------------------------------------------------------------------
            */

            CartItem::where(
                'user_id',
                $payment->user_id
            )->delete();


            /*
            |--------------------------------------------------------------------------
            | SUCCESS RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([
                'success' => true,

                'message' =>
                    'Payment successful. Order placed.',

                'order_id' =>
                    $order->id,

                'invoice_id' =>
                    $order->invoice_id,

                'redirect_url' =>
                    route('customer.orders'),
            ], 200);


        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {

            /*
            |--------------------------------------------------------------------------
            | INVALID SIGNATURE
            |--------------------------------------------------------------------------
            */

            Log::error(
                'Razorpay signature verification failed',
                [
                    'order_id' =>
                        $request->order_id,

                    'razorpay_order_id' =>
                        $request->razorpay_order_id,

                    'error' =>
                        $e->getMessage(),
                ]
            );


            return response()->json([
                'success' => false,
                'message' =>
                    'Payment verification failed. Invalid signature.'
            ], 400);


        } catch (\Throwable $e) {

            /*
            |--------------------------------------------------------------------------
            | GENERAL ERROR
            |--------------------------------------------------------------------------
            */

            Log::error(
                'Razorpay payment verification error',
                [
                    'order_id' =>
                        $request->order_id,

                    'razorpay_order_id' =>
                        $request->razorpay_order_id,

                    'error' =>
                        $e->getMessage(),

                    'file' =>
                        $e->getFile(),

                    'line' =>
                        $e->getLine(),
                ]
            );


            return response()->json([
                'success' => false,
                'message' =>
                    'Unable to verify payment. Please contact support.'
            ], 500);
        }
    }

    public function orderDetail($id)
    {
        $order = Order::with([
            'items.productVariant.product',
        ])->findOrFail($id);

        return view('website.order-detail', compact('order'));
    }

    public function downloadInvoice($id)
    {
        $order = Order::with(['items.variant.product'])->findOrFail($id);

        $site = SiteSetting::first();

        $pdf = Pdf::loadView('website.invoice', compact('order', 'site'));

        return $pdf->download('invoice-' . $order->invoice_id . '.pdf');
    }

    public function print($id)
    {
        $order = Order::with(['items', 'payments', 'user'])->findOrFail($id);
        $site = SiteSetting::first();

        return view('website.invoices', compact('order', 'site'));
    }

}
