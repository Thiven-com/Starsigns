@extends('layouts.website')

@section('content')

    <!-- =========================================================
         PAGE BANNER
    ========================================================== -->

    <section
        class="my-orders-banner-section"
        data-aos="zoom-out"
        data-aos-duration="1000"
    >

        <div class="container">

            <div class="my-orders-banner-content">

                <h1
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    My Orders
                </h1>

                <div
                    class="my-orders-breadcrumb"
                    data-aos="fade-up"
                    data-aos-delay="400"
                >

                    <a href="{{ url('/') }}">
                        Home
                    </a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <a href="{{ route('myaccount') }}">
                        My Account
                    </a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="my-orders-active">
                        My Orders
                    </span>

                </div>

            </div>

        </div>

    </section>


    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: "ease-in-out-cubic",
                once: true,
                offset: 80
            });
        }
    </script>


    <!-- =========================================================
         ORDERS PAGE CONTENT
    ========================================================== -->

    <section class="orders-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->

            <div class="orders-page-crumb">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <span class="orders-page-crumb-sep">
                    /
                </span>

                <a
                    href="{{ route('myaccount') }}"
                    class="orders-page-crumb-link"
                >
                    My Account
                </a>

                <span class="orders-page-crumb-sep">
                    /
                </span>

                <span class="orders-page-crumb-active">
                    My Orders
                </span>

            </div>


            <div class="orders-page-layout">


                <!-- =================================================
                     ORDERS MAIN CONTENT
                ================================================== -->

                <div class="orders-page-main">


                    <div class="orders-page-title-wrap">

                        <h2 class="orders-page-title">
                            My Orders
                        </h2>

                        <span class="orders-page-title-divider">
                            ✦
                        </span>

                    </div>


                    <!-- =================================================
                         DYNAMIC STATUS META + COUNTS
                    ================================================== -->

                    @php

                        $statusMeta = [

                            'delivered' => [
                                'label' => 'Delivered',
                                'class' => 'orders-page-status-delivered',
                                'icon' => 'fa-circle-check',
                            ],

                            'shipped' => [
                                'label' => 'Shipped',
                                'class' => 'orders-page-status-shipped',
                                'icon' => 'fa-truck',
                            ],

                            'processing' => [
                                'label' => 'Processing',
                                'class' => 'orders-page-status-processing',
                                'icon' => 'fa-clock',
                            ],

                            'pending' => [
                                'label' => 'Pending',
                                'class' => 'orders-page-status-processing',
                                'icon' => 'fa-clock',
                            ],

                            'confirmed' => [
                                'label' => 'Confirmed',
                                'class' => 'orders-page-status-processing',
                                'icon' => 'fa-circle-check',
                            ],

                            'placed' => [
                                'label' => 'Placed',
                                'class' => 'orders-page-status-processing',
                                'icon' => 'fa-circle-check',
                            ],

                            'cancelled' => [
                                'label' => 'Cancelled',
                                'class' => 'orders-page-status-cancelled',
                                'icon' => 'fa-circle-xmark',
                            ],

                        ];


                        $counts = [

                            'all' => $orders->count(),

                            'processing' => $orders
                                ->whereIn(
                                    'status',
                                    [
                                        'pending',
                                        'processing',
                                        'confirmed',
                                        'placed',
                                    ]
                                )
                                ->count(),

                            'shipped' => $orders
                                ->where(
                                    'status',
                                    'shipped'
                                )
                                ->count(),

                            'delivered' => $orders
                                ->where(
                                    'status',
                                    'delivered'
                                )
                                ->count(),

                            'cancelled' => $orders
                                ->where(
                                    'status',
                                    'cancelled'
                                )
                                ->count(),

                            'returned' => $orders
                                ->where(
                                    'status',
                                    'returned'
                                )
                                ->count(),

                        ];

                    @endphp


                    <!-- =================================================
                         STATUS TABS
                    ================================================== -->

                    <div
                        class="orders-page-tabs"
                        id="ordersPageTabs"
                    >

                        <button
                            type="button"
                            class="orders-page-tab active"
                            data-filter="all"
                        >
                            All Orders

                            <span>
                                ({{ $counts['all'] }})
                            </span>
                        </button>


                        <button
                            type="button"
                            class="orders-page-tab"
                            data-filter="processing"
                        >
                            Processing

                            <span>
                                ({{ $counts['processing'] }})
                            </span>
                        </button>


                        <button
                            type="button"
                            class="orders-page-tab"
                            data-filter="shipped"
                        >
                            Shipped

                            <span>
                                ({{ $counts['shipped'] }})
                            </span>
                        </button>


                        <button
                            type="button"
                            class="orders-page-tab"
                            data-filter="delivered"
                        >
                            Delivered

                            <span>
                                ({{ $counts['delivered'] }})
                            </span>
                        </button>


                        <button
                            type="button"
                            class="orders-page-tab"
                            data-filter="cancelled"
                        >
                            Cancelled

                            <span>
                                ({{ $counts['cancelled'] }})
                            </span>
                        </button>


                        <button
                            type="button"
                            class="orders-page-tab"
                            data-filter="returned"
                        >
                            Returned

                            <span>
                                ({{ $counts['returned'] }})
                            </span>
                        </button>

                    </div>


                    <!-- =================================================
                         TOOLBAR
                    ================================================== -->

                    <div class="orders-page-toolbar">

                        <div class="orders-page-search-box">

                            <input
                                type="text"
                                id="ordersPageSearchInput"
                                placeholder="Search by Order ID, Product..."
                            >

                            <button
                                type="button"
                                id="ordersPageSearchBtn"
                                title="Search"
                            >

                                <i class="fa-solid fa-magnifying-glass"></i>

                            </button>

                        </div>


                        <button
                            type="button"
                            class="orders-page-filter-btn"
                            id="ordersPageFilterBtn"
                        >

                            <i class="fa-solid fa-filter"></i>

                            Filter

                        </button>


                        <div
                            class="orders-page-filter-panel"
                            id="ordersPageFilterPanel"
                        >

                            <div class="orders-page-filter-group">

                                <label
                                    for="ordersPageSortSelect"
                                >
                                    Sort by
                                </label>

                                <select
                                    id="ordersPageSortSelect"
                                >

                                    <option value="newest">
                                        Newest First
                                    </option>

                                    <option value="oldest">
                                        Oldest First
                                    </option>

                                    <option value="price-high">
                                        Price: High to Low
                                    </option>

                                    <option value="price-low">
                                        Price: Low to High
                                    </option>

                                </select>

                            </div>


                            <div class="orders-page-filter-group">

                                <label
                                    for="ordersPagePaymentSelect"
                                >
                                    Payment Method
                                </label>

                                <select
                                    id="ordersPagePaymentSelect"
                                >

                                    <option value="">
                                        All
                                    </option>

                                    <option value="cod">
                                        COD
                                    </option>

                                    <option value="online_payment">
                                        Online Payment
                                    </option>

                                </select>

                            </div>


                            <button
                                type="button"
                                class="orders-page-filter-apply"
                                id="ordersPageApplyFilterBtn"
                            >
                                Apply
                            </button>


                            <button
                                type="button"
                                class="orders-page-filter-reset"
                                id="ordersPageResetFilterBtn"
                            >
                                Reset
                            </button>

                        </div>

                    </div>


                    <!-- =================================================
                         ORDERS LIST
                    ================================================== -->

                    <div
                        class="orders-page-list"
                        id="ordersPageList"
                    >


                        @forelse($orders as $order)

                            @php

                                /*
                                |--------------------------------------------------------------------------
                                | Status
                                |--------------------------------------------------------------------------
                                */

                                $status = strtolower(
                                    $order->status ?? 'pending'
                                );


                                $meta = $statusMeta[$status]
                                    ?? [
                                        'label' => ucfirst($status),
                                        'class' => 'orders-page-status-processing',
                                        'icon' => 'fa-clock',
                                    ];


                                /*
                                |--------------------------------------------------------------------------
                                | Order ID
                                |--------------------------------------------------------------------------
                                */

                                $orderId = $order->invoice_id
                                    ?: $order->id;


                                /*
                                |--------------------------------------------------------------------------
                                | Date
                                |--------------------------------------------------------------------------
                                */

                                $orderDate = $order->created_at
                                    ? $order->created_at->format('M d, Y')
                                    : '-';


                                $orderTime = $order->created_at
                                    ? $order->created_at->format('h:i A')
                                    : '';


                                /*
                                |--------------------------------------------------------------------------
                                | Item Count
                                |--------------------------------------------------------------------------
                                */

                                $itemCount = $order->items
                                    ? $order->items->sum('quantity')
                                    : 0;


                                /*
                                |--------------------------------------------------------------------------
                                | Product Names
                                |--------------------------------------------------------------------------
                                */

                                $products = $order->items
                                    ? $order->items
                                        ->pluck('product_title')
                                        ->filter()
                                        ->implode(', ')
                                    : '';


                                /*
                                |--------------------------------------------------------------------------
                                | Payment Method
                                |--------------------------------------------------------------------------
                                */

                                $method = $order->payment_method
                                    ?: 'Payment Pending';


                                $methodLabel = ucwords(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $method
                                    )
                                );


                                /*
                                |--------------------------------------------------------------------------
                                | Status Label
                                |--------------------------------------------------------------------------
                                */

                                if ($status === 'delivered') {

                                    $statusLabel = 'Delivered on';

                                } elseif ($status === 'shipped') {

                                    $statusLabel = 'Expected Delivery';

                                } elseif ($status === 'cancelled') {

                                    $statusLabel = 'Cancelled on';

                                } elseif (
                                    in_array(
                                        $status,
                                        [
                                            'pending',
                                            'processing',
                                            'confirmed',
                                            'placed',
                                        ]
                                    )
                                ) {

                                    $statusLabel = 'Order Confirmed';

                                } else {

                                    $statusLabel = ucfirst($status);

                                }


                                /*
                                |--------------------------------------------------------------------------
                                | Status Date
                                |--------------------------------------------------------------------------
                                */

                                if ($status === 'delivered') {

                                    $statusDate = $order->updated_at
                                        ? $order->updated_at->format('M d, Y')
                                        : $orderDate;

                                } elseif ($status === 'cancelled') {

                                    $statusDate = $order->updated_at
                                        ? $order->updated_at->format('M d, Y')
                                        : $orderDate;

                                } else {

                                    $statusDate = $order->created_at
                                        ? $order->created_at->format('M d, Y')
                                        : $orderDate;

                                }



                            @endphp


                            <div
                                class="orders-page-card"

                                data-id="{{ $orderId }}"

                                data-status="{{ $status }}"

                                data-price="{{ $order->grand_total }}"

                                data-method="{{ $method }}"

                                data-products="{{ $products }}"

                                data-date="{{ $orderDate }}"

                                data-time="{{ $orderTime }}"

                                data-status-label="{{ $statusLabel }}"

                                data-status-date="{{ $statusDate }}"

                                data-items="{{ $itemCount }}"
                            >

                                <!-- Order Icon (replaces product image) -->
                                <div
                                    class="orders-page-card-thumb"
                                    style="display:flex;align-items:center;justify-content:center;"
                                >
                                    <div
                                        style="width:52px;height:52px;border-radius:14px;background:#f6f0e5;color:#8a6a2f;display:flex;align-items:center;justify-content:center;"
                                    >
                                        <i class="fa-solid fa-bag-shopping" style="font-size:20px;"></i>
                                    </div>
                                </div>

                                <!-- Order ID -->

                                <div class="orders-page-card-id">

                                    <span class="orders-page-label">
                                        Order ID
                                    </span>

                                    <span class="orders-page-id">

                                        #{{ $orderId }}

                                    </span>

                                    <span class="orders-page-date">

                                        {{ $orderDate }}

                                        &bull;

                                        {{ $orderTime }}

                                    </span>

                                </div>


                                <!-- Items -->

                                <div class="orders-page-card-items">

                                    <span class="orders-page-count">

                                        {{ $itemCount }}

                                        Item{{ $itemCount > 1 ? 's' : '' }}

                                    </span>


                                    <span class="orders-page-price">

                                        ₹{{ number_format(
                                            $order->grand_total
                                        ) }}

                                    </span>


                                    <span class="orders-page-method">

                                        {{ $methodLabel }}

                                    </span>

                                </div>


                                <!-- Status -->

                                <div class="orders-page-card-status">

                                    <span
                                        class="
                                            orders-page-status-badge
                                            {{ $meta['class'] }}
                                        "
                                    >

                                        <i
                                            class="
                                                fa-solid
                                                {{ $meta['icon'] }}
                                            "
                                        ></i>

                                        {{ $meta['label'] }}

                                    </span>


                                    <span class="orders-page-status-sub">

                                        {{ $statusLabel }}

                                    </span>


                                    <span class="orders-page-status-date">

                                        {{ $statusDate }}

                                    </span>

                                </div>


                                <!-- Actions -->

                                <div class="orders-page-card-actions">


                                    <a
                                        href="{{ route(
                                            'customer.order.detail',
                                            $order->id
                                        ) }}"
                                        class="orders-page-view-btn"
                                        data-action="view"
                                    >

                                        View Details

                                    </a>


                                    @if($status === 'delivered')

                                        <a
                                            href="{{ route(
                                                'customer.invoice',
                                                $order->id
                                            ) }}"
                                            class="orders-page-action-link"
                                            data-action="invoice"
                                        >

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-download
                                                "
                                            ></i>

                                            Download Invoice

                                        </a>


                                    @elseif($status === 'shipped')

                                        <a
                                            href="{{ route(
                                                'track.order'
                                            ) }}"
                                            class="
                                                orders-page-action-link
                                                orders-page-track
                                            "
                                            data-action="track"
                                        >

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-location-dot
                                                "
                                            ></i>

                                            Track Order

                                        </a>


                                    @elseif(
                                        in_array(
                                            $status,
                                            [
                                                'pending',
                                                'processing',
                                                'confirmed',
                                                'placed',
                                            ]
                                        )
                                    )

                                        <a
                                            href="{{ route(
                                                'customer.order.detail',
                                                $order->id
                                            ) }}"
                                            class="orders-page-action-link"
                                            data-action="view"
                                        >

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-eye
                                                "
                                            ></i>

                                            View Status

                                        </a>


                                    @elseif($status === 'cancelled')

                                        <a
                                            href="{{ route(
                                                'customer.order.detail',
                                                $order->id
                                            ) }}"
                                            class="orders-page-action-link"
                                            data-action="buyagain"
                                        >

                                            <i
                                                class="
                                                    fa-solid
                                                    fa-rotate
                                                "
                                            ></i>

                                            Buy Again

                                        </a>

                                    @endif


                                </div>

                            </div>


                        @empty

                            <div
                                class="orders-page-empty"
                                id="ordersPageEmpty"
                                style="display:flex;"
                            >

                                <i
                                    class="
                                        fa-solid
                                        fa-bag-shopping
                                    "
                                ></i>

                                <p>
                                    You haven't placed any orders yet.
                                </p>

                                <a
                                    href="{{ url('/shop') }}"
                                    class="orders-page-empty-btn"
                                >
                                    Start Shopping
                                </a>

                            </div>

                        @endforelse


                    </div>


                    <!-- Empty State -->

                    <div
                        class="orders-page-empty"
                        id="ordersPageEmpty"
                        style="display:none;"
                    >

                        <i
                            class="
                                fa-solid
                                fa-bag-shopping
                            "
                        ></i>

                        <p>
                            No orders match this view
                        </p>

                        <a
                            href="{{ url('/shop') }}"
                            class="orders-page-empty-btn"
                        >
                            Start Shopping
                        </a>

                    </div>


                    <!-- =================================================
                         PAGINATION
                    ================================================== -->

                    <div
                        class="orders-page-pagination"
                        id="ordersPagePagination"
                    >

                        <button
                            type="button"
                            class="
                                orders-page-page-btn
                                orders-page-page-nav
                            "
                            id="ordersPagePrevBtn"
                            title="Previous page"
                        >

                            <i
                                class="
                                    fa-solid
                                    fa-chevron-left
                                "
                            ></i>

                        </button>


                        <button
                            type="button"
                            class="
                                orders-page-page-btn
                                orders-page-page-num
                                active
                            "
                            data-page="1"
                        >
                            1
                        </button>


                        <button
                            type="button"
                            class="
                                orders-page-page-btn
                                orders-page-page-nav
                            "
                            id="ordersPageNextBtn"
                            title="Next page"
                        >

                            <i
                                class="
                                    fa-solid
                                    fa-chevron-right
                                "
                            ></i>

                        </button>

                    </div>


                    <p
                        class="orders-page-showing-text"
                        id="ordersPageShowingText"
                    >
                        Showing 0 of 0 orders
                    </p>


                </div>

            </div>

        </div>

    </section>


    <!-- =========================================================
         ORDER DETAILS MODAL
    ========================================================== -->

    <div
        class="orders-page-modal-overlay"
        id="ordersPageModalOverlay"
    >

        <div class="orders-page-modal">

            <button
                type="button"
                class="orders-page-modal-close"
                id="ordersPageModalClose"
                title="Close"
            >

                <i class="fa-solid fa-xmark"></i>

            </button>


            <div id="ordersPageModalBody"></div>

        </div>

    </div>


    <!-- =========================================================
         TOAST
    ========================================================== -->

    <div
        class="orders-page-toast"
        id="ordersPageToast"
    ></div>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>

        (function () {

            const list =
                document.getElementById(
                    "ordersPageList"
                );

            const emptyState =
                document.getElementById(
                    "ordersPageEmpty"
                );

            const tabs =
                document.querySelectorAll(
                    ".orders-page-tab"
                );

            const searchInput =
                document.getElementById(
                    "ordersPageSearchInput"
                );

            const searchBtn =
                document.getElementById(
                    "ordersPageSearchBtn"
                );

            const filterBtn =
                document.getElementById(
                    "ordersPageFilterBtn"
                );

            const filterPanel =
                document.getElementById(
                    "ordersPageFilterPanel"
                );

            const sortSelect =
                document.getElementById(
                    "ordersPageSortSelect"
                );

            const paymentSelect =
                document.getElementById(
                    "ordersPagePaymentSelect"
                );

            const applyFilterBtn =
                document.getElementById(
                    "ordersPageApplyFilterBtn"
                );

            const resetFilterBtn =
                document.getElementById(
                    "ordersPageResetFilterBtn"
                );

            const showingText =
                document.getElementById(
                    "ordersPageShowingText"
                );

            const prevBtn =
                document.getElementById(
                    "ordersPagePrevBtn"
                );

            const nextBtn =
                document.getElementById(
                    "ordersPageNextBtn"
                );

            const pagination =
                document.getElementById(
                    "ordersPagePagination"
                );

            const modalOverlay =
                document.getElementById(
                    "ordersPageModalOverlay"
                );

            const modalBody =
                document.getElementById(
                    "ordersPageModalBody"
                );

            const modalClose =
                document.getElementById(
                    "ordersPageModalClose"
                );

            const toast =
                document.getElementById(
                    "ordersPageToast"
                );


            if (!list) {
                return;
            }


            const allCards =
                Array.from(
                    list.querySelectorAll(
                        ".orders-page-card"
                    )
                );


            const perPage = 6;


            let state = {

                filter: "all",

                search: "",

                payment: "",

                sort: "newest",

                page: 1

            };


            /* =====================================================
               TOAST
            ===================================================== */

            let toastTimer;


            function showToast(msg) {

                if (!toast) {
                    return;
                }

                toast.textContent = msg;

                toast.classList.add(
                    "show"
                );

                clearTimeout(
                    toastTimer
                );

                toastTimer =
                    setTimeout(
                        () => {

                            toast.classList.remove(
                                "show"
                            );

                        },
                        2600
                    );

            }


            /* =====================================================
               FILTER
            ===================================================== */

            function getFilteredCards() {

                let cards =
                    allCards.slice();


                /*
                |--------------------------------------------------------------------------
                | Status
                |--------------------------------------------------------------------------
                */

                if (
                    state.filter !== "all"
                ) {

                    if (
                        state.filter ===
                        "processing"
                    ) {

                        cards =
                            cards.filter(
                                c => [

                                    "pending",
                                    "processing",
                                    "confirmed",
                                    "placed"

                                ].includes(
                                    c.dataset.status
                                )
                            );

                    } else {

                        cards =
                            cards.filter(
                                c =>
                                    c.dataset.status ===
                                    state.filter
                            );

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | Search
                |--------------------------------------------------------------------------
                */

                if (
                    state.search.trim()
                ) {

                    const q =
                        state.search
                            .trim()
                            .toLowerCase();


                    cards =
                        cards.filter(
                            c =>

                                c.dataset.id
                                    .toLowerCase()
                                    .includes(q)

                                ||

                                c.dataset.products
                                    .toLowerCase()
                                    .includes(q)

                        );

                }


                /*
                |--------------------------------------------------------------------------
                | Payment
                |--------------------------------------------------------------------------
                */

                if (
                    state.payment
                ) {

                    cards =
                        cards.filter(
                            c => {

                                const method =
                                    c.dataset.method
                                        .toLowerCase();

                                return method.includes(
                                    state.payment
                                        .toLowerCase()
                                );

                            }
                        );

                }


                /*
                |--------------------------------------------------------------------------
                | Sorting
                |--------------------------------------------------------------------------
                */

                cards.sort(
                    (a, b) => {

                        if (
                            state.sort ===
                            "price-high"
                        ) {

                            return (
                                Number(
                                    b.dataset.price
                                )
                                -
                                Number(
                                    a.dataset.price
                                )
                            );

                        }


                        if (
                            state.sort ===
                            "price-low"
                        ) {

                            return (
                                Number(
                                    a.dataset.price
                                )
                                -
                                Number(
                                    b.dataset.price
                                )
                            );

                        }


                        const aIndex =
                            allCards.indexOf(a);

                        const bIndex =
                            allCards.indexOf(b);


                        if (
                            state.sort ===
                            "oldest"
                        ) {

                            return (
                                bIndex -
                                aIndex
                            );

                        }


                        return (
                            aIndex -
                            bIndex
                        );

                    }
                );


                return cards;

            }


            /* =====================================================
               RENDER
            ===================================================== */

            function render() {

                const filtered =
                    getFilteredCards();


                const totalPages =
                    Math.max(
                        1,
                        Math.ceil(
                            filtered.length /
                            perPage
                        )
                    );


                if (
                    state.page >
                    totalPages
                ) {

                    state.page =
                        totalPages;

                }


                const start =
                    (
                        state.page -
                        1
                    ) * perPage;


                const pageCards =
                    filtered.slice(
                        start,
                        start + perPage
                    );


                /*
                |--------------------------------------------------------------------------
                | Hide all
                |--------------------------------------------------------------------------
                */

                allCards.forEach(
                    c => {

                        c.style.display =
                            "none";

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Show current page
                |--------------------------------------------------------------------------
                */

                pageCards.forEach(
                    c => {

                        c.style.display =
                            "";

                        list.appendChild(c);

                    }
                );


                /*
                |--------------------------------------------------------------------------
                | Empty state
                |--------------------------------------------------------------------------
                */

                if (emptyState) {

                    emptyState.style.display =
                        filtered.length === 0
                            ? "flex"
                            : "none";

                }


                /*
                |--------------------------------------------------------------------------
                | List
                |--------------------------------------------------------------------------
                */

                list.style.display =
                    filtered.length === 0
                        ? "none"
                        : "grid";


                /*
                |--------------------------------------------------------------------------
                | Showing
                |--------------------------------------------------------------------------
                */

                if (showingText) {

                    showingText.textContent =
                        filtered.length

                            ? `Showing ${
                                start + 1
                            } to ${
                                Math.min(
                                    start + perPage,
                                    filtered.length
                                )
                            } of ${
                                filtered.length
                            } orders`

                            : "Showing 0 of 0 orders";

                }


                renderPagination(
                    totalPages
                );

            }


            /* =====================================================
               PAGINATION
            ===================================================== */

            function renderPagination(
                totalPages
            ) {

                if (!pagination) {
                    return;
                }


                pagination
                    .querySelectorAll(
                        ".orders-page-page-num"
                    )
                    .forEach(
                        b => b.remove()
                    );


                for (
                    let i = 1;
                    i <= totalPages;
                    i++
                ) {

                    const btn =
                        document.createElement(
                            "button"
                        );


                    btn.type =
                        "button";


                    btn.className =
                        "orders-page-page-btn " +
                        "orders-page-page-num" +
                        (
                            i === state.page
                                ? " active"
                                : ""
                        );


                    btn.dataset.page =
                        i;


                    btn.textContent =
                        i;


                    btn.addEventListener(
                        "click",
                        () => {

                            state.page =
                                i;

                            render();

                            list.scrollIntoView(
                                {
                                    behavior:
                                        "smooth",

                                    block:
                                        "start"
                                }
                            );

                        }
                    );


                    if (nextBtn) {

                        pagination.insertBefore(
                            btn,
                            nextBtn
                        );

                    }

                }


                if (prevBtn) {

                    prevBtn.disabled =
                        state.page <= 1;

                }


                if (nextBtn) {

                    nextBtn.disabled =
                        state.page >=
                        totalPages;

                }

            }


            /* =====================================================
               TABS
            ===================================================== */

            tabs.forEach(
                tab => {

                    tab.addEventListener(
                        "click",
                        () => {

                            tabs.forEach(
                                t =>
                                    t.classList.remove(
                                        "active"
                                    )
                            );


                            tab.classList.add(
                                "active"
                            );


                            state.filter =
                                tab.dataset.filter;


                            state.page =
                                1;


                            render();

                        }
                    );

                }
            );


            /* =====================================================
               SEARCH
            ===================================================== */

            function runSearch() {

                if (!searchInput) {
                    return;
                }


                state.search =
                    searchInput.value;


                state.page =
                    1;


                render();

            }


            if (searchBtn) {

                searchBtn.addEventListener(
                    "click",
                    runSearch
                );

            }


            if (searchInput) {

                searchInput.addEventListener(
                    "keydown",
                    e => {

                        if (
                            e.key ===
                            "Enter"
                        ) {

                            runSearch();

                        }

                    }
                );


                searchInput.addEventListener(
                    "input",
                    () => {

                        if (
                            searchInput.value ===
                            ""
                        ) {

                            runSearch();

                        }

                    }
                );

            }


            /* =====================================================
               FILTER PANEL
            ===================================================== */

            if (
                filterBtn &&
                filterPanel
            ) {

                filterBtn.addEventListener(
                    "click",
                    e => {

                        e.stopPropagation();

                        filterPanel.classList.toggle(
                            "open"
                        );

                        filterBtn.classList.toggle(
                            "active"
                        );

                    }
                );


                document.addEventListener(
                    "click",
                    e => {

                        if (
                            !filterPanel.contains(
                                e.target
                            )
                            &&
                            !filterBtn.contains(
                                e.target
                            )
                        ) {

                            filterPanel.classList.remove(
                                "open"
                            );

                            filterBtn.classList.remove(
                                "active"
                            );

                        }

                    }
                );

            }


            /* =====================================================
               APPLY FILTER
            ===================================================== */

            if (applyFilterBtn) {

                applyFilterBtn.addEventListener(
                    "click",
                    () => {

                        state.sort =
                            sortSelect
                                ? sortSelect.value
                                : "newest";


                        state.payment =
                            paymentSelect
                                ? paymentSelect.value
                                : "";


                        state.page =
                            1;


                        render();


                        if (filterPanel) {

                            filterPanel.classList.remove(
                                "open"
                            );

                        }


                        if (filterBtn) {

                            filterBtn.classList.remove(
                                "active"
                            );

                        }


                        showToast(
                            "Filters applied"
                        );

                    }
                );

            }


            /* =====================================================
               RESET FILTER
            ===================================================== */

            if (resetFilterBtn) {

                resetFilterBtn.addEventListener(
                    "click",
                    () => {

                        if (sortSelect) {

                            sortSelect.value =
                                "newest";

                        }


                        if (paymentSelect) {

                            paymentSelect.value =
                                "";

                        }


                        if (searchInput) {

                            searchInput.value =
                                "";

                        }


                        state.filter =
                            "all";

                        state.search =
                            "";

                        state.sort =
                            "newest";

                        state.payment =
                            "";

                        state.page =
                            1;


                        tabs.forEach(
                            tab => {

                                tab.classList.remove(
                                    "active"
                                );

                                if (
                                    tab.dataset.filter ===
                                    "all"
                                ) {

                                    tab.classList.add(
                                        "active"
                                    );

                                }

                            }
                        );


                        render();

                    }
                );

            }


            /* =====================================================
               PREVIOUS
            ===================================================== */

            if (prevBtn) {

                prevBtn.addEventListener(
                    "click",
                    () => {

                        if (
                            state.page >
                            1
                        ) {

                            state.page--;

                            render();

                            list.scrollIntoView(
                                {
                                    behavior:
                                        "smooth",

                                    block:
                                        "start"
                                }
                            );

                        }

                    }
                );

            }


            /* =====================================================
               NEXT
            ===================================================== */

            if (nextBtn) {

                nextBtn.addEventListener(
                    "click",
                    () => {

                        const totalPages =
                            Math.max(
                                1,
                                Math.ceil(
                                    getFilteredCards()
                                        .length /
                                    perPage
                                )
                            );


                        if (
                            state.page <
                            totalPages
                        ) {

                            state.page++;

                            render();

                            list.scrollIntoView(
                                {
                                    behavior:
                                        "smooth",

                                    block:
                                        "start"
                                }
                            );

                        }

                    }
                );

            }


            /* =====================================================
               CARD ACTIONS
            ===================================================== */

            list.addEventListener(
                "click",
                e => {

                    const card =
                        e.target.closest(
                            ".orders-page-card"
                        );


                    if (!card) {
                        return;
                    }


                    const viewBtn =
                        e.target.closest(
                            '[data-action="view"]'
                        );


                    if (
                        viewBtn &&
                        viewBtn.tagName !==
                        "A"
                    ) {

                        openDetails(card);

                        return;

                    }


                    const invoiceBtn =
                        e.target.closest(
                            '[data-action="invoice"]'
                        );


                    if (
                        invoiceBtn &&
                        invoiceBtn.tagName !==
                        "A"
                    ) {

                        downloadInvoice(card);

                        return;

                    }


                    const trackBtn =
                        e.target.closest(
                            '[data-action="track"]'
                        );


                    if (
                        trackBtn &&
                        trackBtn.tagName !==
                        "A"
                    ) {

                        trackOrder(card);

                        return;

                    }


                    const buyAgainBtn =
                        e.target.closest(
                            '[data-action="buyagain"]'
                        );


                    if (
                        buyAgainBtn &&
                        buyAgainBtn.tagName !==
                        "A"
                    ) {

                        buyAgain(card);

                    }

                }
            );


            /* =====================================================
               DETAILS MODAL
            ===================================================== */

            function openDetails(card) {

                if (
                    !modalBody ||
                    !modalOverlay
                ) {

                    return;

                }


                const d =
                    card.dataset;


                const badge =
                    card.querySelector(
                        ".orders-page-status-badge"
                    );


                const badgeHtml =
                    badge
                        ? badge.outerHTML
                        : "";


                modalBody.innerHTML = `

                    <h3>
                        Order #${d.id}
                    </h3>

                    <p class="orders-page-modal-sub">
                        ${d.products || "Order Items"}
                    </p>

                    <div class="orders-page-modal-row">

                        <span>
                            Status
                        </span>

                        ${badgeHtml}

                    </div>

                    <div class="orders-page-modal-row">

                        <span>
                            Order Date
                        </span>

                        <span>
                            ${d.date}, ${d.time}
                        </span>

                    </div>

                    <div class="orders-page-modal-row">

                        <span>
                            Items
                        </span>

                        <span>
                            ${d.items}
                        </span>

                    </div>

                    <div class="orders-page-modal-row">

                        <span>
                            Total Amount
                        </span>

                        <span>
                            ₹${Number(
                                d.price
                            ).toLocaleString(
                                'en-IN'
                            )}
                        </span>

                    </div>

                    <div class="orders-page-modal-row">

                        <span>
                            Payment Method
                        </span>

                        <span>
                            ${d.method}
                        </span>

                    </div>

                    <div class="orders-page-modal-row">

                        <span>
                            ${d.statusLabel}
                        </span>

                        <span>
                            ${d.statusDate}
                        </span>

                    </div>

                `;


                modalOverlay.classList.add(
                    "open"
                );

            }


            /* =====================================================
               MODAL CLOSE
            ===================================================== */

            if (modalClose) {

                modalClose.addEventListener(
                    "click",
                    () => {

                        modalOverlay.classList.remove(
                            "open"
                        );

                    }
                );

            }


            if (modalOverlay) {

                modalOverlay.addEventListener(
                    "click",
                    e => {

                        if (
                            e.target ===
                            modalOverlay
                        ) {

                            modalOverlay.classList.remove(
                                "open"
                            );

                        }

                    }
                );

            }


            document.addEventListener(
                "keydown",
                e => {

                    if (
                        e.key ===
                        "Escape"
                    ) {

                        if (modalOverlay) {

                            modalOverlay.classList.remove(
                                "open"
                            );

                        }

                    }

                }
            );


            /* =====================================================
               INVOICE
            ===================================================== */

            function downloadInvoice(card) {

                const d =
                    card.dataset;


                /*
                 * Your real invoice route is used by
                 * the Blade button above.
                 *
                 * This function is only kept here
                 * for compatibility with the old UI.
                 */

                showToast(
                    "Invoice: #" +
                    d.id
                );

            }


            /* =====================================================
               TRACK ORDER
            ===================================================== */

            function trackOrder(card) {

                const d =
                    card.dataset;


                showToast(
                    "Order #" +
                    d.id +
                    " is on the way"
                );


                openDetails(
                    card
                );

            }


            /* =====================================================
               BUY AGAIN
            ===================================================== */

            function buyAgain(card) {

                const d =
                    card.dataset;


                const productName =
                    d.products
                        ? d.products.split(",")[0]
                        : "Product";


                showToast(
                    productName +
                    " selected"
                );

            }


            /* =====================================================
               INITIAL
            ===================================================== */

            render();

        })();

    </script>

@endsection