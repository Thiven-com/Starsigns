@extends('layouts.website')
@section('content')

    <!--==========================
                PAGE BANNER (shared layout component - reused as-is)
            ===========================-->

    <section class="wishlist-banner-section">

        <div class="container">

            <div class="wishlist-banner-content">

                <h1>Wishlist</h1>

                <div class="wishlist-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="wishlist-active">Wishlist</span>

                </div>

            </div>

        </div>

    </section>


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
                        My Wishlist <span id="wishlistPageCount">(4 Items)</span>
                    </h2>

                    <span class="wishlist-page-title-divider">✦</span>

                    <p class="wishlist-page-subtitle">Items you love, all in one place.</p>

                </div>

                <div class="wishlist-page-header-actions">

                    <button type="button" class="wishlist-page-move-all-btn" id="wishlistPageMoveAllBtn">
                        <i class="fa-solid fa-cart-shopping"></i>
                        Move All to Cart
                    </button>

                    <button type="button" class="wishlist-page-clear-btn" id="wishlistPageClearBtn">
                        <i class="fa-solid fa-trash"></i>
                        Clear Wishlist
                    </button>

                </div>

            </div>

            <!--=========================
                        WISHLIST GRID
                    ==========================-->

            <div class="wishlist-page-grid" id="wishlistPageGrid">

                @php
                    $wishlistItems = [
                        ['id' => 1, 'name' => 'Crystal Healing Bracelet', 'rating' => 4.5, 'reviews' => 64, 'price' => 899, 'old' => 1299, 'off' => '31% OFF', 'img' => 'product-1.png'],
                        ['id' => 2, 'name' => '7 Mukhi Rudraksha Bracelet', 'rating' => 4.7, 'reviews' => 101, 'price' => 1199, 'old' => 1799, 'off' => '33% OFF', 'img' => 'product-2.png'],
                        ['id' => 3, 'name' => 'Rose Quartz Bracelet', 'rating' => 4.6, 'reviews' => 86, 'price' => 699, 'old' => 999, 'off' => '30% OFF', 'img' => 'product-1.png'],
                        ['id' => 4, 'name' => 'Black Obsidian Bracelet', 'rating' => 4.4, 'reviews' => 98, 'price' => 799, 'old' => 1099, 'off' => '27% OFF', 'img' => 'product-2.png'],
                    ];
                @endphp

                @foreach($wishlistItems as $item)
                    <div class="wishlist-page-card" data-id="{{ $item['id'] }}">

                        <div class="wishlist-page-card-img">

                            <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">

                            <button type="button" class="wishlist-page-heart-btn active" title="Remove from wishlist">
                                <i class="fa-solid fa-heart"></i>
                            </button>

                        </div>

                        <div class="wishlist-page-card-body">

                            <h4>{{ $item['name'] }}</h4>

                            <div class="wishlist-page-rating">

                                <span class="wishlist-page-stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                </span>

                                {{ $item['rating'] }} <span>({{ $item['reviews'] }})</span>

                            </div>

                            <div class="wishlist-page-price">

                                <span class="now">₹{{ number_format($item['price']) }}</span>
                                <span class="old">₹{{ number_format($item['old']) }}</span>
                                <span class="off">{{ $item['off'] }}</span>

                            </div>

                            <div class="wishlist-page-stock">
                                <i class="fa-solid fa-circle"></i> In Stock
                            </div>

                            <div class="wishlist-page-card-actions">

                                <button type="button" class="wishlist-page-add-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Add to Cart
                                </button>

                                <button type="button" class="wishlist-page-remove-btn" title="Remove item">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

            <!-- Empty state (hidden by default) -->
            <div class="wishlist-page-empty" id="wishlistPageEmpty">

                <i class="fa-regular fa-heart"></i>
                <p>Your wishlist is empty</p>
                <a href="/shop" class="wishlist-page-empty-btn">Explore Products</a>

            </div>

            <!--=========================
                        RELATED PRODUCTS CAROUSEL
                    ==========================-->

            <div class="wishlist-page-related-title-wrap">

                <span class="wishlist-page-related-divider">✦</span>
                <h2>You May Also Like</h2>
                <span class="wishlist-page-related-divider">✦</span>

            </div>

            <div class="wishlist-page-related-wrap">

                <button type="button" class="wishlist-page-carousel-btn prev" id="wishlistPagePrevBtn">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>

                <div class="wishlist-page-related-track" id="wishlistPageRelatedTrack">

                    @php
                        $related = [
                            ['name' => 'Tiger Eye Bracelet', 'rating' => 4.6, 'reviews' => 140, 'price' => 999, 'old' => 1499, 'off' => '33% OFF', 'badge' => 'Best Seller', 'img' => 'product-1.png'],
                            ['name' => '7 Chakra Bracelet', 'rating' => 4.5, 'reviews' => 78, 'price' => 899, 'old' => 1299, 'off' => '31% OFF', 'img' => 'product-2.png'],
                            ['name' => 'Green Aventurine Bracelet', 'rating' => 4.4, 'reviews' => 65, 'price' => 699, 'old' => 999, 'off' => '30% OFF', 'img' => 'product-1.png'],
                            ['name' => '5 Mukhi Rudraksha Bracelet', 'rating' => 4.7, 'reviews' => 111, 'price' => 1099, 'old' => 1699, 'off' => '35% OFF', 'img' => 'product-2.png'],
                            ['name' => 'Lava Stone Bracelet', 'rating' => 4.3, 'reviews' => 56, 'price' => 599, 'old' => 999, 'off' => '33% OFF', 'img' => 'product-1.png'],
                            ['name' => 'Citrine Bracelet', 'rating' => 4.5, 'reviews' => 42, 'price' => 899, 'old' => 1299, 'off' => '31% OFF', 'img' => 'product-2.png'],
                        ];
                    @endphp

                    @foreach($related as $item)
                        <div class="wishlist-page-rcard">

                            @if(isset($item['badge']))
                                <span class="wishlist-page-rtag">{{ $item['badge'] }}</span>
                            @endif

                            <div class="wishlist-page-rimg">
                                <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">

                                <button type="button" class="wishlist-page-rheart-btn" title="Add to wishlist">
                                    <i class="fa-regular fa-heart"></i>
                                </button>

                            </div>

                            <div class="wishlist-page-rbody">

                                <p class="wishlist-page-rname">{{ $item['name'] }}</p>

                                <div class="wishlist-page-rrating">
                                    <i class="fa-solid fa-star"></i>
                                    {{ $item['rating'] }}
                                    <span>({{ $item['reviews'] }})</span>
                                </div>

                                <div class="wishlist-page-rprice-row">

                                    <div class="wishlist-page-rprice">
                                        <span class="now">₹{{ $item['price'] }}</span>
                                        <span class="old">₹{{ $item['old'] }}</span>
                                    </div>

                                    <button type="button" class="wishlist-page-radd-btn" title="Add to cart">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>

                                </div>

                                <span class="wishlist-page-roff">{{ $item['off'] }}</span>

                            </div>

                        </div>
                    @endforeach

                </div>

                <button type="button" class="wishlist-page-carousel-btn next" id="wishlistPageNextBtn">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

            </div>

        </div>

    </section>

    <script>
        (function () {

            const grid = document.getElementById("wishlistPageGrid");
            const emptyState = document.getElementById("wishlistPageEmpty");
            const countEl = document.getElementById("wishlistPageCount");

            function updateCount() {

                const cards = grid.querySelectorAll(".wishlist-page-card");
                countEl.textContent = "(" + cards.length + " Items)";

                if (cards.length === 0) {
                    grid.style.display = "none";
                    emptyState.style.display = "flex";
                } else {
                    grid.style.display = "grid";
                    emptyState.style.display = "none";
                }
            }

            function removeCard(card) {
                card.style.opacity = "0";
                card.style.transform = "translateY(10px) scale(.97)";
                setTimeout(() => {
                    card.remove();
                    updateCount();
                }, 200);
            }

            /* -----------------------------------
               Card-level actions (delegation)
            ----------------------------------- */
            grid.addEventListener("click", function (e) {

                const card = e.target.closest(".wishlist-page-card");
                if (!card) return;

                // Heart icon (top-right) removes from wishlist
                if (e.target.closest(".wishlist-page-heart-btn")) {
                    removeCard(card);
                    return;
                }

                // Trash icon removes from wishlist
                if (e.target.closest(".wishlist-page-remove-btn")) {
                    removeCard(card);
                    return;
                }

                // Add to Cart on a single card
                if (e.target.closest(".wishlist-page-add-btn")) {
                    const btn = e.target.closest(".wishlist-page-add-btn");
                    const original = btn.innerHTML;
                    btn.innerHTML = '<i class="fa-solid fa-check"></i> Added!';
                    btn.classList.add("added");
                    setTimeout(() => {
                        btn.innerHTML = original;
                        btn.classList.remove("added");
                    }, 1200);
                    return;
                }

            });

            /* -----------------------------------
               Move All to Cart
            ----------------------------------- */
            document.getElementById("wishlistPageMoveAllBtn").addEventListener("click", function () {

                const cards = grid.querySelectorAll(".wishlist-page-card");
                if (cards.length === 0) return;

                const btn = this;
                const original = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-check"></i> Moved to Cart!';
                btn.disabled = true;

                setTimeout(() => {
                    cards.forEach(card => {
                        card.style.opacity = "0";
                        card.style.transform = "translateY(10px) scale(.97)";
                    });
                    setTimeout(() => {
                        cards.forEach(card => card.remove());
                        updateCount();
                        btn.innerHTML = original;
                        btn.disabled = false;
                    }, 250);
                }, 500);
            });

            /* -----------------------------------
               Clear Wishlist
            ----------------------------------- */
            document.getElementById("wishlistPageClearBtn").addEventListener("click", function () {

                const cards = grid.querySelectorAll(".wishlist-page-card");
                if (cards.length === 0) return;

                if (!confirm("Remove all items from your wishlist?")) return;

                cards.forEach(card => {
                    card.style.opacity = "0";
                    card.style.transform = "translateY(10px) scale(.97)";
                });

                setTimeout(() => {
                    cards.forEach(card => card.remove());
                    updateCount();
                }, 250);
            });

            /* -----------------------------------
               Related products: wishlist heart + add-to-cart
            ----------------------------------- */
            const track = document.getElementById("wishlistPageRelatedTrack");

            track.addEventListener("click", function (e) {

                const heartBtn = e.target.closest(".wishlist-page-rheart-btn");
                if (heartBtn) {
                    heartBtn.classList.toggle("active");
                    const icon = heartBtn.querySelector("i");
                    icon.classList.toggle("fa-regular");
                    icon.classList.toggle("fa-solid");
                    return;
                }

                const addBtn = e.target.closest(".wishlist-page-radd-btn");
                if (addBtn) {
                    const icon = addBtn.querySelector("i");
                    icon.classList.remove("fa-cart-shopping");
                    icon.classList.add("fa-check");
                    setTimeout(() => {
                        icon.classList.remove("fa-check");
                        icon.classList.add("fa-cart-shopping");
                    }, 1000);
                    return;
                }

            });

            /* -----------------------------------
               Related products carousel scroll
            ----------------------------------- */
            function scrollAmount() {
                const card = track.querySelector(".wishlist-page-rcard");
                return card ? card.offsetWidth + 18 : 260;
            }

            document.getElementById("wishlistPagePrevBtn").addEventListener("click", () => {
                track.scrollBy({ left: -scrollAmount() * 2, behavior: "smooth" });
            });

            document.getElementById("wishlistPageNextBtn").addEventListener("click", () => {
                track.scrollBy({ left: scrollAmount() * 2, behavior: "smooth" });
            });

            // Initial state
            updateCount();

        })();
    </script>

@endsection