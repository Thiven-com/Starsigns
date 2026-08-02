@extends('layouts.website')
@section('content')

    <!--==========================
                PAGE BANNER (shared layout component - reused as-is)
            ===========================-->

    <section class="cart-banner-section">

        <div class="container">

            <div class="cart-banner-content">

                <h1>Cart</h1>

                <div class="cart-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="cart-active">Cart</span>

                </div>

            </div>

        </div>

    </section>
    <!--==========================================
                CART PAGE CONTENT
            ===========================================-->

    <section class="cart-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="cart-page-crumb">

                <a href="/">Home</a>
                <span class="cart-page-crumb-sep">/</span>
                <span class="cart-page-crumb-active">Cart</span>

            </div>

            <!-- Title -->
            <div class="cart-page-title-wrap">

                <h2 class="cart-page-title">
                    Your Cart <span id="cartPageItemCount">(3 Items)</span>
                </h2>

                <span class="cart-page-title-divider">✦</span>

            </div>

            <div class="cart-page-layout">

                <!--=========================
                            CART TABLE
                        ==========================-->

                <div class="cart-page-table-wrap">

                    <div class="cart-page-table-head">

                        <span class="col-product">Product</span>
                        <span class="col-price">Price</span>
                        <span class="col-qty">Quantity</span>
                        <span class="col-subtotal">Subtotal</span>
                        <span class="col-action">Action</span>

                    </div>

                    <div class="cart-page-items" id="cartPageItems">

                        @php
                            $cartItems = [
                                [
                                    'id' => 1,
                                    'name' => 'Crystal Healing Bracelet',
                                    'meta' => 'Bead Size: 8mm',
                                    'type' => 'Type: Elastic Stretchable',
                                    'price' => 899,
                                    'old' => 1299,
                                    'off' => '31% OFF',
                                    'qty' => 1,
                                    'img' => 'product-1.png',
                                ],
                                [
                                    'id' => 2,
                                    'name' => '7 Mukhi Rudraksha Bracelet',
                                    'meta' => 'Bead Size: 8mm',
                                    'type' => 'Type: Elastic Stretchable',
                                    'price' => 1199,
                                    'old' => 1799,
                                    'off' => '33% OFF',
                                    'qty' => 1,
                                    'img' => 'product-2.png',
                                ],
                                [
                                    'id' => 3,
                                    'name' => 'Rose Quartz Bracelet',
                                    'meta' => 'Bead Size: 8mm',
                                    'type' => 'Type: Elastic Stretchable',
                                    'price' => 699,
                                    'old' => 999,
                                    'off' => '30% OFF',
                                    'qty' => 1,
                                    'img' => 'product-1.png',
                                ],
                            ];
                        @endphp

                        @foreach($cartItems as $item)
                            <div class="cart-page-row" data-id="{{ $item['id'] }}" data-price="{{ $item['price'] }}">

                                <div class="col-product">

                                    <div class="cart-page-thumb">
                                        <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">
                                    </div>

                                    <div class="cart-page-pinfo">

                                        <h4>{{ $item['name'] }}</h4>

                                        <span class="cart-page-stock">
                                            <i class="fa-solid fa-circle"></i> In Stock
                                        </span>

                                        <span class="cart-page-meta">{{ $item['meta'] }}</span>
                                        <span class="cart-page-meta">{{ $item['type'] }}</span>

                                    </div>

                                </div>

                                <div class="col-price">

                                    <span class="cart-page-price-now">₹{{ number_format($item['price']) }}</span>
                                    <span class="cart-page-price-old">₹{{ number_format($item['old']) }}</span>

                                </div>

                                <div class="col-qty">

                                    <div class="cart-page-qty-box">

                                        <button type="button" class="cart-page-qty-dec">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>

                                        <input type="text" class="cart-page-qty-val" value="{{ $item['qty'] }}" readonly>

                                        <button type="button" class="cart-page-qty-inc">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>

                                    </div>

                                </div>

                                <div class="col-subtotal">

                                    <strong
                                        class="cart-page-subtotal-val">₹{{ number_format($item['price'] * $item['qty']) }}</strong>
                                    <span class="cart-page-row-off">{{ $item['off'] }}</span>

                                </div>

                                <div class="col-action">

                                    <button type="button" class="cart-page-action-btn cart-page-remove" title="Remove item">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <button type="button" class="cart-page-action-btn cart-page-save" title="Save for later">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <!-- Empty state (hidden by default) -->
                    <div class="cart-page-empty" id="cartPageEmpty">

                        <i class="fa-solid fa-basket-shopping"></i>
                        <p>Your cart is empty</p>
                        <a href="/shop" class="cart-page-btn-outline">Continue Shopping</a>

                    </div>

                    <div class="cart-page-table-actions">

                        <a href="/shop" class="cart-page-btn-outline">
                            <i class="fa-solid fa-arrow-left"></i>
                            Continue Shopping
                        </a>

                        <button type="button" class="cart-page-btn-outline cart-page-btn-purple" id="cartPageUpdateBtn">
                            <i class="fa-solid fa-rotate"></i>
                            Update Cart
                        </button>

                    </div>

                </div>

                <!--=========================
                            ORDER SUMMARY
                        ==========================-->

                <aside class="cart-page-summary">

                    <h3>
                        Order Summary
                        <span class="cart-page-summary-divider">✦</span>
                    </h3>

                    <div class="cart-page-summary-row">
                        <span>Subtotal (<span id="cartPageSummaryCount">3</span> Items)</span>
                        <span id="cartPageSubtotal">₹2,797</span>
                    </div>

                    <div class="cart-page-summary-row">
                        <span>Discount</span>
                        <span class="cart-page-discount" id="cartPageDiscount">-₹798</span>
                    </div>

                    <div class="cart-page-summary-row">
                        <span>
                            Shipping
                            <i class="fa-regular fa-circle-question" title="Free shipping on all orders above ₹999"></i>
                        </span>
                        <span class="cart-page-free">FREE</span>
                    </div>

                    <div class="cart-page-summary-total">

                        <span>Total</span>
                        <div class="cart-page-total-right">
                            <strong id="cartPageTotal">₹1,999</strong>
                            <span class="cart-page-saved">
                                <i class="fa-solid fa-thumbs-up"></i>
                                You saved <span id="cartPageSavedAmt">₹798</span> on this order
                            </span>
                        </div>

                    </div>

                    <div class="cart-page-coupon-label">
                        <i class="fa-solid fa-ticket"></i>
                        Have a coupon code?
                    </div>

                    <div class="cart-page-coupon-row">

                        <input type="text" id="cartPageCouponInput" placeholder="Enter coupon code">

                        <button type="button" id="cartPageApplyBtn">Apply</button>

                    </div>

                    <div class="cart-page-coupon-msg" id="cartPageCouponMsg"></div>

                    <button type="button" class="cart-page-checkout-btn" id="cartPageCheckoutBtn">
                        <i class="fa-solid fa-lock"></i>
                        Proceed to Checkout
                    </button>

                    <button type="button" class="cart-page-secure-btn">
                        <i class="fa-solid fa-shield-halved"></i>
                        Secure Checkout
                    </button>

                    <div class="cart-page-perks">

                        <div class="cart-page-perk">
                            <span><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <div class="t">Free Shipping</div>
                                <div class="s">On orders above ₹999</div>
                            </div>
                        </div>

                        <div class="cart-page-perk">
                            <span><i class="fa-solid fa-lock"></i></span>
                            <div>
                                <div class="t">Secure Payment</div>
                                <div class="s">100% safe & secure</div>
                            </div>
                        </div>

                        <div class="cart-page-perk">
                            <span><i class="fa-solid fa-headset"></i></span>
                            <div>
                                <div class="t">Easy Returns</div>
                                <div class="s">7 days return policy</div>
                            </div>
                        </div>

                    </div>

                </aside>

            </div>

            <!--=========================
                        RELATED PRODUCTS CAROUSEL
                    ==========================-->

            <div class="cart-page-related-title-wrap">

                <span class="cart-page-related-divider">✦</span>
                <h2>You May Also Like</h2>
                <span class="cart-page-related-divider">✦</span>

            </div>

            <div class="cart-page-related-wrap">

                <button type="button" class="cart-page-carousel-btn prev" id="cartPagePrevBtn">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="cart-page-related-track" id="cartPageRelatedTrack">

                    @php
                        $related = [
                            ['name' => 'Black Obsidian Bracelet', 'rating' => 4.5, 'reviews' => 98, 'price' => 799, 'old' => 1099, 'off' => '27% OFF', 'badge' => 'Sale', 'img' => 'product-1.png'],
                            ['name' => 'Moonstone Bracelet', 'rating' => 4.6, 'reviews' => 76, 'price' => 1299, 'old' => 1899, 'off' => '32% OFF', 'img' => 'product-2.png'],
                            ['name' => 'Tiger Eye Bracelet', 'rating' => 4.6, 'reviews' => 140, 'price' => 999, 'old' => 1499, 'off' => '33% OFF', 'badge' => 'Best Seller', 'img' => 'product-1.png'],
                            ['name' => '7 Chakra Bracelet', 'rating' => 4.5, 'reviews' => 78, 'price' => 899, 'old' => 1299, 'off' => '31% OFF', 'img' => 'product-2.png'],
                            ['name' => 'Green Aventurine Bracelet', 'rating' => 4.4, 'reviews' => 65, 'price' => 699, 'old' => 999, 'off' => '30% OFF', 'img' => 'product-1.png'],
                            ['name' => '5 Mukhi Rudraksha Bracelet', 'rating' => 4.7, 'reviews' => 111, 'price' => 1099, 'old' => 1699, 'off' => '35% OFF', 'img' => 'product-2.png'],
                        ];
                    @endphp

                    @foreach($related as $item)
                        <div class="cart-page-rcard">

                            @if(isset($item['badge']))
                                <span
                                    class="cart-page-rtag {{ $item['badge'] == 'Sale' ? 'sale' : 'best' }}">{{ $item['badge'] }}</span>
                            @endif

                            <div class="cart-page-rimg">
                                <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">
                            </div>

                            <div class="cart-page-rbody">

                                <p class="cart-page-rname">{{ $item['name'] }}</p>

                                <div class="cart-page-rrating">
                                    <i class="fa-solid fa-star"></i>
                                    {{ $item['rating'] }}
                                    <span>({{ $item['reviews'] }})</span>
                                </div>

                                <div class="cart-page-rprice-row">

                                    <div class="cart-page-rprice">
                                        <span class="now">₹{{ $item['price'] }}</span>
                                        <span class="old">₹{{ $item['old'] }}</span>
                                    </div>

                                    <button type="button" class="cart-page-radd-btn" title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>

                                </div>

                                <span class="cart-page-roff">{{ $item['off'] }}</span>

                            </div>

                        </div>
                    @endforeach

                </div>

                <button type="button" class="cart-page-carousel-btn next" id="cartPageNextBtn">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

            </div>

        </div>

    </section>

    <script>
        (function () {

            const itemsWrap = document.getElementById("cartPageItems");
            const emptyState = document.getElementById("cartPageEmpty");
            const subtotalEl = document.getElementById("cartPageSubtotal");
            const discountEl = document.getElementById("cartPageDiscount");
            const totalEl = document.getElementById("cartPageTotal");
            const savedEl = document.getElementById("cartPageSavedAmt");
            const countEl = document.getElementById("cartPageItemCount");
            const summaryCountEl = document.getElementById("cartPageSummaryCount");

            const FREE_SHIP_THRESHOLD = 999;

            function formatINR(num) {
                return "₹" + Math.round(num).toLocaleString("en-IN");
            }

            // Recalculate every row's subtotal + the whole order summary
            function recalculate() {

                const rows = itemsWrap.querySelectorAll(".cart-page-row");
                let subtotal = 0;
                let originalTotal = 0;
                let itemCount = 0;

                rows.forEach(row => {

                    const price = parseFloat(row.dataset.price);
                    const qty = parseInt(row.querySelector(".cart-page-qty-val").value, 10);
                    const rowSubtotal = price * qty;

                    row.querySelector(".cart-page-subtotal-val").textContent = formatINR(rowSubtotal);

                    subtotal += rowSubtotal;
                    itemCount += qty;
                });

                // Discount is derived from each item's original "off %" baked into the row;
                // for simplicity we recompute using the ratio already shown, based on price vs displayed old price
                let discount = 0;
                rows.forEach(row => {
                    const oldPriceText = row.querySelector(".cart-page-price-old");
                    if (oldPriceText) {
                        const oldPrice = parseFloat(oldPriceText.textContent.replace(/[₹,]/g, ""));
                        const price = parseFloat(row.dataset.price);
                        const qty = parseInt(row.querySelector(".cart-page-qty-val").value, 10);
                        discount += (oldPrice - price) * qty;
                    }
                });

                const total = subtotal;

                subtotalEl.textContent = formatINR(subtotal);
                discountEl.textContent = "-" + formatINR(discount);
                totalEl.textContent = formatINR(total);
                savedEl.textContent = formatINR(discount);
                countEl.textContent = "(" + itemCount + " Items)";
                summaryCountEl.textContent = itemCount;

                // Empty cart state toggle
                if (rows.length === 0) {
                    itemsWrap.style.display = "none";
                    emptyState.style.display = "flex";
                } else {
                    itemsWrap.style.display = "flex";
                    emptyState.style.display = "none";
                }
            }

            // Quantity steppers (event delegation)
            itemsWrap.addEventListener("click", function (e) {

                const row = e.target.closest(".cart-page-row");
                if (!row) return;

                const qtyInput = row.querySelector(".cart-page-qty-val");
                let qty = parseInt(qtyInput.value, 10);

                if (e.target.closest(".cart-page-qty-inc")) {
                    qty++;
                    qtyInput.value = qty;
                    recalculate();
                }

                if (e.target.closest(".cart-page-qty-dec")) {
                    if (qty > 1) {
                        qty--;
                        qtyInput.value = qty;
                        recalculate();
                    }
                }

                if (e.target.closest(".cart-page-remove")) {
                    row.style.opacity = "0";
                    row.style.transform = "translateX(20px)";
                    setTimeout(() => {
                        row.remove();
                        recalculate();
                    }, 200);
                }

                if (e.target.closest(".cart-page-save")) {
                    const btn = e.target.closest(".cart-page-save");
                    const icon = btn.querySelector("i");
                    icon.classList.toggle("fa-regular");
                    icon.classList.toggle("fa-solid");
                    btn.classList.toggle("active");
                }

            });

            // Update Cart button - re-runs calculation with a small visual confirmation
            document.getElementById("cartPageUpdateBtn").addEventListener("click", function () {
                recalculate();
                const btn = this;
                const original = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Updated';
                setTimeout(() => { btn.innerHTML = original; }, 1200);
            });

            // Coupon apply
            document.getElementById("cartPageApplyBtn").addEventListener("click", function () {

                const input = document.getElementById("cartPageCouponInput");
                const msg = document.getElementById("cartPageCouponMsg");
                const code = input.value.trim().toUpperCase();

                if (!code) {
                    msg.textContent = "Please enter a coupon code.";
                    msg.className = "cart-page-coupon-msg error";
                    return;
                }

                if (code === "ASTRO10") {
                    msg.textContent = "Coupon applied successfully!";
                    msg.className = "cart-page-coupon-msg success";
                } else {
                    msg.textContent = "Invalid or expired coupon code.";
                    msg.className = "cart-page-coupon-msg error";
                }
            });

            // Proceed to checkout
            document.getElementById("cartPageCheckoutBtn").addEventListener("click", function () {
                window.location.href = "/checkout";
            });

            // Related products carousel
            const track = document.getElementById("cartPageRelatedTrack");
            const prevBtn = document.getElementById("cartPagePrevBtn");
            const nextBtn = document.getElementById("cartPageNextBtn");

            function scrollAmount() {
                const card = track.querySelector(".cart-page-rcard");
                return card ? card.offsetWidth + 18 : 260;
            }

            prevBtn.addEventListener("click", () => {
                track.scrollBy({ left: -scrollAmount() * 2, behavior: "smooth" });
            });

            nextBtn.addEventListener("click", () => {
                track.scrollBy({ left: scrollAmount() * 2, behavior: "smooth" });
            });

            // Add-to-cart buttons on related cards (demo feedback only)
            track.addEventListener("click", function (e) {
                const addBtn = e.target.closest(".cart-page-radd-btn");
                if (!addBtn) return;
                const icon = addBtn.querySelector("i");
                icon.classList.remove("fa-cart-shopping");
                icon.classList.add("fa-check");
                setTimeout(() => {
                    icon.classList.remove("fa-check");
                    icon.classList.add("fa-cart-shopping");
                }, 1000);
            });

            // Initial calculation on load
            recalculate();

        })();
    </script>

@endsection