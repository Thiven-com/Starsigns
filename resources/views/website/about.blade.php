@extends('layouts.website')
@section('content')

    <section class="about-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="about-banner-content" data-aos="zoom-in">

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
            <div class="about-image" data-aos="fade-right">
                <img src="{{ asset('website') }}/images/aboutimg.png" alt="About Us">

                {{-- <div class="experience-card">
                    <h2>7+</h2>
                    <p>Years of Trust</p>
                </div> --}}
            </div>

            <!-- Right Content -->
            <div class="about-content" data-aos="fade-left">

                <div class="section-title">
                    <span class="subtitle">OUR STORY</span>
                </div>

                <h2>
                    Spirituality, Quality & <br>
                    Trust <span>Since 2017</span>
                </h2>

                <p>
                    StarSigns was born out of a simple belief that authentic
                    spiritual products have the power to bring positivity,
                    balance, and transformation into everyday life.
                </p>

                <p>
                    We carefully curate Rudraksha, Gemstones, Crystals,
                    Yantras, Vastu products, and other spiritual essentials
                    to help you connect with positive energy and divine blessings.
                </p>

                <div class="features">

                    <div class="feature" data-aos="flip-up" data-aos-delay="100">
                        <div class="icon">
                            <i class="fa-solid fa-shield-heart"></i>
                        </div>

                        <div class="feature-content">
                            <h4>100% Authentic</h4>
                            <p>Certified genuine products you can trust.</p>
                        </div>
                    </div>

                    <div class="feature" data-aos="flip-up" data-aos-delay="200">
                        <div class="icon">
                            <i class="fa-solid fa-hands-praying"></i>
                        </div>

                        <div class="feature-content">
                            <h4>Ethically Sourced</h4>
                            <p>Responsibly sourced with care and devotion.</p>
                        </div>
                    </div>

                    <div class="feature" data-aos="flip-up" data-aos-delay="300">
                        <div class="icon">
                            <i class="fa-regular fa-gem"></i>
                        </div>

                        <div class="feature-content">
                            <h4>Premium Quality</h4>
                            <p>Finest quality products selected with care.</p>
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

            <div class="section-heading" data-aos="fade-up">

                <span class="sub-title">WHY CHOOSE US</span>

                <h2 style="margin: 10px;">What Makes Us Different</h2>

            </div>

            <div class="why-grid">

                <div class="why-card" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon">
                        <i class="fa-solid fa-hands-praying"></i>
                    </div>

                    <h4>Spiritually Curated</h4>

                    <p>
                        Thoughtfully selected products for your spiritual journey.
                    </p>
                </div>


                <div class="why-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon">
                        <i class="fa-solid fa-certificate"></i>
                    </div>

                    <h4>Quality Checked</h4>

                    <p>
                        Carefully inspected products chosen with attention and care.
                    </p>
                </div>


                <div class="why-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon">
                        <i class="fa-solid fa-star"></i>
                    </div>

                    <h4>Trusted Experience</h4>

                    <p>
                        A reliable destination for meaningful spiritual essentials.
                    </p>
                </div>


                <div class="why-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon">
                        <i class="fa-solid fa-gift"></i>
                    </div>

                    <h4>Thoughtful Selection</h4>

                    <p>
                        Discover products chosen to bring positivity and meaning.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <section class="banner-section">

        <div class="container">

            <div class="banner-card" data-aos="zoom-in-up">
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

                <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>

                    <div class="feature-content">

                        <h5>Free Shipping</h5>

                        <p>On all orders above ₹999</p>

                    </div>

                </div>

                <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fa-regular fa-credit-card"></i>
                    </div>

                    <div class="feature-content">

                        <h5>100% Secure Payment</h5>

                        <p>Safe & trusted checkout</p>

                    </div>

                </div>

                <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fa-solid fa-rotate"></i>
                    </div>

                    <div class="feature-content">

                        <h5>Easy Returns</h5>

                        <p>Hassle-free return policy</p>

                    </div>

                </div>

                <div class="feature-box" data-aos="fade-up" data-aos-delay="400">
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


    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100,
            easing: "ease-in-out",
        });
    </script>

@endsection