@extends('layouts.website')
@section('content')

    <!--==========================
                        PAGE BANNER (shared layout component - reused as-is)
                    ===========================-->
    <section class="wishlist-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="wishlist-banner-content">

                <h1 data-aos="fade-up" data-aos-delay="200">
                    Wishlist
                </h1>

                <div class="wishlist-breadcrumb" data-aos="fade-up" data-aos-delay="400">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="wishlist-active">
                        Wishlist
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
                        WISHLIST PAGE CONTENT
                    ===========================================-->

    <section class="wishlist-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="wishlist-page-crumb">

                <a href="/">Home</a>
                <span class="wishlist-page-crumb-sep">/</span>
                <span class="wishlist-page-crumb-active">Wishlist</span>

            </div>

            <!--=========================
                                HEADER ROW
                            ==========================-->

            <div class="wishlist-page-header">

                <div class="wishlist-page-title-wrap">

                    <h2 class="wishlist-page-title">
                        My Wishlist
                    </h2>
                    <span class="wishlist-page-title-divider">✦</span>

                    <p class="wishlist-page-subtitle">Items you love, all in one place.</p>

                </div>

                {{-- <div class="wishlist-page-header-actions">

                    <button type="button" class="wishlist-page-move-all-btn" id="wishlistPageMoveAllBtn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Move All to Cart
                    </button>

                    <button type="button" class="wishlist-page-clear-btn" id="wishlistPageClearBtn">
                        <i class="fa-solid fa-trash"></i>
                        Clear Wishlist
                    </button>

                </div> --}}

            </div>

            <!--=========================
                                WISHLIST GRID
                            ==========================-->

            <div class="wishlist-page-grid" id="wishlistPageGrid">

                @forelse($wishlistItems as $item)

                    @php
                        $variant = $item->variant;
                        $product = $variant?->product;

                        $price = $variant?->price ?? 0;
                        $actualPrice = $variant?->actual_price ?? $price;

                        $discount = 0;

                        if ($actualPrice > 0 && $actualPrice > $price) {
                            $discount = round(
                                (($actualPrice - $price) / $actualPrice) * 100
                            );
                        }

                        $image = $variant?->image;

                        if (!$image) {
                            $image = 'product-1.png';
                        }
                    @endphp

                    @if($variant && $product)

                        <div class="wishlist-page-card" data-id="{{ $item->id }}" data-variant-id="{{ $variant->id }}">

                            {{-- PRODUCT IMAGE --}}
                            <div class="wishlist-page-card-img">

                                <a href="{{ route('product-detail', $product->slug) }}">

                                    <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">

                                </a>

                                {{-- REMOVE HEART --}}
                                <button type="button" class="wishlist-page-heart-btn active" title="Remove from wishlist"
                                    data-id="{{ $item->id }}">

                                    <i class="fa-solid fa-heart"></i>

                                </button>

                            </div>


                            {{-- PRODUCT DETAILS --}}
                            <div class="wishlist-page-card-body">

                                <h4>
                                    {{ $product->title }}
                                </h4>


                                {{-- RATING --}}
                                <div class="wishlist-page-rating">

                                    <span class="wishlist-page-stars">

                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>

                                    </span>

                                    <span>
                                        4.5
                                    </span>

                                    <span>
                                        (0)
                                    </span>

                                </div>


                                {{-- PRICE --}}
                                <div class="wishlist-page-price">

                                    <span class="now">
                                        ₹{{ number_format($price) }}
                                    </span>

                                    @if($actualPrice > $price)

                                        <span class="old">
                                            ₹{{ number_format($actualPrice) }}
                                        </span>

                                        <span class="off">
                                            {{ $discount }}% OFF
                                        </span>

                                    @endif

                                </div>


                                {{-- STOCK --}}

                                <div class="wishlist-page-stock">

                                    <i class="fa-solid fa-circle"></i>

                                    In Stock

                                </div>


                                {{-- ACTIONS --}}
                                <div class="wishlist-page-card-actions">

                                    <button type="button" class="wishlist-page-add-btn addToCartBtn" data-id="{{ $variant->id }}">

                                        <i class="fa-solid fa-cart-shopping"></i>

                                        Add to Cart

                                    </button>


                                    <button type="button" class="wishlist-page-remove-btn" title="Remove item"
                                        data-id="{{ $item->id }}">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                    @endif

                @empty

                    <div class="wishlist-page-empty">

                        <i class="fa-regular fa-heart"></i>

                        <p>
                            Your wishlist is empty
                        </p>

                        <a href="{{ route('shop') }}" class="wishlist-page-empty-btn">
                            Explore Products
                        </a>

                    </div>

                @endforelse

            </div>

            <!-- Empty state (hidden by default) -->
            <div class="wishlist-page-empty" id="wishlistPageEmpty">

                <i class="fa-regular fa-heart"></i>
                <p>Your wishlist is empty</p>
                <a href="/shop" class="wishlist-page-empty-btn">Explore Products</a>

            </div>
        </div>

    </section>
@endsection