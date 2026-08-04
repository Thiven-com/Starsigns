    @extends('layouts.website')
    @section('content')

        <!--==========================
                    PAGE BANNER
            ===========================-->
        <section class="page-banner"
            style="background:url('{{ asset('website/images/shopbann.png') }}') center center/cover no-repeat;">
            <div class="container">
                <div class="page-banner-content text-center">
                    <h1>Terms & Conditions</h1>

                    <div class="breadcrumb justify-content-center">
                        <a href="/">Home</a>
                        <span><i class="fa-solid fa-chevron-right"></i></span>
                        <span class="active">Terms & Conditions</span>
                    </div>
                </div>
            </div>
        </section>

        <!--==========================
                    TERMS CONTENT
            ===========================-->
        <section class="terms-section">
            <div class="container">
                <div class="terms-wrapper bg-white shadow-sm rounded-4 p-4 p-lg-5">

                    <div class="mb-4">
                        <p class="text-muted mb-0">
                            Last updated: {{ date('F d, Y') }}
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>1. Introduction</h2>
                        <p>
                            Welcome to <strong>StarSigns</strong>. By accessing and using our website,
                            you agree to comply with and be bound by the following Terms & Conditions.
                            Please read them carefully before using our services.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>2. Eligibility</h2>
                        <p>
                            You must be at least 18 years old or have the consent of a parent or legal guardian
                            to use this website and place orders through our platform.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>3. Products & Services</h2>
                        <p>
                            We offer spiritual, wellness, and astrology-related products. Product images and
                            descriptions are provided for informational purposes only. Slight variations in color,
                            texture, or appearance may occur due to the natural characteristics of stones,
                            crystals, and handcrafted items.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>4. Pricing</h2>
                        <p>
                            All prices displayed on the website are in Indian Rupees (₹) and are subject to
                            change without prior notice. We reserve the right to correct pricing errors,
                            inaccuracies, or omissions at any time.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>5. Orders & Payments</h2>
                        <ul>
                            <li>Orders are confirmed only after successful payment authorization.</li>
                            <li>We reserve the right to refuse or cancel any order due to stock unavailability,
                                payment issues, or suspected fraudulent activity.</li>
                            <li>Secure payment gateways are used to process transactions.</li>
                        </ul>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>6. Shipping & Delivery</h2>
                        <p>
                            We strive to dispatch orders promptly. Delivery timelines may vary depending on
                            your location and courier availability. Delays caused by third-party logistics
                            providers or unforeseen circumstances are beyond our control.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>7. Returns & Refunds</h2>
                        <p>
                            Returns and refunds are governed by our Return & Refund Policy. Products must be
                            unused, in their original condition, and returned within the specified return period
                            to be eligible for a refund or replacement.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>8. Intellectual Property</h2>
                        <p>
                            All content on this website, including text, images, graphics, logos, and designs,
                            is the property of <strong>StarSigns</strong> and is protected by applicable
                            copyright and intellectual property laws. Unauthorized use or reproduction is prohibited.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>9. User Conduct</h2>
                        <p>You agree not to:</p>
                        <ul>
                            <li>Use the website for unlawful purposes.</li>
                            <li>Attempt to gain unauthorized access to our systems.</li>
                            <li>Upload or transmit harmful, abusive, or misleading content.</li>
                        </ul>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>10. Disclaimer</h2>
                        <p>
                            Spiritual and astrology-related products are intended for personal belief,
                            wellness, and decorative purposes only. We do not guarantee specific results,
                            outcomes, or benefits from the use of any product or service.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>11. Limitation of Liability</h2>
                        <p>
                            To the maximum extent permitted by law, <strong>StarSigns</strong> shall not be
                            liable for any indirect, incidental, special, or consequential damages arising
                            from the use of our website or products.
                        </p>
                    </div>

                    <div class="terms-block mb-4">
                        <h2>12. Changes to Terms</h2>
                        <p>
                            We may update these Terms & Conditions from time to time. Any changes will be
                            posted on this page with the revised effective date.
                        </p>
                    </div>

                    <div class="terms-block">
                        <h2>13. Contact Us</h2>
                        <p>
                            If you have any questions regarding these Terms & Conditions, please contact us:
                        </p>

                        <ul class="list-unstyled mb-0">
                            <li><strong>Website:</strong> StarSigns</li>
                            <li><strong>Email:</strong> support@starsigns.com</li>
                            <li><strong>Phone:</strong> +91 98765 43210</li>
                        </ul>
                    </div>

                </div>
            </div>
        </section>
        <style>
            /* ==========================================
        TERMS & CONDITIONS PAGE
        ========================================== */

            .terms-section {
                background: #faf8f5;
                margin: 50px;
                padding: 50px;
                border: transparent;
            }

            /* Tablet */
            @media (max-width: 992px) {
                .terms-section {
                    margin: 30px 20px;
                    padding: 30px 20px;
                }
            }

            /* Mobile */
            @media (max-width: 576px) {
                .terms-section {
                    margin: 5px 5px;
                    padding: 5px 5px;
                }
            }

            .terms-block h2 {
                font-size: 22px;
                font-weight: 700;
                color: #241b3f;
                margin-bottom: 14px;
                font-family: "Cinzel", serif;
            }

            .terms-block p,
            .terms-block li {
                color: #555;
                line-height: 1.8;
                font-size: 15px;
            }

            .terms-block ul {
                padding-left: 20px;
            }

            .terms-block ul li {
                margin-bottom: 8px;
            }

            @media (max-width: 768px) {
                .terms-wrapper {
                    padding: 22px 18px !important;
                }

                .terms-block h2 {
                    font-size: 19px;
                }

                .terms-block p,
                .terms-block li {
                    font-size: 14px;
                }
            }

    @endsection