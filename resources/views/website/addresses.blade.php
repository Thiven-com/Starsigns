@extends('layouts.website')

@section('content')

    <style>
        .address-page {
            background: #faf9f7;
            min-height: 75vh;
            padding: 45px 0 70px;
        }

        .address-container {
            max-width: 1180px;
            margin: auto;
            padding: 0 18px;
        }

        /* Breadcrumb */

        .address-breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 28px;
            font-size: 13px;
            color: #888;
        }

        .address-breadcrumb a {
            color: #555;
            text-decoration: none;
        }

        .address-breadcrumb a:hover {
            color: #b48a3c;
        }

        .address-breadcrumb .active {
            color: #b48a3c;
            font-weight: 600;
        }


        /* Header */

        .address-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        .address-header h1 {
            margin: 0 0 7px;
            font-size: 30px;
            font-weight: 600;
            color: #222;
        }

        .address-header p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .address-add-btn {
            min-height: 46px;
            padding: 0 21px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .address-add-btn:hover {
            background: #b48a3c;
            color: #fff;
        }


        /* Customer */

        .address-customer {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 18px 20px;
            margin-bottom: 25px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
        }

        .address-customer-avatar {
            width: 50px;
            height: 50px;
            flex: 0 0 50px;
            overflow: hidden;
            border-radius: 50%;
            background: #f4efe6;
        }

        .address-customer-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .address-customer h4 {
            margin: 0 0 4px;
            color: #222;
            font-size: 15px;
        }

        .address-customer p {
            margin: 0;
            color: #777;
            font-size: 13px;
        }


        /* Address grid */

        .address-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }


        /* Address card */

        .address-card {
            background: #fff;
            border: 1px solid #e9e6e1;
            border-radius: 14px;
            padding: 21px;
            transition: .2s;
        }

        .address-card:hover {
            border-color: #d8c49d;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .address-card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 16px;
        }

        .address-person {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .address-icon {
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #f7f1e6;
            color: #b48a3c;
        }

        .address-person h3 {
            margin: 0 0 3px;
            font-size: 15px;
            color: #222;
        }

        .address-person span {
            color: #888;
            font-size: 12px;
        }


        /* Menu */

        .address-menu {
            position: relative;
        }

        .address-menu-btn {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fff;
            color: #777;
            cursor: pointer;
        }

        .address-menu-dropdown {
            position: absolute;
            right: 0;
            top: 40px;
            z-index: 50;
            width: 145px;
            display: none;
            padding: 6px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 9px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .12);
        }

        .address-menu-dropdown.show {
            display: block;
        }

        .address-menu-dropdown button {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px;
            border: 0;
            border-radius: 7px;
            background: transparent;
            color: #444;
            font-size: 12px;
            cursor: pointer;
            text-align: left;
        }

        .address-menu-dropdown button:hover {
            background: #faf7f0;
            color: #b48a3c;
        }

        .address-menu-dropdown .delete {
            color: #d33;
        }

        .address-menu-dropdown .delete:hover {
            background: #fff2f2;
            color: #d33;
        }


        /* Details */

        .address-details {
            padding: 16px 0;
            border-top: 1px solid #f0eeeb;
            border-bottom: 1px solid #f0eeeb;
        }

        .address-details p {
            margin: 0 0 7px;
            color: #555;
            font-size: 13px;
            line-height: 1.6;
        }

        .address-details p:last-child {
            margin-bottom: 0;
        }

        .address-details i {
            width: 18px;
            color: #b48a3c;
        }


        .address-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            padding-top: 15px;
        }

        .address-label {
            padding: 6px 10px;
            border-radius: 20px;
            background: #f6f1e8;
            color: #a07830;
            font-size: 11px;
            font-weight: 600;
        }

        .address-phone {
            color: #777;
            font-size: 12px;
        }


        /* Empty */

        .address-empty {
            grid-column: 1 / -1;
            padding: 60px 20px;
            background: #fff;
            border: 1px dashed #ddd;
            border-radius: 14px;
            text-align: center;
        }

        .address-empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #f7f1e6;
            color: #b48a3c;
            font-size: 25px;
        }

        .address-empty h3 {
            margin: 0 0 8px;
            font-size: 19px;
            color: #222;
        }

        .address-empty p {
            margin: 0 auto 20px;
            max-width: 450px;
            color: #888;
            font-size: 13px;
        }


        /* =====================================================
                   FORM
                ====================================================== */

        .address-form-wrapper {
            display: none;
            margin-bottom: 25px;
            background: #fff;
            border: 1px solid #e9e6e1;
            border-radius: 14px;
            overflow: hidden;
        }

        .address-form-wrapper.show {
            display: block;
        }

        .address-form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 20px 22px;
            border-bottom: 1px solid #eee;
        }

        .address-form-header h2 {
            margin: 0 0 4px;
            font-size: 20px;
            color: #222;
        }

        .address-form-header p {
            margin: 0;
            color: #888;
            font-size: 12px;
        }

        .address-form-close {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fff;
            color: #777;
            cursor: pointer;
        }

        .address-form-close:hover {
            color: #b48a3c;
        }

        .address-form-body {
            padding: 22px;
        }

        .address-form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
        }

        .address-form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .address-form-group.full {
            grid-column: 1 / -1;
        }

        .address-form-group label {
            color: #444;
            font-size: 12px;
            font-weight: 600;
        }

        .address-form-group label span {
            color: #d33;
        }

        .address-form-control {
            width: 100%;
            min-height: 44px;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            color: #333;
            font-size: 13px;
            outline: none;
            transition: .2s;
            box-sizing: border-box;
        }

        textarea.address-form-control {
            min-height: 85px;
            resize: vertical;
        }

        .address-form-control:focus {
            border-color: #b48a3c;
            box-shadow: 0 0 0 3px rgba(180, 138, 60, .08);
        }

        .address-form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 20px;
            margin-top: 5px;
            border-top: 1px solid #eee;
        }

        .address-cancel-btn {
            min-height: 44px;
            padding: 0 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            color: #555;
            font-size: 13px;
            cursor: pointer;
        }

        .address-save-btn {
            min-height: 44px;
            padding: 0 22px;
            border: 0;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        .address-save-btn:hover {
            background: #b48a3c;
        }

        .address-error {
            margin-bottom: 15px;
            padding: 11px 13px;
            border-radius: 8px;
            background: #fff3f3;
            color: #c33;
            font-size: 12px;
        }


        /* Bottom */

        .address-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 28px;
        }

        .address-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #555;
            text-decoration: none;
            font-size: 13px;
        }

        .address-back:hover {
            color: #b48a3c;
        }

        .address-count {
            color: #888;
            font-size: 12px;
        }


        /* Mobile */

        @media(max-width:767px) {

            .address-page {
                padding: 25px 0 45px;
            }

            .address-container {
                padding: 0 13px;
            }

            .address-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .address-header h1 {
                font-size: 24px;
            }

            .address-add-btn {
                width: 100%;
            }

            .address-grid {
                grid-template-columns: 1fr;
            }

            .address-form-grid {
                grid-template-columns: 1fr;
            }

            .address-form-group.full {
                grid-column: auto;
            }

            .address-form-body {
                padding: 16px;
            }

            .address-form-header {
                padding: 16px;
            }

            .address-form-footer {
                flex-direction: column-reverse;
            }

            .address-save-btn,
            .address-cancel-btn {
                width: 100%;
            }

            .address-bottom {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

        }
    </style>


    <section class="address-page">

        <div class="address-container">


            {{-- Breadcrumb --}}

            <div class="address-breadcrumb">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <span>/</span>

                <a href="{{ route('myaccount') }}">
                    My Account
                </a>

                <span>/</span>

                <span class="active">
                    Addresses
                </span>

            </div>


            {{-- Header --}}

            <div class="address-header">

                <div>

                    <h1>
                        My Addresses
                    </h1>

                    <p>
                        Manage your saved delivery addresses.
                    </p>

                </div>


                <button type="button" class="address-add-btn" id="addAddressBtn">

                    <i class="fa-solid fa-plus"></i>

                    Add New Address

                </button>

            </div>


            {{-- Customer Card --}}

            <div class="address-customer">

                <div class="address-customer-avatar">

                    <img src="{{ asset('website/images/avatar-placeholder.png') }}" alt="{{ $customer->name }}">

                </div>


                <div>

                    <h4>
                        {{ $customer->name }}
                    </h4>

                    <p>

                        {{ $customer->email }}

                        @if($customer->mobile)

                            &nbsp; • &nbsp;

                            {{ $customer->mobile }}

                        @endif

                    </p>

                </div>

            </div>



            {{-- =====================================================
            ADD / EDIT FORM
            ====================================================== --}}

            <div class="address-form-wrapper" id="addressFormWrapper">

                <div class="address-form-header">

                    <div>

                        <h2 id="addressFormTitle">
                            Add New Address
                        </h2>

                        <p id="addressFormDescription">
                            Enter your delivery address details.
                        </p>

                    </div>


                    <button type="button" class="address-form-close" id="closeAddressForm">

                        <i class="fa-solid fa-xmark"></i>

                    </button>

                </div>


                <div class="address-form-body">


                    {{-- Errors --}}

                    @if($errors->any())

                        <div class="address-error">

                            @foreach($errors->all() as $error)

                                <div>
                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    @endif


                    <form method="POST" id="addressForm" action="{{ route('customer.address.store') }}">

                        @csrf

                        <div id="addressMethodContainer"></div>


                        <div class="address-form-grid">


                            {{-- Name --}}

                            <div class="address-form-group">

                                <label>
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input type="text" name="name" id="address_name" class="address-form-control"
                                    value="{{ old('name', $customer->name) }}" required>

                            </div>


                            {{-- Mobile --}}

                            <div class="address-form-group">

                                <label>
                                    Mobile Number
                                    <span>*</span>
                                </label>

                                <input type="text" name="mobile" id="address_mobile" class="address-form-control"
                                    value="{{ old('mobile', $customer->mobile ?? '') }}" required>

                            </div>


                            {{-- Alternate Mobile --}}

                            <div class="address-form-group">

                                <label>
                                    Alternate Mobile
                                </label>

                                <input type="text" name="alternate_mobile" id="address_alternate_mobile"
                                    class="address-form-control" value="{{ old('alternate_mobile') }}">

                            </div>


                            {{-- Email --}}

                            <div class="address-form-group">

                                <label>
                                    Email
                                    <span>*</span>
                                </label>

                                <input type="email" name="email" id="address_email" class="address-form-control"
                                    value="{{ old('email', $customer->email ?? '') }}" required>

                            </div>


                            {{-- GST --}}

                            <div class="address-form-group">

                                <label>
                                    GST Number
                                </label>

                                <input type="text" name="gst" id="address_gst" class="address-form-control"
                                    value="{{ old('gst') }}">

                            </div>


                            {{-- Pincode --}}

                            <div class="address-form-group">

                                <label>
                                    Pincode
                                    <span>*</span>
                                </label>

                                <input type="text" name="pincode" id="address_pincode" class="address-form-control"
                                    value="{{ old('pincode') }}" required>

                            </div>


                            {{-- City --}}

                            <div class="address-form-group">

                                <label>
                                    City
                                    <span>*</span>
                                </label>

                                <input type="text" name="city" id="address_city" class="address-form-control"
                                    value="{{ old('city') }}" required>

                            </div>


                            {{-- State --}}

                            <div class="address-form-group">

                                <label>
                                    State <span>*</span>
                                </label>

                                <input type="text" name="state" id="address_state" class="address-form-control"
                                    value="{{ old('state') }}" placeholder="Enter your state" required>

                            </div>

                            {{-- Landmark --}}

                            <div class="address-form-group">

                                <label>
                                    Landmark
                                </label>

                                <input type="text" name="landmark" id="address_landmark" class="address-form-control"
                                    value="{{ old('landmark') }}">

                            </div>


                            {{-- Address --}}

                            <div class="address-form-group full">

                                <label>
                                    Address
                                    <span>*</span>
                                </label>

                                <textarea name="address" id="address_address" class="address-form-control"
                                    required>{{ old('address') }}</textarea>

                            </div>


                            {{-- Address 2 --}}

                            <div class="address-form-group full">

                                <label>
                                    Address Line 2
                                </label>

                                <textarea name="address_2" id="address_address_2"
                                    class="address-form-control">{{ old('address_2') }}</textarea>

                            </div>

                        </div>


                        <div class="address-form-footer">

                            <button type="button" class="address-cancel-btn" id="cancelAddressBtn">
                                Cancel
                            </button>


                            <button type="submit" class="address-save-btn" id="saveAddressBtn">

                                <i class="fa-solid fa-check"></i>

                                Save Address

                            </button>

                        </div>

                    </form>

                </div>

            </div>



            {{-- =====================================================
            ADDRESS LIST
            ====================================================== --}}

            <div class="address-grid">


                @forelse($addresses as $address)

                            <div class="address-card">


                                <div class="address-card-top">

                                    <div class="address-person">

                                        <div class="address-icon">

                                            <i class="fa-solid fa-location-dot"></i>

                                        </div>


                                        <div>

                                            <h3>
                                                {{ $address->name }}
                                            </h3>

                                            <span>
                                                Delivery Address
                                            </span>

                                        </div>

                                    </div>


                                    <div class="address-menu">

                                        <button type="button" class="address-menu-btn" onclick="toggleAddressMenu({{ $address->id }})">

                                            <i class="fa-solid fa-ellipsis-vertical"></i>

                                        </button>


                                        <div class="address-menu-dropdown" id="addressMenu{{ $address->id }}">

                                            <button type="button" onclick="editAddress({{ $address->id }})">

                                                <i class="fa-regular fa-pen-to-square"></i>

                                                Edit

                                            </button>


                                            <form method="POST" action="{{ route(
                        'customer.address.destroy',
                        $address->id
                    ) }}" class="delete-address-form">

                                                @csrf

                                                @method('DELETE')

                                                <button type="submit" class="delete">

                                                    <i class="fa-regular fa-trash-can"></i>

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>


                                <div class="address-details">

                                    <p>

                                        <i class="fa-solid fa-location-dot"></i>

                                        {{ $address->address }}

                                        @if($address->address_2)

                                            , {{ $address->address_2 }}

                                        @endif

                                    </p>


                                    @if($address->landmark)

                                        <p>

                                            <i class="fa-solid fa-map-pin"></i>

                                            {{ $address->landmark }}

                                        </p>

                                    @endif


                                    <p>

                                        <i class="fa-solid fa-city"></i>

                                        {{ $address->city }},

                                        {{ $address->state }}

                                        -

                                        {{ $address->pincode }}

                                    </p>


                                    @if($address->email)

                                        <p>

                                            <i class="fa-regular fa-envelope"></i>

                                            {{ $address->email }}

                                        </p>

                                    @endif

                                </div>


                                <div class="address-footer">

                                    <span class="address-label">

                                        <i class="fa-solid fa-house"></i>

                                        Saved Address

                                    </span>


                                    <span class="address-phone">

                                        <i class="fa-solid fa-phone"></i>

                                        {{ $address->mobile }}

                                    </span>

                                </div>

                            </div>


                @empty

                    <div class="address-empty">

                        <div class="address-empty-icon">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>


                        <h3>
                            No Saved Addresses
                        </h3>


                        <p>
                            Add your first delivery address
                            to make checkout faster.
                        </p>


                        <button type="button" class="address-add-btn" id="emptyAddAddressBtn">

                            <i class="fa-solid fa-plus"></i>

                            Add Address

                        </button>

                    </div>

                @endforelse

            </div>


            @if($addresses->count())

                    <div class="address-bottom">

                        <a href="{{ route('myaccount') }}" class="address-back">

                            <i class="fa-solid fa-arrow-left"></i>

                            Back to My Account

                        </a>


                        <span class="address-count">

                            {{ $addresses->count() }}

                            {{ \Illuminate\Support\Str::plural(
                    'saved address',
                    $addresses->count()
                ) }}

                        </span>

                    </div>

            @endif

        </div>

    </section>



    {{-- ==========================================================
    EDIT DATA FOR JAVASCRIPT
    =========================================================== --}}

    <script>
        const customerAddresses = {!! json_encode(
        $addresses->map(function ($address) {
            return [
                'id' => $address->id,
                'name' => $address->name,
                'gst' => $address->gst,
                'mobile' => $address->mobile,
                'alternate_mobile' => $address->alternate_mobile,
                'email' => $address->email,
                'pincode' => $address->pincode,
                'city' => $address->city,
                'landmark' => $address->landmark,
                'state' => $address->state,
                'address' => $address->address,
                'address_2' => $address->address_2,
            ];
        })->values()
    ) !!};
    </script>



    <script>

        (function () {

            'use strict';


            const formWrapper =
                document.getElementById(
                    'addressFormWrapper'
                );

            const form =
                document.getElementById(
                    'addressForm'
                );

            const formTitle =
                document.getElementById(
                    'addressFormTitle'
                );

            const formDescription =
                document.getElementById(
                    'addressFormDescription'
                );

            const methodContainer =
                document.getElementById(
                    'addressMethodContainer'
                );

            const saveButton =
                document.getElementById(
                    'saveAddressBtn'
                );

            const addButton =
                document.getElementById(
                    'addAddressBtn'
                );

            const emptyAddButton =
                document.getElementById(
                    'emptyAddAddressBtn'
                );

            const cancelButton =
                document.getElementById(
                    'cancelAddressBtn'
                );

            const closeButton =
                document.getElementById(
                    'closeAddressForm'
                );


            /*
            |--------------------------------------------------------------------------
            | Show Add Form
            |--------------------------------------------------------------------------
            */

            function showAddForm() {

                form.reset();

                form.action =
                    "{{ route('customer.address.store') }}";


                methodContainer.innerHTML = '';


                formTitle.innerText =
                    'Add New Address';

                formDescription.innerText =
                    'Enter your delivery address details.';


                saveButton.innerHTML =
                    '<i class="fa-solid fa-check"></i> Save Address';


                /*
                | Default customer details
                */

                document.getElementById(
                    'address_name'
                ).value =
                    @json($customer->name ?? '');


                document.getElementById(
                    'address_mobile'
                ).value =
                    @json($customer->mobile ?? '');


                document.getElementById(
                    'address_email'
                ).value =
                    @json($customer->email ?? '');


                showForm();

            }


            /*
            |--------------------------------------------------------------------------
            | Show Edit Form
            |--------------------------------------------------------------------------
            */

            window.editAddress = function (id) {

                const address =
                    customerAddresses.find(
                        item => Number(item.id) === Number(id)
                    );


                if (!address) {

                    return;

                }


                form.action =
                    "{{ url('/customer/address/update') }}/" +
                    address.id;


                methodContainer.innerHTML =
                    '<input type="hidden" name="_method" value="POST">';


                formTitle.innerText =
                    'Edit Address';


                formDescription.innerText =
                    'Update your saved address details.';


                saveButton.innerHTML =
                    '<i class="fa-solid fa-check"></i> Update Address';


                document.getElementById(
                    'address_name'
                ).value =
                    address.name || '';


                document.getElementById(
                    'address_mobile'
                ).value =
                    address.mobile || '';


                document.getElementById(
                    'address_alternate_mobile'
                ).value =
                    address.alternate_mobile || '';


                document.getElementById(
                    'address_email'
                ).value =
                    address.email || '';


                document.getElementById(
                    'address_gst'
                ).value =
                    address.gst || '';


                document.getElementById(
                    'address_pincode'
                ).value =
                    address.pincode || '';


                document.getElementById(
                    'address_city'
                ).value =
                    address.city || '';


                document.getElementById(
                    'address_state'
                ).value =
                    address.state || '';


                document.getElementById(
                    'address_landmark'
                ).value =
                    address.landmark || '';


                document.getElementById(
                    'address_address'
                ).value =
                    address.address || '';


                document.getElementById(
                    'address_address_2'
                ).value =
                    address.address_2 || '';


                closeMenus();

                showForm();

            };


            /*
            |--------------------------------------------------------------------------
            | Show Form
            |--------------------------------------------------------------------------
            */

            function showForm() {

                formWrapper.classList.add(
                    'show'
                );


                setTimeout(function () {

                    formWrapper.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                }, 50);

            }


            /*
            |--------------------------------------------------------------------------
            | Hide Form
            |--------------------------------------------------------------------------
            */

            function hideForm() {

                formWrapper.classList.remove(
                    'show'
                );

                form.reset();

                methodContainer.innerHTML = '';

            }


            /*
            |--------------------------------------------------------------------------
            | Buttons
            |--------------------------------------------------------------------------
            */

            if (addButton) {

                addButton.addEventListener(
                    'click',
                    showAddForm
                );

            }


            if (emptyAddButton) {

                emptyAddButton.addEventListener(
                    'click',
                    showAddForm
                );

            }


            if (cancelButton) {

                cancelButton.addEventListener(
                    'click',
                    hideForm
                );

            }


            if (closeButton) {

                closeButton.addEventListener(
                    'click',
                    hideForm
                );

            }


            /*
            |--------------------------------------------------------------------------
            | Address Menu
            |--------------------------------------------------------------------------
            */

            window.toggleAddressMenu =
                function (id) {

                    const current =
                        document.getElementById(
                            'addressMenu' + id
                        );


                    closeMenus();


                    if (current) {

                        current.classList.add(
                            'show'
                        );

                    }

                };


            function closeMenus() {

                document
                    .querySelectorAll(
                        '.address-menu-dropdown'
                    )
                    .forEach(function (menu) {

                        menu.classList.remove(
                            'show'
                        );

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | Close menu outside
            |--------------------------------------------------------------------------
            */

            document.addEventListener(
                'click',
                function (event) {

                    if (
                        !event.target.closest(
                            '.address-menu'
                        )
                    ) {

                        closeMenus();

                    }

                }
            );


            /*
            |--------------------------------------------------------------------------
            | Delete Confirmation
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll(
                    '.delete-address-form'
                )
                .forEach(function (deleteForm) {

                    deleteForm.addEventListener(
                        'submit',
                        function (event) {

                            if (
                                !confirm(
                                    'Are you sure you want to delete this address?'
                                )
                            ) {

                                event.preventDefault();

                            }

                        }
                    );

                });


            /*
            |--------------------------------------------------------------------------
            | Validation Error
            |--------------------------------------------------------------------------
            |
            | If Laravel redirected back with validation errors,
            | automatically open the form.
            |
            */

            @if($errors->any())

                showForm();

            @endif


            })();

    </script>

@endsection