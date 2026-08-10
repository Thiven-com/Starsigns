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

                                @foreach($categories as $category)
                                    <li> <a href="{{ route('shop', ['category' => $category->id]) }}">
                                            <div class="left"> <i class="fa-regular fa-circle"></i>
                                                <span>{{ $category->title }}</span>
                                            </div> <span class="count">({{ $category->products_count }})</span>
                                        </a>
                                    </li>
                                @endforeach


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

                                <button class="filter-btn" type="submit">

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
                    <button class="mobile-filter-btn" id="openFilterModal">
                        <i class="fa-solid fa-sliders"></i>
                        Filters
                    </button><br>

                    <!-- Toolbar -->

                    <div class="shop-toolbar">

                        <div class="shop-results">



                            Showing <strong>{{ $products->firstItem() }}–{{ $products->lastItem() }}</strong> of
                            <strong>{{ $products->total() }}</strong> results



                        </div>

                        {{-- <div class="shop-toolbar-right">

                            <select class="shop-sort">

                                <option>Default sorting</option>

                                <option>Newest</option>

                                <option>Popularity</option>

                                <option>Best Rating</option>

                                <option>Price Low to High</option>

                                <option>Price High to Low</option>

                            </select>

                        </div> --}}

                    </div>

                    <!-- Product Grid -->

                    <!--==========================================
                                                                                                PRODUCT GRID
                                                                                            ===========================================-->
                    <!-- Product cards will be added in Part 7 -->

                    <div class="products-grid" data-aos="fade-down">
                        @forelse($products as $product)
                            @php $variant = $product->variant;
                                $price = $variant->price ?? 0;
                                $oldPrice = $variant->actual_price ?? $price;
                             @endphp
                            <div class="product-card" data-aos="fade-up">
                                <div class="product-image">
                                    @if($oldPrice > $price)
                                        <span class="product-badge">Sale</span>
                                    @endif
                                    <button class="wishlist-btn">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                    <a href="{{ route('product-detail', $product->slug) }}">
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}"> </a>
                                </div>
                                <div class="product-content">
                                    <span class="product-category">
                                        {{ $product->category->title ?? 'Category' }}
                                    </span>
                                    <h4>
                                        <a href="#"> {{ $product->title }} </a>
                                    </h4>
                                    <div class="product-rating"> <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                        <span>(4.5)</span>
                                    </div>
                                    <div class="product-price">
                                        <span class="new-price"> ₹{{ number_format($price, 2) }} </span>
                                        @if($oldPrice > $price)
                                            <span class="old-price"> ₹{{ number_format($oldPrice, 2) }}</span>
                                        @endif
                                    </div>
                                    <button class="cart-btn addToCartBtn" data-id="{{ $variant->id ?? '' }}">
                                        <i class="fa-solid fa-bag-shopping"></i>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        @empty <div class="col-12 text-center">
                                <p>No products found.</p>
                            </div>
                        @endforelse
                    </div>



                    <!-- Pagination -->

                    {{-- <div class="shop-pagination">

                        <!-- Pagination Part 9 -->
                        {{ $products->links() }}

                    </div> --}}

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================
                            MOBILE FILTER MODAL
                            ========================================= -->
    <div class="filter-modal" id="filterModal">
        <div class="filter-modal-overlay" id="closeFilterModal"></div>

        <div class="filter-modal-content">

            <div class="filter-modal-header">
                <h3>Filters</h3>
                <button type="button" id="closeFilterBtn">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="filter-modal-body">

                <!-- Categories -->
                <div class="shop-widget">
                    <div class="widget-title">
                        <h3>Categories</h3>
                    </div>

                    <ul class="category-list">
                        <li><a href="#">
                                <div class="left"><i class="fa-regular fa-circle"></i><span>Rudraksha Mala</span></div><span
                                    class="count">(24)</span>
                            </a></li>
                        <li><a href="#">
                                <div class="left"><i class="fa-regular fa-circle"></i><span>Gemstone Bracelet</span></div>
                                <span class="count">(32)</span>
                            </a></li>
                        <li><a href="#">
                                <div class="left"><i class="fa-regular fa-gem"></i><span>Gemstones</span></div><span
                                    class="count">(18)</span>
                            </a></li>
                        <li><a href="#">
                                <div class="left"><i class="fa-regular fa-star"></i><span>Yantra</span></div><span
                                    class="count">(12)</span>
                            </a></li>
                        <li><a href="#">
                                <div class="left"><i class="fa-regular fa-circle"></i><span>Crystals</span></div><span
                                    class="count">(21)</span>
                            </a></li>
                        <li><a href="#">
                                <div class="left"><i class="fa-solid fa-spa"></i><span>Spiritual Accessories</span></div>
                                <span class="count">(15)</span>
                            </a></li>
                    </ul>
                </div>

                <!-- Price Range -->
                <div class="shop-widget">
                    <div class="widget-title">
                        <h3>Price Range</h3>
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

                        <button class="filter-btn" type="button">FILTER</button>
                    </div>
                </div>

                <!-- Sort By -->
                <div class="shop-widget">
                    <div class="widget-title">
                        <h3>Sort By</h3>
                    </div>

                    <div class="sort-options">
                        <label class="sort-item">
                            <input type="radio" name="mobile-sort" checked>
                            <span class="radio"></span>
                            <span class="text">Newest First</span>
                        </label>

                        <label class="sort-item">
                            <input type="radio" name="mobile-sort">
                            <span class="radio"></span>
                            <span class="text">Price: Low to High</span>
                        </label>

                        <label class="sort-item">
                            <input type="radio" name="mobile-sort">
                            <span class="radio"></span>
                            <span class="text">Price: High to Low</span>
                        </label>

                        <label class="sort-item">
                            <input type="radio" name="mobile-sort">
                            <span class="radio"></span>
                            <span class="text">Best Selling</span>
                        </label>

                        <label class="sort-item">
                            <input type="radio" name="mobile-sort">
                            <span class="radio"></span>
                            <span class="text">Top Rated</span>
                        </label>
                    </div>
                </div>

            </div>

            <div class="filter-modal-footer">
                <button type="button" class="filter-btn" id="applyFilters">
                    Apply Filters
                </button>
            </div>

        </div>
    </div>

    <script>
        const filterModal = document.getElementById('filterModal');
        const openFilterModal = document.getElementById('openFilterModal');
        const closeFilterModal = document.getElementById('closeFilterModal');
        const closeFilterBtn = document.getElementById('closeFilterBtn');
        const applyFilters = document.getElementById('applyFilters');

        if (openFilterModal) {
            openFilterModal.addEventListener('click', () => {
                filterModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        function closeModal() {
            filterModal.classList.remove('active');
            document.body.style.overflow = '';
        }

        closeFilterModal.addEventListener('click', closeModal);
        closeFilterBtn.addEventListener('click', closeModal);
        applyFilters.addEventListener('click', closeModal);
    </script>






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