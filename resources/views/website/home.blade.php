@extends('layouts.website')
@section('content')

    <style>
        /* =========================================
                               FEATURES STRIP - COMPLETE RESPONSIVE
                            ========================================= */

        .features-strip {
            padding: 50px 0;
            background: #f6f6f6;
        }

        .features-strip .container {
            max-width: 1400px;
            margin: auto;
            padding: 0 15px;

            display: grid;
            grid-template-columns: repeat(5, 1fr);

            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .feature-card {
            display: flex;
            align-items: center;
            gap: 16px;

            padding: 28px 22px;

            border-right: 1px solid #ececec;

            transition: all .35s ease;
        }

        .feature-card.no-border {
            border-right: none;
        }

        .feature-card:hover {
            background: #fafafa;
            transform: translateY(-5px);
        }

        /* Icon */
        .feature-card .icon {
            width: 72px;
            height: 72px;
            min-width: 72px;

            border-radius: 50%;
            background: #f8f3e8;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-card .icon i {
            font-size: 30px;
            color: #d4a02a;
        }

        /* Text */
        .feature-card .content h4 {
            margin: 0 0 6px;

            font-size: 22px;
            font-weight: 700;
            line-height: 1.3;
            color: #222;
        }

        .feature-card .content p {
            margin: 0;

            font-size: 15px;
            line-height: 1.5;
            color: #777;
        }


        /* =========================================
                               TABLET RESPONSIVE (768px - 991px)
                            ========================================= */
        @media (max-width: 991px) {

            .features-strip {
                padding: 40px 0;
            }

            .features-strip .container {
                grid-template-columns: repeat(2, 1fr);
                gap: 1px;
                background: #ececec;
            }

            .feature-card {
                background: #fff;
                border-right: none;
                padding: 24px 20px;
            }

            .feature-card .icon {
                width: 64px;
                height: 64px;
                min-width: 64px;
            }

            .feature-card .icon i {
                font-size: 26px;
            }

            .feature-card .content h4 {
                font-size: 20px;
            }

            .feature-card .content p {
                font-size: 14px;
            }
        }

        /* ==================================
                               FEATURES STRIP - MOBILE 2x2
                            ================================== */

        @media (max-width: 767px) {

            .features-strip {
                padding: 25px 0;
            }

            .features-strip .container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;

                background: transparent;
                box-shadow: none;
                border-radius: 0;
                padding: 0 12px;
            }

            .feature-card {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;

                padding: 18px 14px;

                background: #fff;
                border: 1px solid #ececec;
                border-radius: 16px;

                gap: 10px;
                min-height: 160px;

                box-shadow: 0 4px 14px rgba(0, 0, 0, .06);
            }

            /* Remove desktop border */
            .feature-card,
            .feature-card.no-border {
                border-right: 1px solid #ececec;
            }

            /* Last card full width */
            .feature-card:last-child {
                grid-column: 1 / -1;
            }

            .feature-card .icon {
                width: 54px;
                height: 54px;
                min-width: 54px;

                display: flex;
                align-items: center;
                justify-content: center;

                background: #f8f3e8;
                border-radius: 50%;
            }

            .feature-card .icon i {
                font-size: 22px;
                color: #d4a02a;
            }

            .feature-card .content h4 {
                margin: 0 0 4px;
                font-size: 16px;
                font-weight: 700;
                line-height: 1.3;
                color: #222;
            }

            .feature-card .content p {
                margin: 0;
                font-size: 13px;
                line-height: 1.4;
                color: #666;
            }
        }


        /* =========================================
                               LARGE DESKTOP (1200px+)
                            ========================================= */
        @media (min-width: 1200px) {

            .feature-card {
                padding: 32px 26px;
            }

            .feature-card .content h4 {
                font-size: 24px;
            }

            .feature-card .content p {
                font-size: 16px;
            }
        }
    </style>
    <style>
        /* Tablet */
        @media (max-width: 991px) {
            .promo-section {
                padding-top: 20px;
                padding-bottom: 20px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .promo-section {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
        }

        /* Tablet */
        @media (max-width: 991px) {
            .featured-products-section {
                padding-top: 25px;
                padding-bottom: 25px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .featured-products-section {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
        }

        /* Desktop */
        .ssc-category-section {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* Tablet */
        @media (max-width: 991px) {
            .ssc-category-section {
                padding-top: 25px;
                padding-bottom: 25px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .ssc-category-section {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
        }

        /* Desktop */
        .blog-section {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        /* Tablet */
        @media (max-width: 991px) {
            .blog-section {
                padding-top: 25px;
                padding-bottom: 25px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .blog-section {
                padding-top: 10px !important;
                padding-bottom: 10px !important;
            }
        }
    </style>

    <!--==============================
                                                                                                                                                                                                                                                                HERO SLIDER
                                                                                                                                                                                                                                                        ================================-->

    <section class="hero-slider">

        <div class="swiper heroSwiper">

            <div class="swiper-wrapper">

                @forelse($banners as $banner)
                    <div class="swiper-slide">
                        <img src="{{ asset($banner->image) }}" alt="{{ $banner->title }}">
                    </div>
                @empty
                    <div class="swiper-slide">
                        <img src="{{ asset('website') }}/images/bann2.jpeg" alt="Default Banner">
                    </div>
                @endforelse

            </div>

            <!-- Arrows -->
            {{-- <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> --}}

            <!-- Pagination -->
            <div class="swiper-pagination"></div>

        </div>




        <section class="features-strip">

            <div class="container">

                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">

                    <div class="icon">
                        <i class="fa-solid fa-truck-fast"></i>
                    </div>

                    <div class="content">
                        <h4>Free Shipping</h4>
                        <p>On Orders Above ₹999</p>
                    </div>

                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">

                    <div class="icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div class="content">
                        <h4>100% Authentic</h4>
                        <p>Certified Products</p>
                    </div>

                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">

                    <div class="icon">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                    </div>

                    <div class="content">
                        <h4>Easy Returns</h4>
                        <p>7 Days Return Policy</p>
                    </div>

                </div>

                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">

                    <div class="icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <div class="content">
                        <h4>Customer Support</h4>
                        <p>+91 12345 67890</p>
                    </div>

                </div>

                <div class="feature-card no-border" data-aos="fade-up" data-aos-delay="500">

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


        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 900,
                easing: "ease-out-cubic",
                once: true,
                offset: 100
            });
        </script>


        <!--=========================================
                                                                                                                                        SHOP CATEGORY SECTION
                                                                                                                                ==========================================-->
        <section class="ssc-category-section" data-aos="fade-up">

            <div class="container">

                <div class="ssc-heading" data-aos="fade-down" data-aos-duration="1000">

                    <span></span>

                    <h2>Shop by Category</h2>

                    <span></span>

                </div>

                <div class="swiper sscCategorySlider">

                    <div class="swiper-wrapper">

                        <!-- Card 1 -->
                        @forelse($categories as $key => $category)
                            <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="{{ 100 + ($key * 50) }}">

                                <a href="#" class="ssc-card">

                                    <div class="ssc-image">

                                        <img src="{{ asset($category->image) }}" alt="{{ $category->title }}">

                                    </div>

                                    <h4>{{ $category->title }}</h4>

                                    <p>Collection</p>

                                </a>

                            </div>
                        @empty
                            <div class="swiper-slide">
                                <p>No categories found.</p>
                            </div>
                        @endforelse


                    </div>

                </div>

            </div>

        </section>





        <!--=========================================
                                                                                                                                    FEATURED PRODUCTS
                                                                                                                       ==========================================-->

        <!-- <section class="fp-section">

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

                                                                                                                                            <div class="fp-grid"> -->

        <!-- PRODUCT 1 -->

        <!-- <div class="fp-card" data-aos="fade-up">

                                                                                                                                                    <span class="fp-badge sale">Sale</span>

                                                                                                                                                    <button class="fp-heart">
                                                                                                                                                        <i class="fa-regular fa-heart"></i>
                                                                                                                                                    </button>

                                                                                                                                                    <div class="fp-image">

                                                                                                                                                        <img src="{{ asset('website') }}/images/7rudramala.png" alt="">

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

                                                                                                                                                </div> -->

        <!-- PRODUCT 2 -->

        <!-- <div class="fp-card" data-aos="fade-up" data-aos-delay="100">

                                                                                                                                                    <span class="fp-badge best">
                                                                                                                                                        Best Seller
                                                                                                                                                    </span>

                                                                                                                                                    <button class="fp-heart">
                                                                                                                                                        <i class="fa-regular fa-heart"></i>
                                                                                                                                                    </button>

                                                                                                                                                    <div class="fp-image">

                                                                                                                                                        <img src="{{ asset('website') }}/images/bracelet.png" alt="">

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

                                                                                                                                                </div> -->

        <!-- PRODUCT 3 -->

        <!-- <div class="fp-card" data-aos="fade-up" data-aos-delay="200">

                                                                                                                                                    <span class="fp-badge sale">
                                                                                                                                                        Sale
                                                                                                                                                    </span>

                                                                                                                                                    <button class="fp-heart">
                                                                                                                                                        <i class="fa-regular fa-heart"></i>
                                                                                                                                                    </button>

                                                                                                                                                    <div class="fp-image">

                                                                                                                                                        <img src="{{ asset('website') }}/images/bracevio.png" alt="">

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

                                                                                                                                                </div> -->


        <!-- PRODUCT 4 -->

        <!-- <div class="fp-card" data-aos="fade-up" data-aos-delay="300">

                                                                                                                                                    <span class="fp-badge best">Best Seller</span>

                                                                                                                                                    <button class="fp-heart">
                                                                                                                                                        <i class="fa-regular fa-heart"></i>
                                                                                                                                                    </button>

                                                                                                                                                    <div class="fp-image">

                                                                                                                                                        <img src="{{ asset('website') }}/images/laxmiyantra.png" alt="Karungali Bracelet">

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

                                                                                                                                                </div> -->

        <!-- PRODUCT 5 -->

        <!-- <div class="fp-card" data-aos="fade-up" data-aos-delay="400">

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

                                                                                                                                                </div> -->

        <!-- PRODUCT 6 -->

        <!-- <div class="fp-card" data-aos="fade-up" data-aos-delay="500">

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

                                                                                                                                    </section> -->



        <!--==========================================
                                                                                                                                    FEATURED PRODUCTS SECTION
                                                                                                                                ===========================================-->

        <section class="featured-products-section" data-aos="fade-up">

            <div class="container">

                <div class="featured-products-title-row">

                    <div class="featured-products-title-wrap" data-aos="fade-right" data-aos-duration="1000">

                        <span class="featured-products-title-arrow">
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </span>

                        <h2>Featured Products</h2>

                        <span class="featured-products-title-arrow featured-products-title-arrow-left">
                            <i class="fa-solid fa-arrow-left-long"></i>
                        </span>

                    </div>

                    <a href="{{ route('shop') }}" class="featured-products-viewall-btn" data-aos="fade-left"
                        data-aos-duration="1000">View All</a>

                </div>

                <div class="featured-products-grid" id="featuredProductsGrid">

                    @forelse($featuredProducts as $product)

                        @php
                            $variant = $product->variant;

                            $price = $variant->price ?? 0;
                            $oldPrice = $variant->actual_price ?? $price;

                            $discount = 0;
                            if ($oldPrice > $price && $oldPrice > 0) {
                                $discount = round((($oldPrice - $price) / $oldPrice) * 100);
                            }
                        @endphp

                        <div class="featured-products-card" data-id="{{ $product->id }}" data-aos="zoom-in-up"
                            data-aos-delay="{{ ($loop->index + 1) * 100 }}">

                            <div class="featured-products-card-img">

                                @if($product->is_feature == 'yes')
                                    <span class="featured-products-badge featured-products-badge-best">Best Seller</span>
                                @endif

                                <button type="button" class="featured-products-wish-btn" title="Add to wishlist"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </button>

                                <a href="#" class="featured-products-img-link">
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                </a>

                            </div>

                            <div class="featured-products-card-body">

                                <a href="#" class="featured-products-name">{{ $product->title }}</a>

                                <div class="featured-products-rating">

                                    <span class="featured-products-stars">
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </span>

                                    <span class="featured-products-review-count">(4.5)</span>

                                </div>

                                <div class="featured-products-price">

                                    <span class="now">₹{{ number_format($price) }}</span>

                                    @if($oldPrice > $price)
                                        <span class="old">₹{{ number_format($oldPrice) }}</span>
                                        <span class="off">({{ $discount }}% OFF)</span>
                                    @endif

                                </div>

                                <div class="featured-products-actions">

                                    <button type="button" class="featured-products-cart-btn addToCartBtn"
                                        data-id="{{ $variant->id ?? '' }}" data-name="{{ $product->title }}"
                                        data-price="{{ $price }}">
                                        Add to Cart
                                    </button>

                                    <button type="button" class="featured-products-cart-icon-btn addToCartBtn" title="Quick add"
                                        data-id="{{ $variant->id ?? '' }}">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>

                                </div>

                            </div>

                        </div>

                    @empty
                        <div class="featured-products-card">
                            <p>No featured products found.</p>
                        </div>
                    @endforelse

                </div>

                <div class="featured-products-toast" id="featuredProductsToast">
                    <i class="fa-solid fa-circle-check"></i>
                    <span id="featuredProductsToastText">Added to cart!</span>
                </div>

            </div>

        </section>

        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 1000,
                easing: "ease-in-out",
                once: true,
                offset: 80
            });
        </script>

        <section class="promo-section" data-aos="fade-up" style="padding-top: 10px; padding-bottom: 10px;">

            <div class="promo-grid">

                <!-- Card 1 -->
                <a href="{{ route('shop') }}" class="promo-card" data-aos="zoom-in" data-aos-delay="100">

                    <img src="{{ asset('website/images/card1.png') }}" alt="Rudraksha Collection">

                </a>

                <!-- Card 2 -->
                <a href="{{ route('shop') }}" class="promo-card" data-aos="zoom-in" data-aos-delay="250">

                    <img src="{{ asset('website/images/card2.png') }}" alt="Gemstone Collection">

                </a>

                <!-- Card 3 -->
                <a href="{{ route('shop') }}" class="promo-card" data-aos="zoom-in" data-aos-delay="400">

                    <img src="{{ asset('website/images/card1.png') }}" alt="Yantra Collection">

                </a>

            </div>

        </section>


        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 1000,
                easing: "ease-in-out",
                once: true,
                offset: 80
            });
        </script>

        <!--=========================
                                                                                                                                                                                            WHY CHOOSE SECTION
                                                                                                                                                                                            ==========================-->

        <section class="ss-why-section" data-aos="fade-up" style="margin: 10px; padding: 10px;">

            <div class="container">

                <div class="ss-why-box">

                    <div class="ss-title" data-aos="fade-down" data-aos-duration="1000"
                        style="padding: 10px; margin-bottom: 20px;">

                        <span></span>

                        <h2>Why Choose StarSigns?</h2>

                        <span></span>

                    </div>

                    <div class="ss-features">

                        <!-- Item -->
                        <div class="ss-item" data-aos="fade-up" data-aos-delay="100">

                            <div class="ss-icon">
                                <i class="fa-regular fa-lightbulb"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Energized & Blessed</h4>
                                <p>By Experts</p>
                            </div>

                        </div>

                        <!-- Item -->
                        <div class="ss-item" data-aos="fade-up" data-aos-delay="200">

                            <div class="ss-icon">
                                <i class="fa-solid fa-flask"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Lab Tested</h4>
                                <p>100% Quality Assured</p>
                            </div>

                        </div>

                        <!-- Item -->
                        <div class="ss-item" data-aos="fade-up" data-aos-delay="300">

                            <div class="ss-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Pan India Delivery</h4>
                                <p>Fast & Reliable</p>
                            </div>

                        </div>

                        <!-- Item -->
                        <div class="ss-item" data-aos="fade-up" data-aos-delay="400">

                            <div class="ss-icon">
                                <i class="fa-solid fa-wallet"></i>
                            </div>

                            <div class="ss-content">
                                <h4>Secure Payments</h4>
                                <p>Multiple Options</p>
                            </div>

                        </div>

                        <!-- Item -->
                        <div class="ss-item" data-aos="fade-up" data-aos-delay="500">

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
        <style>
            .ss-item {
                padding: 10px;
            }
        </style>


        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 1000,
                easing: "ease-in-out",
                once: true,
                offset: 100
            });
        </script>
        <!--=========================
                                                                                                                        POPULAR CATEGORIES
                                                                                                                    ==========================-->

        <!-- <section class="popular-category-section" data-aos="fade-up">

                                                                        <div class="container">

                                                                            <div class="pc-title" data-aos="fade-down" data-aos-duration="1000">

                                                                                <span></span>

                                                                                <h2>Popular Categories</h2>

                                                                                <span></span>

                                                                            </div>

                                                                            <div class="swiper popularCategorySlider">

                                                                                <div class="swiper-wrapper">

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="100">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Pyramids</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="150">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Crystals</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="200">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Zodiac</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="250">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Pendants</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="300">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Idols</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="350">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Vastu</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="400">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
                                                                                            </div>
                                                                                            <h4>Astrology Books</h4>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="swiper-slide" data-aos="zoom-in" data-aos-delay="450">
                                                                                        <div class="pc-card">
                                                                                            <div class="pc-circle">
                                                                                                <img src="{{ asset('website') }}/images/product-1.png">
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


                                                                    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

                                                                    <script>
                                                                        AOS.init({
                                                                            duration: 1000,
                                                                            easing: "ease-in-out-cubic",
                                                                            once: true,
                                                                            offset: 80
                                                                        });
                                                                    </script> -->

        <!--=========================
                                                                                                                                            LATEST BLOG SECTION
                                                                                                                                            ==========================-->

        <section class="blog-section" data-aos="fade-up">

            <div class="container">

                <div class="blog-header">

                    <div class="blog-title" data-aos="fade-right" data-aos-duration="1000">

                        <span></span>

                        <h2>Latest from Blog</h2>

                        <span></span>

                    </div>

                    <a href="{{ route('blog') }}" class="blog-view-all" data-aos="fade-left" data-aos-duration="1000">
                        View All
                    </a>

                </div>

                <div class="blog-grid">

                    <!-- CARD 1 -->

                    @forelse($blogs as $key => $blog)

                        <div class="blog-card" data-aos="zoom-in-up" data-aos-delay="{{ ($key + 1) * 100 }}">

                            <div class="blog-image">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                            </div>

                            <div class="blog-content">

                                <span class="blog-date">
                                    {{ $blog->created_at->format('d M Y') }}
                                </span>

                                <h3>
                                    {{ Str::limit($blog->title, 55) }}
                                </h3>

                                <a href="{{ route('blog-details', $blog->slug) }}">
                                    Read More
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    @empty

                        <p>No blogs found.</p>

                    @endforelse

                </div>

            </div>

        </section>



        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 1000,
                easing: "ease-in-out-cubic",
                once: true,
                offset: 100
            });
        </script>

        <!--==========================================
                                                                                                                                                TESTIMONIAL SECTION
                                                                                                                                        ===========================================-->

        <section class="testimonial-section" data-aos="fade-up">

            <div class="container">

                <!-- Heading -->

                <div class="testimonial-heading" data-aos="fade-down" data-aos-duration="1000">
                    <span></span>

                    <h2>What Our Customers Say</h2>

                    <span></span>

                </div>

                <!-- Slider -->

                <div class="swiper testimonialSlider" data-aos="zoom-in" data-aos-duration="1200">
                    <div class="swiper-wrapper">

                        <!-- Testimonial 1 -->

                        @forelse($testimonials as $key => $testimonial)

                            <div class="swiper-slide" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">

                                <div class="testimonial-card">

                                    <div class="testimonial-stars" style="color: #fff">

                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                <i class="fa-solid fa-star"></i>
                                            @else
                                                <i class="fa-regular fa-star"></i>
                                            @endif
                                        @endfor

                                    </div>

                                    <p class="testimonial-text">

                                        {{ $testimonial->message }}

                                    </p>

                                    <h4>{{ $testimonial->name }}</h4>

                                    <span>{{ \Carbon\Carbon::parse($testimonial->date)->format('d M Y') }}</span>

                                </div>

                            </div>

                        @empty

                            <div class="swiper-slide">

                                <div class="testimonial-card">
                                    <p class="testimonial-text">No testimonials available.</p>
                                </div>

                            </div>

                        @endforelse

                    </div>

                    <!-- Pagination -->

                    <div class="testimonial-pagination swiper-pagination"></div>

                </div>

            </div>

        </section>


        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({

                duration: 1000,

                easing: "ease-in-out-cubic",

                once: true,

                offset: 100

            });
        </script>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <!-- GSAP for premium animations -->
        <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

        <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

        <script>
            AOS.init({
                duration: 900,
                easing: "ease-out-cubic",
                once: true,
                offset: 80
            });
        </script>

        <script>
            const heroSwiper = new Swiper(".heroSwiper", {

                loop: true,

                speed: 3000,

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
                speed: 6000,

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



        <script>
            (function () {

                const grid = document.getElementById("featuredProductsGrid");
                const toast = document.getElementById("featuredProductsToast");
                const toastText = document.getElementById("featuredProductsToastText");

                let toastTimer = null;

                function showToast(message) {
                    toastText.textContent = message;
                    toast.classList.add("show");

                    clearTimeout(toastTimer);
                    toastTimer = setTimeout(() => {
                        toast.classList.remove("show");
                    }, 2000);
                }

                function updateHeaderCartCount(delta) {
                    const cartCountEl = document.querySelector("#headerCartCount, .cart-count, [data-cart-count]");
                    if (!cartCountEl) return;
                    const current = parseInt(cartCountEl.textContent.replace(/\D/g, "")) || 0;
                    cartCountEl.textContent = current + delta;
                }

                function updateHeaderWishlistCount(delta) {
                    const wishCountEl = document.querySelector("#headerWishlistCount, .wishlist-count, [data-wishlist-count]");
                    if (!wishCountEl) return;
                    const current = parseInt(wishCountEl.textContent.replace(/\D/g, "")) || 0;
                    wishCountEl.textContent = Math.max(0, current + delta);
                }

                grid.addEventListener("click", function (e) {

                    const card = e.target.closest(".featured-products-card");
                    if (!card) return;

                    /* -----------------------------------
                       Wishlist heart toggle
                    ----------------------------------- */
                    const wishBtn = e.target.closest(".featured-products-wish-btn");
                    if (wishBtn) {

                        const icon = wishBtn.querySelector("i");
                        const isActive = wishBtn.classList.toggle("active");

                        icon.classList.toggle("fa-regular", !isActive);
                        icon.classList.toggle("fa-solid", isActive);

                        const productName = card.querySelector(".featured-products-name").textContent.trim();

                        if (isActive) {
                            showToast(productName + " added to wishlist!");
                            updateHeaderWishlistCount(1);
                        } else {
                            showToast(productName + " removed from wishlist.");
                            updateHeaderWishlistCount(-1);
                        }

                        // TODO: replace with real AJAX call to your wishlist endpoint
                        // fetch('/wishlist/toggle', { method: 'POST', body: JSON.stringify({ id: wishBtn.dataset.id }) })

                        return;
                    }

                    /* -----------------------------------
                       Add to Cart (text button)
                    ----------------------------------- */
                    const cartBtn = e.target.closest(".featured-products-cart-btn");
                    if (cartBtn) {

                        const originalText = cartBtn.textContent;
                        const productName = cartBtn.dataset.name;

                        cartBtn.disabled = true;
                        cartBtn.innerHTML = '<i class="fa-solid fa-check"></i> Added!';
                        cartBtn.classList.add("added");

                        showToast(productName + " added to cart!");
                        updateHeaderCartCount(1);

                        // TODO: replace with real AJAX call to your cart endpoint
                        // fetch('/cart/add', { method: 'POST', body: JSON.stringify({ id: cartBtn.dataset.id, price: cartBtn.dataset.price }) })

                        setTimeout(() => {
                            cartBtn.disabled = false;
                            cartBtn.textContent = originalText;
                            cartBtn.classList.remove("added");
                        }, 1400);

                        return;
                    }

                    /* -----------------------------------
                       Add to Cart (icon-only button)
                    ----------------------------------- */
                    const cartIconBtn = e.target.closest(".featured-products-cart-icon-btn");
                    if (cartIconBtn) {

                        const icon = cartIconBtn.querySelector("i");
                        const productName = card.querySelector(".featured-products-name").textContent.trim();

                        icon.classList.remove("fa-cart-shopping");
                        icon.classList.add("fa-check");
                        cartIconBtn.classList.add("added");

                        showToast(productName + " added to cart!");
                        updateHeaderCartCount(1);

                        setTimeout(() => {
                            icon.classList.remove("fa-check");
                            icon.classList.add("fa-cart-shopping");
                            cartIconBtn.classList.remove("added");
                        }, 1400);

                        return;
                    }

                });

            })();
        </script>



    </section>
@endsection