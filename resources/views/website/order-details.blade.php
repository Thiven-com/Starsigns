@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
           ORDER DETAILS PAGE
        ========================================================== */

        .od-page {
            background: #fafafa;
            min-height: 100vh;
            padding: 45px 0 80px;
            font-family: inherit;
            color: #222;
        }

        .od-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* =========================================================
           BREADCRUMB
        ========================================================== */

        .od-breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 25px;
            font-size: 14px;
            color: #888;
        }

        .od-breadcrumb a {
            color: #777;
            text-decoration: none;
            transition: .2s;
        }

        .od-breadcrumb a:hover {
            color: #9b742d;
        }

        .od-breadcrumb i {
            font-size: 10px;
            color: #aaa;
        }

        .od-breadcrumb-current {
            color: #9b742d;
        }


        /* =========================================================
           HEADER
        ========================================================== */

        .od-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .od-header-left {
            min-width: 0;
        }

        .od-title {
            margin: 0 0 8px;
            font-size: 34px;
            line-height: 1.2;
            font-weight: 600;
            color: #222;
        }

        .od-subtitle {
            margin: 0;
            font-size: 15px;
            color: #888;
        }

        .od-back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 18px;
            border: 1px solid #ddd5c7;
            border-radius: 10px;
            background: #fff;
            color: #555;
            text-decoration: none;
            white-space: nowrap;
            transition: all .25s ease;
        }

        .od-back-btn:hover {
            background: #9b742d;
            border-color: #9b742d;
            color: #fff;
        }


        /* =========================================================
           SUMMARY CARD
        ========================================================== */

        .od-summary-card {
            background: #fff;
            border: 1px solid #ece7dd;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 22px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .04);
        }

        .od-summary-grid {
            display: grid;
            grid-template-columns:
                repeat(4, 1fr);
            gap: 20px;
        }

        .od-summary-item {
            min-width: 0;
        }

        .od-summary-label {
            display: block;
            margin-bottom: 7px;
            font-size: 12px;
            color: #999;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .od-summary-value {
            display: block;
            font-size: 15px;
            font-weight: 600;
            color: #292929;
            word-break: break-word;
        }


        /* =========================================================
           STATUS
        ========================================================== */

        .od-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        .od-status-placed,
        .od-status-pending,
        .od-status-processing,
        .od-status-confirmed {
            color: #9a6d13;
            background: #fff5dc;
        }

        .od-status-shipped {
            color: #2967a5;
            background: #eaf4ff;
        }

        .od-status-delivered {
            color: #287c45;
            background: #eaf8ef;
        }

        .od-status-cancelled,
        .od-status-returned {
            color: #bd4040;
            background: #fff0f0;
        }


        /* =========================================================
           MAIN GRID
        ========================================================== */

        .od-main-grid {
            display: grid;
            grid-template-columns:
                minmax(0, 1fr) 360px;
            gap: 22px;
            align-items: start;
        }


        /* =========================================================
           CARD
        ========================================================== */

        .od-card {
            background: #fff;
            border: 1px solid #ece7dd;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0, 0, 0, .04);
        }

        .od-card-header {
            padding: 21px 24px;
            border-bottom: 1px solid #eee;
        }

        .od-card-title {
            margin: 0;
            font-size: 19px;
            font-weight: 600;
            color: #262626;
        }

        .od-card-body {
            padding: 0;
        }


        /* =========================================================
           ORDER ITEM
        ========================================================== */

        .od-item {
            display: grid;
            grid-template-columns: 65px minmax(0, 1fr) auto;
            align-items: center;
            gap: 17px;
            padding: 22px 24px;
            border-bottom: 1px solid #eee;
        }

        .od-item:last-child {
            border-bottom: 0;
        }

        .od-item-icon {
            width: 58px;
            height: 58px;
            border-radius: 15px;
            background: #f7f0e4;
            color: #9b742d;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .od-item-icon i {
            font-size: 21px;
        }

        .od-item-content {
            min-width: 0;
        }

        .od-product-name {
            margin: 0 0 7px;
            font-size: 16px;
            line-height: 1.4;
            font-weight: 600;
            color: #242424;
        }

        .od-product-sku {
            display: block;
            margin-bottom: 8px;
            color: #999;
            font-size: 12px;
        }

        .od-product-price {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 7px;
            color: #777;
            font-size: 13px;
        }

        .od-product-price strong {
            color: #333;
            font-weight: 600;
        }

        .od-item-total {
            text-align: right;
            white-space: nowrap;
        }

        .od-item-total-label {
            display: block;
            margin-bottom: 4px;
            font-size: 11px;
            color: #999;
        }

        .od-item-total-price {
            font-size: 16px;
            font-weight: 700;
            color: #222;
        }


        /* =========================================================
           PRICE SUMMARY
        ========================================================== */

        .od-price-card {
            padding: 24px;
        }

        .od-price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 9px 0;
            font-size: 14px;
        }

        .od-price-row span:first-child {
            color: #777;
        }

        .od-price-row span:last-child {
            color: #333;
            font-weight: 500;
        }

        .od-discount {
            color: #268248 !important;
        }

        .od-price-divider {
            border: 0;
            border-top: 1px solid #e9e9e9;
            margin: 13px 0;
        }

        .od-grand-total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding-top: 5px;
        }

        .od-grand-total-label {
            font-size: 17px;
            font-weight: 700;
            color: #222;
        }

        .od-grand-total-value {
            font-size: 21px;
            font-weight: 700;
            color: #9b742d;
        }


        /* =========================================================
           ADDRESS
        ========================================================== */

        .od-address-card {
            margin-top: 22px;
        }

        .od-address {
            padding: 24px;
        }

        .od-address-name {
            margin: 0 0 10px;
            font-size: 16px;
            font-weight: 600;
        }

        .od-address-text {
            margin: 0;
            color: #666;
            line-height: 1.8;
            font-size: 14px;
        }

        .od-address-contact {
            display: flex;
            flex-direction: column;
            gap: 7px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            color: #555;
            font-size: 13px;
        }

        .od-address-contact i {
            width: 18px;
            color: #9b742d;
        }


        /* =========================================================
           PAYMENT
        ========================================================== */

        .od-payment-card {
            margin-top: 22px;
        }

        .od-payment {
            padding: 24px;
        }

        .od-payment-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 10px 0;
            font-size: 14px;
        }

        .od-payment-row span:first-child {
            color: #888;
        }

        .od-payment-row strong {
            color: #333;
            text-align: right;
        }


        /* =========================================================
           INVOICE
        ========================================================== */

        .od-invoice-btn {
            width: 100%;
            margin-top: 18px;
            min-height: 46px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border-radius: 10px;
            background: #9b742d;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .25s;
        }

        .od-invoice-btn:hover {
            background: #78591f;
            color: #fff;
        }


        /* =========================================================
           EMPTY
        ========================================================== */

        .od-empty {
            padding: 50px 20px;
            text-align: center;
            color: #888;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================== */

        @media (max-width: 991px) {

            .od-main-grid {
                grid-template-columns: 1fr;
            }

            .od-summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 767px) {

            .od-page {
                padding: 30px 0 55px;
            }

            .od-container {
                padding: 0 15px;
            }

            .od-header {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .od-title {
                font-size: 27px;
            }

            .od-back-btn {
                justify-content: center;
            }

            .od-summary-card {
                padding: 18px;
                border-radius: 14px;
            }

            .od-summary-grid {
                grid-template-columns: 1fr 1fr;
                gap: 18px 12px;
            }

            .od-main-grid {
                gap: 15px;
            }

            .od-card {
                border-radius: 14px;
            }

            .od-card-header {
                padding: 17px;
            }

            .od-card-title {
                font-size: 17px;
            }

            .od-item {
                grid-template-columns: 52px minmax(0, 1fr);
                gap: 13px;
                padding: 17px;
            }

            .od-item-icon {
                width: 48px;
                height: 48px;
                border-radius: 12px;
            }

            .od-item-icon i {
                font-size: 18px;
            }

            .od-item-total {
                grid-column: 2;
                text-align: left;
                padding-top: 5px;
            }

            .od-item-total-label {
                display: inline;
                margin-right: 5px;
            }

            .od-item-total-price {
                font-size: 15px;
            }

            .od-price-card,
            .od-address,
            .od-payment {
                padding: 18px;
            }

        }


        @media (max-width: 480px) {

            .od-summary-grid {
                grid-template-columns: 1fr;
            }

            .od-breadcrumb {
                font-size: 12px;
            }

            .od-title {
                font-size: 24px;
            }

            .od-subtitle {
                font-size: 13px;
            }

            .od-item {
                grid-template-columns: 46px minmax(0, 1fr);
                gap: 10px;
            }

            .od-item-icon {
                width: 44px;
                height: 44px;
            }

            .od-product-name {
                font-size: 14px;
            }

            .od-product-price {
                font-size: 12px;
            }

        }
    </style>


    <div class="od-page">

        <div class="od-container">

            {{-- Breadcrumb --}}
            <div class="od-breadcrumb">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <i class="fa-solid fa-chevron-right"></i>

                <a href="{{ route('customer.orders') }}">
                    My Orders
                </a>

                <i class="fa-solid fa-chevron-right"></i>

                <span class="od-breadcrumb-current">
                    Order Details
                </span>

            </div>


            {{-- Header --}}
            <div class="od-header">

                <div class="od-header-left">

                    <h1 class="od-title">
                        Order Details
                    </h1>

                    <p class="od-subtitle">
                        Order #{{ $order->invoice_id ?: $order->id }}
                    </p>

                </div>


                <a href="{{ route('customer.orders') }}" class="od-back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                    My Orders
                </a>

            </div>


            {{-- Order Summary --}}
            <div class="od-summary-card">

                <div class="od-summary-grid">

                    <div class="od-summary-item">

                        <span class="od-summary-label">
                            Order ID
                        </span>

                        <span class="od-summary-value">
                            #{{ $order->invoice_id ?: $order->id }}
                        </span>

                    </div>


                    <div class="od-summary-item">

                        <span class="od-summary-label">
                            Order Date
                        </span>

                        <span class="od-summary-value">

                            {{ $order->created_at
        ? $order->created_at->format('d M Y, h:i A')
        : '-' }}

                        </span>

                    </div>


                    <div class="od-summary-item">

                        <span class="od-summary-label">
                            Payment Method
                        </span>

                        <span class="od-summary-value">

                            {{ ucwords(
        str_replace(
            '_',
            ' ',
            $order->payment_method ?? 'Pending'
        )
    ) }}

                        </span>

                    </div>


                    <div class="od-summary-item">

                        <span class="od-summary-label">
                            Order Status
                        </span>

                        @php

                            $status =
                                strtolower(
                                    $order->status ?? 'pending'
                                );

                            $statusClass =
                                match ($status) {

                                    'delivered'
                                    => 'od-status-delivered',

                                    'shipped'
                                    => 'od-status-shipped',

                                    'cancelled'
                                    => 'od-status-cancelled',

                                    'returned'
                                    => 'od-status-returned',

                                    'placed'
                                    => 'od-status-placed',

                                    'confirmed'
                                    => 'od-status-confirmed',

                                    'processing'
                                    => 'od-status-processing',

                                    default
                                    => 'od-status-pending',

                                };

                            $statusIcon =
                                match ($status) {

                                    'delivered'
                                    => 'fa-circle-check',

                                    'shipped'
                                    => 'fa-truck',

                                    'cancelled'
                                    => 'fa-circle-xmark',

                                    'returned'
                                    => 'fa-rotate-left',

                                    default
                                    => 'fa-clock',

                                };

                        @endphp

                        <span class="od-status {{ $statusClass }}">

                            <i class="fa-solid {{ $statusIcon }}"></i>

                            {{ ucfirst($status) }}

                        </span>

                    </div>

                </div>

            </div>


            {{-- Main Content --}}
            <div class="od-main-grid">


                {{-- LEFT --}}
                <div>


                    {{-- Items --}}
                    <div class="od-card">

                        <div class="od-card-header">

                            <h2 class="od-card-title">
                                Order Items
                            </h2>

                        </div>


                        <div class="od-card-body">

                            @forelse($order->items as $item)

                                                    <div class="od-item">

                                                        {{-- No product image --}}
                                                        <div class="od-item-icon">

                                                            <i class="fa-solid fa-bag-shopping"></i>

                                                        </div>


                                                        <div class="od-item-content">

                                                            <h3 class="od-product-name">

                                                                {{ $item->product_title }}

                                                            </h3>


                                                            @if($item->sku)

                                                                <span class="od-product-sku">

                                                                    SKU:
                                                                    {{ $item->sku }}

                                                                </span>

                                                            @endif


                                                            <div class="od-product-price">

                                                                <span>
                                                                    Qty:
                                                                </span>

                                                                <strong>
                                                                    {{ $item->quantity }}
                                                                </strong>

                                                                <span>
                                                                    ×
                                                                </span>

                                                                <strong>
                                                                    ₹{{ number_format(
                                    $item->unit_price,
                                    2
                                ) }}
                                                                </strong>

                                                            </div>

                                                        </div>


                                                        <div class="od-item-total">

                                                            <span class="od-item-total-label">
                                                                Total
                                                            </span>

                                                            <span class="od-item-total-price">

                                                                ₹{{ number_format(
                                    $item->subtotal,
                                    2
                                ) }}

                                                            </span>

                                                        </div>

                                                    </div>

                            @empty

                                <div class="od-empty">
                                    No items found for this order.
                                </div>

                            @endforelse

                        </div>

                    </div>


                    {{-- Delivery Address --}}
                    <div class="od-card od-address-card">

                        <div class="od-card-header">

                            <h2 class="od-card-title">
                                <i class="fa-solid fa-location-dot" style="color:#9b742d;margin-right:7px;"></i>

                                Delivery Address
                            </h2>

                        </div>


                        @php
                            $address = json_decode($order->shipping_address, true) ?? [];
                        @endphp


                        <div class="od-address">

                            @if(is_array($address))

                                <h3 class="od-address-name">

                                    {{ $address['name'] ?? '-' }}

                                </h3>


                                <p class="od-address-text">

                                    {{ $address['address'] ?? '' }}

                                    @if(!empty($address['address_2']))

                                        , {{ $address['address_2'] }}

                                    @endif

                                    @if(!empty($address['landmark']))

                                        <br>
                                        {{ $address['landmark'] }}

                                    @endif

                                    <br>

                                    {{ $address['city'] ?? '' }},

                                    {{ $address['state'] ?? '' }}

                                    -

                                    {{ $address['pincode'] ?? '' }}

                                </p>


                                <div class="od-address-contact">

                                    @if(!empty($address['mobile']))

                                        <div>

                                            <i class="fa-solid fa-phone"></i>

                                            {{ $address['mobile'] }}

                                        </div>

                                    @endif


                                    @if(!empty($address['email']))

                                        <div>

                                            <i class="fa-solid fa-envelope"></i>

                                            {{ $address['email'] }}

                                        </div>

                                    @endif

                                </div>

                            @else

                                <div class="od-empty">
                                    Address information unavailable.
                                </div>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- RIGHT --}}
                <div>


                    {{-- Order Summary --}}
                    <div class="od-card">

                        <div class="od-card-header">

                            <h2 class="od-card-title">
                                Order Summary
                            </h2>

                        </div>


                        <div class="od-price-card">

                            <div class="od-price-row">

                                <span>
                                    Subtotal
                                </span>

                                <span>
                                    ₹{{ number_format(
        $order->subtotal ?? 0,
        2
    ) }}
                                </span>

                            </div>


                            <div class="od-price-row">

                                <span>
                                    Discount
                                </span>

                                <span class="od-discount">

                                    - ₹{{ number_format(
        $order->discount_total ?? 0,
        2
    ) }}

                                </span>

                            </div>


                            <div class="od-price-row">

                                <span>
                                    Delivery
                                </span>

                                <span>
                                    ₹{{ number_format(
        $order->delivery_total ?? 0,
        2
    ) }}
                                </span>

                            </div>


                            @if(!empty($order->tax_total))

                                                    <div class="od-price-row">

                                                        <span>
                                                            Tax
                                                        </span>

                                                        <span>
                                                            ₹{{ number_format(
                                    $order->tax_total,
                                    2
                                ) }}
                                                        </span>

                                                    </div>

                            @endif


                            <hr class="od-price-divider">


                            <div class="od-grand-total">

                                <span class="od-grand-total-label">
                                    Grand Total
                                </span>

                                <span class="od-grand-total-value">

                                    ₹{{ number_format(
        $order->grand_total ?? 0,
        2
    ) }}

                                </span>

                            </div>


                            @if($status === 'delivered')

                                                    <a href="{{ route(
                                    'customer.invoice',
                                    $order->id
                                ) }}" class="od-invoice-btn">

                                                        <i class="fa-solid fa-download"></i>

                                                        Download Invoice

                                                    </a>

                            @endif

                        </div>

                    </div>


                    {{-- Payment --}}
                    <div class="od-card od-payment-card">

                        <div class="od-card-header">

                            <h2 class="od-card-title">
                                Payment Information
                            </h2>

                        </div>


                        <div class="od-payment">

                            <div class="od-payment-row">

                                <span>
                                    Payment Method
                                </span>

                                <strong>

                                    {{ ucwords(
        str_replace(
            '_',
            ' ',
            $order->payment_method
            ?? 'Pending'
        )
    ) }}

                                </strong>

                            </div>


                            <div class="od-payment-row">

                                <span>
                                    Payment Status
                                </span>

                                <strong>

                                    {{ ucfirst(
        $order->payment_status
        ?? 'pending'
    ) }}

                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- Tracking --}}
                    @if(
                            $order->awb ||
                            $order->carrier ||
                            $order->shipment_status
                        )

                        <div class="od-card od-payment-card">

                            <div class="od-card-header">

                                <h2 class="od-card-title">

                                    <i class="fa-solid fa-truck" style="color:#9b742d;margin-right:7px;"></i>

                                    Shipment Details

                                </h2>

                            </div>


                            <div class="od-payment">

                                @if($order->carrier)

                                    <div class="od-payment-row">

                                        <span>
                                            Carrier
                                        </span>

                                        <strong>
                                            {{ $order->carrier }}
                                        </strong>

                                    </div>

                                @endif


                                @if($order->awb)

                                    <div class="od-payment-row">

                                        <span>
                                            AWB
                                        </span>

                                        <strong>
                                            {{ $order->awb }}
                                        </strong>

                                    </div>

                                @endif


                                @if($order->shipment_status)

                                                    <div class="od-payment-row">

                                                        <span>
                                                            Shipment Status
                                                        </span>

                                                        <strong>
                                                            {{ ucfirst(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $order->shipment_status
                                        )
                                    ) }}
                                                        </strong>

                                                    </div>

                                @endif


                                @if($order->awb)

                                    <a href="{{ route('track.order') }}" class="od-invoice-btn">

                                        <i class="fa-solid fa-location-dot"></i>

                                        Track Order

                                    </a>

                                @endif

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

@endsection