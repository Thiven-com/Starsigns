@extends('layouts.website')
@section('content')

    <!--==========================================
                SHIPPING POLICY PAGE CONTENT
            ===========================================-->

    <!--=========================
                BANNER
            ==========================-->

    <section class="shipping-policy-banner">
       
        <div class="shipping-policy-banner-content">

            <div class="shipping-policy-eyebrow">
                <span class="shipping-policy-eyebrow-icon">✦</span>
                <span class="shipping-policy-eyebrow-text">Our Commitment</span>
                <span class="shipping-policy-eyebrow-icon">✦</span>
            </div>

            <h1 class="shipping-policy-title">Shipping Policy</h1>

            <div class="shipping-policy-divider">
                <span class="shipping-policy-divider-line"></span>
                <span class="shipping-policy-divider-diamond">✦</span>
                <span class="shipping-policy-divider-line"></span>
            </div>

            <p class="shipping-policy-subtitle">
                At AstroVani, we ensure safe, timely and reliable delivery
                of your spiritual products to your doorstep.
            </p>

        </div>

    </section>

    <div class="container">

        <!--=========================
                    POLICY CARD
                ==========================-->

        <section class="shipping-policy-card">

            <div class="shipping-policy-item" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-truck"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Processing Time</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>All orders are processed within 1-2 business days after receiving your order confirmation. Orders are
                        not processed or shipped on weekends or public holidays.</p>
                </div>
            </div>

            <div class="shipping-policy-item" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-box"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Shipping Time</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>Once your order is shipped, delivery typically takes 3-7 business days within India. Delivery times
                        may vary depending on your location and the shipping partner.</p>
                </div>
            </div>

            <div class="shipping-policy-item" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Shipping Coverage</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>We currently ship across India to most serviceable pin codes. We do not ship to P.O. Boxes or APO/FPO
                        addresses.</p>
                </div>
            </div>

            <div class="shipping-policy-item" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Shipping Charges</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>We offer free shipping on all prepaid orders above ₹499. For orders below ₹499, a nominal shipping
                        fee of ₹40 will be applied at checkout.</p>
                </div>
            </div>

            <div class="shipping-policy-item" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-box-open"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Order Tracking</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>Once your order is shipped, you will receive a tracking link via email or SMS to track your shipment
                        in real time.</p>
                </div>
            </div>

            <div class="shipping-policy-item shipping-policy-item-last" data-fade>
                <div class="shipping-policy-item-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="shipping-policy-item-heading">
                    <h3>Safe Delivery</h3>
                </div>
                <div class="shipping-policy-item-divider"></div>
                <div class="shipping-policy-item-text">
                    <p>We ensure safe packaging and handle every order with care to deliver your spiritual products in
                        perfect condition.</p>
                </div>
            </div>

            <!--=========================
                        IMPORTANT NOTES
                    ==========================-->

            <div class="shipping-policy-notes" data-fade>

                <div class="shipping-policy-notes-icon">
                    <i class="fa-solid fa-box-open"></i>
                    <i class="fa-solid fa-shield-halved shipping-policy-notes-icon-badge"></i>
                </div>

                <div class="shipping-policy-notes-text">

                    <h4>Important Notes</h4>

                    <ul>
                        <li>Delivery delays may occur due to unforeseen circumstances such as weather conditions, strikes,
                            or courier delays.</li>
                        <li>Please ensure your shipping address and contact details are correct to avoid delivery issues.
                        </li>
                        <li>For any shipping related queries, feel free to contact our support team.</li>
                    </ul>

                </div>

            </div>

        </section>

        <!--=========================
                    NEED HELP CTA
                ==========================-->

        <section class="shipping-policy-support" data-fade>

            <div class="shipping-policy-support-pattern" aria-hidden="true"></div>

            <div class="shipping-policy-support-icon">
                <i class="fa-solid fa-headset"></i>
            </div>

            <div class="shipping-policy-support-text">
                <h3>Need Help?</h3>
                <p>Our support team is here to assist you<br>with any shipping related queries.</p>
            </div>

            <a href="/contact" class="shipping-policy-support-btn">
                <i class="fa-regular fa-envelope"></i>
                Contact Support
                <i class="fa-solid fa-chevron-right shipping-policy-support-btn-arrow"></i>
            </a>

        </section>

        <!--=========================
                    THANK YOU FOOTER LINE
                ==========================-->

        <p class="shipping-policy-thanks" data-fade>
            <i class="fa-solid fa-sparkle shipping-policy-sparkle"></i>
            Thank you for trusting Starsigns. We appreciate your support!
            <i class="fa-solid fa-sparkle shipping-policy-sparkle"></i>
        </p>

    </div>

    <script>
        (function () {

            /*==========================================
                SCROLL-REVEAL ANIMATION
            ==========================================*/

            const fadeEls = document.querySelectorAll("[data-fade]");

            if ("IntersectionObserver" in window && fadeEls.length) {

                const observer = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("shipping-policy-visible");
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.15, rootMargin: "0px 0px -30px 0px" });

                fadeEls.forEach(function (el) {
                    el.classList.add("shipping-policy-fade");
                    observer.observe(el);
                });

            } else {

                fadeEls.forEach(function (el) {
                    el.classList.add("shipping-policy-visible");
                });

            }

            /*==========================================
                CONTACT SUPPORT — CLICK RIPPLE
            ==========================================*/

            const supportBtn = document.querySelector(".shipping-policy-support-btn");

            if (supportBtn) {

                supportBtn.addEventListener("click", function (e) {

                    const ripple = document.createElement("span");
                    ripple.className = "shipping-policy-ripple";

                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);

                    ripple.style.width = ripple.style.height = size + "px";
                    ripple.style.left = (e.clientX - rect.left - size / 2) + "px";
                    ripple.style.top = (e.clientY - rect.top - size / 2) + "px";

                    this.appendChild(ripple);

                    setTimeout(function () {
                        ripple.remove();
                    }, 650);

                });

            }

            /*==========================================
                POLICY ITEM ICON — CLICK PULSE
                (a little interactive feedback when a
                reader taps an icon to re-read a step)
            ==========================================*/

            document.querySelectorAll(".shipping-policy-item-icon").forEach(function (icon) {

                icon.addEventListener("click", function () {
                    this.classList.remove("shipping-policy-icon-pop");
                    void this.offsetWidth;
                    this.classList.add("shipping-policy-icon-pop");
                });

            });

        })();
    </script>

@endsection