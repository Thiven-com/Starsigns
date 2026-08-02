@extends('layouts.website')
@section('content')
    <!--==========================
                                                                                                        PAGE BANNER
                                                                                                        ===========================-->

    <section class="page-banner" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="page-banner-content" data-aos="zoom-in">

                <h1>Shop</h1>

                <div class="breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">Shop</span>

                </div>

            </div>

        </div>

    </section>


    <!--==========================================
                                                                                                    SHOP CONTENT
                                                                                                    ===========================================-->

    <section class="shop-section" data-aos="fade-up" data-aos-delay="200">

        <div class="container" data-aos="fade-down">

            <div class="shop-wrapper">

                <!--=========================
                                                                                                                        LEFT SIDEBAR
                                                                                                                ==========================-->

                <aside class="shop-sidebar" data-aos="fade-right">

                    <!-- Categories -->
                    <div class="shop-widget categories-widget">


                        <!--==========================================
                                                                                                CATEGORIES WIDGET
                                                                                                ===========================================-->

                        <div class="shop-widget" data-aos="fade-left">

                            <div class="widget-title">

                                <h3>Categories</h3>

                                <button>
                                    <i class="fa-solid fa-minus"></i>
                                </button>

                            </div>

                            <ul class="category-list">

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-regular fa-circle"></i>

                                            <span>Rudraksha Mala</span>

                                        </div>

                                        <span class="count">(24)</span>

                                    </a>

                                </li>

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-regular fa-circle"></i>

                                            <span>Gemstone Bracelet</span>

                                        </div>

                                        <span class="count">(32)</span>

                                    </a>

                                </li>

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-regular fa-gem"></i>

                                            <span>Gemstones</span>

                                        </div>

                                        <span class="count">(18)</span>

                                    </a>

                                </li>

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-regular fa-star"></i>

                                            <span>Yantra</span>

                                        </div>

                                        <span class="count">(12)</span>

                                    </a>

                                </li>

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-regular fa-circle"></i>

                                            <span>Crystals</span>

                                        </div>

                                        <span class="count">(21)</span>

                                    </a>

                                </li>

                                <li>

                                    <a href="#">

                                        <div class="left">

                                            <i class="fa-solid fa-spa"></i>

                                            <span>Spiritual Accessories</span>

                                        </div>

                                        <span class="count">(15)</span>

                                    </a>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <!-- Price -->
                    <div class="shop-widget price-widget">

                        <!--==========================================
                                            PRICE FILTER
                          ===========================================-->

                        <div class="shop-widget">

                            <div class="widget-title">

                                <h3>Price Range</h3>

                                <button>
                                    <i class="fa-solid fa-minus"></i>
                                </button>

                            </div>

                            <div class="price-range">

                                <input type="range" class="price-slider" min="199" max="4999" value="2499">

                                <div class="price-label">

                                    <span>₹199</span>

                                    <span>₹4999</span>

                                </div>

                                <div class="price-inputs">

                                    <input type="text" value="₹ 199">

                                    <span>–</span>

                                    <input type="text" value="₹ 4999">

                                </div>

                                <button class="filter-btn">

                                    FILTER

                                </button>

                            </div>

                        </div>


                    </div>

                    <!-- Sort -->
                    <div class="shop-widget sort-widget">

                        <!--==========================================
                                       SORT BY
                                  ===========================================-->

                        <div class="shop-widget">

                            <div class="widget-title">

                                <h3>Sort By</h3>

                                <button>
                                    <i class="fa-solid fa-minus"></i>
                                </button>

                            </div>

                            <div class="sort-options">

                                <label class="sort-item">

                                    <input type="radio" name="sort" checked>

                                    <span class="radio"></span>

                                    <span class="text">Newest First</span>

                                </label>

                                <label class="sort-item">

                                    <input type="radio" name="sort">

                                    <span class="radio"></span>

                                    <span class="text">Price: Low to High</span>

                                </label>

                                <label class="sort-item">

                                    <input type="radio" name="sort">

                                    <span class="radio"></span>

                                    <span class="text">Price: High to Low</span>

                                </label>

                                <label class="sort-item">

                                    <input type="radio" name="sort">

                                    <span class="radio"></span>

                                    <span class="text">Best Selling</span>

                                </label>

                                <label class="sort-item">

                                    <input type="radio" name="sort">

                                    <span class="radio"></span>

                                    <span class="text">Top Rated</span>

                                </label>

                            </div>

                        </div>


                    </div>

                </aside>

                <!--=========================
                                        RIGHT CONTENT
                                 ==========================-->

                <div class="shop-content">

                    <!-- Toolbar -->

                    <div class="shop-toolbar">

                        <div class="shop-results">



                            Showing <strong>1–12</strong> of
                            <strong>120</strong> results



                        </div>

                        <div class="shop-toolbar-right">

                            <select class="shop-sort">

                                <option>Default sorting</option>

                                <option>Newest</option>

                                <option>Popularity</option>

                                <option>Best Rating</option>

                                <option>Price Low to High</option>

                                <option>Price High to Low</option>

                            </select>

                            <!-- <button class="grid-btn active">

                                        <i class="fa-solid fa-grip"></i>

                                    </button>

                                    <button class="list-btn">

                                        <i class="fa-solid fa-list"></i>

                                    </button> -->

                        </div>

                    </div>

                    <!-- Product Grid -->

                    <!--==========================================
                                                                PRODUCT GRID
                                                            ===========================================-->
                    <!-- Product cards will be added in Part 7 -->

                    <div class="products-grid" data-aos="fade-down">

                        @for($i = 1; $i <= 16; $i++)

                            <div class="product-card" data-aos="fade-up">

                                <div class="product-image">

                                    <span class="product-badge">
                                        Sale
                                    </span>

                                    <button class="wishlist-btn">
                                        <i class="fa-regular fa-heart"></i>

                                    </button>

                                    <!-- <div class="product-overlay">

                                                        <a href="#" class="quick-view">

                                                            <i class="fa-regular fa-eye"></i>

                                                            Quick View

                                                        </a>

                                                    </div> -->
                                    <a href="{{ route('product') }}">
                                        <img src="{{ asset('website') }}/images/product-2.png" alt="Product">
                                    </a>



                                </div>

                                <div class="product-content">

                                    <span class="product-category">

                                        Rudraksha

                                    </span>

                                    <h4>

                                        <a href="{{ route('product') }}">

                                            5 Mukhi Rudraksha Mala

                                        </a>

                                    </h4>

                                    <div class="product-rating">

                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>

                                        <span>(48)</span>

                                    </div>

                                    <div class="product-price">

                                        <span class="new-price">

                                            ₹999

                                        </span>

                                        <span class="old-price">

                                            ₹1499

                                        </span>

                                    </div>

                                    <button class="cart-btn">

                                        <i class="fa-solid fa-bag-shopping"></i>

                                        Add to Cart

                                    </button>

                                </div>

                            </div>

                        @endfor

                    </div>



                    <!-- Pagination -->

                    <div class="shop-pagination">

                        <!-- Pagination Part 9 -->
                        <nav class="pagination">

                            <a href="#" class="page-btn prev">
                                <i class="fa-solid fa-angle-left"></i>
                            </a>

                            <a href="#" class="page-btn active">
                                1
                            </a>

                            <a href="#" class="page-btn">
                                2
                            </a>

                            <a href="#" class="page-btn">
                                3
                            </a>

                            <span class="dots">...</span>

                            <a href="#" class="page-btn">
                                10
                            </a>

                            <a href="#" class="page-btn next">
                                <i class="fa-solid fa-angle-right"></i>
                            </a>

                        </nav>

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
            offset: 100
        });
    </script>






    <script>
        const slider = document.querySelector(".price-slider");
        const inputs = document.querySelectorAll(".price-inputs input");

        slider.addEventListener("input", function () {

            inputs[1].value = "₹ " + this.value;

        });
    </script>

    <script>
        document.querySelectorAll(".sort-item").forEach(item => {

            item.addEventListener("click", () => {

                document.querySelectorAll(".sort-item").forEach(i => {

                    i.classList.remove("active");

                });

                item.classList.add("active");

            });

        });
    </script>
    <script>
        document.querySelectorAll(".view-btn").forEach(button => {

            button.addEventListener("click", function () {

                document.querySelectorAll(".view-btn")
                    .forEach(btn => btn.classList.remove("active"));

                this.classList.add("active");

            });

        });
    </script>


    <script>
        document.querySelectorAll(".page-btn").forEach(btn => {

            btn.addEventListener("click", function (e) {

                if (this.classList.contains("prev") ||
                    this.classList.contains("next")) return;

                e.preventDefault();

                document.querySelectorAll(".page-btn")
                    .forEach(b => b.classList.remove("active"));

                this.classList.add("active");

            });

        });
    </script>
@endsection