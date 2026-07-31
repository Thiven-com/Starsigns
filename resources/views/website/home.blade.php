@extends('layouts.website')
@section('content')



    <!--==============================
                                                                                                                                HERO SLIDER
                                                                                                                        ================================-->

    <section class="hero-slider">

        <div class="swiper heroSwiper">

            <div class="swiper-wrapper">

                <!-- Banner 1 -->
                <div class="swiper-slide">
                    <img src="{{ asset('website/images/bann1.jpeg') }}" alt="Banner 1">
                </div>

                <!-- Banner 2 -->
                <div class="swiper-slide">
                    <img src="{{ asset('website/images/bann2.jpeg') }}" alt="Banner 2">
                </div>

                <!-- Banner 3 -->
                <div class="swiper-slide">
                    <img src="{{ asset('website/images/bann3.jpeg') }}" alt="Banner 3">
                </div>

                <!-- Banner 4 -->
                <!-- <div class="swiper-slide">
                    <img src="{{ asset('website/images/banner6.png') }}" alt="Banner 4">
                </div> -->

            </div>

            <!-- Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>

        </div>




        <section class="features-strip">
            <div class="container">

                <div class="feature-card">

                    <div class="icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>

                    <div class="content">
                        <h4>Free Shipping</h4>
                        <p>On Orders Above ₹999</p>
                    </div>

                </div>

                <div class="feature-card">

                    <div class="icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div class="content">
                        <h4>100% Authentic</h4>
                        <p>Certified Products</p>
                    </div>

                </div>

                <div class="feature-card">

                    <div class="icon">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                    </div>

                    <div class="content">
                        <h4>Easy Returns</h4>
                        <p>7 Days Return Policy</p>
                    </div>

                </div>

                <div class="feature-card">

                    <div class="icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <div class="content">
                        <h4>Customer Support</h4>
                        <p>+91 12345 67890</p>
                    </div>

                </div>

                <div class="feature-card no-border">

                    <div class="icon">
                        <i class="fa-solid fa-award"></i>
                    </div>

                    <div class="content">
                        <h4>Secure Payments</h4>
                        <p>100% Safe & Secure</p>
                    </div>

                </div>

            </div>
        </section>


        <!--=========================================
                                                                                                                SHOP CATEGORY SECTION
                                                                                                        ==========================================-->

        <section class="ssc-category-section">

            <div class="container">

                <div class="ssc-heading">

                    <span></span>

                    <h2>Shop by Category</h2>

                    <span></span>

                </div>

                <div class="swiper sscCategorySlider">

                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/rudraksha.png') }}" alt="">

                                </div>

                                <h4>Rudraksha</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 2 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/bracelet.png') }}" alt="">

                                </div>

                                <h4>Bracelets</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 3 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/pyramid.png') }}" alt="">

                                </div>

                                <h4>Pyrite</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 4 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/karungali.png') }}" alt="">

                                </div>

                                <h4>Karungali</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 5 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/yantra.png') }}" alt="">

                                </div>

                                <h4>Yantras</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 6 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/gemstones.png') }}" alt="">

                                </div>

                                <h4>Gemstones</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 7 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/zodiac.png') }}" alt="">

                                </div>

                                <h4>Zodiac</h4>

                                <p>Collection</p>

                            </a>

                        </div>

                        <!-- Card 8 -->

                        <div class="swiper-slide">

                            <a href="#" class="ssc-card">

                                <div class="ssc-image">

                                    <img src="{{ asset('website/img/consultation.png') }}" alt="">

                                </div>

                                <h4>Consultation</h4>

                                <p>Services</p>

                            </a>

                        </div>

                    </div>

                    <!-- Navigation -->

                    <div class="ssc-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>

                    <div class="ssc-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>

                </div>

            </div>

        </section>





        <!--=========================================
                                                                                        FEATURED PRODUCTS
                                                                                ==========================================-->

        <section class="fp-section">

            <div class="container">

                <div class="fp-header">

                    <div class="fp-title">

                        <span class="fp-subtitle">Premium Collection</span>

                        <h2>Featured Products</h2>

                    </div>

                    <a href="#" class="fp-view-btn">
                        View All
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>

                </div>

                <div class="fp-grid">

                    <!-- PRODUCT 1 -->

                    <div class="fp-card" data-aos="fade-up">

                        <span class="fp-badge sale">Sale</span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product1.png') }}" alt="">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>

                                <span>(124)</span>

                            </div>

                            <h3>
                                7 Mukhi Rudraksha
                            </h3>

                            <div class="fp-price">

                                <span class="new">₹1,499</span>

                                <span class="old">₹1,999</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>

                    <!-- PRODUCT 2 -->

                    <div class="fp-card" data-aos="fade-up" data-aos-delay="100">

                        <span class="fp-badge best">
                            Best Seller
                        </span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product2.png') }}" alt="">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>

                                <span>(95)</span>

                            </div>

                            <h3>

                                Natural Pyrite Tree

                            </h3>

                            <div class="fp-price">

                                <span class="new">₹2,299</span>

                                <span class="old">₹2,899</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>

                    <!-- PRODUCT 3 -->

                    <div class="fp-card" data-aos="fade-up" data-aos-delay="200">

                        <span class="fp-badge sale">
                            Sale
                        </span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product3.png') }}" alt="">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>

                                <span>(64)</span>

                            </div>

                            <h3>

                                Crystal Healing Bracelet

                            </h3>

                            <div class="fp-price">

                                <span class="new">₹899</span>

                                <span class="old">₹1,299</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>


                    <!-- PRODUCT 4 -->

                    <div class="fp-card" data-aos="fade-up" data-aos-delay="300">

                        <span class="fp-badge best">Best Seller</span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product4.png') }}" alt="Karungali Bracelet">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>

                                <span>(152)</span>

                            </div>

                            <h3>Karungali Bracelet</h3>

                            <div class="fp-price">

                                <span class="new">₹799</span>

                                <span class="old">₹999</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>

                    <!-- PRODUCT 5 -->

                    <div class="fp-card" data-aos="fade-up" data-aos-delay="400">

                        <span class="fp-badge sale">20% OFF</span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product5.png') }}" alt="Shree Yantra">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>

                                <span>(86)</span>

                            </div>

                            <h3>Shree Yantra</h3>

                            <div class="fp-price">

                                <span class="new">₹1,599</span>

                                <span class="old">₹1,999</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>

                    <!-- PRODUCT 6 -->

                    <div class="fp-card" data-aos="fade-up" data-aos-delay="500">

                        <span class="fp-badge sale">New</span>

                        <button class="fp-heart">
                            <i class="fa-regular fa-heart"></i>
                        </button>

                        <div class="fp-image">

                            <img src="{{ asset('website/img/product6.png') }}" alt="Natural Gemstone">

                        </div>

                        <div class="fp-content">

                            <div class="fp-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-regular fa-star"></i>

                                <span>(48)</span>

                            </div>

                            <h3>Natural Gemstone</h3>

                            <div class="fp-price">

                                <span class="new">₹2,499</span>

                                <span class="old">₹2,999</span>

                            </div>

                            <a href="#" class="fp-cart-btn">

                                <i class="fa-solid fa-cart-shopping"></i>

                                Add to Cart

                            </a>

                        </div>

                    </div>



                </div>

            </div>

        </section>



        <section class="promo-section">

            <div class="promo-grid">

                <!-- Card 1 -->
                <a href="#" class="promo-card">
                    <img src="{{ asset('website/images/card1.png') }}" alt="Rudraksha Collection">
                </a>

                <!-- Card 2 -->
                <a href="#" class="promo-card">
                    <img src="{{ asset('website/images/card2.png') }}" alt="Gemstone Collection">
                </a>

                <!-- Card 3 -->
                <a href="#" class="promo-card">
                    <img src="{{ asset('website/images/card3.png') }}" alt="Yantra Collection">
                </a>

            </div>

        </section>



        <!--=========================
                                                            WHY CHOOSE SECTION
                                                            ==========================-->

        <section class="ss-why-section">

            <div class="container">

                <div class="ss-why-box">

                    <div class="ss-title">

                        <span></span>

                        <h2>Why Choose StarSigns?</h2>

                        <span></span>

                    </div>

                    <div class="ss-features">

                        <!-- Item -->

                        <div class="ss-item">

                            <div class="ss-icon">
                                <i class="fa-regular fa-lightbulb"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Energized & Blessed</h4>
                                <p>By Experts</p>
                            </div>

                        </div>

                        <!-- Item -->

                        <div class="ss-item">

                            <div class="ss-icon">
                                <i class="fa-solid fa-flask"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Lab Tested</h4>
                                <p>100% Quality Assured</p>
                            </div>

                        </div>

                        <!-- Item -->

                        <div class="ss-item">

                            <div class="ss-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Pan India Delivery</h4>
                                <p>Fast & Reliable</p>
                            </div>

                        </div>

                        <!-- Item -->

                        <div class="ss-item">

                            <div class="ss-icon">
                                <i class="fa-solid fa-wallet"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Secure Payments</h4>
                                <p>Multiple Options</p>
                            </div>

                        </div>

                        <!-- Item -->

                        <div class="ss-item">

                            <div class="ss-icon">
                                <i class="fa-solid fa-rotate"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Easy Returns</h4>
                                <p>7 Days Policy</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!--=========================
                                POPULAR CATEGORIES
                                ==========================-->

        <section class="popular-category-section">

            <div class="container">

                <div class="pc-title">

                    <span></span>

                    <h2>Popular Categories</h2>

                    <span></span>

                </div>

                <div class="swiper popularCategorySlider">

                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/pyramid.png') }}">
                                </div>
                                <h4>Pyramids</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/crystal.png') }}">
                                </div>
                                <h4>Crystals</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/zodiac.png') }}">
                                </div>
                                <h4>Zodiac</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/pendant.png') }}">
                                </div>
                                <h4>Pendants</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/idols.png') }}">
                                </div>
                                <h4>Idols</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/vastu.png') }}">
                                </div>
                                <h4>Vastu</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/book.png') }}">
                                </div>
                                <h4>Astrology Books</h4>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="pc-card">
                                <div class="pc-circle">
                                    <img src="{{ asset('website/img/more.png') }}">
                                </div>
                                <h4>More</h4>
                            </div>
                        </div>

                    </div>

                    <div class="pc-prev">
                        <i class="fa-solid fa-chevron-left"></i>
                    </div>

                    <div class="pc-next">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>

                </div>

            </div>

        </section>


        <!--=========================
            LATEST BLOG SECTION
            ==========================-->

        <section class="blog-section">

            <div class="container">

                <div class="blog-header">

                    <div class="blog-title">

                        <span></span>

                        <h2>Latest from Blog</h2>

                        <span></span>

                    </div>

                    <a href="#" class="blog-view-all">
                        View All
                    </a>

                </div>

                <div class="blog-grid">

                    <!-- CARD 1 -->

                    <div class="blog-card">

                        <div class="blog-image">

                            <img src="{{ asset('website/images/blog1.jpg') }}" alt="">

                        </div>

                        <div class="blog-content">

                            <span class="blog-date">
                                12 May 2025
                            </span>

                            <h3>
                                Power of Birthstones:
                                How Gemstones Can
                                Transform Your Life
                            </h3>

                            <a href="#">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                    <!-- CARD 2 -->

                    <div class="blog-card">

                        <div class="blog-image">

                            <img src="{{ asset('website/images/blog2.jpg') }}" alt="">

                        </div>

                        <div class="blog-content">

                            <span class="blog-date">
                                08 May 2025
                            </span>

                            <h3>
                                Benefits of Wearing
                                Rudraksha Mala
                                in Daily Life
                            </h3>

                            <a href="#">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                    <!-- CARD 3 -->

                    <div class="blog-card">

                        <div class="blog-image">

                            <img src="{{ asset('website/images/blog3.jpg') }}" alt="">

                        </div>

                        <div class="blog-content">

                            <span class="blog-date">
                                05 May 2025
                            </span>

                            <h3>
                                Crystals for Positive
                                Energy: Best Crystals
                                and Their Uses
                            </h3>

                            <a href="#">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                    <!-- CARD 4 -->

                    <div class="blog-card">

                        <div class="blog-image">

                            <img src="{{ asset('website/images/blog4.jpg') }}" alt="">

                        </div>

                        <div class="blog-content">

                            <span class="blog-date">
                                01 May 2025
                            </span>

                            <h3>
                                How Yantras Work:
                                The Science Behind
                                Sacred Geometry
                            </h3>

                            <a href="#">
                                Read More
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!--==========================================
                TESTIMONIAL SECTION
        ===========================================-->

        <section class="testimonial-section">

            <div class="container">

                <!-- Heading -->

                <div class="testimonial-heading">

                    <span></span>

                    <h2>What Our Customers Say</h2>

                    <span></span>

                </div>

                <!-- Slider -->

                <div class="swiper testimonialSlider">

                    <div class="swiper-wrapper">

                        <!-- Testimonial 1 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    The quality of Rudraksha and gemstones is excellent.
                                    I feel positive energy since I started wearing them.

                                </p>

                                <h4>Priya Sharma</h4>

                                <span>Mumbai</span>

                            </div>

                        </div>

                        <!-- Testimonial 2 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    Fast delivery and beautifully packed.
                                    Bracelets are truly authentic and energized.

                                </p>

                                <h4>Rahul Verma</h4>

                                <span>Delhi</span>

                            </div>

                        </div>

                        <!-- Testimonial 3 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    Excellent collection of spiritual products.
                                    Highly recommended for everyone.

                                </p>

                                <h4>Anjali Mehta</h4>

                                <span>Bangalore</span>

                            </div>

                        </div>

                        <!-- Testimonial 4 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    I got my consultation and it was very insightful.
                                    Great experience with the team.

                                </p>

                                <h4>Vikram Patel</h4>

                                <span>Ahmedabad</span>

                            </div>

                        </div>

                        <!-- Testimonial 5 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    Beautiful crystals with genuine quality.
                                    Packaging and delivery were excellent.

                                </p>

                                <h4>Sneha Reddy</h4>

                                <span>Hyderabad</span>

                            </div>

                        </div>

                        <!-- Testimonial 6 -->

                        <div class="swiper-slide">

                            <div class="testimonial-card">

                                <div class="testimonial-stars">

                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>

                                </div>

                                <p class="testimonial-text">

                                    Highly satisfied with my purchase.
                                    Customer support was friendly and helpful.

                                </p>

                                <h4>Karan Singh</h4>

                                <span>Pune</span>

                            </div>

                        </div>

                    </div>

                    <!-- Pagination -->

                    <div class="testimonial-pagination swiper-pagination"></div>

                </div>

            </div>

        </section>






        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- GSAP for premium animations -->
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script>
            const heroSwiper = new Swiper(".heroSwiper", {

                loop: true,

                speed: 900,

                spaceBetween: 0,

                effect: "slide",

                autoplay: {

                    delay: 4000,

                    disableOnInteraction: false,

                    pauseOnMouseEnter: true,

                },

                navigation: {

                    nextEl: ".swiper-button-next",

                    prevEl: ".swiper-button-prev",

                },

                pagination: {

                    el: ".swiper-pagination",

                    clickable: true,

                },

                keyboard: true,

                grabCursor: true,

            });
        </script>

        <!-- <script>

                                                                                                    document.addEventListener("DOMContentLoaded", function () {

                                                                                                        const categorySlider = new Swiper(".sscCategorySlider", {

                                                                                                            slidesPerView: 8,
                                                                                                            spaceBetween: 20,
                                                                                                            loop: true,
                                                                                                            speed: 800,

                                                                                                            autoplay: {
                                                                                                                delay: 2500,
                                                                                                                disableOnInteraction: false,
                                                                                                                pauseOnMouseEnter: true,
                                                                                                            },

                                                                                                            navigation: {
                                                                                                                nextEl: ".ssc-next",
                                                                                                                prevEl: ".ssc-prev",
                                                                                                            },

                                                                                                            breakpoints: {

                                                                                                                320: {
                                                                                                                    slidesPerView: 2,
                                                                                                                    spaceBetween: 10,
                                                                                                                },

                                                                                                                576: {
                                                                                                                    slidesPerView: 3,
                                                                                                                    spaceBetween: 15,
                                                                                                                },

                                                                                                                768: {
                                                                                                                    slidesPerView: 4,
                                                                                                                    spaceBetween: 15,
                                                                                                                },

                                                                                                                992: {
                                                                                                                    slidesPerView: 6,
                                                                                                                    spaceBetween: 18,
                                                                                                                },

                                                                                                                1200: {
                                                                                                                    slidesPerView: 8,
                                                                                                                    spaceBetween: 20,
                                                                                                                }

                                                                                                            }

                                                                                                        });

                                                                                                    });

                                                                                                </script> -->


        <!-- 
                                                                                            <script>
                                                                                                document.addEventListener("DOMContentLoaded", function () {

                                                                                                    new Swiper(".sscCategorySlider", {

                                                                                                        slidesPerView: "auto",
                                                                                                        spaceBetween: 20,

                                                                                                        loop: true,
                                                                                                        speed: 1000,

                                                                                                        freeMode: true,
                                                                                                        freeModeMomentum: false,

                                                                                                        autoplay: {
                                                                                                            delay: 0,
                                                                                                            disableOnInteraction: false,
                                                                                                            pauseOnMouseEnter: true,
                                                                                                        },

                                                                                                        navigation: {
                                                                                                            nextEl: ".ssc-next",
                                                                                                            prevEl: ".ssc-prev",
                                                                                                        },

                                                                                                    });

                                                                                                });
                                                                                            </script> -->


        <script>


            const categorySlider = new Swiper(".sscCategorySlider", {
                slidesPerView: "auto",
                spaceBetween: 20,

                loop: true,
                speed: 5000,

                allowTouchMove: true,

                autoplay: {
                    delay: 1,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: false,
                },

                freeMode: {
                    enabled: true,
                    momentum: false,
                },

                navigation: {
                    nextEl: ".ssc-next",
                    prevEl: ".ssc-prev",
                },
            });
        </script>

        <script>

            document.addEventListener("DOMContentLoaded", function () {

                new Swiper(".popularCategorySlider", {

                    loop: true,

                    speed: 1000,

                    spaceBetween: 20,

                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: false,
                    },

                    navigation: {
                        nextEl: ".pc-next",
                        prevEl: ".pc-prev",
                    },

                    breakpoints: {
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10
                        },
                        576: {
                            slidesPerView: 3,
                            spaceBetween: 15
                        },
                        768: {
                            slidesPerView: 5,
                            spaceBetween: 20
                        },
                        992: {
                            slidesPerView: 6,
                            spaceBetween: 20
                        },
                        1200: {
                            slidesPerView: 7,
                            spaceBetween: 20
                        }
                    }

                });

            });
        </script>



        <script>
            document.addEventListener("DOMContentLoaded", function () {

                new Swiper(".testimonialSlider", {

                    loop: true,

                    speed: 900,

                    spaceBetween: 25,

                    grabCursor: true,

                    centeredSlides: false,

                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },

                    pagination: {
                        el: ".testimonial-pagination",
                        clickable: true,
                    },

                    breakpoints: {

                        320: {
                            slidesPerView: 1,
                            spaceBetween: 15,
                        },

                        576: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },

                        992: {
                            slidesPerView: 3,
                            spaceBetween: 20,
                        },

                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 25,
                        }

                    },

                    on: {

                        init: function () {

                            document.querySelectorAll(".testimonial-card").forEach((card, index) => {

                                card.style.opacity = "0";
                                card.style.transform = "translateY(50px)";

                                setTimeout(() => {

                                    card.style.transition = ".7s ease";

                                    card.style.opacity = "1";

                                    card.style.transform = "translateY(0)";

                                }, index * 150);

                            });

                        }

                    }

                });

            });
        </script>

    </section>
@endsection