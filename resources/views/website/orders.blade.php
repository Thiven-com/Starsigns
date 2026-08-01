@extends('layouts.website')
@section('content')

    <!--==========================
                PAGE BANNER (shared layout component - reused as-is)
            ===========================-->

    <section class="page-banner">

        <div class="container">

            <div class="page-banner-content">

                <h1>My Orders</h1>

                <div class="breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <a href="/account">My Account</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">My Orders</span>

                </div>

            </div>

        </div>

    </section>


    <!--==========================================
                ORDERS PAGE CONTENT
            ===========================================-->

    <section class="orders-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="orders-page-crumb">

                <a href="/">Home</a>
                <span class="orders-page-crumb-sep">/</span>
                <a href="/account" class="orders-page-crumb-link">My Account</a>
                <span class="orders-page-crumb-sep">/</span>
                <span class="orders-page-crumb-active">My Orders</span>

            </div>

            <div class="orders-page-layout">

                <!--=========================
                            ACCOUNT SIDEBAR
                        ==========================-->

                <!-- <aside class="orders-page-sidebar">

                    <div class="orders-page-profile-card">

                        <div class="orders-page-avatar">
                            <img src="{{ asset('website') }}/images/user-avatar.png" alt="Priya Sharma">
                        </div>

                        <div class="orders-page-profile-info">
                            <h4>Hello, Priya Sharma</h4>
                            <p>priya.sharma@email.com</p>
                        </div>

                        <button type="button" class="orders-page-edit-btn" id="ordersPageEditProfileBtn"
                            title="Edit profile">
                            <i class="fa-solid fa-pen"></i>
                        </button>

                    </div>

                    <nav class="orders-page-account-nav">

                        <a href="/account/dashboard" class="orders-page-nav-item">
                            <i class="fa-solid fa-table-cells-large"></i> Dashboard
                        </a>

                        <a href="/account/profile" class="orders-page-nav-item">
                            <i class="fa-solid fa-user"></i> Profile Information
                        </a>

                        <a href="/account/address" class="orders-page-nav-item">
                            <i class="fa-solid fa-location-dot"></i> Address Book
                        </a>

                        <a href="/account/orders" class="orders-page-nav-item active">
                            <i class="fa-solid fa-bag-shopping"></i> My Orders
                        </a>

                        <a href="/wishlist" class="orders-page-nav-item">
                            <i class="fa-solid fa-heart"></i> Wishlist
                        </a> -->

                        <!-- <a href="/account/consultations" class="orders-page-nav-item">
                            <i class="fa-solid fa-calendar-days"></i> My Consultations
                        </a>

                        <a href="/account/coupons" class="orders-page-nav-item">
                            <i class="fa-solid fa-ticket"></i> Coupons
                        </a>

                        <a href="/account/payment-methods" class="orders-page-nav-item">
                            <i class="fa-solid fa-credit-card"></i> Payment Methods
                        </a>

                        <a href="/account/notifications" class="orders-page-nav-item">
                            <i class="fa-solid fa-bell"></i> Notifications
                        </a> -->
<!-- 
                        <a href="/logout" class="orders-page-nav-item" id="ordersPageLogoutLink">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>

                    </nav>

                    <div class="orders-page-refer-card">

                        <div class="orders-page-refer-icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>

                        <div class="orders-page-refer-text">
                            <h5>Refer & Earn</h5>
                            <p>Refer your friends and get <strong>₹200 StarSings Credits</strong></p>
                        </div>

                        <button type="button" class="orders-page-refer-arrow" id="ordersPageReferBtn"
                            title="Refer and earn">
                            <i class="fa-solid fa-arrow-right"></i>
                        </button>

                    </div>

                </aside> -->

                <!--=========================
                            ORDERS MAIN CONTENT
                        ==========================-->

                <div class="orders-page-main">

                    <div class="orders-page-title-wrap">

                        <h2 class="orders-page-title">My Orders</h2>

                        <span class="orders-page-title-divider">✦</span>

                    </div>

                    @php
                        $orders = [
                            [
                                'id' => 'AV78945',
                                'date' => 'May 18, 2024',
                                'time' => '10:30 AM',
                                'items' => 3,
                                'price' => 1999,
                                'method' => 'Online Payment',
                                'status' => 'delivered',
                                'status_label' => 'Delivered on',
                                'status_date' => 'May 21, 2024',
                                'products' => 'Amethyst Bracelet, Rose Quartz Mala, Sphatik Pendant',
                                'img' => 'product-1.png',
                            ],
                            [
                                'id' => 'AV78432',
                                'date' => 'May 12, 2024',
                                'time' => '06:15 PM',
                                'items' => 2,
                                'price' => 1199,
                                'method' => 'UPI Payment',
                                'status' => 'shipped',
                                'status_label' => 'Expected Delivery',
                                'status_date' => 'May 24, 2024',
                                'products' => 'Tiger Eye Bracelet, Rudraksha Beads',
                                'img' => 'product-2.png',
                            ],
                            [
                                'id' => 'AV77221',
                                'date' => 'May 05, 2024',
                                'time' => '11:20 AM',
                                'items' => 1,
                                'price' => 699,
                                'method' => 'Credit Card',
                                'status' => 'processing',
                                'status_label' => 'Order Confirmed',
                                'status_date' => 'May 05, 2024',
                                'products' => 'Rose Quartz Bracelet',
                                'img' => 'product-1.png',
                            ],
                            [
                                'id' => 'AV76411',
                                'date' => 'Apr 28, 2024',
                                'time' => '02:45 PM',
                                'items' => 2,
                                'price' => 1598,
                                'method' => 'Net Banking',
                                'status' => 'delivered',
                                'status_label' => 'Delivered on',
                                'status_date' => 'May 01, 2024',
                                'products' => 'Chakra Healing Bracelet, Navratna Ring',
                                'img' => 'product-2.png',
                            ],
                            [
                                'id' => 'AV75890',
                                'date' => 'Apr 20, 2024',
                                'time' => '09:10 AM',
                                'items' => 1,
                                'price' => 699,
                                'method' => 'COD Payment',
                                'status' => 'delivered',
                                'status_label' => 'Delivered on',
                                'status_date' => 'Apr 23, 2024',
                                'products' => 'Green Jade Bracelet',
                                'img' => 'product-1.png',
                            ],
                            [
                                'id' => 'AV74821',
                                'date' => 'Apr 10, 2024',
                                'time' => '04:30 PM',
                                'items' => 2,
                                'price' => 1299,
                                'method' => 'UPI Payment',
                                'status' => 'cancelled',
                                'status_label' => 'Cancelled on',
                                'status_date' => 'Apr 11, 2024',
                                'products' => 'Black Onyx Bracelet, Evil Eye Pendant',
                                'img' => 'product-2.png',
                            ],
                        ];

                        $statusMeta = [
                            'delivered' => ['label' => 'Delivered', 'class' => 'orders-page-status-delivered', 'icon' => 'fa-circle-check'],
                            'shipped' => ['label' => 'Shipped', 'class' => 'orders-page-status-shipped', 'icon' => 'fa-truck'],
                            'processing' => ['label' => 'Processing', 'class' => 'orders-page-status-processing', 'icon' => 'fa-clock'],
                            'cancelled' => ['label' => 'Cancelled', 'class' => 'orders-page-status-cancelled', 'icon' => 'fa-circle-xmark'],
                        ];

                        $counts = [
                            'all' => count($orders),
                            'processing' => count(array_filter($orders, fn($o) => $o['status'] === 'processing')),
                            'shipped' => count(array_filter($orders, fn($o) => $o['status'] === 'shipped')),
                            'delivered' => count(array_filter($orders, fn($o) => $o['status'] === 'delivered')),
                            'cancelled' => count(array_filter($orders, fn($o) => $o['status'] === 'cancelled')),
                            'returned' => 0,
                        ];
                    @endphp

                    <!--=========================
                                STATUS TABS
                            ==========================-->

                    <div class="orders-page-tabs" id="ordersPageTabs">

                        <button type="button" class="orders-page-tab active" data-filter="all">
                            All Orders <span>({{ $counts['all'] }})</span>
                        </button>

                        <button type="button" class="orders-page-tab" data-filter="processing">
                            Processing <span>({{ $counts['processing'] }})</span>
                        </button>

                        <button type="button" class="orders-page-tab" data-filter="shipped">
                            Shipped <span>({{ $counts['shipped'] }})</span>
                        </button>

                        <button type="button" class="orders-page-tab" data-filter="delivered">
                            Delivered <span>({{ $counts['delivered'] }})</span>
                        </button>

                        <button type="button" class="orders-page-tab" data-filter="cancelled">
                            Cancelled <span>({{ $counts['cancelled'] }})</span>
                        </button>

                        <button type="button" class="orders-page-tab" data-filter="returned">
                            Returned <span>({{ $counts['returned'] }})</span>
                        </button>

                    </div>

                    <!--=========================
                                TOOLBAR: SEARCH + FILTER
                            ==========================-->

                    <div class="orders-page-toolbar">

                        <div class="orders-page-search-box">

                            <input type="text" id="ordersPageSearchInput" placeholder="Search by Order ID, Product...">

                            <button type="button" id="ordersPageSearchBtn" title="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>

                        </div>

                        <button type="button" class="orders-page-filter-btn" id="ordersPageFilterBtn">
                            <i class="fa-solid fa-filter"></i> Filter
                        </button>

                        <div class="orders-page-filter-panel" id="ordersPageFilterPanel">

                            <div class="orders-page-filter-group">
                                <label for="ordersPageSortSelect">Sort by</label>
                                <select id="ordersPageSortSelect">
                                    <option value="newest">Newest First</option>
                                    <option value="oldest">Oldest First</option>
                                    <option value="price-high">Price: High to Low</option>
                                    <option value="price-low">Price: Low to High</option>
                                </select>
                            </div>

                            <div class="orders-page-filter-group">
                                <label for="ordersPagePaymentSelect">Payment Method</label>
                                <select id="ordersPagePaymentSelect">
                                    <option value="">All</option>
                                    <option value="Online Payment">Online Payment</option>
                                    <option value="UPI Payment">UPI Payment</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="Net Banking">Net Banking</option>
                                    <option value="COD Payment">COD Payment</option>
                                </select>
                            </div>

                            <button type="button" class="orders-page-filter-apply"
                                id="ordersPageApplyFilterBtn">Apply</button>
                            <button type="button" class="orders-page-filter-reset"
                                id="ordersPageResetFilterBtn">Reset</button>

                        </div>

                    </div>

                    <!--=========================
                                ORDERS LIST
                            ==========================-->

                    <div class="orders-page-list" id="ordersPageList">

                        @foreach($orders as $order)

                            @php $meta = $statusMeta[$order['status']]; @endphp

                            <div class="orders-page-card" data-id="{{ $order['id'] }}" data-status="{{ $order['status'] }}"
                                data-price="{{ $order['price'] }}" data-method="{{ $order['method'] }}"
                                data-products="{{ $order['products'] }}" data-date="{{ $order['date'] }}"
                                data-time="{{ $order['time'] }}" data-status-label="{{ $order['status_label'] }}"
                                data-status-date="{{ $order['status_date'] }}" data-items="{{ $order['items'] }}">

                                <div class="orders-page-card-thumb">
                                    <img src="{{ asset('website') }}/images/{{ $order['img'] }}" alt="Order {{ $order['id'] }}">
                                </div>

                                <div class="orders-page-card-id">
                                    <span class="orders-page-label">Order ID</span>
                                    <span class="orders-page-id">#{{ $order['id'] }}</span>
                                    <span class="orders-page-date">{{ $order['date'] }} &bull; {{ $order['time'] }}</span>
                                </div>

                                <div class="orders-page-card-items">
                                    <span class="orders-page-count">{{ $order['items'] }}
                                        Item{{ $order['items'] > 1 ? 's' : '' }}</span>
                                    <span class="orders-page-price">₹{{ number_format($order['price']) }}</span>
                                    <span class="orders-page-method">{{ $order['method'] }}</span>
                                </div>

                                <div class="orders-page-card-status">

                                    <span class="orders-page-status-badge {{ $meta['class'] }}">
                                        <i class="fa-solid {{ $meta['icon'] }}"></i> {{ $meta['label'] }}
                                    </span>

                                    <span class="orders-page-status-sub">{{ $order['status_label'] }}</span>
                                    <span class="orders-page-status-date">{{ $order['status_date'] }}</span>

                                </div>

                                <div class="orders-page-card-actions">

                                    <button type="button" class="orders-page-view-btn" data-action="view">
                                        View Details
                                    </button>

                                    @if($order['status'] === 'delivered')
                                        <button type="button" class="orders-page-action-link" data-action="invoice">
                                            <i class="fa-solid fa-download"></i> Download Invoice
                                        </button>
                                    @elseif($order['status'] === 'shipped')
                                        <button type="button" class="orders-page-action-link orders-page-track" data-action="track">
                                            <i class="fa-solid fa-location-dot"></i> Track Order
                                        </button>
                                    @elseif($order['status'] === 'processing')
                                        <button type="button" class="orders-page-action-link orders-page-danger"
                                            data-action="cancel">
                                            <i class="fa-solid fa-ban"></i> Cancel Order
                                        </button>
                                    @elseif($order['status'] === 'cancelled')
                                        <button type="button" class="orders-page-action-link" data-action="buyagain">
                                            <i class="fa-solid fa-rotate"></i> Buy Again
                                        </button>
                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <!-- Empty state (hidden by default) -->
                    <div class="orders-page-empty" id="ordersPageEmpty">

                        <i class="fa-solid fa-bag-shopping"></i>
                        <p>No orders match this view</p>
                        <a href="/shop" class="orders-page-empty-btn">Start Shopping</a>

                    </div>

                    <!--=========================
                                PAGINATION
                            ==========================-->

                    <div class="orders-page-pagination" id="ordersPagePagination">

                        <button type="button" class="orders-page-page-btn orders-page-page-nav" id="ordersPagePrevBtn"
                            title="Previous page">
                            <i class="fa-solid fa-chevron-left"></i>
                        </button>

                        <button type="button" class="orders-page-page-btn orders-page-page-num active"
                            data-page="1">1</button>
                        <button type="button" class="orders-page-page-btn orders-page-page-num" data-page="2">2</button>

                        <button type="button" class="orders-page-page-btn orders-page-page-nav" id="ordersPageNextBtn"
                            title="Next page">
                            <i class="fa-solid fa-chevron-right"></i>
                        </button>

                    </div>

                    <p class="orders-page-showing-text" id="ordersPageShowingText">Showing 1 to 6 of 6 orders</p>

                </div>

            </div>

        </div>

    </section>

    <!--=========================
                ORDER DETAILS MODAL
            ==========================-->

    <div class="orders-page-modal-overlay" id="ordersPageModalOverlay">

        <div class="orders-page-modal">

            <button type="button" class="orders-page-modal-close" id="ordersPageModalClose" title="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <div id="ordersPageModalBody"></div>

        </div>

    </div>

    <!-- Toast -->
    <div class="orders-page-toast" id="ordersPageToast"></div>

    <script>
        (function () {

            const list = document.getElementById("ordersPageList");
            const emptyState = document.getElementById("ordersPageEmpty");
            const tabs = document.querySelectorAll(".orders-page-tab");
            const searchInput = document.getElementById("ordersPageSearchInput");
            const searchBtn = document.getElementById("ordersPageSearchBtn");
            const filterBtn = document.getElementById("ordersPageFilterBtn");
            const filterPanel = document.getElementById("ordersPageFilterPanel");
            const sortSelect = document.getElementById("ordersPageSortSelect");
            const paymentSelect = document.getElementById("ordersPagePaymentSelect");
            const applyFilterBtn = document.getElementById("ordersPageApplyFilterBtn");
            const resetFilterBtn = document.getElementById("ordersPageResetFilterBtn");
            const showingText = document.getElementById("ordersPageShowingText");
            const prevBtn = document.getElementById("ordersPagePrevBtn");
            const nextBtn = document.getElementById("ordersPageNextBtn");
            const pagination = document.getElementById("ordersPagePagination");
            const modalOverlay = document.getElementById("ordersPageModalOverlay");
            const modalBody = document.getElementById("ordersPageModalBody");
            const modalClose = document.getElementById("ordersPageModalClose");
            const toast = document.getElementById("ordersPageToast");

            const allCards = Array.from(list.querySelectorAll(".orders-page-card"));
            const perPage = 6;

            let state = {
                filter: "all",
                search: "",
                payment: "",
                sort: "newest",
                page: 1
            };

            /* -----------------------------------
               Toast helper
            ----------------------------------- */
            let toastTimer;
            function showToast(msg) {
                toast.textContent = msg;
                toast.classList.add("show");
                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => toast.classList.remove("show"), 2600);
            }

            /* -----------------------------------
               Filter + search + sort
            ----------------------------------- */
            function getFilteredCards() {

                let cards = allCards.slice();

                if (state.filter !== "all") {
                    cards = cards.filter(c => c.dataset.status === state.filter);
                }

                if (state.search.trim()) {
                    const q = state.search.trim().toLowerCase();
                    cards = cards.filter(c =>
                        c.dataset.id.toLowerCase().includes(q) ||
                        c.dataset.products.toLowerCase().includes(q)
                    );
                }

                if (state.payment) {
                    cards = cards.filter(c => c.dataset.method === state.payment);
                }

                cards.sort((a, b) => {
                    if (state.sort === "price-high") return b.dataset.price - a.dataset.price;
                    if (state.sort === "price-low") return a.dataset.price - b.dataset.price;
                    // date-based sort relies on original DOM order (already newest -> oldest)
                    const aIndex = allCards.indexOf(a);
                    const bIndex = allCards.indexOf(b);
                    return state.sort === "oldest" ? bIndex - aIndex : aIndex - bIndex;
                });

                return cards;
            }

            function render() {

                const filtered = getFilteredCards();
                const totalPages = Math.max(1, Math.ceil(filtered.length / perPage));
                if (state.page > totalPages) state.page = totalPages;

                const start = (state.page - 1) * perPage;
                const pageCards = filtered.slice(start, start + perPage);

                // hide all, then show + reorder the current page's cards
                allCards.forEach(c => (c.style.display = "none"));
                pageCards.forEach(c => {
                    c.style.display = "";
                    list.appendChild(c);
                });

                emptyState.style.display = filtered.length === 0 ? "flex" : "none";
                list.style.display = filtered.length === 0 ? "none" : "grid";

                showingText.textContent = filtered.length
                    ? `Showing ${start + 1} to ${Math.min(start + perPage, filtered.length)} of ${filtered.length} orders`
                    : "Showing 0 of 0 orders";

                renderPagination(totalPages);
            }

            function renderPagination(totalPages) {

                pagination.querySelectorAll(".orders-page-page-num").forEach(b => b.remove());

                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement("button");
                    btn.type = "button";
                    btn.className = "orders-page-page-btn orders-page-page-num" + (i === state.page ? " active" : "");
                    btn.dataset.page = i;
                    btn.textContent = i;
                    btn.addEventListener("click", () => {
                        state.page = i;
                        render();
                        list.scrollIntoView({ behavior: "smooth", block: "start" });
                    });
                    pagination.insertBefore(btn, nextBtn);
                }

                prevBtn.disabled = state.page <= 1;
                nextBtn.disabled = state.page >= totalPages;
            }

            /* -----------------------------------
               Tabs
            ----------------------------------- */
            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    tabs.forEach(t => t.classList.remove("active"));
                    tab.classList.add("active");
                    state.filter = tab.dataset.filter;
                    state.page = 1;
                    render();
                });
            });

            /* -----------------------------------
               Search
            ----------------------------------- */
            function runSearch() {
                state.search = searchInput.value;
                state.page = 1;
                render();
            }
            searchBtn.addEventListener("click", runSearch);
            searchInput.addEventListener("keydown", e => { if (e.key === "Enter") runSearch(); });
            searchInput.addEventListener("input", () => { if (searchInput.value === "") runSearch(); });

            /* -----------------------------------
               Filter panel
            ----------------------------------- */
            filterBtn.addEventListener("click", e => {
                e.stopPropagation();
                filterPanel.classList.toggle("open");
                filterBtn.classList.toggle("active");
            });

            document.addEventListener("click", e => {
                if (!filterPanel.contains(e.target) && e.target !== filterBtn && !filterBtn.contains(e.target)) {
                    filterPanel.classList.remove("open");
                    filterBtn.classList.remove("active");
                }
            });

            applyFilterBtn.addEventListener("click", () => {
                state.sort = sortSelect.value;
                state.payment = paymentSelect.value;
                state.page = 1;
                render();
                filterPanel.classList.remove("open");
                filterBtn.classList.remove("active");
                showToast("Filters applied");
            });

            resetFilterBtn.addEventListener("click", () => {
                sortSelect.value = "newest";
                paymentSelect.value = "";
                state.sort = "newest";
                state.payment = "";
                state.page = 1;
                render();
            });

            /* -----------------------------------
               Pagination prev/next
            ----------------------------------- */
            prevBtn.addEventListener("click", () => {
                if (state.page > 1) {
                    state.page--;
                    render();
                    list.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });

            nextBtn.addEventListener("click", () => {
                const totalPages = Math.max(1, Math.ceil(getFilteredCards().length / perPage));
                if (state.page < totalPages) {
                    state.page++;
                    render();
                    list.scrollIntoView({ behavior: "smooth", block: "start" });
                }
            });

            /* -----------------------------------
               Card actions (delegation)
            ----------------------------------- */
            list.addEventListener("click", e => {

                const card = e.target.closest(".orders-page-card");
                if (!card) return;

                const viewBtn = e.target.closest('[data-action="view"]');
                if (viewBtn) return openDetails(card);

                const invoiceBtn = e.target.closest('[data-action="invoice"]');
                if (invoiceBtn) return downloadInvoice(card);

                const trackBtn = e.target.closest('[data-action="track"]');
                if (trackBtn) return trackOrder(card);

                const cancelBtn = e.target.closest('[data-action="cancel"]');
                if (cancelBtn) return cancelOrder(card);

                const buyAgainBtn = e.target.closest('[data-action="buyagain"]');
                if (buyAgainBtn) return buyAgain(card);

            });

            function openDetails(card) {

                const d = card.dataset;
                const badge = card.querySelector(".orders-page-status-badge").outerHTML;

                modalBody.innerHTML = `
                        <h3>Order #${d.id}</h3>
                        <p class="orders-page-modal-sub">${d.products}</p>
                        <div class="orders-page-modal-row"><span>Status</span>${badge}</div>
                        <div class="orders-page-modal-row"><span>Order Date</span><span>${d.date}, ${d.time}</span></div>
                        <div class="orders-page-modal-row"><span>Items</span><span>${d.items}</span></div>
                        <div class="orders-page-modal-row"><span>Total Amount</span><span>₹${Number(d.price).toLocaleString('en-IN')}</span></div>
                        <div class="orders-page-modal-row"><span>Payment Method</span><span>${d.method}</span></div>
                        <div class="orders-page-modal-row"><span>${d.statusLabel}</span><span>${d.statusDate}</span></div>
                    `;
                modalOverlay.classList.add("open");
            }

            modalClose.addEventListener("click", () => modalOverlay.classList.remove("open"));
            modalOverlay.addEventListener("click", e => {
                if (e.target === modalOverlay) modalOverlay.classList.remove("open");
            });
            document.addEventListener("keydown", e => {
                if (e.key === "Escape") modalOverlay.classList.remove("open");
            });

            function downloadInvoice(card) {

                const d = card.dataset;
                const content =
                    "ASTROVANI - TAX INVOICE\n" +
                    "========================\n" +
                    "Order ID: #" + d.id + "\n" +
                    "Date: " + d.date + ", " + d.time + "\n" +
                    "Items: " + d.products + "\n" +
                    "Payment Method: " + d.method + "\n" +
                    "Total: Rs. " + Number(d.price).toLocaleString('en-IN') + "\n" +
                    "Status: Delivered on " + d.statusDate + "\n" +
                    "------------------------\n" +
                    "Thank you for shopping with AstroVani.";

                const blob = new Blob([content], { type: "text/plain" });
                const url = URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.download = "Invoice_" + d.id + ".txt";
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);

                showToast("Invoice for #" + d.id + " downloaded");
            }

            function trackOrder(card) {
                const d = card.dataset;
                showToast("Order #" + d.id + " is on the way — expected " + d.statusDate);
                openDetails(card);
            }

            function cancelOrder(card) {

                const d = card.dataset;
                if (!confirm("Cancel order #" + d.id + "? This action cannot be undone.")) return;

                card.dataset.status = "cancelled";
                card.dataset.statusLabel = "Cancelled on";
                card.dataset.statusDate = new Date().toLocaleDateString("en-US", { month: "short", day: "2-digit", year: "numeric" });

                const badge = card.querySelector(".orders-page-status-badge");
                badge.className = "orders-page-status-badge orders-page-status-cancelled";
                badge.innerHTML = '<i class="fa-solid fa-circle-xmark"></i> Cancelled';

                card.querySelector(".orders-page-status-sub").textContent = "Cancelled on";
                card.querySelector(".orders-page-status-date").textContent = card.dataset.statusDate;

                const actionsWrap = card.querySelector(".orders-page-card-actions");
                const oldLink = actionsWrap.querySelector(".orders-page-action-link");
                if (oldLink) oldLink.remove();

                const buyAgainBtn = document.createElement("button");
                buyAgainBtn.type = "button";
                buyAgainBtn.className = "orders-page-action-link";
                buyAgainBtn.setAttribute("data-action", "buyagain");
                buyAgainBtn.innerHTML = '<i class="fa-solid fa-rotate"></i> Buy Again';
                actionsWrap.appendChild(buyAgainBtn);

                showToast("Order #" + d.id + " has been cancelled");
                render();
            }

            function buyAgain(card) {
                const d = card.dataset;
                const productName = d.products.split(",")[0];
                showToast(productName + " added to cart again");
            }

            /* -----------------------------------
               Sidebar nav (visual state + logout confirm)
            ----------------------------------- */
            document.getElementById("ordersPageLogoutLink").addEventListener("click", function (e) {
                if (!confirm("Are you sure you want to log out?")) {
                    e.preventDefault();
                }
            });

            document.getElementById("ordersPageEditProfileBtn").addEventListener("click", () => {
                window.location.href = "/account/profile";
            });

            document.getElementById("ordersPageReferBtn").addEventListener("click", () => {
                window.location.href = "/account/refer";
            });

            // Initial render
            render();

        })();
    </script>

@endsection