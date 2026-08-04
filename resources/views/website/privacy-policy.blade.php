@extends('layouts.website')

@section('content')

<style>
    /* ==========================================
       PRIVACY POLICY PAGE
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
</style>
<!--==========================
        PAGE BANNER
===========================-->
<section class="page-banner"
    style="background:url('{{ asset('website/images/shopbann.png') }}') center center/cover no-repeat;">
    <div class="container">
        <div class="page-banner-content text-center">
            <h1>Privacy Policy</h1>

            <div class="breadcrumb justify-content-center">
                <a href="/">Home</a>
                <span><i class="fa-solid fa-chevron-right"></i></span>
                <span class="active">Privacy Policy</span>
            </div>
        </div>
    </div>
</section>

<!--==========================
        PRIVACY CONTENT
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
                    At <strong>StarSigns</strong>, we respect your privacy and are committed
                    to protecting your personal information. This Privacy Policy explains how we collect,
                    use, store, and protect your information when you use our website and services.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>2. Information We Collect</h2>
                <p>We may collect the following information:</p>
                <ul>
                    <li>Name and contact details (email address, phone number, address)</li>
                    <li>Billing and shipping information</li>
                    <li>Order and transaction details</li>
                    <li>Website usage information such as browser type, device, and IP address</li>
                </ul>
            </div>

            <div class="terms-block mb-4">
                <h2>3. How We Use Your Information</h2>
                <p>Your information may be used to:</p>
                <ul>
                    <li>Process and deliver your orders</li>
                    <li>Provide customer support</li>
                    <li>Send order updates and service-related notifications</li>
                    <li>Improve our website, products, and customer experience</li>
                    <li>Prevent fraud and maintain website security</li>
                </ul>
            </div>

            <div class="terms-block mb-4">
                <h2>4. Cookies</h2>
                <p>
                    We may use cookies and similar technologies to enhance your browsing experience,
                    remember your preferences, and analyze website traffic. You can disable cookies
                    through your browser settings if you prefer.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>5. Sharing of Information</h2>
                <p>
                    We do not sell or rent your personal information to third parties. We may share
                    your information only with trusted service providers such as payment gateways,
                    shipping partners, and legal authorities when required by law.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>6. Data Security</h2>
                <p>
                    We implement reasonable technical and organizational measures to protect your
                    personal information from unauthorized access, misuse, loss, or disclosure.
                    However, no method of transmission over the internet is completely secure.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>7. Third-Party Links</h2>
                <p>
                    Our website may contain links to third-party websites. We are not responsible
                    for the privacy practices or content of those external websites.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>8. Your Rights</h2>
                <p>You may have the right to:</p>
                <ul>
                    <li>Access the personal information we hold about you</li>
                    <li>Request correction of inaccurate information</li>
                    <li>Request deletion of your personal data where applicable</li>
                    <li>Opt out of promotional communications</li>
                </ul>
            </div>

            <div class="terms-block mb-4">
                <h2>9. Children's Privacy</h2>
                <p>
                    Our services are not intended for children under the age of 18. We do not knowingly
                    collect personal information from children without parental consent.
                </p>
            </div>

            <div class="terms-block mb-4">
                <h2>10. Changes to This Policy</h2>
                <p>
                    We may update this Privacy Policy from time to time. Any changes will be posted
                    on this page with the revised effective date.
                </p>
            </div>

            <div class="terms-block">
                <h2>11. Contact Us</h2>
                <p>
                    If you have any questions regarding this Privacy Policy, please contact us:
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

@endsection
