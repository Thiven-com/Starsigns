@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
       CART PAGE
    ========================================================= */

        .cart-page-section {
            width: 100%;
            padding: 45px 0 80px;
            background: #fff;
            overflow-x: hidden;
        }

        .cart-page-section *,
        .cart-page-section *::before,
        .cart-page-section *::after {
            box-sizing: border-box;
        }


        /* =========================================================
       BANNER
    ========================================================= */

        .cart-banner-section {
            position: relative;
            width: 100%;
            min-height: 260px;

            display: flex;
            align-items: center;

            background: url("../website/images/shopbann.png") center center/cover no-repeat;
        }

        .cart-banner-content {
            text-align: center;
            color: #fff;
        }

        .cart-banner-content h1 {
            margin: 0 0 12px;
            font-size: 42px;
            font-weight: 600;
        }

        .cart-breadcrumb {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;

            font-size: 14px;
        }

        .cart-breadcrumb a {
            color: #fff;
            text-decoration: none;
        }

        .cart-breadcrumb .cart-active {
            opacity: .8;
        }


        /* =========================================================
       CONTAINER
    ========================================================= */

        .cart-page-section .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }


        /* =========================================================
       BREADCRUMB
    ========================================================= */

        .cart-page-crumb {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 25px;

            color: #777;
            font-size: 13px;
        }

        .cart-page-crumb a {
            color: #222;
            text-decoration: none;
        }

        .cart-page-crumb-active {
            color: #999;
        }


        /* =========================================================
       TITLE
    ========================================================= */

        .cart-page-title-wrap {
            display: flex;
            align-items: center;
            gap: 15px;

            margin-bottom: 30px;
        }

        .cart-page-title {
            margin: 0;

            color: #222;

            font-size: 28px;
            font-weight: 600;
        }

        .cart-page-title span {
            color: #888;
            font-size: 14px;
            font-weight: 400;
        }

        .cart-page-title-divider {
            color: #c89b3c;
            font-size: 18px;
        }


        /* =========================================================
       MAIN LAYOUT
    ========================================================= */

        .cart-page-layout {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr) minmax(340px, 390px);

            gap: 25px;

            width: 100%;
        }


        /* =========================================================
       CART TABLE
    ========================================================= */

        .cart-page-table-wrap {
            width: 100%;
            min-width: 0;

            border: 1px solid #e5e5e5;
            border-radius: 12px;

            overflow: hidden;

            background: #fff;
        }

        .cart-page-table-head {
            display: grid;

            grid-template-columns:
                minmax(220px, 1.7fr) minmax(90px, .7fr) minmax(120px, .8fr) minmax(100px, .7fr) minmax(80px, .5fr);

            gap: 10px;

            padding: 15px 20px;

            background: #fafafa;

            border-bottom: 1px solid #eee;

            color: #777;

            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .cart-page-row {
            display: grid;

            grid-template-columns:
                minmax(220px, 1.7fr) minmax(90px, .7fr) minmax(120px, .8fr) minmax(100px, .7fr) minmax(80px, .5fr);

            align-items: center;

            gap: 10px;

            width: 100%;

            padding: 18px 20px;

            border-bottom: 1px solid #eee;

            transition:
                opacity .2s ease,
                transform .2s ease;
        }

        .cart-page-row:last-child {
            border-bottom: none;
        }


        /* =========================================================
       PRODUCT
    ========================================================= */

        .cart-page-row .col-product {
            display: flex;
            align-items: center;
            gap: 13px;

            min-width: 0;
        }

        .cart-page-thumb {
            width: 75px;
            height: 75px;
            min-width: 75px;

            overflow: hidden;

            border-radius: 8px;

            background: #f5f5f5;
        }

        .cart-page-thumb img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .cart-page-pinfo {
            min-width: 0;
        }

        .cart-page-pinfo h4 {
            margin: 0 0 7px;

            color: #222;

            font-size: 14px;
            font-weight: 500;
            line-height: 1.4;

            word-break: break-word;
        }

        .cart-page-stock {
            display: block;

            margin-bottom: 4px;

            color: #198754;

            font-size: 11px;
        }

        .cart-page-stock i {
            font-size: 6px;
            vertical-align: middle;
        }

        .cart-page-meta {
            display: block;

            color: #999;

            font-size: 10px;
        }


        /* =========================================================
       PRICE
    ========================================================= */

        .cart-page-price-now {
            display: block;

            color: #222;

            font-size: 14px;
            font-weight: 600;
        }

        .cart-page-price-old {
            display: block;

            margin-top: 3px;

            color: #999;

            font-size: 11px;

            text-decoration: line-through;
        }


        /* =========================================================
       QUANTITY
    ========================================================= */

        .cart-page-qty-box {
            display: flex;
            align-items: center;

            width: fit-content;

            border: 1px solid #ddd;
            border-radius: 7px;

            overflow: hidden;
        }

        .cart-page-qty-box button {
            width: 30px;
            height: 32px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: none;

            background: #fff;
            color: #333;

            cursor: pointer;
        }

        .cart-page-qty-box button:hover {
            background: #f5f5f5;
        }

        .cart-page-qty-val {
            width: 38px !important;
            min-width: 38px !important;
            max-width: 38px !important;

            height: 32px !important;

            padding: 0 !important;

            border: none !important;

            border-left: 1px solid #eee !important;
            border-right: 1px solid #eee !important;

            background: #fff;

            color: #222;

            text-align: center;

            outline: none;
        }


        /* =========================================================
       SUBTOTAL
    ========================================================= */

        .cart-page-subtotal-val {
            display: block;

            color: #222;

            font-size: 14px;
        }

        .cart-page-row-off {
            display: inline-block;

            margin-top: 5px;
            padding: 3px 6px;

            border-radius: 4px;

            background: #eefaf2;
            color: #198754;

            font-size: 9px;
            font-weight: 600;
        }


        /* =========================================================
       ACTIONS
    ========================================================= */

        .cart-page-row .col-action {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .cart-page-action-btn {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 0;

            border: 1px solid #ddd;
            border-radius: 7px;

            background: #fff;
            color: #555;

            cursor: pointer;

            transition: .2s ease;
        }

        .cart-page-action-btn:hover {
            border-color: #222;
            background: #222;
            color: #fff;
        }

        .cart-page-remove:hover {
            border-color: #dc3545;
            background: #dc3545;
        }


        /* =========================================================
       TABLE ACTIONS
    ========================================================= */

        .cart-page-table-actions {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 18px 20px;

            border-top: 1px solid #eee;
        }

        .cart-page-btn-outline {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-height: 40px;

            padding: 9px 14px;

            border: 1px solid #222;
            border-radius: 7px;

            background: #fff;
            color: #222;

            font-size: 12px;
            text-decoration: none;

            cursor: pointer;
        }

        .cart-page-btn-outline:hover {
            background: #222;
            color: #fff;
        }

        .cart-page-btn-purple {
            border-color: #c89b3c;
        }

        .cart-page-btn-purple:hover {
            background: #c89b3c;
        }


        /* =========================================================
       EMPTY CART
    ========================================================= */

        .cart-page-empty {
            min-height: 250px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            padding: 30px;

            color: #777;

            text-align: center;
        }

        .cart-page-empty i {
            margin-bottom: 15px;

            color: #c89b3c;

            font-size: 42px;
        }

        .cart-page-empty p {
            margin: 0 0 15px;

            font-size: 16px;
        }


        /* =========================================================
       SUMMARY
    ========================================================= */

        .cart-page-summary {
            position: sticky;
            top: 20px;

            width: 100%;

            padding: 22px;

            border: 1px solid #e5e5e5;
            border-radius: 12px;

            background: #fff;
        }

        .cart-page-summary h3 {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin: 0 0 20px;

            color: #222;

            font-size: 20px;
        }

        .cart-page-summary-divider {
            color: #c89b3c;
            font-size: 14px;
        }

        .cart-page-summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 9px 0;

            color: #666;

            font-size: 13px;
        }

        .cart-page-summary-row>span:last-child {
            white-space: nowrap;
            color: #222;
            font-weight: 500;
        }

        .cart-page-discount {
            color: #198754 !important;
        }

        .cart-page-free {
            color: #198754 !important;
        }

        .cart-page-summary-total {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-top: 10px;
            padding-top: 17px;

            border-top: 1px solid #ddd;
        }

        .cart-page-summary-total>span {
            color: #222;
            font-size: 17px;
            font-weight: 600;
        }

        .cart-page-total-right {
            text-align: right;
        }

        .cart-page-total-right strong {
            display: block;

            color: #222;

            font-size: 20px;
        }

        .cart-page-saved {
            display: block;

            margin-top: 5px;

            color: #198754;

            font-size: 10px;
        }


        /* =========================================================
       COUPON
    ========================================================= */

        .cart-page-coupon-label {
            display: flex;
            align-items: center;
            gap: 7px;

            margin-top: 22px;
            margin-bottom: 8px;

            color: #444;

            font-size: 12px;
            font-weight: 500;
        }

        .cart-page-coupon-row {
            display: grid;

            grid-template-columns: minmax(0, 1fr) auto;

            gap: 8px;

            width: 100%;
        }

        .cart-page-coupon-row input {
            width: 100% !important;
            min-width: 0 !important;

            padding: 11px 12px;

            border: 1px solid #ddd;
            border-radius: 7px;

            outline: none;

            font-family: inherit;
            font-size: 12px;
        }

        .cart-page-coupon-row button {
            padding: 0 16px;

            border: none;
            border-radius: 7px;

            background: #222;
            color: #fff;

            font-size: 12px;

            cursor: pointer;
        }

        .cart-page-coupon-msg {
            min-height: 18px;

            margin-top: 6px;

            font-size: 11px;
        }

        .cart-page-coupon-msg.success {
            color: #198754;
        }

        .cart-page-coupon-msg.error {
            color: #dc3545;
        }


        /* =========================================================
       CHECKOUT BUTTON
    ========================================================= */

        .cart-page-checkout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            width: 100%;
            min-height: 48px;

            margin-top: 15px;

            border: none;
            border-radius: 8px;

            background: #222;
            color: #fff;

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;
        }

        .cart-page-checkout-btn:hover {
            background: #c89b3c;
        }

        .cart-page-secure-btn {
            width: 100%;

            margin-top: 8px;
            padding: 9px;

            border: 1px solid #ddd;
            border-radius: 7px;

            background: #fff;
            color: #666;

            font-size: 11px;
        }


        /* =========================================================
       PERKS
    ========================================================= */

        .cart-page-perks {
            display: flex;
            flex-direction: column;
            gap: 12px;

            margin-top: 20px;
            padding-top: 18px;

            border-top: 1px solid #eee;
        }

        .cart-page-perk {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-page-perk>span {
            width: 34px;
            height: 34px;
            min-width: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: #faf5e9;
            color: #c89b3c;

            font-size: 13px;
        }

        .cart-page-perk .t {
            color: #333;
            font-size: 12px;
            font-weight: 600;
        }

        .cart-page-perk .s {
            margin-top: 2px;
            color: #999;
            font-size: 10px;
        }


        /* =========================================================
       TABLET
    ========================================================= */

        @media (max-width: 1100px) {

            .cart-page-layout {
                grid-template-columns:
                    minmax(0, 1fr) 330px;

                gap: 18px;
            }

            .cart-page-table-head,
            .cart-page-row {
                grid-template-columns:
                    minmax(180px, 1.5fr) 75px 105px 90px 70px;

                padding-left: 14px;
                padding-right: 14px;
            }

            .cart-page-thumb {
                width: 60px;
                height: 60px;
                min-width: 60px;
            }

        }


        /* =========================================================
       BELOW 991
    ========================================================= */

        @media (max-width: 991px) {

            .cart-page-layout {
                grid-template-columns: 1fr;
            }

            .cart-page-summary {
                position: static;
            }

        }


        /* =========================================================
       MOBILE
    ========================================================= */

        @media (max-width: 767px) {

            .cart-banner-section {
                min-height: 200px;
            }

            .cart-banner-content h1 {
                font-size: 30px;
            }

            .cart-page-section {
                padding: 25px 0 60px;
            }

            .cart-page-section .container {
                padding: 0 12px;
            }

            .cart-page-title {
                font-size: 22px;
            }

            .cart-page-title-wrap {
                margin-bottom: 20px;
            }


            /* Hide desktop header */

            .cart-page-table-head {
                display: none;
            }


            /* Card style rows */

            .cart-page-row {
                display: grid;

                grid-template-columns:
                    65px minmax(0, 1fr);

                gap: 12px;

                padding: 15px;

                position: relative;
            }

            .cart-page-row .col-product {
                grid-column: 1 / -1;

                padding-right: 45px;
            }

            .cart-page-row .col-price {
                grid-column: 1 / 2;
            }

            .cart-page-row .col-qty {
                grid-column: 2 / 3;
            }

            .cart-page-row .col-subtotal {
                grid-column: 1 / 2;
            }

            .cart-page-row .col-action {
                position: absolute;

                top: 15px;
                right: 15px;
            }


            .cart-page-thumb {
                width: 65px;
                height: 65px;
                min-width: 65px;
            }


            .cart-page-table-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .cart-page-table-actions .cart-page-btn-outline {
                width: 100%;
            }


            .cart-page-summary {
                padding: 17px;
            }

        }


        /* =========================================================
       SMALL MOBILE
    ========================================================= */

        @media (max-width: 420px) {

            .cart-page-section .container {
                padding: 0 10px;
            }

            .cart-page-row {
                padding: 12px;
            }

            .cart-page-row .col-action {
                top: 12px;
                right: 12px;
            }

            .cart-page-action-btn {
                width: 31px;
                height: 31px;
            }

            .cart-page-thumb {
                width: 58px;
                height: 58px;
                min-width: 58px;
            }

            .cart-page-pinfo h4 {
                font-size: 13px;
            }

            .cart-page-summary-total>span {
                font-size: 15px;
            }

            .cart-page-total-right strong {
                font-size: 18px;
            }

        }
    </style>


    <!-- =========================================================
         PAGE BANNER
    ========================================================= -->

    <section class="cart-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="cart-banner-content">

                <h1 data-aos="fade-up" data-aos-delay="200">
                    Cart
                </h1>

                <div class="cart-breadcrumb" data-aos="fade-up" data-aos-delay="400">

                    <a href="/">
                        Home
                    </a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="cart-active">
                        Cart
                    </span>

                </div>

            </div>

        </div>

    </section>


    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            easing: "ease-in-out-cubic",
            once: true,
            offset: 80
        });
    </script>


    <!-- =========================================================
         CART CONTENT
    ========================================================= -->

    <section class="cart-page-section">

        <div class="container">


            <!-- In-page breadcrumb -->

            <div class="cart-page-crumb">

                <a href="/">
                    Home
                </a>

                <span class="cart-page-crumb-sep">
                    /
                </span>

                <span class="cart-page-crumb-active">
                    Cart
                </span>

            </div>


            <!-- Title -->

            <div class="cart-page-title-wrap">

                <h2 class="cart-page-title">

                    Your Cart

                    <span id="cartPageItemCount">

                        ({{ $cartItems->sum('quantity') }} Items)

                    </span>

                </h2>

                <span class="cart-page-title-divider">
                    ✦
                </span>

            </div>


            <!-- Main -->

            <div class="cart-page-layout">


                <!-- =====================================================
                     CART TABLE
                ====================================================== -->

                <div class="cart-page-table-wrap">


                    <div class="cart-page-table-head">

                        <span class="col-product">
                            Product
                        </span>

                        <span class="col-price">
                            Price
                        </span>

                        <span class="col-qty">
                            Quantity
                        </span>

                        <span class="col-subtotal">
                            Subtotal
                        </span>

                        <span class="col-action">
                            Action
                        </span>

                    </div>


                    <div id="cartPageItems">

                        @forelse($cartItems as $item)

                                            @php

                                                $variant =
                                                    $item->variant;

                                                $product =
                                                    $variant?->product;

                                                $price =
                                                    (float) $item->unit_price;

                                                $oldPrice =
                                                    (float) (
                                                        $variant?->actual_price
                                                        ?? $variant?->seller_price
                                                        ?? $price
                                                    );

                                                $quantity =
                                                    (int) $item->quantity;

                                                $discountAmount =
                                                    max(
                                                        0,
                                                        $oldPrice - $price
                                                    );

                                                $discountPercent =
                                                    $oldPrice > 0
                                                    ? round(
                                                        (
                                                            $discountAmount /
                                                            $oldPrice
                                                        ) * 100
                                                    )
                                                    : 0;

                                            @endphp


                                            <div class="cart-page-row" data-id="{{ $item->id }}" data-price="{{ $price }}">


                                                <!-- Product -->

                                                <div class="col-product">

                                                    <div class="cart-page-thumb">

                                                        @if($variant?->image)

                                                            <img src="{{ asset($variant->image) }}" alt="{{ $product?->title ?? 'Product' }}">

                                                        @else

                                                            <img src="{{ asset('website/images/no-image.png') }}" alt="No Image">

                                                        @endif

                                                    </div>


                                                    <div class="cart-page-pinfo">

                                                        <h4>
                                                            {{ $product?->title ?? 'Product' }}
                                                        </h4>


                                                        <span class="cart-page-stock">

                                                            <i class="fa-solid fa-circle"></i>

                                                            In Stock

                                                        </span>


                                                        @if($variant?->sku)

                                                            <span class="cart-page-meta">

                                                                SKU:
                                                                {{ $variant->sku }}

                                                            </span>

                                                        @endif

                                                    </div>

                                                </div>


                                                <!-- Price -->

                                                <div class="col-price">

                                                    <span class="cart-page-price-now">

                                                        ₹{{ number_format($price) }}

                                                    </span>


                                                    @if($oldPrice > $price)

                                                        <span class="cart-page-price-old">

                                                            ₹{{ number_format($oldPrice) }}

                                                        </span>

                                                    @endif

                                                </div>


                                                <!-- Quantity -->

                                                <div class="col-qty">

                                                    <div class="cart-page-qty-box">

                                                        <button type="button" class="cart-page-qty-dec" aria-label="Decrease quantity">

                                                            <i class="fa-solid fa-minus"></i>

                                                        </button>


                                                        <input type="text" class="cart-page-qty-val" value="{{ $quantity }}" readonly>


                                                        <button type="button" class="cart-page-qty-inc" aria-label="Increase quantity">

                                                            <i class="fa-solid fa-plus"></i>

                                                        </button>

                                                    </div>

                                                </div>


                                                <!-- Subtotal -->

                                                <div class="col-subtotal">

                                                    <strong class="cart-page-subtotal-val">

                                                        ₹{{ number_format(
                                $price * $quantity
                            ) }}

                                                    </strong>


                                                    @if($discountPercent > 0)

                                                        <span class="cart-page-row-off">

                                                            {{ $discountPercent }}% OFF

                                                        </span>

                                                    @endif

                                                </div>


                                                <!-- Actions -->

                                                <div class="col-action">

                                                    <button type="button" class="cart-page-action-btn cart-page-remove" title="Remove item">

                                                        <i class="fa-solid fa-trash"></i>

                                                    </button>


                                                    <button type="button" class="cart-page-action-btn cart-page-save" title="Save for later">

                                                        <i class="fa-regular fa-heart"></i>

                                                    </button>

                                                </div>

                                            </div>

                        @empty

                            <div class="cart-page-empty" id="cartPageEmpty">

                                <i class="fa-solid fa-basket-shopping"></i>

                                <p>
                                    Your cart is empty
                                </p>

                                <a href="{{ route('shop') }}" class="cart-page-btn-outline">

                                    Continue Shopping

                                </a>

                            </div>

                        @endforelse

                    </div>


                    <!-- Table actions -->

                    <div class="cart-page-table-actions">

                        <a href="{{ route('shop') }}" class="cart-page-btn-outline">

                            <i class="fa-solid fa-arrow-left"></i>

                            Continue Shopping

                        </a>


                        <button type="button" class="cart-page-btn-outline cart-page-btn-purple" id="cartPageUpdateBtn">

                            <i class="fa-solid fa-rotate"></i>

                            Update Cart

                        </button>

                    </div>

                </div>


                <!-- =====================================================
                     ORDER SUMMARY
                ====================================================== -->

                <aside class="cart-page-summary">

                    <h3>

                        Order Summary

                        <span class="cart-page-summary-divider">
                            ✦
                        </span>

                    </h3>


                    <!-- Subtotal -->

                    <div class="cart-page-summary-row">

                        <span>

                            Subtotal

                            (
                            <span id="cartPageSummaryCount">
                                {{ $cartItems->sum('quantity') }}
                            </span>
                            Items
                            )

                        </span>


                        <span id="cartPageSubtotal">

                            ₹{{ number_format(
        $cartItems->sum(
            function ($item) {

                return
                    (float) $item->unit_price *
                    (int) $item->quantity;

            }
        )
    ) }}

                        </span>

                    </div>


                    <!-- Discount -->

                    <div class="cart-page-summary-row">

                        <span>
                            Discount
                        </span>


                        <span class="cart-page-discount" id="cartPageDiscount">

                            -₹{{ number_format(
        $cartItems->sum(
            function ($item) {

                $variant =
                    $item->variant;

                $price =
                    (float) $item->unit_price;

                $quantity =
                    (int) $item->quantity;

                $oldPrice =
                    (float) (
                        $variant?->actual_price
                        ?? $variant?->seller_price
                        ?? $price
                    );

                return max(
                    0,
                    $oldPrice - $price
                ) * $quantity;

            }
        )
    ) }}

                        </span>

                    </div>


                    <!-- Shipping -->

                    <div class="cart-page-summary-row">

                        <span>

                            Shipping

                            <i class="fa-regular fa-circle-question" title="Free shipping on all orders"></i>

                        </span>


                        <span class="cart-page-free">
                            FREE
                        </span>

                    </div>


                    <!-- Total -->

                    <div class="cart-page-summary-total">

                        <span>
                            Total
                        </span>


                        <div class="cart-page-total-right">

                            <strong id="cartPageTotal">

                                ₹{{ number_format(
        $cartItems->sum(
            function ($item) {

                return
                    (float) $item->unit_price *
                    (int) $item->quantity;

            }
        )
    ) }}

                            </strong>


                            <span class="cart-page-saved">

                                <i class="fa-solid fa-thumbs-up"></i>

                                You saved

                                <span id="cartPageSavedAmt">

                                    ₹{{ number_format(
        $cartItems->sum(
            function ($item) {

                $variant =
                    $item->variant;

                $price =
                    (float) $item->unit_price;

                $quantity =
                    (int) $item->quantity;

                $oldPrice =
                    (float) (
                        $variant?->actual_price
                        ?? $variant?->seller_price
                        ?? $price
                    );

                return max(
                    0,
                    $oldPrice - $price
                ) * $quantity;

            }
        )
    ) }}

                                </span>

                                on this order

                            </span>

                        </div>

                    </div>


                    <!-- Coupon -->

                    {{-- <div class="cart-page-coupon-label">

                        <i class="fa-solid fa-ticket"></i>

                        Have a coupon code?

                    </div>


                    <div class="cart-page-coupon-row">

                        <input type="text" id="cartPageCouponInput" placeholder="Enter coupon code">


                        <button type="button" id="cartPageApplyBtn">

                            Apply

                        </button>

                    </div> --}}


                    <div class="cart-page-coupon-msg" id="cartPageCouponMsg"></div>


                    <!-- Checkout -->

                    <button type="button" class="cart-page-checkout-btn" id="cartPageCheckoutBtn">

                        <i class="fa-solid fa-lock"></i>

                        Proceed to Checkout

                    </button>


                    {{-- <button type="button" class="cart-page-secure-btn">

                        <i class="fa-solid fa-shield-halved"></i>

                        Secure Checkout

                    </button> --}}


                    <!-- Perks -->

                    <div class="cart-page-perks">

                        <div class="cart-page-perk">

                            <span>
                                <i class="fa-solid fa-truck-fast"></i>
                            </span>

                            <div>

                                <div class="t">
                                    Free Shipping
                                </div>

                                <div class="s">
                                    On orders above ₹999
                                </div>

                            </div>

                        </div>


                        <div class="cart-page-perk">

                            <span>
                                <i class="fa-solid fa-lock"></i>
                            </span>

                            <div>

                                <div class="t">
                                    Secure Payment
                                </div>

                                <div class="s">
                                    100% safe & secure
                                </div>

                            </div>

                        </div>


                        <div class="cart-page-perk">

                            <span>
                                <i class="fa-solid fa-headset"></i>
                            </span>

                            <div>

                                <div class="t">
                                    Easy Returns
                                </div>

                                <div class="s">
                                    7 days return policy
                                </div>

                            </div>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>


    <script>
        (function () {

            "use strict";


            /* =========================================================
               ELEMENTS
            ========================================================= */

            const itemsWrap =
                document.getElementById(
                    "cartPageItems"
                );

            const emptyState =
                document.getElementById(
                    "cartPageEmpty"
                );

            const subtotalEl =
                document.getElementById(
                    "cartPageSubtotal"
                );

            const discountEl =
                document.getElementById(
                    "cartPageDiscount"
                );

            const totalEl =
                document.getElementById(
                    "cartPageTotal"
                );

            const savedEl =
                document.getElementById(
                    "cartPageSavedAmt"
                );

            const countEl =
                document.getElementById(
                    "cartPageItemCount"
                );

            const summaryCountEl =
                document.getElementById(
                    "cartPageSummaryCount"
                );


            /* =========================================================
               FORMAT INR
            ========================================================= */

            function formatINR(num) {

                return "₹" +
                    Math.round(num)
                        .toLocaleString("en-IN");

            }


            /* =========================================================
               RECALCULATE
            ========================================================= */

            function recalculate() {

                if (!itemsWrap) {
                    return;
                }


                const rows =
                    itemsWrap.querySelectorAll(
                        ".cart-page-row"
                    );


                let subtotal = 0;

                let itemCount = 0;

                let discount = 0;


                rows.forEach(function (row) {


                    const price =
                        parseFloat(
                            row.dataset.price
                        ) || 0;


                    const qtyInput =
                        row.querySelector(
                            ".cart-page-qty-val"
                        );


                    const qty =
                        parseInt(
                            qtyInput?.value,
                            10
                        ) || 1;


                    const rowSubtotal =
                        price * qty;


                    const rowSubtotalEl =
                        row.querySelector(
                            ".cart-page-subtotal-val"
                        );


                    if (rowSubtotalEl) {

                        rowSubtotalEl.textContent =
                            formatINR(
                                rowSubtotal
                            );

                    }


                    subtotal +=
                        rowSubtotal;


                    itemCount +=
                        qty;


                    /* Discount */

                    const oldPriceElement =
                        row.querySelector(
                            ".cart-page-price-old"
                        );


                    if (oldPriceElement) {

                        const oldPrice =
                            parseFloat(
                                oldPriceElement
                                    .textContent
                                    .replace(
                                        /[₹,]/g,
                                        ""
                                    )
                            ) || price;


                        discount +=
                            Math.max(
                                0,
                                oldPrice - price
                            ) * qty;

                    }

                });


                const total =
                    subtotal;


                if (subtotalEl) {

                    subtotalEl.textContent =
                        formatINR(
                            subtotal
                        );

                }


                if (discountEl) {

                    discountEl.textContent =
                        "-" +
                        formatINR(
                            discount
                        );

                }


                if (totalEl) {

                    totalEl.textContent =
                        formatINR(
                            total
                        );

                }


                if (savedEl) {

                    savedEl.textContent =
                        formatINR(
                            discount
                        );

                }


                if (countEl) {

                    countEl.textContent =
                        "(" +
                        itemCount +
                        " Items)";

                }


                if (summaryCountEl) {

                    summaryCountEl.textContent =
                        itemCount;

                }


                /* Empty cart */

                if (rows.length === 0) {

                    itemsWrap.style.display =
                        "none";


                    if (emptyState) {

                        emptyState.style.display =
                            "flex";

                    }

                } else {

                    itemsWrap.style.display =
                        "block";


                    if (emptyState) {

                        emptyState.style.display =
                            "none";

                    }

                }

            }


            /* =========================================================
               UPDATE CART QUANTITY
            ========================================================= */

            function updateCartQuantity(
                cartItemId,
                quantity
            ) {

                fetch(
                    "{{ route('customer.cart.update') }}",
                    {
                        method: "POST",

                        headers: {

                            "Content-Type":
                                "application/json",

                            "X-CSRF-TOKEN":
                                "{{ csrf_token() }}",

                            "Accept":
                                "application/json",

                            "X-Requested-With":
                                "XMLHttpRequest"

                        },

                        body: JSON.stringify({

                            id:
                                cartItemId,

                            quantity:
                                quantity

                        })

                    }
                )
                    .then(function (response) {

                        return response.json();

                    })
                    .then(function (data) {

                        if (!data.success) {

                            console.error(
                                "Cart update failed",
                                data
                            );

                        }

                    })
                    .catch(function (error) {

                        console.error(
                            "Cart update error:",
                            error
                        );

                    });

            }


            /* =========================================================
               UPDATE HEADER CART COUNT
            ========================================================= */

            function updateHeaderCartCount() {

                fetch(
                    "{{ route('customer.cart.count') }}",
                    {
                        method: "GET",

                        headers: {

                            "Accept":
                                "application/json",

                            "X-Requested-With":
                                "XMLHttpRequest"

                        }

                    }
                )
                    .then(function (response) {

                        return response.json();

                    })
                    .then(function (data) {


                        if (
                            typeof data.count ===
                            "undefined"
                        ) {

                            return;

                        }


                        document
                            .querySelectorAll(
                                "#cartCount, .cart-count, .header-cart-count, [data-cart-count]"
                            )
                            .forEach(function (element) {

                                element.textContent =
                                    data.count;

                            });

                    })
                    .catch(function (error) {

                        console.error(
                            "Cart count update error:",
                            error
                        );

                    });

            }


            /* =========================================================
               CART ITEM ACTIONS
            ========================================================= */

            if (itemsWrap) {

                itemsWrap.addEventListener(
                    "click",
                    function (e) {


                        const row =
                            e.target.closest(
                                ".cart-page-row"
                            );


                        if (!row) {
                            return;
                        }


                        const qtyInput =
                            row.querySelector(
                                ".cart-page-qty-val"
                            );


                        if (!qtyInput) {
                            return;
                        }


                        let qty =
                            parseInt(
                                qtyInput.value,
                                10
                            ) || 1;


                        /* ==============================================
                           PLUS
                        ============================================== */

                        if (
                            e.target.closest(
                                ".cart-page-qty-inc"
                            )
                        ) {

                            qty++;


                            qtyInput.value =
                                qty;


                            recalculate();


                            updateCartQuantity(
                                row.dataset.id,
                                qty
                            );


                            return;

                        }


                        /* ==============================================
                           MINUS
                        ============================================== */

                        if (
                            e.target.closest(
                                ".cart-page-qty-dec"
                            )
                        ) {

                            if (qty > 1) {

                                qty--;


                                qtyInput.value =
                                    qty;


                                recalculate();


                                updateCartQuantity(
                                    row.dataset.id,
                                    qty
                                );

                            }


                            return;

                        }


                        /* ==============================================
                           SAVE FOR LATER
                        ============================================== */

                        if (
                            e.target.closest(
                                ".cart-page-save"
                            )
                        ) {

                            const btn =
                                e.target.closest(
                                    ".cart-page-save"
                                );


                            const icon =
                                btn.querySelector(
                                    "i"
                                );


                            if (icon) {

                                icon.classList.toggle(
                                    "fa-regular"
                                );

                                icon.classList.toggle(
                                    "fa-solid"
                                );

                            }


                            btn.classList.toggle(
                                "active"
                            );


                            return;

                        }


                        /* ==============================================
                           REMOVE FROM CART
                        ============================================== */

                        if (
                            e.target.closest(
                                ".cart-page-remove"
                            )
                        ) {

                            const removeBtn =
                                e.target.closest(
                                    ".cart-page-remove"
                                );


                            const cartItemId =
                                row.dataset.id;


                            if (!cartItemId) {

                                return;

                            }


                            if (removeBtn.disabled) {

                                return;

                            }


                            removeBtn.disabled =
                                true;


                            const originalHtml =
                                removeBtn.innerHTML;


                            removeBtn.innerHTML =
                                '<i class="fa-solid fa-spinner fa-spin"></i>';


                            fetch(
                                "{{ route('customer.cart.remove', ':id') }}"
                                    .replace(
                                        ":id",
                                        cartItemId
                                    ),
                                {

                                    method:
                                        "DELETE",

                                    headers: {

                                        "X-CSRF-TOKEN":
                                            "{{ csrf_token() }}",

                                        "Accept":
                                            "application/json",

                                        "X-Requested-With":
                                            "XMLHttpRequest"

                                    }

                                }
                            )
                                .then(function (response) {

                                    return response
                                        .json()
                                        .catch(
                                            function () {

                                                return {
                                                    success:
                                                        response.ok
                                                };

                                            }
                                        );

                                })
                                .then(function (data) {


                                    if (
                                        data.success ===
                                        true ||
                                        data.status ===
                                        true
                                    ) {


                                        /* Animate */

                                        row.style.opacity =
                                            "0";

                                        row.style.transform =
                                            "translateX(20px)";


                                        setTimeout(
                                            function () {


                                                row.remove();


                                                recalculate();


                                                updateHeaderCartCount();


                                            },
                                            200
                                        );


                                    } else {


                                        removeBtn.disabled =
                                            false;


                                        removeBtn.innerHTML =
                                            originalHtml;


                                        alert(
                                            data.message ||
                                            "Unable to remove item from cart."
                                        );

                                    }

                                })
                                .catch(function (error) {


                                    console.error(
                                        "Remove cart error:",
                                        error
                                    );


                                    removeBtn.disabled =
                                        false;


                                    removeBtn.innerHTML =
                                        originalHtml;


                                    alert(
                                        "Something went wrong while removing the item."
                                    );

                                });


                            return;

                        }

                    }
                );

            }


            /* =========================================================
               UPDATE CART BUTTON
            ========================================================= */

            const updateCartBtn =
                document.getElementById(
                    "cartPageUpdateBtn"
                );


            if (updateCartBtn) {

                updateCartBtn.addEventListener(
                    "click",
                    function () {


                        const btn =
                            this;


                        const original =
                            btn.innerHTML;


                        recalculate();


                        btn.innerHTML =
                            '<i class="fa-solid fa-check"></i> Updated';


                        setTimeout(
                            function () {

                                btn.innerHTML =
                                    original;

                            },
                            1200
                        );

                    }
                );

            }


            /* =========================================================
               COUPON
            ========================================================= */

            const couponButton =
                document.getElementById(
                    "cartPageApplyBtn"
                );


            if (couponButton) {

                couponButton.addEventListener(
                    "click",
                    function () {


                        const input =
                            document.getElementById(
                                "cartPageCouponInput"
                            );


                        const msg =
                            document.getElementById(
                                "cartPageCouponMsg"
                            );


                        const code =
                            input.value
                                .trim()
                                .toUpperCase();


                        if (!code) {

                            msg.textContent =
                                "Please enter a coupon code.";

                            msg.className =
                                "cart-page-coupon-msg error";

                            return;

                        }


                        if (
                            code ===
                            "ASTRO10"
                        ) {

                            msg.textContent =
                                "Coupon applied successfully!";

                            msg.className =
                                "cart-page-coupon-msg success";

                        } else {

                            msg.textContent =
                                "Invalid or expired coupon code.";

                            msg.className =
                                "cart-page-coupon-msg error";

                        }

                    }
                );

            }


            /* =========================================================
               CHECKOUT
            ========================================================= */

            const checkoutButton =
                document.getElementById(
                    "cartPageCheckoutBtn"
                );


            if (checkoutButton) {

                checkoutButton.addEventListener(
                    "click",
                    function () {


                        const rows =
                            itemsWrap
                                ? itemsWrap.querySelectorAll(
                                    ".cart-page-row"
                                )
                                : [];


                        if (rows.length === 0) {

                            alert(
                                "Your cart is empty."
                            );

                            return;

                        }


                        window.location.href =
                            "{{ url('/checkout') }}";

                    }
                );

            }


            /* =========================================================
               INITIAL CALCULATION
            ========================================================= */

            recalculate();

        })();
    </script>

@endsection