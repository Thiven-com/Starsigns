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
        document.addEventListener('DOMContentLoaded', function () {

            const loginUrl = "{{ route('login') }}";
            const cartUrl = "{{ route('customer.cart.add') }}";
            const wishlistUrl = "{{ route('customer.wishlist.add') }}";
            const csrfToken = "{{ csrf_token() }}";


            /*
            |--------------------------------------------------------------------------
            | GET SELECTED VARIANT
            |--------------------------------------------------------------------------
            */

            function getSelectedVariantId() {

                const selectedInput = document.querySelector(
                    'input[name="variant_id"]:checked'
                );

                if (selectedInput) {
                    return selectedInput.value;
                }


                const activeVariant = document.querySelector(
                    '.variant-option.active, .pdp-variant.active'
                );

                if (activeVariant) {
                    return activeVariant.dataset.variantId ||
                        activeVariant.dataset.id;
                }


                const productVariant = document.querySelector(
                    '[data-selected-variant]'
                );

                if (productVariant) {
                    return productVariant.dataset.selectedVariant;
                }


                const cartButton = document.querySelector(
                    '.pdp-add-cart, .addToCartBtn'
                );

                if (cartButton) {
                    return cartButton.dataset.variantId ||
                        cartButton.dataset.id;
                }

                return null;
            }


            /*
            |--------------------------------------------------------------------------
            | GET QUANTITY
            |--------------------------------------------------------------------------
            */

            function getQuantity() {

                const quantityInput = document.getElementById('pdpQtyVal');

                if (!quantityInput) {
                    return 1;
                }

                let quantity = parseInt(quantityInput.value);

                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                }

                return quantity;
            }


            /*
            |--------------------------------------------------------------------------
            | UPDATE CART COUNT
            |--------------------------------------------------------------------------
            */

            function updateCartCount(count) {

                if (count === undefined || count === null) {
                    return;
                }

                document.querySelectorAll(
                    '#headerCartCount, .cart-count, [data-cart-count]'
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

                if (count === undefined || count === null) {
                    return;
                }

                document.querySelectorAll(
                    '#headerWishlistCount, .wishlist-count, [data-wishlist-count]'
                ).forEach(function (element) {

                    element.textContent = count;

                });

            }


            /*
            |--------------------------------------------------------------------------
            | AJAX REQUEST
            |--------------------------------------------------------------------------
            */

            async function sendRequest(url, payload) {

                const response = await fetch(url, {

                    method: 'POST',

                    credentials: 'same-origin',

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
                    response.status === 403 ||
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
                | HTML RESPONSE
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

                    return JSON.parse(text);

                } catch (error) {

                    console.error(
                        'Invalid server response:',
                        text
                    );

                    throw new Error(
                        'Server returned an invalid response.'
                    );

                }

            }


            /*
            |--------------------------------------------------------------------------
            | THUMBNAIL GALLERY
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll('.pdp-thumb').forEach(function (thumb) {

                thumb.addEventListener('click', function () {

                    document.querySelectorAll('.pdp-thumb').forEach(function (item) {

                        item.classList.remove('active');

                    });


                    this.classList.add('active');


                    const mainImage =
                        document.getElementById('pdpMainImage');


                    if (mainImage && this.dataset.image) {

                        mainImage.src = this.dataset.image;

                    }

                });

            });


            /*
            |--------------------------------------------------------------------------
            | QUANTITY INCREASE
            |--------------------------------------------------------------------------
            */

            const quantityInput =
                document.getElementById('pdpQtyVal');

            const increaseButton =
                document.getElementById('pdpQtyInc');

            const decreaseButton =
                document.getElementById('pdpQtyDec');


            if (increaseButton && quantityInput) {

                increaseButton.addEventListener(
                    'click',
                    function () {

                        let quantity =
                            parseInt(quantityInput.value) || 1;

                        quantity++;

                        quantityInput.value = quantity;

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | QUANTITY DECREASE
            |--------------------------------------------------------------------------
            */

            if (decreaseButton && quantityInput) {

                decreaseButton.addEventListener(
                    'click',
                    function () {

                        let quantity =
                            parseInt(quantityInput.value) || 1;

                        if (quantity > 1) {

                            quantity--;

                            quantityInput.value = quantity;

                        }

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | QUANTITY MANUAL VALIDATION
            |--------------------------------------------------------------------------
            */

            if (quantityInput) {

                quantityInput.addEventListener(
                    'change',
                    function () {

                        if (
                            !this.value ||
                            parseInt(this.value) < 1
                        ) {

                            this.value = 1;

                        }

                    }
                );

            }


            /*
            |--------------------------------------------------------------------------
            | PRODUCT VARIANT SELECTION
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.variant-option, .pdp-variant'
            ).forEach(function (option) {

                option.addEventListener(
                    'click',
                    function () {

                        const variantId =
                            this.dataset.variantId ||
                            this.dataset.id;


                        if (!variantId) {
                            return;
                        }


                        document.querySelectorAll(
                            '.variant-option, .pdp-variant'
                        ).forEach(function (item) {

                            item.classList.remove('active');

                        });


                        this.classList.add('active');


                        /*
                        | Update all cart buttons
                        */

                        document.querySelectorAll(
                            '.addToCartBtn, .pdp-add-cart'
                        ).forEach(function (button) {

                            button.dataset.variantId =
                                variantId;

                        });


                        /*
                        | Update wishlist buttons
                        */

                        document.querySelectorAll(
                            '.addToWishlistBtn, .wishlist-btn'
                        ).forEach(function (button) {

                            button.dataset.variantId =
                                variantId;

                        });


                        /*
                        | Update hidden variant input
                        */

                        const variantInput =
                            document.querySelector(
                                'input[name="variant_id"]'
                            );


                        if (variantInput) {

                            variantInput.value = variantId;

                        }


                        /*
                        | Update price
                        */

                        if (this.dataset.price) {

                            document.querySelectorAll(
                                '.pdp-price-current'
                            ).forEach(function (priceElement) {

                                priceElement.textContent =
                                    '₹' + Number(
                                        this.dataset.price
                                    ).toLocaleString('en-IN');

                            }, this);

                        }


                        /*
                        | Update old price
                        */

                        if (this.dataset.actualPrice) {

                            document.querySelectorAll(
                                '.pdp-price-old'
                            ).forEach(function (priceElement) {

                                priceElement.textContent =
                                    '₹' + Number(
                                        this.dataset.actualPrice
                                    ).toLocaleString('en-IN');

                            }, this);

                        }

                    }
                );

            });


            /*
            |--------------------------------------------------------------------------
            | ADD TO CART
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.addToCartBtn, .pdp-add-cart'
            ).forEach(function (button) {

                button.addEventListener(
                    'click',
                    async function (event) {

                        event.preventDefault();

                        event.stopPropagation();


                        const buttonElement = this;


                        const variantId =
                            getSelectedVariantId();


                        const quantity =
                            getQuantity();


                        if (!variantId) {

                            alert(
                                'Please select a product variant.'
                            );

                            return;

                        }


                        const originalHTML =
                            buttonElement.innerHTML;


                        buttonElement.disabled = true;


                        buttonElement.innerHTML = `
                        <i class="fa-solid fa-spinner fa-spin"></i>
                        Adding...
                    `;


                        try {

                            const data =
                                await sendRequest(
                                    cartUrl,
                                    {
                                        product_variant_id:
                                            variantId,

                                        quantity:
                                            quantity
                                    }
                                );


                            if (!data) {
                                return;
                            }


                            if (data.status) {

                                updateCartCount(
                                    data.count
                                );


                                buttonElement.innerHTML = `
                                <i class="fa-solid fa-check"></i>
                                Added to Cart
                            `;


                                alert(
                                    data.message ||
                                    'Product added to cart successfully.'
                                );


                                setTimeout(function () {

                                    buttonElement.innerHTML =
                                        originalHTML;

                                }, 1500);


                            } else {

                                if (
                                    data.redirect ||
                                    data.login ||
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

            document.querySelectorAll(
                '.addToWishlistBtn, .wishlist-btn, .pdp-wishlist'
            ).forEach(function (button) {

                button.addEventListener(
                    'click',
                    async function (event) {

                        event.preventDefault();

                        event.stopPropagation();


                        const buttonElement = this;


                        const variantId =
                            getSelectedVariantId();


                        if (!variantId) {

                            alert(
                                'Please select a product variant.'
                            );

                            return;

                        }


                        const originalHTML =
                            buttonElement.innerHTML;


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

                                const icon =
                                    buttonElement.querySelector('i');


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


                                updateWishlistCount(
                                    data.count
                                );


                                alert(
                                    data.message ||
                                    'Product added to wishlist.'
                                );


                            } else {

                                if (
                                    data.redirect ||
                                    data.login ||
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


                                buttonElement.innerHTML =
                                    originalHTML;

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
            | PRODUCT TABS
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.pdp-tab-btn'
            ).forEach(function (button) {

                button.addEventListener(
                    'click',
                    function () {

                        const tabId =
                            this.dataset.tab;


                        if (!tabId) {
                            return;
                        }


                        document.querySelectorAll(
                            '.pdp-tab-btn'
                        ).forEach(function (item) {

                            item.classList.remove('active');

                        });


                        document.querySelectorAll(
                            '.pdp-tab-panel'
                        ).forEach(function (item) {

                            item.classList.remove('active');

                        });


                        this.classList.add('active');


                        const target =
                            document.getElementById(tabId);


                        if (target) {

                            target.classList.add('active');

                        }

                    }
                );

            });

        });
    </script>

@endsection