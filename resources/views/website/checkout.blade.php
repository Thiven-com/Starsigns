@extends('layouts.website')

@section('content')

    <style>
        /* =========================================================
           GLOBAL CHECKOUT FIX
        ========================================================= */

        .checkout-page,
        .checkout-page *,
        .checkout-page *::before,
        .checkout-page *::after {
            box-sizing: border-box;
        }

        .checkout-page {
            width: 100%;
            background: #fff;
            padding: 40px 0 80px;
            overflow-x: hidden;
        }

        .checkout-container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }


        /* =========================================================
           BREADCRUMB
        ========================================================= */

        .checkout-breadcrumb {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;

            margin-bottom: 30px;

            color: #777;
            font-size: 14px;
        }

        .checkout-breadcrumb a {
            color: #222;
            text-decoration: none;
        }

        .checkout-breadcrumb a:hover {
            color: #c89b3c;
        }

        .checkout-breadcrumb .active {
            color: #888;
        }


        /* =========================================================
           MAIN LAYOUT
        ========================================================= */

        .checkout-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.4fr) minmax(340px, .8fr);
            gap: 30px;
            align-items: start;
            width: 100%;
        }

        .checkout-left,
        .checkout-right {
            width: 100%;
            min-width: 0;
        }

        .checkout-right {
            position: sticky;
            top: 20px;
        }


        /* =========================================================
           COMMON SECTIONS
        ========================================================= */

        .checkout-section,
        .checkout-summary {
            width: 100%;
            max-width: 100%;

            margin-bottom: 20px;
            padding: 24px;

            border: 1px solid #e5e5e5;
            border-radius: 12px;

            background: #fff;

            overflow: hidden;
        }

        .checkout-section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            width: 100%;
            margin-bottom: 20px;
        }

        .checkout-section-title h3,
        .checkout-summary-title {
            margin: 0;

            color: #222;

            font-size: 21px;
            font-weight: 600;
        }


        /* =========================================================
           ADDRESS LIST
        ========================================================= */

        .saved-address-list {
            display: flex;
            flex-direction: column;
            gap: 12px;

            width: 100%;
        }

        .checkout-address-card {
            display: flex;
            align-items: flex-start;
            gap: 13px;

            width: 100%;
            min-width: 0;

            padding: 16px;

            border: 1px solid #ddd;
            border-radius: 9px;

            background: #fff;

            cursor: pointer;

            transition: .2s ease;
        }

        .checkout-address-card:hover {
            border-color: #c89b3c;
            background: #fffdf7;
        }

        .checkout-address-card.selected {
            border-color: #c89b3c;
            background: #fffaf0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
        }

        .checkout-address-card input[type="radio"] {
            width: 18px !important;
            min-width: 18px !important;
            max-width: 18px !important;

            height: 18px !important;

            margin: 2px 0 0 !important;
            padding: 0 !important;

            flex: 0 0 18px;

            accent-color: #c89b3c;
        }

        .checkout-address-content {
            flex: 1;
            min-width: 0;
        }

        .checkout-address-name {
            margin-bottom: 6px;

            color: #222;
            font-size: 15px;
        }

        .checkout-address-details {
            color: #666;

            font-size: 13px;
            line-height: 1.7;

            word-break: break-word;
        }


        /* =========================================================
           NO ADDRESS
        ========================================================= */

        .no-address {
            width: 100%;

            padding: 25px;

            border: 1px dashed #ccc;
            border-radius: 9px;

            text-align: center;

            color: #777;
        }

        .no-address i {
            display: block;

            margin-bottom: 10px;

            color: #c89b3c;
            font-size: 30px;
        }


        /* =========================================================
           ADD ADDRESS BUTTON
        ========================================================= */

        .checkout-add-address-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            min-height: 40px;

            padding: 9px 15px;

            border: 1px solid #222;
            border-radius: 7px;

            background: #fff;
            color: #222;

            font-family: inherit;
            font-size: 13px;
            font-weight: 500;

            cursor: pointer;

            transition: .2s ease;
        }

        .checkout-add-address-btn:hover {
            background: #222;
            color: #fff;
        }


        /* =========================================================
           NEW ADDRESS BOX
        ========================================================= */

        .checkout-new-address {
            display: none;

            width: 100%;
            max-width: 100%;

            margin-top: 20px;
            padding: 20px;

            border: 1px solid #ddd;
            border-radius: 10px;

            background: #fafafa;

            overflow: hidden;
        }

        .checkout-new-address.open {
            display: block;
            animation: addressOpen .25s ease;
        }

        @keyframes addressOpen {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .new-address-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            width: 100%;
            margin-bottom: 20px;
        }

        .new-address-header h4 {
            margin: 0;

            color: #222;

            font-size: 19px;
            font-weight: 600;
        }

        .close-new-address {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 34px;
            height: 34px;
            min-width: 34px;

            padding: 0;

            border: none;
            border-radius: 50%;

            background: #eee;
            color: #555;

            cursor: pointer;
        }

        .close-new-address:hover {
            background: #222;
            color: #fff;
        }


        /* =========================================================
           FORM GRIDS
        ========================================================= */

        .checkout-grid-2 {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr) minmax(0, 1fr);

            gap: 16px;

            width: 100%;
        }

        .checkout-grid-3 {
            display: grid;

            grid-template-columns:
                minmax(0, 1fr) minmax(0, 1fr) minmax(0, 1fr);

            gap: 16px;

            width: 100%;
        }

        .checkout-grid-2>*,
        .checkout-grid-3>* {
            width: 100%;
            min-width: 0;
        }


        /* =========================================================
           FORM FIELDS
        ========================================================= */

        .checkout-field {
            width: 100%;
            min-width: 0;

            margin-bottom: 16px;
        }

        .checkout-field label {
            display: block;

            width: 100%;

            margin-bottom: 7px;

            color: #333;

            font-size: 14px;
            font-weight: 500;
        }

        .checkout-field label span {
            color: #dc3545;
        }


        /* =========================================================
           INPUTS
        ========================================================= */

        .checkout-field input,
        .checkout-field textarea,
        .checkout-field select {
            display: block;

            width: 100% !important;
            max-width: 100% !important;
            min-width: 0 !important;

            height: auto;

            margin: 0;

            padding: 12px 14px;

            border: 1px solid #ddd;
            border-radius: 8px;

            outline: none;

            background: #fff;
            color: #222;

            font-family: inherit;
            font-size: 14px;

            box-shadow: none;

            transition: border-color .2s ease,
                box-shadow .2s ease;
        }

        .checkout-field input {
            min-height: 46px;
        }

        .checkout-field textarea {
            min-height: 110px;
            resize: vertical;
        }

        .checkout-field select {
            min-height: 46px;

            appearance: auto;
        }

        .checkout-field input:focus,
        .checkout-field textarea:focus,
        .checkout-field select:focus {
            border-color: #c89b3c;

            box-shadow:
                0 0 0 3px rgba(200, 155, 60, .08);
        }

        .checkout-field.has-error input,
        .checkout-field.has-error textarea,
        .checkout-field.has-error select {
            border-color: #dc3545;
        }


        /* =========================================================
           ADDRESS MESSAGE
        ========================================================= */

        .checkout-error,
        .checkout-success {
            width: 100%;

            margin-bottom: 15px;
            padding: 12px 14px;

            border-radius: 8px;

            font-size: 13px;
            line-height: 1.5;
        }

        .checkout-error {
            background: #fff1f1;
            color: #c62828;
        }

        .checkout-success {
            background: #eefaf2;
            color: #198754;
        }


        /* =========================================================
           SAVE ADDRESS BUTTON
        ========================================================= */

        .checkout-save-address-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            width: 100%;
            min-height: 48px;

            margin-top: 5px;

            padding: 12px 18px;

            border: none;
            border-radius: 8px;

            background: #222;
            color: #fff;

            font-family: inherit;
            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .checkout-save-address-btn:hover {
            background: #c89b3c;
        }

        .checkout-save-address-btn:disabled {
            opacity: .6;
            cursor: not-allowed;
        }


        /* =========================================================
           ORDER SUMMARY
        ========================================================= */

        .checkout-summary-title {
            padding-bottom: 16px;

            border-bottom: 1px solid #eee;

            margin-bottom: 18px;
        }


        /* =========================================================
           PRODUCTS
        ========================================================= */

        .checkout-products {
            display: flex;
            flex-direction: column;
            gap: 15px;

            width: 100%;

            padding-bottom: 18px;

            border-bottom: 1px solid #eee;
        }

        .checkout-product {
            display: grid;

            grid-template-columns:
                65px minmax(0, 1fr) auto;

            align-items: center;

            gap: 12px;

            width: 100%;
            min-width: 0;
        }

        .checkout-product-image {
            position: relative;

            width: 65px;
            height: 65px;

            overflow: hidden;

            border-radius: 8px;

            background: #f5f5f5;
        }

        .checkout-product-image img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .checkout-product-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;

            width: 100%;
            height: 100%;

            color: #aaa;
            font-size: 20px;
        }

        .checkout-product-quantity {
            position: absolute;

            top: 3px;
            right: 3px;

            display: flex;
            align-items: center;
            justify-content: center;

            min-width: 20px;
            height: 20px;

            padding: 0 5px;

            border-radius: 20px;

            background: #222;
            color: #fff;

            font-size: 10px;
        }

        .checkout-product-info {
            min-width: 0;
        }

        .checkout-product-info h4 {
            display: -webkit-box;

            margin: 0 0 4px;

            overflow: hidden;

            color: #222;

            font-size: 13px;
            font-weight: 500;
            line-height: 1.4;

            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .checkout-product-variant,
        .checkout-product-unit {
            display: block;

            color: #777;

            font-size: 11px;
        }

        .checkout-product-unit {
            margin-top: 3px;
        }

        .checkout-product-total {
            white-space: nowrap;

            color: #222;

            font-size: 13px;
            font-weight: 600;
        }


        /* =========================================================
           TOTALS
        ========================================================= */

        .checkout-total-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            width: 100%;

            gap: 15px;

            padding: 8px 0;

            color: #555;

            font-size: 13px;
        }

        .checkout-total-row strong {
            white-space: nowrap;
            color: #222;
        }

        .checkout-discount {
            color: #198754 !important;
        }

        .checkout-shipping-free {
            color: #198754 !important;
        }

        .checkout-grand-total {
            display: flex;
            align-items: center;
            justify-content: space-between;

            width: 100%;

            gap: 15px;

            margin-top: 10px;
            padding-top: 16px;

            border-top: 1px solid #ddd;

            color: #222;

            font-size: 18px;
            font-weight: 600;
        }

        .checkout-grand-total strong {
            white-space: nowrap;
        }


        /* =========================================================
           PAYMENT
        ========================================================= */

        .checkout-payment {
            width: 100%;

            margin-top: 22px;
            padding-top: 20px;

            border-top: 1px solid #eee;
        }

        .checkout-payment h4 {
            margin: 0 0 14px;

            color: #222;

            font-size: 17px;
            font-weight: 600;
        }

        .checkout-payment-option {
            display: flex;
            align-items: center;
            gap: 10px;

            width: 100%;

            margin-bottom: 9px;
            padding: 13px;

            border: 1px solid #ddd;
            border-radius: 8px;

            cursor: pointer;

            transition: .2s ease;
        }

        .checkout-payment-option:hover,
        .checkout-payment-option.selected {
            border-color: #c89b3c;
            background: #fffaf0;
        }

        .checkout-payment-option input {
            width: 17px !important;
            min-width: 17px !important;
            max-width: 17px !important;

            height: 17px !important;

            margin: 0 !important;
            padding: 0 !important;

            accent-color: #c89b3c;
        }

        .checkout-payment-option span {
            color: #333;
            font-size: 13px;
        }


        /* =========================================================
           PLACE ORDER
        ========================================================= */

        .checkout-place-order {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            width: 100%;
            min-height: 52px;

            margin-top: 15px;

            padding: 12px 18px;

            border: none;
            border-radius: 8px;

            background: #222;
            color: #fff;

            font-family: inherit;
            font-size: 14px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }

        .checkout-place-order:hover {
            background: #c89b3c;
        }

        .checkout-place-order:disabled {
            opacity: .6;
            cursor: not-allowed;
        }

        .checkout-secure {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            margin-top: 11px;

            color: #777;

            font-size: 11px;
            text-align: center;
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 1100px) {

            .checkout-layout {
                grid-template-columns:
                    minmax(0, 1fr) minmax(320px, 380px);

                gap: 20px;
            }

        }


        /* =========================================================
           BELOW 991
        ========================================================= */

        @media (max-width: 991px) {

            .checkout-layout {
                grid-template-columns: 1fr;
            }

            .checkout-right {
                position: static;
            }

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            .checkout-page {
                padding: 25px 0 70px;
            }

            .checkout-container {
                padding: 0 12px;
            }

            .checkout-breadcrumb {
                margin-bottom: 20px;
                font-size: 12px;
            }

            .checkout-section,
            .checkout-summary {
                padding: 15px;
                border-radius: 9px;
            }

            .checkout-section-title {
                align-items: flex-start;
            }

            .checkout-section-title h3,
            .checkout-summary-title {
                font-size: 18px;
            }

            .checkout-add-address-btn {
                min-height: 38px;
                padding: 8px 11px;
                font-size: 12px;
            }

            .checkout-grid-2,
            .checkout-grid-3 {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .checkout-grid-2>*,
            .checkout-grid-3>* {
                width: 100%;
                min-width: 0;
            }

            .checkout-address-card {
                padding: 13px;
            }

            .checkout-address-details {
                font-size: 12px;
            }

            .checkout-product {
                grid-template-columns:
                    55px minmax(0, 1fr) auto;

                gap: 9px;
            }

            .checkout-product-image {
                width: 55px;
                height: 55px;
            }

            .checkout-product-info h4 {
                font-size: 12px;
            }

            .checkout-product-total {
                font-size: 12px;
            }

            .checkout-total-row {
                font-size: 12px;
            }

            .checkout-grand-total {
                font-size: 16px;
            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 420px) {

            .checkout-container {
                padding: 0 10px;
            }

            .checkout-section,
            .checkout-summary {
                padding: 12px;
            }

            .checkout-section-title {
                flex-direction: column;
                align-items: stretch;
            }

            .checkout-add-address-btn {
                width: 100%;
            }

            .checkout-new-address {
                padding: 14px;
            }

            .new-address-header h4 {
                font-size: 17px;
            }

            .checkout-product {
                grid-template-columns:
                    50px minmax(0, 1fr);

                gap: 9px;
            }

            .checkout-product-image {
                width: 50px;
                height: 50px;
            }

            .checkout-product-total {
                grid-column: 2;

                margin-top: -5px;

                text-align: left;
            }

        }
    </style>


    <!-- =========================================================
             CHECKOUT
        ========================================================= -->

    <section class="checkout-page">

        <div class="checkout-container">

            <!-- Breadcrumb -->
            <div class="checkout-breadcrumb">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <span>/</span>

                <a href="{{ route('cart') }}">
                    Cart
                </a>

                <span>/</span>

                <span class="active">
                    Checkout
                </span>

            </div>


            <!-- Session Error -->
            @if(session('error'))

                <div class="checkout-error">
                    {{ session('error') }}
                </div>

            @endif


            <!-- Session Success -->
            @if(session('success'))

                <div class="checkout-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- Validation Errors -->
            @if($errors->any())

                <div class="checkout-error">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul style="margin:8px 0 0 18px;">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =====================================================
                     CHECKOUT FORM
                ====================================================== -->

            <form action="{{ route('customer.order.store') }}" method="POST" id="checkoutForm">

                @csrf

                <div class="checkout-layout">


                    <!-- =================================================
                             LEFT
                        ================================================== -->

                    <div class="checkout-left">


                        <!-- =================================================
                                 DELIVERY ADDRESS
                            ================================================== -->

                        <div class="checkout-section">

                            <div class="checkout-section-title">

                                <h3>
                                    Delivery Address
                                </h3>

                                <button type="button" id="addNewAddressBtn" class="checkout-add-address-btn">

                                    <i class="fa-solid fa-plus"></i>

                                    Add New Address

                                </button>

                            </div>


                            <!-- Saved Addresses -->

                            <div class="saved-address-list" id="savedAddressList">

                                @forelse($addresses as $address)

                                    <label class="checkout-address-card {{ $loop->first ? 'selected' : '' }}">

                                        <input type="radio" name="address_id" value="{{ $address->id }}" {{ $loop->first ? 'checked' : '' }} required>

                                        <div class="checkout-address-content">

                                            <div class="checkout-address-name">

                                                <strong>
                                                    {{ $address->name }}
                                                </strong>

                                            </div>

                                            <div class="checkout-address-details">

                                                {{ $address->address }}

                                                @if(!empty($address->address_2))

                                                    <br>

                                                    {{ $address->address_2 }}

                                                @endif

                                                <br>

                                                {{ $address->city }},
                                                {{ $address->state }}
                                                -
                                                {{ $address->pincode }}

                                                <br>

                                                Mobile:
                                                {{ $address->mobile }}

                                            </div>

                                        </div>

                                    </label>

                                @empty

                                    <div class="no-address" id="noAddressMessage">

                                        <i class="fa-solid fa-location-dot"></i>

                                        <p style="margin:0;">
                                            No saved address found.
                                        </p>

                                    </div>

                                @endforelse

                            </div>


                            <!-- =================================================
                                     NEW ADDRESS
                                ================================================== -->

                            <div id="newAddressSection" class="checkout-new-address">

                                <div class="new-address-header">

                                    <h4>
                                        Add New Address
                                    </h4>

                                    <button type="button" id="closeNewAddressBtn" class="close-new-address">

                                        <i class="fa-solid fa-xmark"></i>

                                    </button>

                                </div>


                                <div id="addressMessage"></div>


                                <!-- Name / Mobile -->

                                <div class="checkout-grid-2">

                                    <div class="checkout-field">

                                        <label>
                                            Name
                                            <span>*</span>
                                        </label>

                                        <input type="text" id="newAddressName" value="{{ $customer->name ?? '' }}"
                                            placeholder="Enter name">

                                    </div>


                                    <div class="checkout-field">

                                        <label>
                                            Mobile
                                            <span>*</span>
                                        </label>

                                        <input type="text" id="newAddressMobile"
                                            value="{{ $customer->mobile ?? $customer->mobile_number ?? '' }}" maxlength="10"
                                            inputmode="numeric" placeholder="Enter mobile number">

                                    </div>

                                </div>


                                <!-- Address -->

                                <div class="checkout-field">

                                    <label>
                                        Address
                                        <span>*</span>
                                    </label>

                                    <textarea id="newAddressAddress" rows="4"
                                        placeholder="House no., Building, Street, Area"></textarea>

                                </div>


                                <!-- Address 2 -->

                                <div class="checkout-field">

                                    <label>
                                        Address 2
                                    </label>

                                    <input type="text" id="newAddressAddress2" placeholder="Apartment, Suite, Area">

                                </div>


                                <!-- City / State / Pincode -->

                                <div class="checkout-grid-3">

                                    <div class="checkout-field">

                                        <label>
                                            City
                                            <span>*</span>
                                        </label>

                                        <input type="text" id="newAddressCity" placeholder="City">

                                    </div>


                                    <div class="checkout-field">

                                        <label>
                                            State
                                            <span>*</span>
                                        </label>

                                        <input type="text" id="newAddressState" placeholder="State">

                                    </div>


                                    <div class="checkout-field">

                                        <label>
                                            Pincode
                                            <span>*</span>
                                        </label>

                                        <input type="text" id="newAddressPincode" maxlength="6" inputmode="numeric"
                                            placeholder="Pincode">

                                    </div>

                                </div>


                                <!-- Country -->

                                <div class="checkout-field">

                                    <label>
                                        Country
                                        <span>*</span>
                                    </label>

                                    <select id="newAddressCountry">

                                        <option value="India">
                                            India
                                        </option>

                                    </select>

                                </div>


                                <!-- Save -->

                                <button type="button" id="saveAddressBtn" class="checkout-save-address-btn">

                                    <i class="fa-solid fa-check"></i>

                                    Save Address

                                </button>

                            </div>

                        </div>


                        <!-- =================================================
                                 CONTACT INFORMATION
                            ================================================== -->

                        <div class="checkout-section">

                            <div class="checkout-section-title">

                                <h3>
                                    Contact Information
                                </h3>

                            </div>


                            <div class="checkout-grid-2">

                                <div class="checkout-field">

                                    <label>
                                        Name
                                    </label>

                                    <input type="text" name="customer_name"
                                        value="{{ old('customer_name', $customer->name ?? '') }}" placeholder="Your name">

                                </div>


                                <div class="checkout-field">

                                    <label>
                                        Email
                                    </label>

                                    <input type="email" name="customer_email"
                                        value="{{ old('customer_email', $customer->email ?? '') }}"
                                        placeholder="Your email">

                                </div>

                            </div>


                            <div class="checkout-field">

                                <label>
                                    Phone
                                </label>

                                <input type="text" name="customer_phone"
                                    value="{{ old('customer_phone', $customer->mobile ?? $customer->mobile_number ?? '') }}"
                                    maxlength="10" inputmode="numeric" placeholder="Your phone number">

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                             RIGHT
                        ================================================== -->

                    <div class="checkout-right">

                        <div class="checkout-summary">


                            <h3 class="checkout-summary-title">
                                Order Summary
                            </h3>


                            <!-- Products -->

                            <div class="checkout-products">

                                @forelse($cartItems as $item)

                                    @php

                                        $variant = $item->variant;

                                        $product = $variant?->product;

                                        $productName =
                                            $product?->title
                                            ?? $product?->name
                                            ?? 'Product';

                                        $quantity =
                                            (int) $item->quantity;

                                        $price =
                                            (float) $item->unit_price;

                                        $lineTotal =
                                            $price * $quantity;

                                        $image =
                                            $variant?->image
                                            ?? $product?->image
                                            ?? null;

                                    @endphp


                                    <div class="checkout-product">


                                        <!-- Product Image -->

                                        <div class="checkout-product-image">

                                            @if($image)

                                                <img src="{{ asset($image) }}" alt="{{ $productName }}">

                                            @else

                                                <div class="checkout-product-placeholder">

                                                    <i class="fa-regular fa-image"></i>

                                                </div>

                                            @endif


                                            <span class="checkout-product-quantity">
                                                {{ $quantity }}
                                            </span>

                                        </div>


                                        <!-- Product Info -->

                                        <div class="checkout-product-info">

                                            <h4>
                                                {{ $productName }}
                                            </h4>


                                            @if($variant && !empty($variant->name))

                                                <span class="checkout-product-variant">
                                                    {{ $variant->name }}
                                                </span>

                                            @endif


                                            <span class="checkout-product-unit">

                                                ₹{{ number_format($price, 2) }}

                                                ×

                                                {{ $quantity }}

                                            </span>

                                        </div>


                                        <!-- Product Total -->

                                        <div class="checkout-product-total">

                                            ₹{{ number_format($lineTotal, 2) }}

                                        </div>

                                    </div>

                                @empty

                                    <div style="
                                                        padding:20px;
                                                        text-align:center;
                                                        color:#777;
                                                    ">

                                        Your cart is empty.

                                    </div>

                                @endforelse

                            </div>


                            <!-- Subtotal -->

                            <div class="checkout-total-row">

                                <span>
                                    Subtotal
                                    ({{ $totalQuantity }} items)
                                </span>

                                <strong>
                                    ₹{{ number_format($subtotal, 2) }}
                                </strong>

                            </div>


                            <!-- Original Price -->

                            @if($originalTotal > $subtotal)

                                <div class="checkout-total-row">

                                    <span>
                                        Original Price
                                    </span>

                                    <strong>
                                        ₹{{ number_format($originalTotal, 2) }}
                                    </strong>

                                </div>

                            @endif


                            <!-- Discount -->

                            <div class="checkout-total-row">

                                <span>
                                    Discount
                                </span>

                                <strong class="checkout-discount">

                                    -₹{{ number_format($discount, 2) }}

                                </strong>

                            </div>


                            <!-- Shipping -->

                            <div class="checkout-total-row">

                                <span>
                                    Shipping
                                </span>

                                <strong class="checkout-shipping-free">

                                    @if($shipping > 0)

                                        ₹{{ number_format($shipping, 2) }}

                                    @else

                                        FREE

                                    @endif

                                </strong>

                            </div>


                            <!-- Total -->

                            <div class="checkout-grand-total">

                                <span>
                                    Total
                                </span>

                                <strong>
                                    ₹{{ number_format($total, 2) }}
                                </strong>

                            </div>


                            <!-- =================================================
                                     PAYMENT
                                ================================================== -->

                            <div class="checkout-payment">

                                <h4>
                                    Payment Method
                                </h4>


                                <label class="checkout-payment-option selected">

                                    <input type="radio" name="payment_method" value="online_payment" checked>

                                    <span>
                                        Online Payment
                                    </span>

                                </label>


                                {{-- <label class="checkout-payment-option">

                                    <input type="radio" name="payment_method" value="cod">

                                    <span>
                                        Cash on Delivery
                                    </span>

                                </label> --}}

                            </div>


                            <!-- Place Order -->

                            <button type="submit" id="checkoutPlaceOrder" class="checkout-place-order">

                                <i class="fa-solid fa-lock"></i>

                                Place Order

                            </button>


                            <div class="checkout-secure">

                                <i class="fa-solid fa-shield-halved"></i>

                                100% Secure & Safe Payments

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /* =========================================================
               ELEMENTS
            ========================================================= */

            const addNewAddressBtn =
                document.getElementById('addNewAddressBtn');

            const newAddressSection =
                document.getElementById('newAddressSection');

            const closeNewAddressBtn =
                document.getElementById('closeNewAddressBtn');

            const saveAddressBtn =
                document.getElementById('saveAddressBtn');

            const addressMessage =
                document.getElementById('addressMessage');

            const savedAddressList =
                document.getElementById('savedAddressList');

            const checkoutForm =
                document.getElementById('checkoutForm');

            const placeOrderButton =
                document.getElementById('checkoutPlaceOrder');


            /* =========================================================
               OPEN NEW ADDRESS
            ========================================================= */

            if (addNewAddressBtn) {

                addNewAddressBtn.addEventListener('click', function () {

                    newAddressSection.classList.add('open');

                    setTimeout(function () {

                        newAddressSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });

                    }, 100);

                });

            }


            /* =========================================================
               CLOSE NEW ADDRESS
            ========================================================= */

            if (closeNewAddressBtn) {

                closeNewAddressBtn.addEventListener('click', function () {

                    newAddressSection.classList.remove('open');

                    addressMessage.innerHTML = '';

                    clearAddressErrors();

                });

            }


            /* =========================================================
               SAVE ADDRESS
            ========================================================= */

            if (saveAddressBtn) {

                saveAddressBtn.addEventListener('click', async function () {

                    clearAddressErrors();

                    addressMessage.innerHTML = '';


                    const name =
                        document.getElementById('newAddressName')
                            .value
                            .trim();


                    const mobile =
                        document.getElementById('newAddressMobile')
                            .value
                            .trim();


                    const address =
                        document.getElementById('newAddressAddress')
                            .value
                            .trim();


                    const address2 =
                        document.getElementById('newAddressAddress2')
                            .value
                            .trim();


                    const city =
                        document.getElementById('newAddressCity')
                            .value
                            .trim();


                    const state =
                        document.getElementById('newAddressState')
                            .value
                            .trim();


                    const pincode =
                        document.getElementById('newAddressPincode')
                            .value
                            .trim();


                    const country =
                        document.getElementById('newAddressCountry')
                            .value;


                    let valid = true;


                    /* =====================================================
                       VALIDATION
                    ===================================================== */

                    if (!name) {

                        setFieldError('newAddressName');

                        valid = false;

                    }


                    if (!/^[0-9]{10}$/.test(mobile)) {

                        setFieldError('newAddressMobile');

                        valid = false;

                    }


                    if (!address) {

                        setFieldError('newAddressAddress');

                        valid = false;

                    }


                    if (!city) {

                        setFieldError('newAddressCity');

                        valid = false;

                    }


                    if (!state) {

                        setFieldError('newAddressState');

                        valid = false;

                    }


                    if (!/^[0-9]{6}$/.test(pincode)) {

                        setFieldError('newAddressPincode');

                        valid = false;

                    }


                    if (!valid) {

                        showAddressError(
                            'Please complete all required address fields.'
                        );

                        return;

                    }


                    /* =====================================================
                       LOADING
                    ===================================================== */

                    saveAddressBtn.disabled = true;

                    saveAddressBtn.innerHTML = `
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Saving...
                    `;


                    try {

                        const csrfToken =
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            )?.getAttribute('content');


                        if (!csrfToken) {

                            throw new Error(
                                'CSRF token not found.'
                            );

                        }


                        const response = await fetch(
                            "{{ route('customer.address.store') }}",
                            {
                                method: 'POST',

                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': csrfToken
                                },

                                body: JSON.stringify({
                                    name: name,
                                    mobile: mobile,
                                    address: address,
                                    address_2: address2,
                                    city: city,
                                    state: state,
                                    pincode: pincode,
                                    country: country
                                })
                            }
                        );

                        const responseText = await response.text();

                        console.log('Status:', response.status);
                        console.log('Response:', responseText);

                        let data;

                        try {
                            data = JSON.parse(responseText);
                        } catch (e) {
                            throw new Error(
                                'Server response is not JSON. HTTP Status: ' +
                                response.status +
                                '. Check browser console.'
                            );
                        }

                        /* =================================================
                           ERROR
                        ================================================= */

                        if (!response.ok) {

                            if (data.errors) {

                                const firstError =
                                    Object.values(
                                        data.errors
                                    )[0]?.[0];


                                showAddressError(
                                    firstError ||
                                    'Please check the address details.'
                                );

                            } else {

                                showAddressError(
                                    data.message ||
                                    'Unable to save address.'
                                );

                            }

                            return;

                        }


                        /* =================================================
                           GET SAVED ADDRESS
                        ================================================= */

                        const savedAddress =
                            data.address;


                        if (!savedAddress) {

                            showAddressError(
                                'Address saved, but address details were not returned.'
                            );

                            return;

                        }


                        /* =================================================
                           REMOVE EMPTY MESSAGE
                        ================================================= */

                        const noAddressMessage =
                            document.getElementById(
                                'noAddressMessage'
                            );


                        if (noAddressMessage) {
                            noAddressMessage.remove();
                        }


                        /* =================================================
                           UNSELECT OLD ADDRESSES
                        ================================================= */

                        document
                            .querySelectorAll(
                                '.checkout-address-card'
                            )
                            .forEach(function (card) {

                                card.classList.remove(
                                    'selected'
                                );

                                const radio =
                                    card.querySelector(
                                        'input[type="radio"]'
                                    );

                                if (radio) {
                                    radio.checked = false;
                                }

                            });


                        /* =================================================
                           CREATE ADDRESS CARD
                        ================================================= */

                        const addressCard =
                            document.createElement('label');


                        addressCard.className =
                            'checkout-address-card selected';


                        addressCard.innerHTML = `

                            <input
                                type="radio"
                                name="address_id"
                                value="${escapeHtml(savedAddress.id)}"
                                checked
                                required
                            >

                            <div class="checkout-address-content">

                                <div class="checkout-address-name">

                                    <strong>
                                        ${escapeHtml(savedAddress.name)}
                                    </strong>

                                </div>

                                <div class="checkout-address-details">

                                    ${escapeHtml(savedAddress.address)}

                                    ${savedAddress.address_2
                                ? '<br>' +
                                escapeHtml(
                                    savedAddress.address_2
                                )
                                : ''
                            }

                                    <br>

                                    ${escapeHtml(savedAddress.city)},
                                    ${escapeHtml(savedAddress.state)}
                                    -
                                    ${escapeHtml(savedAddress.pincode)}

                                    <br>

                                    Mobile:
                                    ${escapeHtml(savedAddress.mobile)}

                                </div>

                            </div>

                        `;


                        /* =================================================
                           ADD ADDRESS TO LIST
                        ================================================= */

                        savedAddressList.prepend(
                            addressCard
                        );


                        /* =================================================
                           CLOSE FORM
                        ================================================= */

                        newAddressSection.classList.remove(
                            'open'
                        );


                        /* =================================================
                           CLEAR FORM
                        ================================================= */

                        clearAddressForm();


                        /* =================================================
                           SUCCESS
                        ================================================= */

                        showAddressSuccess(
                            'Address added successfully.'
                        );


                        /* =================================================
                           SCROLL
                        ================================================= */

                        setTimeout(function () {

                            addressCard.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });

                        }, 150);


                    } catch (error) {

                        console.error(
                            'Address save error:',
                            error
                        );

                        showAddressError(
                            error.message ||
                            'Something went wrong. Please try again.'
                        );

                    } finally {

                        saveAddressBtn.disabled = false;

                        saveAddressBtn.innerHTML = `
                            <i class="fa-solid fa-check"></i>
                            Save Address
                        `;

                    }

                });

            }


            /* =========================================================
               ADDRESS SELECTION
            ========================================================= */

            document.addEventListener('change', function (event) {

                if (
                    event.target.matches(
                        'input[name="address_id"]'
                    )
                ) {

                    document
                        .querySelectorAll(
                            '.checkout-address-card'
                        )
                        .forEach(function (card) {

                            card.classList.remove(
                                'selected'
                            );

                        });


                    const selectedCard =
                        event.target.closest(
                            '.checkout-address-card'
                        );


                    if (selectedCard) {

                        selectedCard.classList.add(
                            'selected'
                        );

                    }

                }

            });


            /* =========================================================
               PAYMENT SELECTION
            ========================================================= */

            document.addEventListener('change', function (event) {

                if (
                    event.target.matches(
                        'input[name="payment_method"]'
                    )
                ) {

                    document
                        .querySelectorAll(
                            '.checkout-payment-option'
                        )
                        .forEach(function (option) {

                            option.classList.remove(
                                'selected'
                            );

                        });


                    const selectedOption =
                        event.target.closest(
                            '.checkout-payment-option'
                        );


                    if (selectedOption) {

                        selectedOption.classList.add(
                            'selected'
                        );

                    }

                }

            });


            /* =========================================================
               CHECKOUT SUBMIT
            ========================================================= */

            if (checkoutForm) {

                checkoutForm.addEventListener(
                    'submit',
                    function (event) {

                        const selectedAddress =
                            document.querySelector(
                                'input[name="address_id"]:checked'
                            );


                        if (!selectedAddress) {

                            event.preventDefault();

                            alert(
                                'Please select a delivery address.'
                            );

                            const addressSection =
                                document.querySelector(
                                    '.checkout-section'
                                );


                            if (addressSection) {

                                addressSection.scrollIntoView({
                                    behavior: 'smooth',
                                    block: 'center'
                                });

                            }

                            return false;

                        }


                        /* Prevent double submit */

                        if (placeOrderButton) {

                            placeOrderButton.disabled = true;

                            placeOrderButton.innerHTML = `
                                <i class="fa-solid fa-spinner fa-spin"></i>
                                Processing...
                            `;

                        }

                    }
                );

            }


            /* =========================================================
               CLEAR ADDRESS FORM
            ========================================================= */

            function clearAddressForm() {

                document.getElementById(
                    'newAddressName'
                ).value = '';

                document.getElementById(
                    'newAddressMobile'
                ).value = '';

                document.getElementById(
                    'newAddressAddress'
                ).value = '';

                document.getElementById(
                    'newAddressAddress2'
                ).value = '';

                document.getElementById(
                    'newAddressCity'
                ).value = '';

                document.getElementById(
                    'newAddressState'
                ).value = '';

                document.getElementById(
                    'newAddressPincode'
                ).value = '';

                clearAddressErrors();

            }


            /* =========================================================
               CLEAR ERRORS
            ========================================================= */

            function clearAddressErrors() {

                document
                    .querySelectorAll(
                        '.checkout-new-address .checkout-field'
                    )
                    .forEach(function (field) {

                        field.classList.remove(
                            'has-error'
                        );

                    });

            }


            /* =========================================================
               FIELD ERROR
            ========================================================= */

            function setFieldError(id) {

                const element =
                    document.getElementById(id);


                if (!element) {
                    return;
                }


                const field =
                    element.closest(
                        '.checkout-field'
                    );


                if (field) {

                    field.classList.add(
                        'has-error'
                    );

                }

            }


            /* =========================================================
               ERROR MESSAGE
            ========================================================= */

            function showAddressError(message) {

                addressMessage.innerHTML = `

                    <div class="checkout-error">

                        ${escapeHtml(message)}

                    </div>

                `;

            }


            /* =========================================================
               SUCCESS MESSAGE
            ========================================================= */

            function showAddressSuccess(message) {

                addressMessage.innerHTML = `

                    <div class="checkout-success">

                        ${escapeHtml(message)}

                    </div>

                `;


                setTimeout(function () {

                    addressMessage.innerHTML = '';

                }, 3000);

            }


            /* =========================================================
               ESCAPE HTML
            ========================================================= */

            function escapeHtml(value) {

                const div =
                    document.createElement('div');

                div.textContent =
                    value ?? '';

                return div.innerHTML;

            }

        });
    </script>

@endsection