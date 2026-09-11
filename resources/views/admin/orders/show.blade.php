<?php $page = 'activity-details'; ?>
@extends('layout.mainlayout')

@section('content')
    <div class="page-wrapper">
        <div class="content">

            {{-- ================= HEADER ================= --}}
            <div class="page-header d-flex align-items-center justify-content-between mb-3">
                <a href="{{ route('admin.orders.index') }}" class="d-inline-flex align-items-center text-decoration-none">
                    <i class="ti ti-chevron-left me-2"></i> Back to Orders
                </a>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="btn btn-dark">
                        Print Invoice
                    </a>
                    <a href="{{ route('admin.orders.download', $order->id) }}" class="btn btn-success">
                        <i class="ti ti-download me-1"></i>Download PDF
                    </a>

                    {{-- @if (!in_array($order->status, ['delivered', 'cancelled', 'shipped']))
                        @if (empty($order->awb))
                            <a href="{{route('admin.sales.createParcel.delhivery', ['order_id' => $order->id])}}"
                                class="btn btn-primary">
                                <i class="ti ti-circle-plus me-1"></i>Create Parcel
                            </a>
                        @endif
                    @endif --}}
                </div>
                


            </div>

            {{-- ================= ACTIVITY HEADER CARD ================= --}}
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body d-flex align-items-center gap-4">

                    {{-- Icon --}}
                    <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                        style="width:80px;height:80px;">
                        <i class="ti ti-activity text-warning fs-36"></i>
                    </div>

                    {{-- Activity Info --}}
                    <div class="flex-grow-1">
                        <h5 class="fw-semibold mb-1">
                            {{ $order->invoice_id ?? 'User Activity' }}
                        </h5>

                        <div class="text-muted fs-13">
                            Order Created by <strong>{{ $order->user->name ?? '_'}}</strong>
                            • {{ $order->created_at->format('d M Y, h:i A') }}
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="text-end">
                        <span class="badge bg-success px-3 py-2">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>


                </div>
            </div>
            <div class="row g-3 mb-3">
                @php
                    $shipping = is_array($order->shipping_address)
                        ? $order->shipping_address
                        : json_decode($order->shipping_address ?? '[]', true);
                @endphp
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2"
                                    style="width:42px;height:42px;">
                                    <i class="ti ti-map-pin text-light"></i>
                                </div>
                                <h6 class="fw-bold mb-0">Shipping Address</h6>
                                <a class="ms-auto p-2" href="#edit-category" data-bs-toggle="modal"
                                    data-id="{{ $order->id }}" id="editCategoryBtn">
                                    <i data-feather="edit" class="feather-edit"></i>
                                </a>
                            </div>


                            <p class="fw-semibold mb-1">
                                {{ $shipping['name'] ?? '-' }}
                            </p>

                            <p class="mb-1 text-muted">
                                <i class="ti ti-phone me-1"></i>
                                {{ $shipping['mobile'] ?? '-' }}
                            </p>

                            <p class="mb-2 text-muted">
                                <i class="ti ti-mail me-1"></i>
                                {{ $shipping['email'] ?? '-' }}
                            </p>

                            <hr class="my-2">

                            <p class="mb-1">
                                {{ $shipping['address'] ?? '' }},
                                {{ $shipping['address_2'] ?? '' }}
                            </p>

                            <p class="mb-1">
                                {{ $shipping['city'] ?? '' }} - {{ $shipping['pincode'] ?? '' }}
                            </p>

                            <p class="mb-1">
                                {{ $shipping['state'] ?? '' }}
                            </p>

                            @if(!empty($shipping['landmark']))
                                <p class="mb-1 text-muted">
                                    <i class="ti ti-map-2 me-1"></i>
                                    <strong>Landmark:</strong> {{ $shipping['landmark'] }}
                                </p>
                            @endif

                            @if(!empty($shipping['gst']))
                                <p class="mb-0 text-muted">
                                    <i class="ti ti-file-text me-1"></i>
                                    <strong>GST:</strong> {{ $shipping['gst'] }}
                                </p>
                            @endif

                        </div>
                    </div>
                </div>

                <!------edit------->
                <div class="modal fade" id="edit-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="post" action="{{ route('admin.orders.updateAddress') }}">
                                @csrf

                                <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">

                                <div class="modal-header">
                                    <h4>Edit Address</h4>
                                </div>

                                <div class="modal-body">

                                    <input type="text" name="name" class="form-control mb-2" placeholder="Name"
                                        value="{{ $shipping['name'] ?? '-' }}" required>

                                    <input type="text" name="mobile" class="form-control mb-2" placeholder="Mobile"
                                        value="{{ $shipping['mobile'] ?? '-' }}" required>

                                    <input type="email" name="email" class="form-control mb-2" placeholder="Email"
                                        value="{{ $shipping['email'] ?? '-' }}">
                                    <input type="text" name="gst" class="form-control mb-2" placeholder="GST"
                                        value="{{ $shipping['gst'] ?? '-' }}">

                                    <textarea name="address" class="form-control mb-2" placeholder="Address"
                                        required>{{ $shipping['address'] ?? '' }}</textarea>

                                    <input type="text" name="address_2" class="form-control mb-2" placeholder="Address 2"
                                        value="{{ $shipping['address_2'] ?? '-' }}">

                                    <input type="text" name="city" class="form-control mb-2" placeholder="City"
                                        value="{{ $shipping['city'] ?? '-' }}" required>

                                    <!-- ✅ STATE DROPDOWN -->
                                    <select name="state" class="form-control mb-2" id="stateSelect" required>
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->name }}" {{ (isset($shipping['state']) && $shipping['state'] == $state->name) ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <!-- hidden state name -->
                                    {{-- <input type="hidden" name="state" id="state_name"> --}}

                                    <input type="text" name="pincode" class="form-control mb-2" placeholder="Pincode"
                                        value="{{ $shipping['pincode'] ?? '-' }}" required>

                                    <input type="text" name="landmark" class="form-control mb-2" placeholder="Landmark"
                                        value="{{ $shipping['landmark'] ?? '-' }}">

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn me-2 btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button class="btn btn-success">Update Address</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ================= ORDER DETAILS ================= --}}
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2"
                                    style="width:42px;height:42px;">
                                    <i class="ti ti-package text-success"></i>
                                </div>
                                <h6 class="fw-bold mb-0">Order Details</h6>
                            </div>

                            <div class="mb-2">
                                <span class="text-muted">Order ID</span><br>
                                <span class="fw-semibold">#{{ $order->id }}</span>
                            </div>

                            <div class="mb-2">
                                <span class="text-muted">Payment Status</span><br>
                                <span class="badge bg-{{ $order->payment_status == 'paid' ? 'success' : 'warning' }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </div>

                            @if($order->awb)
                                <div class="mb-2">
                                    <span class="text-muted">AWB Number</span><br>
                                    <span class="fw-semibold">{{ $order->awb }}</span>
                                </div>
                            @endif

                            <div class="mb-2">
                                <span class="text-muted">Order Date</span><br>
                                <span class="fw-semibold">
                                    {{ $order->created_at->format('d M Y, h:i A') }}
                                </span>
                            </div>

                            <div>
                                <span class="text-muted">Last Update</span><br>
                                <span class="fw-semibold">
                                    {{ $order->created_at->diffForHumans() }}
                                </span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            {{-- ================= ACTIVITY SUMMARY ================= --}}
            <div class="row g-3 mb-3">

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="ti ti-user fs-24 text-primary mb-2"></i>
                            <div class="fw-semibold">{{ $order->user->name ?? ''}} ({{ $order->user->mobile ?? ''}})</div>
                            <div class="fs-12 text-muted">User Name</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="ti ti-currency-rupee fs-24 text-success mb-2"></i>
                            <div class="fw-semibold">{{ $order->grand_total ?? '0' }}</div>
                            <div class="fs-12 text-muted">Amount</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="ti ti-clock fs-24 text-danger mb-2"></i>
                            <div class="fw-semibold">{{ $order->created_at->diffForHumans() }}</div>
                            <div class="fs-12 text-muted">Time</div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- ================= ORDER ITEMS ================= --}}
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Order Items</h5>
                    <span class="badge bg-primary">{{ $order->items->count() ?? 0 }} Items</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Item</th>
                                    <th>SKU</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product_title ?? '-' }}</td>
                                        <td>{{ $item->sku ?? '-' }}</td>
                                        <td>{{ $item->variant->product->hsn_code ?? '' }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>₹{{ number_format($item->unit_price, 2) }}</td>
                                        <td>₹{{ number_format($item->quantity * $item->unit_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ================= PAYMENT DETAILS ================= --}}
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-header bg-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Payment Details</h5>
                    <span class="badge bg-success">{{ ucfirst($order->payment_status) ?? 'Pending' }}</span>
                </div>
                <div class="card-body">
                    @if($order->payments->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Transaction ID</th>
                                        <th>Date</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->payments as $index => $payment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ ucfirst($payment->method ?? '-') }}</td>
                                            <td>₹{{ number_format($payment->amount ?? 0, 2) }}</td>
                                            <td>{{ $payment->provider_payment_id ?? '-' }}</td>
                                            <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
                                            <td>{{ $payment->notes ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center text-muted">No payments recorded yet.</div>
                    @endif


                    @if (!in_array($order->status, ['delivered', 'cancelled']))
                        <hr class="my-4">

                        <h6 class="mb-3">Update Order Status</h6>

                        <form action="{{ route('admin.orders.updateStatus') }}" method="POST">
                            @csrf

                            <div class="row g-2 align-items-end">
                                <input type="hidden" name="id" value="{{ $order->id }}" required>
                                {{-- Order Status --}}

                                <div class="col-md-6">
                                    <label class="form-label">Order Status</label>
                                    <select name="status" class="form-select">
                                        @if ($order->status == 'placed')
                                            <option value="placed" {{ $order->status == 'placed' ? 'selected' : '' }}>
                                                Placed</option>
                                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped
                                            </option>
                                        @endif
                                        @if ($order->status == 'shipped')
                                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped
                                            </option>
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                                            </option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                            </option>
                                        @endif
                                        @if ($order->status == 'delivered')
                                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered
                                            </option>
                                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled
                                            </option>
                                        @endif
                                        @if ($order->status == 'pending')
                                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="placed" {{ $order->status == 'placed' ? 'selected' : '' }}>
                                                Placed</option>
                                        @endif
                                    </select>
                                </div>

                                {{-- Payment Status --}}
                                @if ($order->payment_status == 'pending')
                                    <div class="col-md-6">
                                        <label>Payment Status</label>
                                        <select name="payment_status" class="form-select">
                                            <option value="pending">Pending</option>
                                            <option value="paid">Paid</option>
                                            <option value="failed">Failed</option>
                                        </select>
                                    </div>

                                @elseif ($order->status == 'cancelled')
                                    <div class="col-md-6">
                                        <label>Payment Status</label>
                                        <select name="payment_status" class="form-select">
                                            <option value="refunded" selected>Refunded</option>
                                        </select>
                                    </div>
                                @endif




                                {{-- Button --}}
                                <div class="col-md-4">
                                    <button class="btn btn-primary w-100">
                                        Update
                                    </button>
                                </div>

                            </div>
                        </form>
                    @endif

                    {{--
                    <hr class="my-4">
                    <h6 class="mb-3">Update Order</h6>
                    <form action="{{ route('admin.orders.updateOrder') }}" method="POST">
                        @csrf
                        <div class="row g-2 align-items-end">
                            <input type="hidden" name="id" value="{{ $order->id }}" required>

                            <div class="col-md-6">
                                <label>Customer Note</label>
                                <textarea name="customer_note" class="form-control" style="border: 1px solid #ccc;"
                                    onfocus="this.style.borderColor='skyblue'" onblur="this.style.borderColor='#ccc'"
                                    rows="3" placeholder="Customer Note">
                                                    </textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Order Note</label>
                                <textarea name="order_note" class="form-control" style="border: 1px solid #ccc;"
                                    onfocus="this.style.borderColor='skyblue'" onblur="this.style.borderColor='#ccc'"
                                    rows="3" placeholder="Order Note">
                                                    </textarea>
                            </div>

                            <div class="col-md-6">
                                <label>Tracking</label>
                                <input type="text" name="tracking_link" class="form-control" style="border: 1px solid #ccc;"
                                    onfocus="this.style.borderColor='skyblue'" onblur="this.style.borderColor='#ccc'"
                                    placeholder="Tracking Link">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary w-100">
                                    Update
                                </button>
                            </div>

                        </div>
                    </form> --}}


                </div>
            </div>
        </div>




        {{-- ================= FOOTER ================= --}}
        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
            <p class="mb-0">2026 © {{ $site->site_name ?? ' '}}. All Rights Reserved</p>
            <p>Designed & Developed by <span class="text-primary">{{ $site->site_name ?? ' '}}</span></p>
        </div>

    </div>
@endsection