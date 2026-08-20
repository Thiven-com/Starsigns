@extends('layouts.website')

@section('content')

    <section class="account-page-section">

        <div class="container">

            {{-- Breadcrumb --}}
            <div class="account-page-crumb">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <span class="account-page-crumb-sep">
                    /
                </span>

                <span class="account-page-crumb-active">
                    My Account
                </span>

            </div>


            <div class="account-page-layout">


                {{-- =====================================================
                SIDEBAR
                ====================================================== --}}

                <aside class="account-page-sidebar">

                    {{-- Customer --}}
                    <div class="account-page-user-card">

                        <div class="account-page-user-avatar">

                            <img src="{{ asset('website/images/avatar-placeholder.png') }}"
                                alt="{{ $customer->name ?? 'Customer' }}">

                        </div>


                        <div class="account-page-user-info">

                            <h4>
                                {{ $customer->name ?? 'Customer' }}
                            </h4>

                            <p>
                                {{ $customer->email ?? '-' }}
                            </p>

                        </div>

                    </div>


                    {{-- Navigation --}}
                    <nav class="account-page-nav" id="accountPageNav">

                        {{-- Dashboard --}}
                        <a href="{{ route('myaccount') }}" class="account-page-nav-link active">

                            <i class="fa-solid fa-grip"></i>

                            Dashboard

                        </a>


                        {{-- Orders --}}
                        <a href="{{ route('customer.orders') }}" class="account-page-nav-link">

                            <i class="fa-solid fa-bag-shopping"></i>

                            My Orders

                        </a>


                        {{-- Wishlist --}}
                        <a href="{{ route('wishlist') }}" class="account-page-nav-link">

                            <i class="fa-regular fa-heart"></i>

                            Wishlist

                        </a>


                        {{-- Profile --}}
                        <a href="#accountInformation" class="account-page-nav-link" id="accountProfileLink">

                            <i class="fa-regular fa-user"></i>

                            Profile Information

                        </a>


                        {{-- Address --}}
                        <a href="{{ route('customer.addresses') }}" class="account-page-nav-link">

                            <i class="fa-regular fa-bookmark"></i>

                            Address Book

                        </a>


                        {{-- Logout --}}
                        <a href="#" class="account-page-nav-link account-page-logout-link" id="accountPageLogoutBtn">

                            <i class="fa-solid fa-right-from-bracket"></i>

                            Logout

                        </a>

                    </nav>


                    {{-- Refer --}}
                    {{-- <div class="account-page-refer-card">

                        <div class="account-page-refer-icon">

                            <i class="fa-solid fa-gift"></i>

                        </div>


                        <div class="account-page-refer-text">

                            <h5>
                                Refer & Earn
                            </h5>

                            <p>
                                Refer your friends and get
                                <br>

                                <strong>
                                    ₹200 StarSigns Credits
                                </strong>
                            </p>

                        </div>


                        <a href="#" class="account-page-refer-arrow">

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div> --}}

                </aside>



                {{-- =====================================================
                MAIN CONTENT
                ====================================================== --}}

                <div class="account-page-main">


                    {{-- Header --}}
                    <div class="account-page-header">

                        <div class="account-page-header-text">

                            <h1>
                                My Account
                            </h1>

                            <span class="account-page-header-divider"></span>

                            <p>
                                Welcome back,
                                <strong>
                                    {{ $customer->name ?? 'Customer' }}
                                </strong>!

                                Manage your account and
                                track your spiritual journey.
                            </p>

                        </div>


                        <div class="account-page-header-img" data-aos="zoom-in">

                            <img src="{{ asset('website/images/shopbann.png') }}" alt="Spiritual items">

                        </div>

                    </div>



                    {{-- =====================================================
                    STATS
                    ====================================================== --}}

                    <div class="account-page-stats">


                        {{-- Orders --}}
                        <div class="account-page-stat-card">

                            <div class="account-page-stat-icon account-page-stat-icon-purple">

                                <i class="fa-solid fa-bag-shopping"></i>

                            </div>


                            <div class="account-page-stat-text">

                                <h3>
                                    {{ $stats['orders'] ?? 0 }}
                                </h3>

                                <p>
                                    Total Orders
                                </p>

                                <a href="{{ route('customer.orders') }}">

                                    View all orders

                                    <i class="fa-solid fa-chevron-right"></i>

                                </a>

                            </div>

                        </div>



                        {{-- Wishlist --}}
                        <div class="account-page-stat-card">

                            <div class="account-page-stat-icon account-page-stat-icon-pink">

                                <i class="fa-solid fa-heart"></i>

                            </div>


                            <div class="account-page-stat-text">

                                <h3>
                                    {{ $stats['wishlist'] ?? 0 }}
                                </h3>

                                <p>
                                    Wishlist Items
                                </p>

                                <a href="{{ route('wishlist') }}">

                                    View wishlist

                                    <i class="fa-solid fa-chevron-right"></i>

                                </a>

                            </div>

                        </div>

                    </div>



                    {{-- =====================================================
                    ORDERS + ACCOUNT INFORMATION
                    ====================================================== --}}

                    <div class="account-page-split">


                        {{-- =================================================
                        RECENT ORDERS
                        ================================================== --}}

                        <div class="account-page-card">

                            <div class="account-page-card-header">

                                <h3>
                                    Recent Orders
                                </h3>

                                <a href="{{ route('customer.orders') }}">

                                    View All Orders

                                    <i class="fa-solid fa-chevron-right"></i>

                                </a>

                            </div>


                            <div class="account-page-order-list">

                                @forelse($recentOrders as $order)

                                                            @php

                                                                $firstItem =
                                                                    $order->items->first();

                                                                $productTitle =
                                                                    $firstItem?->product_title
                                                                    ?? 'Product';

                                                                $status =
                                                                    $order->status
                                                                    ?? 'pending';

                                                                $displayStatus =
                                                                    ucfirst(
                                                                        str_replace(
                                                                            '_',
                                                                            ' ',
                                                                            $status
                                                                        )
                                                                    );

                                                                $productImage = null;

                                                                if (
                                                                    $firstItem?->productVariant
                                                                    && isset(
                                                                    $firstItem->productVariant->image
                                                                )
                                                                ) {
                                                                    $productImage =
                                                                        $firstItem->productVariant->image;
                                                                }

                                                            @endphp


                                                            <div class="account-page-order-item">


                                                                {{-- Product Image --}}
                                                                {{-- <div class="account-page-order-img">

                                                                    @if($productImage)

                                                                        @if(
                                                                                \Illuminate\Support\Str::startsWith(
                                                                                    $productImage,
                                                                                    [
                                                                                        'http://',
                                                                                        'https://'
                                                                                    ]
                                                                                )
                                                                            )

                                                                            <img src="{{ $productImage }}" alt="{{ $productTitle }}">

                                                                        @else

                                                                            <img src="{{ asset('storage/' . $productImage) }}" alt="{{ $productTitle }}">

                                                                        @endif

                                                                    @else

                                                                        <img src="{{ asset('website/images/product-1.png') }}" alt="{{ $productTitle }}">

                                                                    @endif

                                                                </div> --}}



                                                                {{-- Order Details --}}
                                                                <div class="account-page-order-details">

                                                                    <h4>

                                                                        {{ $productTitle }}

                                                                        @if($order->items->count() > 1)

                                                                            <small>
                                                                                +{{ $order->items->count() - 1 }}
                                                                                more
                                                                            </small>

                                                                        @endif

                                                                    </h4>


                                                                    <p>

                                                                        Order ID:

                                                                        #{{ $order->invoice_id }}

                                                                    </p>


                                                                    <span>

                                                                        {{ $order->created_at
                                        ? $order->created_at->format('d M Y')
                                        : '-' }}

                                                                    </span>

                                                                </div>



                                                                {{-- Price + Status --}}
                                                                <div class="account-page-order-right">

                                                                    <span class="account-page-order-price">

                                                                        ₹{{ number_format(
                                        $order->grand_total ?? 0,
                                        2
                                    ) }}

                                                                    </span>


                                                                    <span class="
                                                                                account-page-order-status
                                                                                account-page-status-{{ strtolower(
                                        str_replace(
                                            ' ',
                                            '-',
                                            $status
                                        )
                                    ) }}
                                                                            ">

                                                                        {{ $displayStatus }}

                                                                    </span>

                                                                </div>

                                                            </div>

                                @empty

                                    <div class="account-page-empty-orders" style="
                                                padding:40px 20px;
                                                text-align:center;
                                            ">

                                        <i class="fa-solid fa-bag-shopping" style="font-size:35px;"></i>

                                        <h4>
                                            No Orders Yet
                                        </h4>

                                        <p>
                                            You haven't placed any orders yet.
                                        </p>

                                        <a href="{{ route('shop') }}" class="account-page-view-all-btn">
                                            Start Shopping
                                        </a>

                                    </div>

                                @endforelse

                            </div>


                            @if($orders->count() > 0)

                                <a href="{{ route('customer.orders') }}" class="account-page-view-all-btn">

                                    View All Orders

                                </a>

                            @endif

                        </div>



                        {{-- =================================================
                        ACCOUNT INFORMATION
                        ================================================== --}}

                        <div class="account-page-card" id="accountInformation">

                            <div class="account-page-card-header">

                                <h3>
                                    Account Information
                                </h3>

                                <a href="{{ route('customer.profile.edit') }}" >

                                    <i class="fa-regular fa-pen-to-square"></i>

                                    Edit Profile

                                </a>

                            </div>


                            <div class="account-page-info-list">


                                {{-- Full Name --}}
                                <div class="account-page-info-row">

                                    <div class="account-page-info-icon">

                                        <i class="fa-regular fa-user"></i>

                                    </div>

                                    <div class="account-page-info-label">
                                        Full Name
                                    </div>

                                    <div class="account-page-info-value">

                                        {{ $customer->name ?? '-' }}

                                    </div>

                                </div>


                                {{-- Email --}}
                                <div class="account-page-info-row">

                                    <div class="account-page-info-icon">

                                        <i class="fa-regular fa-envelope"></i>

                                    </div>

                                    <div class="account-page-info-label">
                                        Email Address
                                    </div>

                                    <div class="account-page-info-value">

                                        {{ $customer->email ?? '-' }}

                                    </div>

                                </div>


                                {{-- Mobile --}}
                                <div class="account-page-info-row">

                                    <div class="account-page-info-icon">

                                        <i class="fa-solid fa-phone"></i>

                                    </div>

                                    <div class="account-page-info-label">
                                        Phone Number
                                    </div>

                                    <div class="account-page-info-value">

                                        {{ $customer->mobile
        ?? $customer->phone
        ?? '-' }}

                                    </div>

                                </div>

                            </div>


                            <a href="{{ route('customer.profile.edit') }}" class="account-page-view-all-btn">

                                Manage Profile

                            </a>

                        </div>

                    </div>



                    {{-- =====================================================
                    QUICK LINKS
                    ====================================================== --}}

                    <div class="account-page-quick-links">


                        {{-- Address --}}
                        <a href="{{ route('customer.addresses') }}" class="account-page-quick-card">

                            <div class="account-page-quick-icon">

                                <i class="fa-solid fa-location-dot"></i>

                            </div>


                            <div class="account-page-quick-text">

                                <h4>
                                    Address Book
                                </h4>

                                <p>
                                    Manage your saved addresses
                                </p>

                                <span>

                                    {{ $addresses->count() }}

                                    {{ \Illuminate\Support\Str::plural(
        'Address',
        $addresses->count()
    ) }}

                                    <i class="fa-solid fa-chevron-right"></i>

                                </span>

                            </div>

                        </a>


                        {{-- Wishlist --}}
                        <a href="{{ route('wishlist') }}" class="account-page-quick-card">

                            <div class="account-page-quick-icon">

                                <i class="fa-regular fa-heart"></i>

                            </div>


                            <div class="account-page-quick-text">

                                <h4>
                                    Wishlist
                                </h4>

                                <p>
                                    Your saved products
                                </p>

                                <span>

                                    {{ $stats['wishlist'] ?? 0 }}

                                    Items

                                    <i class="fa-solid fa-chevron-right"></i>

                                </span>

                            </div>

                        </a>

                    </div>



                    {{-- =====================================================
                    FEATURES
                    ====================================================== --}}

                    <div class="account-page-features">


                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">

                                <i class="fa-solid fa-shield-halved"></i>

                            </div>


                            <div class="account-page-feature-text">

                                <h4>
                                    Secure & Safe
                                </h4>

                                <p>
                                    Your data is encrypted and 100% secure with us.
                                </p>

                            </div>

                        </div>



                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">

                                <i class="fa-solid fa-headset"></i>

                            </div>


                            <div class="account-page-feature-text">

                                <h4>
                                    24/7 Support
                                </h4>

                                <p>
                                    We are here to help you anytime, anywhere.
                                </p>

                            </div>

                        </div>



                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">

                                <i class="fa-solid fa-award"></i>

                            </div>


                            <div class="account-page-feature-text">

                                <h4>
                                    Trusted Experts
                                </h4>

                                <p>
                                    Connect with verified astrologers & experts.
                                </p>

                            </div>

                        </div>



                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">

                                <i class="fa-solid fa-star"></i>

                            </div>


                            <div class="account-page-feature-text">

                                <h4>
                                    Customer Satisfaction
                                </h4>

                                <p>
                                    Your happiness and trust are our top priority.
                                </p>

                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- ==========================================================
    LOGOUT CONFIRMATION MODAL
    =========================================================== --}}

    <div class="account-page-modal-overlay" id="accountPageLogoutModal">

        <div class="account-page-modal">

            <div class="account-page-modal-icon">

                <i class="fa-solid fa-right-from-bracket"></i>

            </div>


            <h3>
                Log out of your account?
            </h3>


            <p>
                You'll need to sign in again to access your dashboard.
            </p>


            <div class="account-page-modal-actions">

                <button type="button" class="account-page-modal-cancel" id="accountPageLogoutCancel">
                    Cancel
                </button>


                <button type="button" class="account-page-modal-confirm" id="accountPageLogoutConfirm">
                    Yes, Logout
                </button>

            </div>

        </div>

    </div>



    {{-- ==========================================================
    REAL LOGOUT FORM
    =========================================================== --}}

    <form method="GET" action="{{ route('logout') }}" id="accountPageLogoutForm" style="display:none;">

        @csrf

    </form>



    <script>

        (function () {

            'use strict';


            /* ==========================================================
                ELEMENTS
            =========================================================== */

            const logoutBtn =
                document.getElementById(
                    'accountPageLogoutBtn'
                );

            const logoutModal =
                document.getElementById(
                    'accountPageLogoutModal'
                );

            const logoutCancel =
                document.getElementById(
                    'accountPageLogoutCancel'
                );

            const logoutConfirm =
                document.getElementById(
                    'accountPageLogoutConfirm'
                );

            const logoutForm =
                document.getElementById(
                    'accountPageLogoutForm'
                );


            /* ==========================================================
                LOGOUT OPEN
            =========================================================== */

            if (logoutBtn && logoutModal) {

                logoutBtn.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();

                        logoutModal.classList.add(
                            'show'
                        );

                    }
                );

            }


            /* ==========================================================
                LOGOUT CANCEL
            =========================================================== */

            if (logoutCancel && logoutModal) {

                logoutCancel.addEventListener(
                    'click',
                    function () {

                        logoutModal.classList.remove(
                            'show'
                        );

                    }
                );

            }


            /* ==========================================================
                CLOSE MODAL OUTSIDE
            =========================================================== */

            if (logoutModal) {

                logoutModal.addEventListener(
                    'click',
                    function (event) {

                        if (
                            event.target ===
                            logoutModal
                        ) {

                            logoutModal.classList.remove(
                                'show'
                            );

                        }

                    }
                );

            }


            /* ==========================================================
                CONFIRM LOGOUT
            =========================================================== */

            if (logoutConfirm && logoutForm) {

                logoutConfirm.addEventListener(
                    'click',
                    function () {

                        logoutConfirm.disabled = true;

                        logoutConfirm.innerHTML =
                            '<i class="fa-solid fa-spinner fa-spin"></i> Logging out...';


                        logoutForm.submit();

                    }
                );

            }


            /* ==========================================================
                PROFILE SCROLL
            =========================================================== */

            const profileLink =
                document.getElementById(
                    'accountProfileLink'
                );

            const profileCard =
                document.getElementById(
                    'accountInformation'
                );


            if (
                profileLink &&
                profileCard
            ) {

                profileLink.addEventListener(
                    'click',
                    function (event) {

                        event.preventDefault();

                        profileCard.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                    }
                );

            }


            /* ==========================================================
                MANAGE PROFILE
            =========================================================== */

            const manageProfile =
                document.getElementById(
                    'accountPageManageProfileBtn'
                );

            const editProfile =
                document.getElementById(
                    'accountPageEditProfileBtn'
                );


            function scrollToProfile(event) {
                event.preventDefault();

                if (!profileCard) {
                    return;
                }

                profileCard.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }


            if (manageProfile) {

                manageProfile.addEventListener(
                    'click',
                    scrollToProfile
                );

            }


            if (editProfile) {

                editProfile.addEventListener(
                    'click',
                    scrollToProfile
                );

            }


            /* ==========================================================
                STAT CARD CLICK
            =========================================================== */

            document
                .querySelectorAll(
                    '.account-page-stat-card'
                )
                .forEach(function (card) {

                    card.addEventListener(
                        'click',
                        function (event) {

                            if (
                                event.target.closest('a')
                            ) {
                                return;
                            }


                            const link =
                                card.querySelector('a');


                            if (link) {

                                window.location.href =
                                    link.href;

                            }

                        }
                    );

                });


            /* ==========================================================
                QUICK CARD PRESS EFFECT
            =========================================================== */

            document
                .querySelectorAll(
                    '.account-page-quick-card'
                )
                .forEach(function (card) {

                    card.addEventListener(
                        'mousedown',
                        function () {

                            card.style.transform =
                                'scale(.98)';

                        }
                    );


                    card.addEventListener(
                        'mouseup',
                        function () {

                            card.style.transform =
                                '';

                        }
                    );


                    card.addEventListener(
                        'mouseleave',
                        function () {

                            card.style.transform =
                                '';

                        }
                    );

                });


            /* ==========================================================
                ESCAPE CLOSE LOGOUT MODAL
            =========================================================== */

            document.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Escape' &&
                        logoutModal
                    ) {

                        logoutModal.classList.remove(
                            'show'
                        );

                    }

                }
            );


        })();

    </script>


@endsection