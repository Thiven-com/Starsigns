@extends('layouts.website')
@section('content')

    <!--==========================
                                                                                PAGE BANNER
                                                                            ===========================-->
    <section class="product-details-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="product-details-banner-content" data-aos="fade-up">

                <h1>Product Details</h1>

                <div class="product-details-breadcrumb" data-aos="fade-left">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <a href="/shop">Shop</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="product-details-active">
                        Product Details
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!--==========================================
                                                                                PRODUCT DETAILS CONTENT
                                                                            ===========================================-->

    <section class="pdp-section">

        <div class="container">

            <!-- Breadcrumb (in-page) -->
            <div class="pdp-crumb">
                <a href="/">Home</a>
                <span class="pdp-crumb-sep">/</span>
                <a href="{{ route('shop') }}">Shop</a>
                <span class="pdp-crumb-sep">/</span>
                <a href="{{ route('shop', ['category' => $product->category_id]) }}">
                    {{ $product->category->title ?? 'Category' }}
                </a>
                <span class="pdp-crumb-sep">/</span>
                <span class="pdp-crumb-active">
                    {{ $product->title }} </span>
            </div>

            <!--=========================
                                                                                        GALLERY + INFO
                                                                                    ==========================-->

            <div class="pdp-main">

                <!-- Thumbnails -->
                <div class="pdp-thumbs">
                    <button type="button" class="pdp-thumb active" data-image="{{ asset($product->image) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                    </button>
                    @foreach($product->media as $media)
                        <button type="button" class="pdp-thumb" data-image="{{ asset($media->url) }}">
                            <img src="{{ asset($media->url) }}" alt="{{ $product->title }}">
                        </button>
                    @endforeach
                    <button type="button" class="pdp-thumb-more">
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                </div>

                <!-- Main gallery -->
                <div class="pdp-gallery" data-aos="zoom-in">
                    @if(($variant->actual_price ?? 0) > ($variant->price ?? 0))
                        <span class="pdp-badge-sale">Sale</span>
                    @endif
                    <button type="button" class="pdp-expand-btn">
                        <i class="fa-solid fa-expand"></i>
                    </button>
                    <img id="pdpMainImage" src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                </div>

                <!-- Info -->
                <div class="pdp-info" data-aos="fade-left">
                    <div class="pdp-info-head">
                        <h1>{{ $product->title }}</h1> <button type="button" class="pdp-wishlist-btn"> <i
                                class="fa-regular fa-heart"></i> Add to Wishlist </button>
                    </div>
                    <div class="pdp-rating"> <span class="pdp-stars"> <i class="fa-solid fa-star"></i> <i
                                class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i
                                class="fa-solid fa-star"></i> <i class="fa-solid fa-star-half-stroke"></i> </span>
                        <strong>4.5</strong> <span class="pdp-review-count">(64 Reviews)</span>
                    </div>
                    <div class="pdp-price"> <span class="pdp-price-now"> ₹{{ number_format($variant->price ?? 0, 2) }}
                        </span> @if(($variant->actual_price ?? 0) > ($variant->price ?? 0)) <span class="pdp-price-old">
                            ₹{{ number_format($variant->actual_price, 2) }} </span> <span class="pdp-price-off">
                            {{ round((($variant->actual_price - $variant->price) / $variant->actual_price) * 100) }}% OFF
                        </span> @endif </div>
                    <p class="pdp-desc"> {{ $product->short_description ?? $product->description }} </p>
                    <div class="pdp-features">
                        <div class="pdp-feature"> <span class="pdp-feature-ic"><i
                                    class="fa-solid fa-shield-halved"></i></span> <span>100% Natural Crystals</span> </div>
                        <div class="pdp-feature"> <span class="pdp-feature-ic"><i class="fa-regular fa-heart"></i></span>
                            <span>Handmade with Love</span>
                        </div>
                        <div class="pdp-feature"> <span class="pdp-feature-ic"><i class="fa-solid fa-sun"></i></span>
                            <span>Energized & Purified</span>
                        </div>
                        <div class="pdp-feature"> <span class="pdp-feature-ic"><i class="fa-solid fa-gem"></i></span>
                            <span>Premium Quality</span>
                        </div>
                    </div>
                    {{-- <div class="pdp-qty-row"> <span class="pdp-qty-label">Quantity:</span>
                        <div class="pdp-qty-box"> <button type="button" id="pdpQtyDec"> <i class="fa-solid fa-minus"></i>
                            </button> <input type="text" id="pdpQtyVal" value="1" readonly> <button type="button"
                                id="pdpQtyInc"> <i class="fa-solid fa-plus"></i> </button> </div>
                    </div> --}}
                    <div class="pdp-cta-row"> <button type="button" class="pdp-btn pdp-btn-cart addToCartBtn"
                            data-id="{{ $variant->id ?? '' }}" data-name="{{ $product->title }}"
                            data-price="{{ $variant->price ?? 0 }}"> <i class="fa-solid fa-bag-shopping"></i> Add to Cart
                        </button>
                    </div>
                    {{-- <div class="pdp-perks">
                        <div class="pdp-perk"> <span class="pdp-perk-ic"><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <div class="pdp-perk-title">Free Shipping</div>
                                <div class="pdp-perk-sub">On orders above ₹999</div>
                            </div>
                        </div>
                        <div class="pdp-perk"> <span class="pdp-perk-ic"><i class="fa-solid fa-lock"></i></span>
                            <div>
                                <div class="pdp-perk-title">Secure Payment</div>
                                <div class="pdp-perk-sub">100% secure & trusted</div>
                            </div>
                        </div>
                        <div class="pdp-perk"> <span class="pdp-perk-ic"><i class="fa-solid fa-headset"></i></span>
                            <div>
                                <div class="pdp-perk-title">Easy Returns</div>
                                <div class="pdp-perk-sub">7 days return policy</div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>

            <div class="pdp-tabs" data-aos="fade-up">

                <div class="pdp-tabs-nav">

                    <button type="button" class="pdp-tab-btn active" data-tab="pdpDescription">Description</button>
                </div>

                <div class="pdp-tab-panel active" id="pdpDescription">
                    <div class="pdp-tab-col"> {!! $product->description !!} </div>
                    <div class="pdp-spec-grid">
                        <div class="pdp-spec"> <span class="pdp-spec-ic"><i class="fa-solid fa-gem"></i></span>
                            <div>
                                <div class="pdp-spec-k">Category</div>
                                <div class="pdp-spec-v"> {{ $product->category->title ?? 'N/A' }} </div>
                            </div>
                        </div>
                        <div class="pdp-spec"> <span class="pdp-spec-ic"><i class="fa-solid fa-ruler"></i></span>
                            <div>
                                <div class="pdp-spec-k">Weight</div>
                                <div class="pdp-spec-v">{{ $variant->weight ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="pdp-spec"> <span class="pdp-spec-ic"><i class="fa-solid fa-link"></i></span>
                            <div>
                                <div class="pdp-spec-k">SKU</div>
                                <div class="pdp-spec-v">{{ $variant->sku ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="pdp-spec"> <span class="pdp-spec-ic"><i class="fa-solid fa-box"></i></span>
                            <div>
                                <div class="pdp-spec-k">Stock</div>
                                <div class="pdp-spec-v"> {{ $variant->stock ?? 0 }} Available </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--=========================
                                                                                        RELATED PRODUCTS
                                                                                    ==========================-->

            <h2 class="pdp-related-title">
                <i class="fa-solid fa-sparkles"></i>
                You May Also Like
                <i class="fa-solid fa-sparkles"></i>
            </h2>

            <div class="pdp-related-grid" data-aos="fade-up">

                @forelse($relatedProducts as $item)

                    @php
                        $rVariant = $item->variants->first();
                    @endphp

                    @if($rVariant)

                        <div class="pdp-rcard">

                            @if($rVariant->actual_price > $rVariant->price)
                                <span class="pdp-rtag sale">Sale</span>
                            @endif

                            <div class="pdp-rimg">

                                <a href="{{ route('product-detail', $item->slug) }}">

                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">

                                </a>

                            </div>

                            <div class="pdp-rbody">

                                <p class="pdp-rname">

                                    {{-- <a href="{{ route('product-detail', $item->slug) }}"> --}}
                                        <span>{{ $item->title }}</span>
                                        {{-- </a> --}}

                                </p>

                                <div class="pdp-rrating">

                                    <i class="fa-solid fa-star"></i>
                                    4.5
                                    <span>(48)</span>

                                </div>

                                <div class="pdp-rprice">

                                    <span class="now">
                                        ₹{{ number_format($rVariant->price, 2) }}
                                    </span>

                                    @if($rVariant->actual_price > $rVariant->price)

                                        <span class="old">
                                            ₹{{ number_format($rVariant->actual_price, 2) }}
                                        </span>

                                        <span class="off">
                                            {{ round((($rVariant->actual_price - $rVariant->price) / $rVariant->actual_price) * 100) }}%
                                            OFF
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endif

                @empty

                    <p>No related products found.</p>

                @endforelse

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

    <script>
        // Thumbnail gallery swap
        document.querySelectorAll(".pdp-thumb").forEach(thumb => {
            thumb.addEventListener("click", function () {
                document.querySelectorAll(".pdp-thumb").forEach(t => t.classList.remove("active"));
                this.classList.add("active");
                document.getElementById("pdpMainImage").src = this.dataset.image;
            });
        });

        // Quantity stepper
        (function () {
            let qty = 1;
            const qtyInput = document.getElementById("pdpQtyVal");

            document.getElementById("pdpQtyInc").addEventListener("click", function () {
                qty++;
                qtyInput.value = qty;
            });

            document.getElementById("pdpQtyDec").addEventListener("click", function () {
                if (qty > 1) {
                    qty--;
                    qtyInput.value = qty;
                }
            });
        })();

        // Tabs
        document.querySelectorAll(".pdp-tab-btn").forEach(btn => {
            btn.addEventListener("click", function () {
                document.querySelectorAll(".pdp-tab-btn").forEach(b => b.classList.remove("active"));
                document.querySelectorAll(".pdp-tab-panel").forEach(p => p.classList.remove("active"));

                this.classList.add("active");
                document.getElementById(this.dataset.tab).classList.add("active");
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const loginUrl = "{{ route('login') }}";

            const cartUrl = "{{ route('customer.cart.add') }}";

            const wishlistUrl = "{{ route('customer.wishlist.add') }}";

            const csrfToken = "{{ csrf_token() }}";


            /*
            |--------------------------------------------------------------------------
            | HELPER - UPDATE CART COUNT
            |--------------------------------------------------------------------------
            */

            function updateCartCount(count) {

                if (count === undefined || count === null) {
                    return;
                }

                document
                    .querySelectorAll(
                        '#headerCartCount, .cart-count, [data-cart-count]'
                    )
                    .forEach(function (element) {

                        element.textContent = count;

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | HELPER - UPDATE WISHLIST COUNT
            |--------------------------------------------------------------------------
            */

            function updateWishlistCount(count) {

                if (count === undefined || count === null) {
                    return;
                }

                document
                    .querySelectorAll(
                        '#headerWishlistCount, .wishlist-count, [data-wishlist-count]'
                    )
                    .forEach(function (element) {

                        element.textContent = count;

                    });

            }


            /*
            |--------------------------------------------------------------------------
            | HELPER - API REQUEST
            |--------------------------------------------------------------------------
            */

            async function sendRequest(url, payload) {

                const response = await fetch(url, {

                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },

                    body: JSON.stringify(payload)

                });


                /*
                |--------------------------------------------------------------------------
                | LOGIN REQUIRED
                |--------------------------------------------------------------------------
                */

                if (
                    response.status === 401 ||
                    response.status === 419 ||
                    response.redirected ||
                    response.url.includes('/login')
                ) {

                    window.location.href = loginUrl;

                    return null;

                }


                const text = await response.text();


                /*
                |--------------------------------------------------------------------------
                | LOGIN PAGE RETURNED AS HTML
                |--------------------------------------------------------------------------
                */

                if (
                    text.trim().startsWith('<!DOCTYPE') ||
                    text.trim().startsWith('<html')
                ) {

                    window.location.href = loginUrl;

                    return null;

                }


                try {

                    const data = JSON.parse(text);

                    return data;

                } catch (error) {

                    console.error(
                        'Invalid Server Response:',
                        text
                    );

                    throw new Error(
                        'Server returned an invalid response.'
                    );

                }

            }


            /*
            |--------------------------------------------------------------------------
            | ADD TO CART
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll(
                    '.addToCartBtn, .featured-products-cart-btn, .featured-products-cart-icon-btn'
                )
                .forEach(function (button) {

                    button.addEventListener(
                        'click',
                        async function (event) {

                            event.preventDefault();
                            event.stopPropagation();


                            const variantId =
                                this.dataset.variantId ||
                                this.dataset.id;


                            if (!variantId) {

                                console.error(
                                    'Variant ID missing:',
                                    this
                                );

                                alert(
                                    'Product variant not found.'
                                );

                                return;

                            }


                            const buttonElement = this;

                            const originalHTML =
                                buttonElement.innerHTML;


                            buttonElement.disabled = true;


                            if (
                                buttonElement.classList.contains(
                                    'featured-products-cart-icon-btn'
                                )
                            ) {

                                buttonElement.innerHTML =
                                    '<i class="fa-solid fa-spinner fa-spin"></i>';

                            } else {

                                buttonElement.innerHTML = `
                                        <i class="fa-solid fa-spinner fa-spin"></i>
                                        Adding...
                                    `;

                            }


                            try {

                                const data =
                                    await sendRequest(
                                        cartUrl,
                                        {
                                            product_variant_id: variantId,
                                            quantity: 1
                                        }
                                    );


                                if (!data) {
                                    return;
                                }


                                if (data.status) {

                                    updateCartCount(
                                        data.count
                                    );


                                    if (
                                        buttonElement.classList.contains(
                                            'featured-products-cart-icon-btn'
                                        )
                                    ) {

                                        buttonElement.innerHTML =
                                            '<i class="fa-solid fa-check"></i>';

                                    } else {

                                        buttonElement.innerHTML = `
                                                <i class="fa-solid fa-check"></i>
                                                Added
                                            `;

                                    }


                                    setTimeout(
                                        function () {

                                            buttonElement.innerHTML =
                                                originalHTML;

                                        },
                                        1500
                                    );

                                } else {

                                    if (
                                        data.redirect ||
                                        data.message === 'Unauthenticated.' ||
                                        data.message === 'Please login first.'
                                    ) {

                                        window.location.href =
                                            loginUrl;

                                        return;

                                    }


                                    alert(
                                        data.message ||
                                        'Unable to add product to cart.'
                                    );


                                    buttonElement.innerHTML =
                                        originalHTML;

                                }

                            } catch (error) {

                                console.error(
                                    'Cart Error:',
                                    error
                                );


                                alert(
                                    error.message ||
                                    'Something went wrong while adding to cart.'
                                );


                                buttonElement.innerHTML =
                                    originalHTML;

                            } finally {

                                buttonElement.disabled = false;

                            }

                        }
                    );

                });


            /*
            |--------------------------------------------------------------------------
            | ADD TO WISHLIST
            |--------------------------------------------------------------------------
            */

            document
                .querySelectorAll(
                    '.featured-products-wish-btn, .wishlist-btn, .addToWishlistBtn'
                )
                .forEach(function (button) {

                    button.addEventListener(
                        'click',
                        async function (event) {

                            event.preventDefault();
                            event.stopPropagation();


                            const variantId =
                                this.dataset.variantId ||
                                this.dataset.id;


                            if (!variantId) {

                                console.error(
                                    'Variant ID missing:',
                                    this
                                );

                                alert(
                                    'Product variant not found.'
                                );

                                return;

                            }


                            const buttonElement = this;

                            const icon =
                                buttonElement.querySelector('i');


                            buttonElement.disabled = true;


                            try {

                                const data =
                                    await sendRequest(
                                        wishlistUrl,
                                        {
                                            product_variant_id:
                                                variantId
                                        }
                                    );


                                if (!data) {
                                    return;
                                }


                                if (data.status) {

                                    /*
                                    |--------------------------------------------------------------------------
                                    | UPDATE HEART ICON
                                    |--------------------------------------------------------------------------
                                    */

                                    buttonElement.classList.add(
                                        'active'
                                    );


                                    if (icon) {

                                        icon.classList.remove(
                                            'fa-regular'
                                        );

                                        icon.classList.add(
                                            'fa-solid'
                                        );

                                    }


                                    /*
                                    |--------------------------------------------------------------------------
                                    | UPDATE WISHLIST COUNT
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        data.count !== undefined
                                    ) {

                                        updateWishlistCount(
                                            data.count
                                        );

                                    }


                                } else {

                                    if (
                                        data.redirect ||
                                        data.message === 'Unauthenticated.' ||
                                        data.message === 'Please login first.'
                                    ) {

                                        window.location.href =
                                            loginUrl;

                                        return;

                                    }


                                    alert(
                                        data.message ||
                                        'Unable to add product to wishlist.'
                                    );

                                }

                            } catch (error) {

                                console.error(
                                    'Wishlist Error:',
                                    error
                                );


                                alert(
                                    error.message ||
                                    'Something went wrong while adding to wishlist.'
                                );

                            } finally {

                                buttonElement.disabled = false;

                            }

                        }
                    );

                });

        });
    </script>

@endsection