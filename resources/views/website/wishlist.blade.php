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
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            /*
            |--------------------------------------------------------------------------
            | REMOVE FROM WISHLIST
            |--------------------------------------------------------------------------
            */

            document.addEventListener('click', async function (event) {

                const removeButton = event.target.closest(
                    '.wishlist-page-heart-btn, .wishlist-page-remove-btn'
                );

                if (!removeButton) {
                    return;
                }

                event.preventDefault();

                const wishlistId = removeButton.dataset.id;

                if (!wishlistId) {
                    alert('Wishlist item not found.');
                    return;
                }

                const card = removeButton.closest('.wishlist-page-card');

                if (!confirm('Remove this item from your wishlist?')) {
                    return;
                }

                const originalHTML = removeButton.innerHTML;

                removeButton.disabled = true;

                removeButton.innerHTML = `
                <i class="fa-solid fa-spinner fa-spin"></i>
            `;

                try {

                    const response = await fetch(
                        "{{ url('/customer/wishlist/remove') }}/" + wishlistId,
                        {
                            method: 'DELETE',

                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                        }
                    );

                    const text = await response.text();

                    console.log('Wishlist Remove Response:', text);

                    let data;

                    try {
                        data = JSON.parse(text);
                    } catch (e) {
                        throw new Error(
                            'Server returned an invalid response.'
                        );
                    }

                    if (!response.ok || !data.status) {
                        throw new Error(
                            data.message || 'Unable to remove wishlist item.'
                        );
                    }

                    if (card) {

                        card.style.transition = 'all 0.3s ease';

                        card.style.opacity = '0';

                        card.style.transform = 'scale(0.9)';

                        setTimeout(function () {

                            card.remove();

                            checkWishlistEmpty();

                        }, 300);
                    }

                    updateWishlistCount(data.count);

                } catch (error) {

                    console.error('Wishlist Remove Error:', error);

                    alert(
                        error.message ||
                        'Something went wrong while removing the item.'
                    );

                    removeButton.innerHTML = originalHTML;

                    removeButton.disabled = false;
                }

            });


            /*
            |--------------------------------------------------------------------------
            | ADD TO CART
            |--------------------------------------------------------------------------
            */

            document.addEventListener('click', async function (event) {

                const button = event.target.closest('.addToCartBtn');

                if (!button) {
                    return;
                }

                event.preventDefault();

                const variantId = button.dataset.id;

                if (!variantId) {
                    alert('Product variant not found.');
                    return;
                }

                const originalHTML = button.innerHTML;

                button.disabled = true;

                button.innerHTML = `
                <i class="fa-solid fa-spinner fa-spin"></i>
                Adding...
            `;

                try {

                    const response = await fetch(
                        "{{ route('customer.cart.add') }}",
                        {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },

                            body: JSON.stringify({
                                product_variant_id: variantId,
                                quantity: 1
                            })
                        }
                    );

                    /*
                    |--------------------------------------------------------------------------
                    | If user is not logged in
                    |--------------------------------------------------------------------------
                    */

                    if (
                        response.status === 401 ||
                        response.status === 419
                    ) {

                        window.location.href = "{{ route('login') }}";

                        return;
                    }

                    const text = await response.text();

                    console.log('Cart Response:', text);

                    let data;

                    try {

                        data = JSON.parse(text);

                    } catch (e) {

                        console.error('Invalid JSON:', text);

                        throw new Error(
                            'Server returned an invalid response.'
                        );
                    }

                    if (!response.ok || !data.status) {

                        throw new Error(
                            data.message ||
                            'Unable to add product to cart.'
                        );
                    }


                    /*
                    |--------------------------------------------------------------------------
                    | SUCCESS
                    |--------------------------------------------------------------------------
                    */

                    button.innerHTML = `
                    <i class="fa-solid fa-check"></i>
                    Added to Cart
                `;

                    updateCartCount(data.count);

                    setTimeout(function () {

                        button.innerHTML = originalHTML;

                        button.disabled = false;

                    }, 1500);

                } catch (error) {

                    console.error('Cart Error:', error);

                    alert(
                        error.message ||
                        'Something went wrong while adding to cart.'
                    );

                    button.innerHTML = originalHTML;

                    button.disabled = false;
                }

            });


            /*
            |--------------------------------------------------------------------------
            | UPDATE CART COUNT
            |--------------------------------------------------------------------------
            */

            function updateCartCount(count) {

                if (count === undefined) {
                    return;
                }

                document.querySelectorAll(
                    '.cart-count'
                ).forEach(function (element) {

                    element.textContent = count;

                });

            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE WISHLIST COUNT
            |--------------------------------------------------------------------------
            */

            function updateWishlistCount(count) {

                if (count === undefined) {
                    return;
                }

                document.querySelectorAll(
                    '.wishlist-count'
                ).forEach(function (element) {

                    element.textContent = count;

                });

            }


            /*
            |--------------------------------------------------------------------------
            | SHOW EMPTY STATE
            |--------------------------------------------------------------------------
            */

            function checkWishlistEmpty() {

                const grid = document.getElementById(
                    'wishlistPageGrid'
                );

                const emptyBox = document.getElementById(
                    'wishlistPageEmpty'
                );

                if (!grid || !emptyBox) {
                    return;
                }

                const cards = grid.querySelectorAll(
                    '.wishlist-page-card'
                );

                if (cards.length === 0) {

                    emptyBox.style.display = 'block';

                }

            }

        });
    </script>
@endsection