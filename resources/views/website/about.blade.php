@extends('layouts.website')
@section('content')

    <section class="about-banner-section">

        <div class="container">

            <div class="about-banner-content">

                <h1>About Us</h1>

                <div class="about-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">About Us</span>

                </div>

            </div>

        </div>

    </section>



    <section class="about-section">
        <div class="container">

            <!-- Left Image -->
            <div class="about-image">
                <img src="{{ asset('website') }}/images/aboutimg.png" alt="About Us">

                <div class="experience-card">
                    <h2>7+</h2>
                    <p>Years of Trust</p>
                </div>
            </div>

            <!-- Right Content -->
            <div class="about-content">

                <div class="section-title">
                    <span class="subtitle">OUR STORY</span>
                </div>

                <h2>
                    Spirituality, Quality & <br>
                    Trust <span>Since 2017</span>
                </h2>

                <p>
                    AstroStore was born out of a simple belief—that authentic
                    spiritual products have the power to bring positivity,
                    balance, and transformation into everyday life.
                </p>

                <p>
                    We carefully curate Rudraksha, Gemstones, Crystals,
                    Yantras, Vastu products, and other spiritual essentials
                    to help you connect with positive energy and divine blessings.
                </p>

                <div class="features">

                    <!-- Feature 1 -->
                    <div class="feature">
                        <div class="icon">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>

                        <div class="feature-content">
                            <h4>100% Authentic</h4>
                            <p>Certified genuine spiritual products.</p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="feature">
                        <div class="icon">
                            <i class="fa-solid fa-hands-praying"></i>
                        </div>

                        <div class="feature-content">
                            <h4>Ethically Sourced</h4>
                            <p>Sourced responsibly with care and devotion.</p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="feature">
                        <div class="icon">
                            <i class="fa-regular fa-gem"></i>
                        </div>

                        <div class="feature-content">
                            <h4>Premium Quality</h4>
                            <p>Finest quality spiritual products.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>


    <!--==========================================
                WHY CHOOSE US
                ===========================================-->

    <section class="why-choose-section">

        <div class="container">

            <div class="section-heading">

                <span class="sub-title">WHY CHOOSE US</span>

                <h2>What Makes Us Different</h2>

            </div>

            <div class="why-grid">

                <div class="why-card">

                    <div class="icon">

                        <i class="fa-solid fa-award"></i>

                    </div>

                    <h4>Authenticity Guaranteed</h4>

                    <p>
                        Every product is lab tested and certified.
                    </p>

                </div>

                <div class="why-card">

                    <div class="icon">

                        <i class="fa-regular fa-thumbs-up"></i>

                    </div>

                    <h4>Trusted by Thousands</h4>

                    <p>
                        Loved and trusted by customers worldwide.
                    </p>

                </div>

                <div class="why-card">

                    <div class="icon">

                        <i class="fa-solid fa-truck-fast"></i>

                    </div>

                    <h4>Fast & Secure Delivery</h4>

                    <p>
                        Quick delivery with secure packaging.
                    </p>

                </div>

                <div class="why-card">

                    <div class="icon">

                        <i class="fa-solid fa-headset"></i>

                    </div>

                    <h4>Dedicated Support</h4>

                    <p>
                        We're here to help you on your spiritual journey.
                    </p>

                </div>

            </div>

        </div>

    </section>

    <section class="banner-section">

        <div class="container">

            <div class="banner-card">

                <img src="{{ asset('website') }}/images/aboutdown.png" alt="Banner">

            </div>

        </div>

    </section>


    <!--==========================
        FEATURE STRIP
        ===========================-->

    <section class="feature-strip">

        <div class="container">

            <div class="feature-wrapper">

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>

                    <div class="feature-content">

                        <h5>Free Shipping</h5>

                        <p>On all orders above ₹999</p>

                    </div>

                </div>

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>

                    <div class="feature-content">

                        <h5>100% Secure Payment</h5>

                        <p>Safe & trusted checkout</p>

                    </div>

                </div>

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class="fa-solid fa-rotate"></i>
                    </div>

                    <div class="feature-content">

                        <h5>Easy Returns</h5>

                        <p>Hassle-free return policy</p>

                    </div>

                </div>

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <div class="feature-content">

                        <h5>24/7 Support</h5>

                        <p>We're always here to help</p>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection