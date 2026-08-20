@extends('layouts.website')

@section('content')
<style>
    /* ==========================================
   ATTRACTIVE SHOP PAGINATION
========================================== */

.custom-pagination-wrapper {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 28px;
    margin: 50px 0 70px;
    flex-wrap: wrap;
}

.pagination-info {
    font-size: 17px;
    color: #555;
    font-weight: 500;
}

.pagination-info strong {
    color: #17142d;
    font-weight: 700;
}

.custom-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
}

.pagination-btn {
    width: 58px;
    height: 58px;
    border-radius: 16px;
    border: 1px solid #e2ded5;
    background: #fff;
    color: #17142d;
    text-decoration: none;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
    font-weight: 700;

    transition: all 0.25s ease;

    box-shadow: 0 5px 18px rgba(0, 0, 0, 0.04);
}

.pagination-btn:hover {
    background: #dca018;
    border-color: #dca018;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(220, 160, 24, 0.25);
}

.pagination-btn.active {
    background: #17142d;
    border-color: #17142d;
    color: #e0a11b;
    cursor: default;
    box-shadow: 0 10px 25px rgba(23, 20, 45, 0.25);
}

.pagination-btn.disabled {
    opacity: 0.4;
    cursor: not-allowed;
    pointer-events: none;
}


/* Mobile */
@media (max-width: 768px) {

    .custom-pagination-wrapper {
        gap: 18px;
        margin: 35px 0 50px;
    }

    .pagination-info {
        width: 100%;
        text-align: center;
        font-size: 15px;
    }

    .custom-pagination {
        gap: 7px;
    }

    .pagination-btn {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        font-size: 15px;
    }
}

@media (max-width: 480px) {

    .pagination-btn {
        width: 42px;
        height: 42px;
    }

    .custom-pagination {
        gap: 5px;
    }
}
</style>
@php
/*
|--------------------------------------------------------------------------
| CURRENT FILTER VALUES
|--------------------------------------------------------------------------
*/

$selectedCategory = request('category');
$selectedSort = request('sort', 'latest');

/*
|--------------------------------------------------------------------------
| HELPER FUNCTION
|--------------------------------------------------------------------------
*/

$buildShopUrl = function ($params = []) {

$query = array_merge(
request()->except(['page']),
$params
);

return route('shop', array_filter(
$query,
fn ($value) => $value !== null && $value !== ''
));
};
@endphp


<!-- =========================================================
         PAGE BANNER
    ========================================================= -->

<section class="page-banner" data-aos="zoom-out" data-aos-duration="1000">

    <div class="container">

        <div class="page-banner-content" data-aos="zoom-in">

            <h1>Shop</h1>

            <div class="breadcrumb">

                <a href="{{ route('home') }}">
                    Home
                </a>

                <span>
                    <i class="fa-solid fa-chevron-right"></i>
                </span>

                <span class="active">
                    Shop
                </span>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
         SHOP SECTION
    ========================================================= -->

<section class="shop-section" data-aos="fade-up" data-aos-delay="200">

    <div class="container" data-aos="fade-down">

        <div class="shop-wrapper">


            <!-- =================================================
                     LEFT SIDEBAR
                ================================================= -->

            <aside class="shop-sidebar" data-aos="fade-right">


                <!-- =================================================
                         CATEGORIES
                    ================================================= -->

                <div class="shop-widget categories-widget">

                    <div class="shop-widget" data-aos="fade-left">

                        <div class="widget-title">

                            <h3>
                                Categories
                            </h3>

                            <button type="button">
                                <i class="fa-solid fa-minus"></i>
                            </button>

                        </div>


                        <ul class="category-list">


                            <!-- ALL PRODUCTS -->

                            <li>

                                <a href="{{ $buildShopUrl([
                                            'category' => null
                                        ]) }}">

                                    <div class="left">

                                        <i class="fa-regular fa-circle"></i>

                                        <span>
                                            All Products
                                        </span>

                                    </div>

                                </a>

                            </li>


                            <!-- CATEGORIES -->

                            @foreach($categories as $category)

                            <li>

                                <a href="{{ $buildShopUrl([
                                                'category' => $category->id
                                            ]) }}"
                                    class="{{ (string) $selectedCategory === (string) $category->id ? 'active' : '' }}">

                                    <div class="left">

                                        <i class="fa-regular fa-circle"></i>

                                        <span>
                                            {{ $category->title }}
                                        </span>

                                    </div>

                                    <span class="count">

                                        ({{ $category->products_count }})

                                    </span>

                                </a>

                            </li>

                            @endforeach


                        </ul>

                    </div>

                </div>

                <!-- =================================================
                         SORT BY
                    ================================================= -->

                <div class="shop-widget sort-widget">

                    <div class="shop-widget">


                        <div class="widget-title">

                            <h3>
                                Sort By
                            </h3>

                            <button type="button">
                                <i class="fa-solid fa-minus"></i>
                            </button>

                        </div>


                        <div class="sort-options">


                            <!-- NEWEST -->

                            <label
                                class="sort-item {{ !in_array($selectedSort, ['low_high', 'high_low']) ? 'active' : '' }}">

                                <input type="radio" name="sort" value="latest" {{ !in_array($selectedSort,
                                    ['low_high', 'high_low' ]) ? 'checked' : '' }}>

                                <span class="radio"></span>

                                <span class="text">
                                    Newest First
                                </span>

                            </label>



                            <!-- LOW TO HIGH -->

                            <label class="sort-item {{ $selectedSort === 'low_high' ? 'active' : '' }}">

                                <input type="radio" name="sort" value="low_high" {{ $selectedSort==='low_high'
                                    ? 'checked' : '' }}>

                                <span class="radio"></span>

                                <span class="text">
                                    Price: Low to High
                                </span>

                            </label>



                            <!-- HIGH TO LOW -->

                            <label class="sort-item {{ $selectedSort === 'high_low' ? 'active' : '' }}">

                                <input type="radio" name="sort" value="high_low" {{ $selectedSort==='high_low'
                                    ? 'checked' : '' }}>

                                <span class="radio"></span>

                                <span class="text">
                                    Price: High to Low
                                </span>

                            </label>



                            <!-- BEST SELLING -->

                            <label class="sort-item">

                                <input type="radio" name="sort" value="best_selling">

                                <span class="radio"></span>

                                <span class="text">
                                    Best Selling
                                </span>

                            </label>



                            <!-- TOP RATED -->

                            <label class="sort-item">

                                <input type="radio" name="sort" value="top_rated">

                                <span class="radio"></span>

                                <span class="text">
                                    Top Rated
                                </span>

                            </label>


                        </div>

                    </div>

                </div>


            </aside>



            <!-- =================================================
                     SHOP CONTENT
                ================================================= -->

            <div class="shop-content">


                <!-- MOBILE FILTER BUTTON -->

                <button type="button" class="mobile-filter-btn" id="openFilterModal">

                    <i class="fa-solid fa-sliders"></i>

                    Filters

                </button>

                <br>



                <!-- =================================================
                         TOOLBAR
                    ================================================= -->

                <div class="shop-toolbar">

                    <div class="shop-results">

                        @if($products->total() > 0)

                        Showing

                        <strong>
                            {{ $products->firstItem() }}
                            –
                            {{ $products->lastItem() }}
                        </strong>

                        of

                        <strong>
                            {{ $products->total() }}
                        </strong>

                        results

                        @else

                        Showing
                        <strong>0</strong>
                        results

                        @endif

                    </div>

                </div>



                <!-- =================================================
                         PRODUCT GRID
                    ================================================= -->

                <div class="products-grid" data-aos="fade-down">


                    @forelse($products as $product)

                    @php

                    /*
                    |--------------------------------------------------------------------------
                    | SAFE VARIANT
                    |--------------------------------------------------------------------------
                    */

                    $variant = null;

                    /*
                    |--------------------------------------------------------------------------
                    | FIRST TRY SINGLE VARIANT RELATION
                    |--------------------------------------------------------------------------
                    */

                    if (isset($product->variant)) {

                    $variant = $product->variant;

                    }

                    /*
                    |--------------------------------------------------------------------------
                    | IF SINGLE VARIANT IS EMPTY,
                    | TRY VARIANTS COLLECTION
                    |--------------------------------------------------------------------------
                    */

                    if (!$variant && isset($product->variants)) {

                    $variant = $product->variants->first();

                    }


                    /*
                    |--------------------------------------------------------------------------
                    | PRICES
                    |--------------------------------------------------------------------------
                    */

                    $price = $variant
                    ? (float) (
                    $variant->price
                    ?? $variant->seller_price
                    ?? 0
                    )
                    : 0;


                    $oldPrice = $variant
                    ? (float) (
                    $variant->actual_price
                    ?? $variant->seller_price
                    ?? $price
                    )
                    : $price;


                    /*
                    |--------------------------------------------------------------------------
                    | PRODUCT IMAGE
                    |--------------------------------------------------------------------------
                    */

                    $productImage = $product->image
                    ? asset($product->image)
                    : asset('website/images/placeholder.png');

                    @endphp



                    <!-- PRODUCT CARD -->

                    <div class="product-card" data-aos="fade-up">


                        <!-- IMAGE -->

                        <div class="product-image">


                            @if($variant && $oldPrice > $price)

                            <span class="product-badge">
                                Sale
                            </span>

                            @endif



                            <!-- WISHLIST -->

                            @if($variant)

                            <button type="button" class="featured-products-wish-btn" title="Add to wishlist"
                                data-variant-id="{{ $variant->id }}">

                                <i class="fa-regular fa-heart"></i>

                            </button>

                            @endif



                            <!-- PRODUCT IMAGE -->

                            <a href="{{ route(
                                            'product-detail',
                                            $product->slug
                                        ) }}">

                                <img src="{{ $productImage }}" alt="{{ $product->title }}">

                            </a>


                        </div>



                        <!-- PRODUCT CONTENT -->

                        <div class="product-content">


                            <!-- CATEGORY -->

                            <span class="product-category">

                                {{ $product->category->title ?? 'Category' }}

                            </span>



                            <!-- PRODUCT TITLE -->

                            <h4>

                                <a href="{{ route(
                                                'product-detail',
                                                $product->slug
                                            ) }}">

                                    {{ $product->title }}

                                </a>

                            </h4>



                            <!-- RATING -->

                            <div class="product-rating">

                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>

                                <span>
                                    (4.5)
                                </span>

                            </div>



                            <!-- PRICE -->

                            <div class="product-price">


                                <span class="new-price">

                                    ₹{{ number_format($price, 2) }}

                                </span>



                                @if(
                                $variant
                                &&
                                $oldPrice > $price
                                )

                                <span class="old-price">

                                    ₹{{ number_format($oldPrice, 2) }}

                                </span>

                                @endif


                            </div>



                            <!-- ADD TO CART -->

                            @if($variant)

                            <button type="button" class="cart-btn addToCartBtn" data-id="{{ $variant->id }}"
                                data-name="{{ $product->title }}" data-price="{{ $price }}">

                                <i class="fa-solid fa-bag-shopping"></i>

                                Add to Cart

                            </button>

                            @else

                            <button type="button" class="cart-btn" disabled>

                                <i class="fa-solid fa-ban"></i>

                                Out of Stock

                            </button>

                            @endif


                        </div>


                    </div>


                    @empty


                    <div class="col-12 text-center">

                        <p>
                            No products found.
                        </p>

                    </div>


                    @endforelse


                </div>
                <div class="shop-bottom-bar">

                    {{-- Pagination --}}
                  @if($products->hasPages())
    <div class="custom-pagination-wrapper">

        <div class="pagination-info">
            Showing
            <strong>{{ $products->firstItem() }}</strong>
            to
            <strong>{{ $products->lastItem() }}</strong>
            of
            <strong>{{ $products->total() }}</strong>
            results
        </div>

        <nav class="custom-pagination">

            {{-- Previous --}}
            @if($products->onFirstPage())
                <span class="pagination-btn disabled">
                    <i class="fa-solid fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="pagination-btn">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
            @endif


            {{-- Page Numbers --}}
            @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)

                @if($page == $products->currentPage())

                    <span class="pagination-btn active">
                        {{ $page }}
                    </span>

                @else

                    <a href="{{ $url }}" class="pagination-btn">
                        {{ $page }}
                    </a>

                @endif

            @endforeach


            {{-- Next --}}
            @if($products->hasMorePages())

                <a href="{{ $products->nextPageUrl() }}" class="pagination-btn">
                    <i class="fa-solid fa-chevron-right"></i>
                </a>

            @else

                <span class="pagination-btn disabled">
                    <i class="fa-solid fa-chevron-right"></i>
                </span>

            @endif

        </nav>

    </div>
@endif

                </div>


            </div>


        </div>

    </div>

</section>



<!-- =========================================================
         MOBILE FILTER MODAL
    ========================================================= -->

<div class="filter-modal" id="filterModal">

    <div class="filter-modal-overlay" id="closeFilterModal"></div>


    <div class="filter-modal-content">


        <!-- HEADER -->

        <div class="filter-modal-header">

            <h3>
                Filters
            </h3>

            <button type="button" id="closeFilterBtn">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>



        <!-- BODY -->

        <div class="filter-modal-body">


            <!-- =================================================
                     MOBILE CATEGORIES
                ================================================= -->

            <div class="shop-widget">


                <div class="widget-title">

                    <h3>
                        Categories
                    </h3>

                </div>


                <ul class="category-list">


                    <li>

                        <a href="{{ $buildShopUrl([
                                    'category' => null
                                ]) }}">

                            <div class="left">

                                <i class="fa-regular fa-circle"></i>

                                <span>
                                    All Products
                                </span>

                            </div>

                        </a>

                    </li>


                    @foreach($categories as $category)

                    <li>

                        <a href="{{ $buildShopUrl([
                                        'category' => $category->id
                                    ]) }}">

                            <div class="left">

                                <i class="fa-regular fa-circle"></i>

                                <span>
                                    {{ $category->title }}
                                </span>

                            </div>


                            <span class="count">

                                ({{ $category->products_count }})

                            </span>

                        </a>

                    </li>

                    @endforeach


                </ul>


            </div>

            <!-- =================================================
                     MOBILE SORT
                ================================================= -->

            <div class="shop-widget">


                <div class="widget-title">

                    <h3>
                        Sort By
                    </h3>

                </div>


                <div class="sort-options">


                    <label class="sort-item {{ !in_array($selectedSort, ['low_high', 'high_low']) ? 'active' : '' }}">

                        <input type="radio" name="mobile-sort" value="latest" {{ !in_array($selectedSort,
                            ['low_high', 'high_low' ]) ? 'checked' : '' }}>

                        <span class="radio"></span>

                        <span class="text">
                            Newest First
                        </span>

                    </label>



                    <label class="sort-item {{ $selectedSort === 'low_high' ? 'active' : '' }}">

                        <input type="radio" name="mobile-sort" value="low_high" {{ $selectedSort==='low_high'
                            ? 'checked' : '' }}>

                        <span class="radio"></span>

                        <span class="text">
                            Price: Low to High
                        </span>

                    </label>



                    <label class="sort-item {{ $selectedSort === 'high_low' ? 'active' : '' }}">

                        <input type="radio" name="mobile-sort" value="high_low" {{ $selectedSort==='high_low'
                            ? 'checked' : '' }}>

                        <span class="radio"></span>

                        <span class="text">
                            Price: High to Low
                        </span>

                    </label>


                </div>


            </div>


        </div>



        <!-- FOOTER -->

        <div class="filter-modal-footer">

            <button type="button" class="filter-btn" id="applyFilters">

                Apply Filters

            </button>

        </div>


    </div>

</div>



<!-- =========================================================
         MOBILE FILTER MODAL SCRIPT
    ========================================================= -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            const filterModal =
                document.getElementById(
                    'filterModal'
                );


            const openFilterModal =
                document.getElementById(
                    'openFilterModal'
                );


            const closeFilterModal =
                document.getElementById(
                    'closeFilterModal'
                );


            const closeFilterBtn =
                document.getElementById(
                    'closeFilterBtn'
                );


            const applyFilters =
                document.getElementById(
                    'applyFilters'
                );


            if (
                openFilterModal
                &&
                filterModal
            ) {

                openFilterModal.addEventListener(
                    'click',
                    function () {

                        filterModal.classList.add(
                            'active'
                        );

                        document.body.style.overflow =
                            'hidden';

                    }
                );

            }



            function closeModal() {

                if (!filterModal) {
                    return;
                }

                filterModal.classList.remove(
                    'active'
                );

                document.body.style.overflow =
                    '';

            }



            if (closeFilterModal) {

                closeFilterModal.addEventListener(
                    'click',
                    closeModal
                );

            }



            if (closeFilterBtn) {

                closeFilterBtn.addEventListener(
                    'click',
                    closeModal
                );

            }



            /*
            |--------------------------------------------------------------------------
            | APPLY MOBILE SORT
            |--------------------------------------------------------------------------
            */

            if (applyFilters) {

                applyFilters.addEventListener(
                    'click',
                    function () {


                        const selectedMobileSort =
                            document.querySelector(
                                'input[name="mobile-sort"]:checked'
                            );


                        const url =
                            new URL(
                                window.location.href
                            );


                        if (
                            selectedMobileSort
                        ) {

                            const sortValue =
                                selectedMobileSort.value;


                            if (
                                sortValue === 'latest'
                            ) {

                                url.searchParams.delete(
                                    'sort'
                                );

                            } else {

                                url.searchParams.set(
                                    'sort',
                                    sortValue
                                );

                            }

                        }


                        window.location.href =
                            url.toString();

                    }
                );

            }


        }
    );

</script>



<!-- =========================================================
         PRICE SLIDER
    ========================================================= -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            const sliders =
                document.querySelectorAll(
                    '.price-slider'
                );


            sliders.forEach(
                function (slider) {


                    slider.addEventListener(
                        'input',
                        function () {


                            const parent =
                                this.closest(
                                    '.price-range'
                                );


                            if (!parent) {
                                return;
                            }


                            const inputs =
                                parent.querySelectorAll(
                                    '.price-inputs input'
                                );


                            if (
                                inputs.length >= 2
                            ) {

                                inputs[1].value =
                                    '₹ ' + this.value;

                            }


                        }
                    );


                }
            );


        }
    );

</script>



<!-- =========================================================
         SORT FUNCTIONALITY
    ========================================================= -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            document
                .querySelectorAll(
                    'input[name="sort"]'
                )
                .forEach(
                    function (input) {


                        input.addEventListener(
                            'change',
                            function () {


                                const url =
                                    new URL(
                                        window.location.href
                                    );


                                if (
                                    this.value === 'latest'
                                ) {

                                    url.searchParams.delete(
                                        'sort'
                                    );

                                } else {

                                    url.searchParams.set(
                                        'sort',
                                        this.value
                                    );

                                }


                                url.searchParams.delete(
                                    'page'
                                );


                                window.location.href =
                                    url.toString();


                            }
                        );


                    }
                );


        }
    );

</script>



<!-- =========================================================
         WISHLIST
    ========================================================= -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            document
                .querySelectorAll(
                    '.featured-products-wish-btn'
                )
                .forEach(
                    function (button) {


                        button.addEventListener(
                            'click',
                            async function () {


                                const variantId =
                                    this.dataset.variantId;


                                if (!variantId) {

                                    alert(
                                        'Product variant not found.'
                                    );

                                    return;

                                }


                                try {


                                    const response =
                                        await fetch(
                                            "{{ route('customer.wishlist.add') }}",
                                            {

                                                method: 'POST',

                                                headers: {

                                                    'Content-Type':
                                                        'application/json',

                                                    'Accept':
                                                        'application/json',

                                                    'X-CSRF-TOKEN':
                                                        "{{ csrf_token() }}"

                                                },

                                                body:
                                                    JSON.stringify({
                                                        product_variant_id:
                                                            variantId
                                                    })

                                            }
                                        );


                                    /*
                                    |--------------------------------------------------------------------------
                                    | LOGIN REDIRECT
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        response.status === 401
                                        ||
                                        response.redirected
                                        ||
                                        response.url.includes('/login')
                                    ) {

                                        window.location.href =
                                            "{{ route('login') }}";

                                        return;

                                    }


                                    const text =
                                        await response.text();


                                    if (
                                        text.trim().startsWith(
                                            '<!DOCTYPE'
                                        )
                                        ||
                                        text.trim().startsWith(
                                            '<html'
                                        )
                                    ) {

                                        window.location.href =
                                            "{{ route('login') }}";

                                        return;

                                    }


                                    let data;


                                    try {

                                        data =
                                            JSON.parse(
                                                text
                                            );

                                    } catch (error) {

                                        throw new Error(
                                            'Server returned an invalid response.'
                                        );

                                    }


                                    if (
                                        data.status
                                    ) {

                                        alert(
                                            data.message ||
                                            'Added to wishlist.'
                                        );

                                    } else {


                                        if (
                                            data.redirect
                                            ||
                                            data.message ===
                                            'Unauthenticated.'
                                            ||
                                            data.message ===
                                            'Please login first.'
                                        ) {

                                            window.location.href =
                                                "{{ route('login') }}";

                                            return;

                                        }


                                        alert(
                                            data.message ||
                                            'Unable to add to wishlist.'
                                        );

                                    }


                                } catch (error) {

                                    console.error(
                                        'WISHLIST ERROR:',
                                        error
                                    );

                                    alert(
                                        error.message ||
                                        'Something went wrong.'
                                    );

                                }


                            }
                        );


                    }
                );


        }
    );

</script>



<!-- =========================================================
         ADD TO CART
    ========================================================= -->

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {


            document
                .querySelectorAll(
                    '.addToCartBtn'
                )
                .forEach(
                    function (button) {


                        button.addEventListener(
                            'click',
                            async function () {


                                const variantId =
                                    this.dataset.id;


                                const buttonElement =
                                    this;


                                const originalHTML =
                                    buttonElement.innerHTML;


                                /*
                                |--------------------------------------------------------------------------
                                | CHECK VARIANT
                                |--------------------------------------------------------------------------
                                */

                                if (!variantId) {

                                    alert(
                                        'Product variant not found.'
                                    );

                                    return;

                                }


                                buttonElement.disabled =
                                    true;


                                buttonElement.innerHTML = `
                                        <i class="fa-solid fa-spinner fa-spin"></i>
                                        Adding...
                                    `;


                                try {


                                    const response =
                                        await fetch(
                                            "{{ route('customer.cart.add') }}",
                                            {

                                                method: 'POST',

                                                headers: {

                                                    'Content-Type':
                                                        'application/json',

                                                    'Accept':
                                                        'application/json',

                                                    'X-CSRF-TOKEN':
                                                        "{{ csrf_token() }}"

                                                },

                                                body:
                                                    JSON.stringify({

                                                        product_variant_id:
                                                            variantId,

                                                        quantity:
                                                            1

                                                    })

                                            }
                                        );


                                    /*
                                    |--------------------------------------------------------------------------
                                    | NOT LOGGED IN
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        response.status === 401
                                        ||
                                        response.redirected
                                        ||
                                        response.url.includes('/login')
                                    ) {

                                        window.location.href =
                                            "{{ route('login') }}";

                                        return;

                                    }


                                    const text =
                                        await response.text();


                                    /*
                                    |--------------------------------------------------------------------------
                                    | HTML LOGIN RESPONSE
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        text.trim().startsWith(
                                            '<!DOCTYPE'
                                        )
                                        ||
                                        text.trim().startsWith(
                                            '<html'
                                        )
                                    ) {

                                        window.location.href =
                                            "{{ route('login') }}";

                                        return;

                                    }


                                    let data;


                                    try {

                                        data =
                                            JSON.parse(
                                                text
                                            );

                                    } catch (error) {

                                        throw new Error(
                                            'Server returned an invalid response.'
                                        );

                                    }


                                    /*
                                    |--------------------------------------------------------------------------
                                    | SUCCESS
                                    |--------------------------------------------------------------------------
                                    */

                                    if (
                                        data.status
                                    ) {


                                        /*
                                        | Update all cart counters
                                        */

                                        const cartCounts =
                                            document.querySelectorAll(
                                                '.cart-count'
                                            );


                                        if (
                                            data.count !== undefined
                                        ) {

                                            cartCounts.forEach(
                                                function (
                                                    cartCount
                                                ) {

                                                    cartCount.innerText =
                                                        data.count;

                                                }
                                            );

                                        }


                                        buttonElement.innerHTML = `
                                                <i class="fa-solid fa-check"></i>
                                                Added to Cart
                                            `;


                                        setTimeout(
                                            function () {

                                                buttonElement.innerHTML =
                                                    originalHTML;

                                            },
                                            1500
                                        );


                                    } else {


                                        /*
                                        |--------------------------------------------------------------------------
                                        | LOGIN REQUIRED
                                        |--------------------------------------------------------------------------
                                        */

                                        if (
                                            data.redirect
                                            ||
                                            data.message ===
                                            'Unauthenticated.'
                                            ||
                                            data.message ===
                                            'Please login first.'
                                        ) {

                                            window.location.href =
                                                "{{ route('login') }}";

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


                                    buttonElement.disabled =
                                        false;


                                }


                            }
                        );


                    }
                );


        }
    );

</script>

@endsection