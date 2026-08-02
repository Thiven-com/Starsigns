@extends('layouts.website')
@section('content')

    <!--==========================
                PAGE BANNER (shared layout component - reused as-is)
            ===========================-->

    <section class="checkout-banner-section">

        <div class="container">

            <div class="checkout-banner-content">

                <h1>Checkout</h1>

                <div class="checkout-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <a href="/cart">Cart</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="checkout-active">Checkout</span>

                </div>

            </div>

        </div>

    </section>


    <!--==========================================
                CHECKOUT PAGE CONTENT
            ===========================================-->

    <section class="checkout-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="checkout-page-crumb">

                <a href="/">Home</a>
                <span class="checkout-page-crumb-sep">/</span>
                <a href="/cart">Cart</a>
                <span class="checkout-page-crumb-sep">/</span>
                <span class="checkout-page-crumb-active">Checkout</span>

            </div>

            <!--=========================
                        STEP INDICATOR
                    ==========================-->

            <div class="checkout-page-steps" id="checkoutPageSteps">

                <div class="checkout-page-step active" data-step="1">
                    <span class="checkout-page-step-circle">1</span>
                    <span class="checkout-page-step-label">Billing Details</span>
                </div>

                <div class="checkout-page-step-line"></div>

                <div class="checkout-page-step" data-step="2">
                    <span class="checkout-page-step-circle">2</span>
                    <span class="checkout-page-step-label">Shipping</span>
                </div>

                <div class="checkout-page-step-line"></div>

                <div class="checkout-page-step" data-step="3">
                    <span class="checkout-page-step-circle">3</span>
                    <span class="checkout-page-step-label">Payment</span>
                </div>

                <div class="checkout-page-step-line"></div>

                <div class="checkout-page-step" data-step="4">
                    <span class="checkout-page-step-circle">4</span>
                    <span class="checkout-page-step-label">Review & Place Order</span>
                </div>

            </div>

            <div class="checkout-page-layout">

                <!--=========================
                            LEFT: BILLING FORM
                        ==========================-->

                <div class="checkout-page-form-wrap">

                    <div class="checkout-page-form-title">
                        <h3>Billing Details</h3>
                        <span class="checkout-page-form-divider"></span>
                    </div>

                    <form id="checkoutPageForm" novalidate>

                        <div class="checkout-page-grid-2">

                            <div class="checkout-page-field">
                                <label>Full Name <span class="req">*</span></label>
                                <input type="text" name="full_name" placeholder="Enter your full name" required>
                                <span class="checkout-page-error">Please enter your full name</span>
                            </div>

                            <div class="checkout-page-field">
                                <label>Email Address <span class="req">*</span></label>
                                <input type="email" name="email" placeholder="Enter your email" required>
                                <span class="checkout-page-error">Please enter a valid email</span>
                            </div>

                        </div>

                        <div class="checkout-page-grid-2">

                            <div class="checkout-page-field">
                                <label>Phone Number <span class="req">*</span></label>
                                <input type="tel" name="phone" placeholder="Enter your phone number" required
                                    pattern="[0-9]{10}">
                                <span class="checkout-page-error">Please enter a valid 10-digit phone number</span>
                            </div>

                            <div class="checkout-page-field">
                                <label>Alternate Number (Optional)</label>
                                <input type="tel" name="alt_phone" placeholder="Enter alternate number">
                            </div>

                        </div>

                        <div class="checkout-page-field">
                            <label>Address <span class="req">*</span></label>
                            <input type="text" name="address" placeholder="House no., Building, Street, Area" required>
                            <span class="checkout-page-error">Please enter your address</span>
                        </div>

                        <div class="checkout-page-field">
                            <label>Apartment, Suite, Unit etc. (Optional)</label>
                            <input type="text" name="apartment" placeholder="Enter apartment, suite, unit etc.">
                        </div>

                        <div class="checkout-page-grid-3">

                            <div class="checkout-page-field">
                                <label>Country <span class="req">*</span></label>
                                <select name="country" required>
                                    <option value="">Select Country</option>
                                    <option value="India" selected>India</option>
                                    <option value="USA">USA</option>
                                    <option value="UK">UK</option>
                                    <option value="UAE">UAE</option>
                                </select>
                            </div>

                            <div class="checkout-page-field">
                                <label>State <span class="req">*</span></label>
                                <select name="state" required>
                                    <option value="">Select State</option>
                                    <option value="Maharashtra" selected>Maharashtra</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Gujarat">Gujarat</option>
                                </select>
                            </div>

                            <div class="checkout-page-field">
                                <label>City <span class="req">*</span></label>
                                <select name="city" required>
                                    <option value="">Select City</option>
                                    <option value="Pune" selected>Pune</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Nagpur">Nagpur</option>
                                    <option value="Nashik">Nashik</option>
                                </select>
                            </div>

                        </div>

                        <div class="checkout-page-grid-2">

                            <div class="checkout-page-field">
                                <label>Pincode <span class="req">*</span></label>
                                <input type="text" name="pincode" placeholder="Enter pincode" required pattern="[0-9]{6}">
                                <span class="checkout-page-error">Please enter a valid 6-digit pincode</span>
                            </div>

                            <div class="checkout-page-field checkout-page-checkbox-field">
                                <label class="checkout-page-checkbox">
                                    <input type="checkbox" id="checkoutPageShipDiff">
                                    <span class="checkout-page-checkbox-box">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    Ship to a different address?
                                </label>
                            </div>

                        </div>

                        <!-- Alternate shipping address (hidden until checkbox is checked) -->
                        <div class="checkout-page-ship-address" id="checkoutPageShipAddress">

                            <div class="checkout-page-field">
                                <label>Shipping Address <span class="req">*</span></label>
                                <input type="text" name="ship_address" placeholder="House no., Building, Street, Area">
                            </div>

                            <div class="checkout-page-grid-3">

                                <div class="checkout-page-field">
                                    <label>Country</label>
                                    <select name="ship_country">
                                        <option value="India" selected>India</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                    </select>
                                </div>

                                <div class="checkout-page-field">
                                    <label>State</label>
                                    <input type="text" name="ship_state" placeholder="Enter state">
                                </div>

                                <div class="checkout-page-field">
                                    <label>City</label>
                                    <input type="text" name="ship_city" placeholder="Enter city">
                                </div>

                            </div>

                        </div>

                    </form>

                    <!-- Trust perks -->
                    <div class="checkout-page-perks">

                        <div class="checkout-page-perk">
                            <span><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <div class="t">Free Shipping</div>
                                <div class="s">On orders above ₹999</div>
                            </div>
                        </div>

                        <div class="checkout-page-perk">
                            <span><i class="fa-solid fa-lock"></i></span>
                            <div>
                                <div class="t">Secure Payment</div>
                                <div class="s">100% secure & trusted</div>
                            </div>
                        </div>

                        <div class="checkout-page-perk">
                            <span><i class="fa-solid fa-rotate"></i></span>
                            <div>
                                <div class="t">Easy Returns</div>
                                <div class="s">7 days return policy</div>
                            </div>
                        </div>

                        <div class="checkout-page-perk">
                            <span><i class="fa-solid fa-headset"></i></span>
                            <div>
                                <div class="t">24/7 Support</div>
                                <div class="s">We are here to help</div>
                            </div>
                        </div>

                    </div>

                </div>

                <!--=========================
                            RIGHT: ORDER SUMMARY + PAYMENT
                        ==========================-->

                <aside class="checkout-page-side">

                    <!-- Order summary -->
                    <div class="checkout-page-summary">

                        <h3>
                            Order Summary
                            <span class="checkout-page-summary-divider"></span>
                        </h3>

                        @php
                            $checkoutItems = [
                                ['name' => 'Crystal Healing Bracelet', 'qty' => 1, 'price' => 899, 'img' => 'product-1.png'],
                                ['name' => '7 Mukhi Rudraksha Bracelet', 'qty' => 1, 'price' => 1199, 'img' => 'product-2.png'],
                                ['name' => 'Rose Quartz Bracelet', 'qty' => 1, 'price' => 699, 'img' => 'product-1.png'],
                            ];
                            $checkoutSubtotal = collect($checkoutItems)->sum(fn($i) => $i['price'] * $i['qty']);
                            $checkoutDiscount = 798;
                            $checkoutTotal = $checkoutSubtotal;
                        @endphp

                        <div class="checkout-page-items">

                            @foreach($checkoutItems as $item)
                                <div class="checkout-page-item">

                                    <div class="checkout-page-item-thumb">
                                        <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">
                                    </div>

                                    <div class="checkout-page-item-info">
                                        <h4>{{ $item['name'] }}</h4>
                                        <span>Qty: {{ $item['qty'] }}</span>
                                    </div>

                                    <div class="checkout-page-item-price">
                                        ₹{{ number_format($item['price']) }}
                                    </div>

                                </div>
                            @endforeach

                        </div>

                        <div class="checkout-page-summary-row">
                            <span>Subtotal ({{ count($checkoutItems) }} Items)</span>
                            <span>₹{{ number_format($checkoutSubtotal) }}</span>
                        </div>

                        <div class="checkout-page-summary-row">
                            <span>Discount</span>
                            <span class="checkout-page-discount">-₹{{ number_format($checkoutDiscount) }}</span>
                        </div>

                        <div class="checkout-page-summary-row">
                            <span>Shipping</span>
                            <span class="checkout-page-free">FREE</span>
                        </div>

                        <div class="checkout-page-summary-total">
                            <span>Total</span>
                            <strong id="checkoutPageTotal">₹{{ number_format($checkoutTotal) }}</strong>
                        </div>

                        <div class="checkout-page-coupon-label">
                            <i class="fa-solid fa-tag"></i>
                            Have a coupon code?
                        </div>

                        <div class="checkout-page-coupon-row">

                            <input type="text" id="checkoutPageCouponInput" placeholder="Enter coupon code">

                            <button type="button" id="checkoutPageApplyBtn">Apply</button>

                        </div>

                        <div class="checkout-page-coupon-msg" id="checkoutPageCouponMsg"></div>

                    </div>

                    <!-- Payment methods -->
                    <div class="checkout-page-payment">

                        <h3>
                            Payment Methods
                            <span class="checkout-page-summary-divider"></span>
                        </h3>

                        <label class="checkout-page-pay-option">

                            <input type="radio" name="payment_method" value="upi" checked>

                            <span class="checkout-page-radio"></span>

                            <span class="checkout-page-pay-label">UPI / Net Banking / Cards</span>

                            <span class="checkout-page-pay-icons">
                                <i class="fa-solid fa-wallet"></i>
                                <i class="fa-brands fa-cc-visa"></i>
                                <i class="fa-brands fa-cc-mastercard"></i>
                            </span>

                        </label>

                        <label class="checkout-page-pay-option">

                            <input type="radio" name="payment_method" value="cod">

                            <span class="checkout-page-radio"></span>

                            <span class="checkout-page-pay-label">Cash on Delivery (COD)</span>

                            <span class="checkout-page-pay-icons">
                                <i class="fa-solid fa-money-bill-wave"></i>
                            </span>

                        </label>

                        <label class="checkout-page-pay-option">

                            <input type="radio" name="payment_method" value="wallet">

                            <span class="checkout-page-radio"></span>

                            <span class="checkout-page-pay-label">Wallets (PhonePe / Paytm / Amazon Pay)</span>

                            <span class="checkout-page-pay-icons">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </span>

                        </label>

                        <button type="button" class="checkout-page-place-btn" id="checkoutPagePlaceBtn">
                            <i class="fa-solid fa-lock"></i>
                            Place Order Securely
                        </button>

                        <div class="checkout-page-secure-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            100% Secure & Safe Payments
                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </section>

    <script>
        (function () {

            /* -----------------------------------
               Ship to a different address toggle
            ----------------------------------- */
            const shipCheckbox = document.getElementById("checkoutPageShipDiff");
            const shipAddress = document.getElementById("checkoutPageShipAddress");

            shipCheckbox.addEventListener("change", function () {
                shipAddress.classList.toggle("open", this.checked);
            });

            /* -----------------------------------
               Payment method selection styling
            ----------------------------------- */
            document.querySelectorAll(".checkout-page-pay-option").forEach(option => {
                option.addEventListener("click", function () {
                    document.querySelectorAll(".checkout-page-pay-option").forEach(o => o.classList.remove("selected"));
                    this.querySelector("input[type=radio]").checked = true;
                    this.classList.add("selected");
                });
            });
            // mark default selected on load
            document.querySelector(".checkout-page-pay-option input:checked").closest(".checkout-page-pay-option").classList.add("selected");

            /* -----------------------------------
               Coupon apply (checkout summary)
            ----------------------------------- */
            document.getElementById("checkoutPageApplyBtn").addEventListener("click", function () {

                const input = document.getElementById("checkoutPageCouponInput");
                const msg = document.getElementById("checkoutPageCouponMsg");
                const code = input.value.trim().toUpperCase();

                if (!code) {
                    msg.textContent = "Please enter a coupon code.";
                    msg.className = "checkout-page-coupon-msg error";
                    return;
                }

                if (code === "ASTRO10") {
                    msg.textContent = "Coupon applied successfully!";
                    msg.className = "checkout-page-coupon-msg success";
                } else {
                    msg.textContent = "Invalid or expired coupon code.";
                    msg.className = "checkout-page-coupon-msg error";
                }
            });

            /* -----------------------------------
               Step indicator (visual navigation)
            ----------------------------------- */
            document.querySelectorAll(".checkout-page-step").forEach(step => {
                step.addEventListener("click", function () {

                    const clickedNum = parseInt(this.dataset.step, 10);

                    document.querySelectorAll(".checkout-page-step").forEach(s => {
                        const n = parseInt(s.dataset.step, 10);
                        s.classList.remove("active", "done");
                        if (n < clickedNum) s.classList.add("done");
                        if (n === clickedNum) s.classList.add("active");
                    });
                });
            });

            /* -----------------------------------
               Billing form validation + submit
            ----------------------------------- */
            const form = document.getElementById("checkoutPageForm");

            function validateField(field) {

                const wrapper = field.closest(".checkout-page-field");
                let valid = true;

                if (field.hasAttribute("required") && !field.value.trim()) {
                    valid = false;
                }

                if (field.type === "email" && field.value.trim()) {
                    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!re.test(field.value.trim())) valid = false;
                }

                if (field.pattern && field.value.trim()) {
                    const re = new RegExp("^" + field.pattern + "$");
                    if (!re.test(field.value.trim())) valid = false;
                }

                wrapper.classList.toggle("has-error", !valid);
                return valid;
            }

            form.querySelectorAll("input, select").forEach(field => {
                field.addEventListener("blur", () => validateField(field));
            });

            function validateForm() {
                let allValid = true;
                form.querySelectorAll("input[required], select[required]").forEach(field => {
                    if (!validateField(field)) allValid = false;
                });
                return allValid;
            }

            /* -----------------------------------
               Place order
            ----------------------------------- */
            document.getElementById("checkoutPagePlaceBtn").addEventListener("click", function () {

                if (!validateForm()) {
                    document.querySelector(".checkout-page-field.has-error")
                        ?.scrollIntoView({ behavior: "smooth", block: "center" });
                    return;
                }

                const btn = this;
                const original = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Placing Order...';

                setTimeout(() => {
                    btn.innerHTML = '<i class="fa-solid fa-circle-check"></i> Order Placed!';
                    // Redirect to an order-confirmation route once wired to a controller
                    // window.location.href = "/order-confirmation";
                }, 1400);
            });

        })();
    </script>

@endsection