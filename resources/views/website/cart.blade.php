@extends('layouts.website')
@section('content')

    <!--==========================
                                                                                                                            PAGE BANNER (shared layout component - reused as-is)
                                                                                                                        ===========================-->
    <section class="cart-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="cart-banner-content">

                <h1 data-aos="fade-up" data-aos-delay="200">
                    Cart
                </h1>

                <div class="cart-breadcrumb" data-aos="fade-up" data-aos-delay="400">

                    <a href="/">Home</a>

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
                    Your Cart
                    <span id="cartPageItemCount">
                        ({{ $cartItems->sum('quantity') }}
                        Items)
                    </span>
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
                    <div id="cartPageItems">
                        @forelse($cartItems as $item)

                            @php
                                $variant = $item->variant;
                                $product = $variant?->product;

                                $price = (float) $item->unit_price;

                                $oldPrice = (float) (
                                    $variant?->actual_price
                                    ?? $variant?->seller_price
                                    ?? $price
                                );

                                $quantity = (int) $item->quantity;

                                $discountAmount = max(0, $oldPrice - $price);

                                $discountPercent = $oldPrice > 0
                                    ? round(($discountAmount / $oldPrice) * 100)
                                    : 0;
                            @endphp

                            <div class="cart-page-row" data-id="{{ $item->id }}" data-price="{{ $price }}">

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

                                        @if($variant->sku)
                                            <span class="cart-page-meta">
                                                SKU: {{ $variant->sku }}
                                            </span>
                                        @endif

                                    </div>

                                </div>


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


                                <div class="col-qty">

                                    <div class="cart-page-qty-box">

                                        <button type="button" class="cart-page-qty-dec">
                                            <i class="fa-solid fa-minus"></i>
                                        </button>

                                        <input type="text" class="cart-page-qty-val" value="{{ $quantity }}" readonly>

                                        <button type="button" class="cart-page-qty-inc">
                                            <i class="fa-solid fa-plus"></i>
                                        </button>

                                    </div>

                                </div>


                                <div class="col-subtotal">

                                    <strong class="cart-page-subtotal-val">
                                        ₹{{ number_format($price * $quantity) }}
                                    </strong>

                                    @if($discountPercent > 0)

                                        <span class="cart-page-row-off">
                                            {{ $discountPercent }}% OFF
                                        </span>

                                    @endif

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

                        @empty

                            <div class="cart-page-empty">

                                <i class="fa-solid fa-basket-shopping"></i>

                                <p>Your cart is empty</p>

                                <a href="{{ route('shop') }}" class="cart-page-btn-outline">
                                    Continue Shopping
                                </a>

                            </div>

                        @endforelse
                    </div>
                    <!-- Empty state (hidden by default) -->
                    <!-- <div class="cart-page-empty" id="cartPageEmpty">

                                                                                                            <i class="fa-solid fa-basket-shopping"></i>
                                                                                                            <p>Your cart is empty</p>
                                                                                                            <a href="/shop" class="cart-page-btn-outline">Continue Shopping</a>

                                                                                                        </div> -->

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

                        <span>
                            Subtotal
                            (<span id="cartPageSummaryCount">{{ $cartItems->sum('quantity') }}</span> Items)
                        </span>

                        <span id="cartPageSubtotal">
                            ₹{{ number_format($cartItems->sum(function ($item) {
        return (float) $item->unit_price * (int) $item->quantity;
    }))

                                                                             }}
                        </span>

                    </div>

                    <div class="cart-page-summary-row">
                        <span>Discount</span>

                        <span class="cart-page-discount" id="cartPageDiscount">
                            -₹{{ number_format($cartItems->sum(function ($item) {

        $variant = $item->variant;

        $price = (float) $item->unit_price;
        $quantity = (int) $item->quantity;

        $oldPrice = (float) (
            $variant?->actual_price
            ?? $variant?->seller_price
            ?? $price
        );

        return max(0, $oldPrice - $price) * $quantity;

    })) }}
                        </span>
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

                            <strong id="cartPageTotal">
                                ₹{{ number_format($cartItems->sum(function ($item) {
        return (float) $item->unit_price * (int) $item->quantity;
    })) 
                                                                        }}
                            </strong>

                            <span class="cart-page-saved">
                                <i class="fa-solid fa-thumbs-up"></i>

                                You saved

                                <span id="cartPageSavedAmt">
                                    ₹{{ number_format($cartItems->sum(function ($item) {

        $variant = $item->variant;

        $price = (float) $item->unit_price;
        $quantity = (int) $item->quantity;

        $oldPrice = (float) (
            $variant?->actual_price
            ?? $variant?->seller_price
            ?? $price
        );

        return max(0, $oldPrice - $price) * $quantity;

    })) }}
                                </span>

                                on this order
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

                    const price = parseFloat(row.dataset.price) || 0;

                    const oldPriceText = row.querySelector(".cart-page-price-old");

                    const qty = parseInt(
                        row.querySelector(".cart-page-qty-val").value,
                        10
                    ) || 1;

                    if (oldPriceText) {

                        const oldPrice = parseFloat(
                            oldPriceText.textContent.replace(/[₹,]/g, "")
                        ) || price;

                        discount += Math.max(0, oldPrice - price) * qty;
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

                    if (emptyState) {
                        emptyState.style.display = "flex";
                    }

                } else {

                    itemsWrap.style.display = "block";

                    if (emptyState) {
                        emptyState.style.display = "none";
                    }

                }
            }


            // ADD THIS
            function updateCartQuantity(cartItemId, quantity) {

                fetch("{{ route('customer.cart.update') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        id: cartItemId,
                        quantity: quantity
                    })
                })
                    .then(response => response.json())
                    .then(data => {

                        if (!data.success) {
                            console.error("Cart update failed");
                        }

                    })
                    .catch(error => {
                        console.error("Cart update error:", error);
                    });
            }

            // Quantity, remove and save actions
            itemsWrap.addEventListener("click", function (e) {

                const row = e.target.closest(".cart-page-row");

                if (!row) return;

                const qtyInput = row.querySelector(".cart-page-qty-val");

                if (!qtyInput) return;

                let qty = parseInt(qtyInput.value, 10) || 1;


                // PLUS
                // PLUS
                if (e.target.closest(".cart-page-qty-inc")) {

                    qty++;

                    qtyInput.value = qty;

                    recalculate();

                    updateCartQuantity(row.dataset.id, qty);

                    return;
                }


                // MINUS
                // MINUS
                if (e.target.closest(".cart-page-qty-dec")) {

                    if (qty > 1) {

                        qty--;

                        qtyInput.value = qty;

                        recalculate();

                        updateCartQuantity(row.dataset.id, qty);
                    }

                    return;
                }


                // REMOVE
                if (e.target.closest(".cart-page-remove")) {

                    row.style.opacity = "0";
                    row.style.transform = "translateX(20px)";

                    setTimeout(function () {

                        row.remove();

                        recalculate();

                    }, 200);

                    return;
                }


                // SAVE FOR LATER
                if (e.target.closest(".cart-page-save")) {

                    const btn = e.target.closest(".cart-page-save");
                    const icon = btn.querySelector("i");

                    if (icon) {

                        icon.classList.toggle("fa-regular");
                        icon.classList.toggle("fa-solid");

                    }

                    btn.classList.toggle("active");

                    return;
                }

            });

            // Update Cart button - re-runs calculation with a small visual confirmation
            document.getElementById("cartPageUpdateBtn").addEventListener("click", function () {

                const btn = this;
                const original = btn.innerHTML;
                recalculate();
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Updated';
                setTimeout(function () { btn.innerHTML = original; }, 1200);
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

            // ==========================================
            // RELATED PRODUCTS CAROUSEL
            // ==========================================

            const track = document.getElementById("cartPageRelatedTrack");
            const prevBtn = document.getElementById("cartPagePrevBtn");
            const nextBtn = document.getElementById("cartPageNextBtn");

            if (track && prevBtn && nextBtn) {

                function scrollAmount() {

                    const card = track.querySelector(".cart-page-rcard");

                    return card
                        ? card.offsetWidth + 18
                        : 260;
                }

                prevBtn.addEventListener("click", function () {

                    track.scrollBy({
                        left: -scrollAmount() * 2,
                        behavior: "smooth"
                    });

                });

                nextBtn.addEventListener("click", function () {

                    track.scrollBy({
                        left: scrollAmount() * 2,
                        behavior: "smooth"
                    });

                });

                track.addEventListener("click", function (e) {

                    const addBtn = e.target.closest(".cart-page-radd-btn");

                    if (!addBtn) {
                        return;
                    }

                    const icon = addBtn.querySelector("i");

                    if (!icon) {
                        return;
                    }

                    icon.classList.remove("fa-cart-shopping");
                    icon.classList.add("fa-check");

                    setTimeout(function () {

                        icon.classList.remove("fa-check");
                        icon.classList.add("fa-cart-shopping");

                    }, 1000);

                });

            }

            // Initial calculation on load
            recalculate();

        })();
    </script>

@endsection