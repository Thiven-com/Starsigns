@extends('layouts.website')
@section('content')

    <!--==========================
        PAGE BANNER
    ===========================-->

    <section class="page-banner">

        <div class="container">

            <div class="page-banner-content">

                <h1>Product Details</h1>

                <div class="breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <a href="/shop">Shop</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">product details</span>

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
                <a href="/shop">Shop</a>
                <span class="pdp-crumb-sep">/</span>
                <a href="/shop?category=bracelets">Bracelets</a>
                <span class="pdp-crumb-sep">/</span>
                <span class="pdp-crumb-active">Crystal Healing Bracelet</span>

            </div>

            <!--=========================
                GALLERY + INFO
            ==========================-->

            <div class="pdp-main">

                <!-- Thumbnails -->
                <div class="pdp-thumbs">

                    @for($i = 1; $i <= 4; $i++)
                        <button type="button" class="pdp-thumb {{ $i == 1 ? 'active' : '' }}" data-image="{{ asset('website') }}/images/product-{{ $i }}.png">
                            <img src="{{ asset('website') }}/images/product-{{ $i }}.png" alt="Thumbnail {{ $i }}">
                        </button>
                    @endfor

                    <button type="button" class="pdp-thumb-more">
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                </div>

                <!-- Main gallery -->
                <div class="pdp-gallery">

                    <span class="pdp-badge-sale">Sale</span>

                    <button type="button" class="pdp-expand-btn">
                        <i class="fa-solid fa-expand"></i>
                    </button>

                    <img id="pdpMainImage" src="{{ asset('website') }}/images/product-1.png" alt="Crystal Healing Bracelet">

                </div>

                <!-- Info -->
                <div class="pdp-info">

                    <div class="pdp-info-head">

                        <h1>Crystal Healing Bracelet</h1>

                        <button type="button" class="pdp-wishlist-btn">
                            <i class="fa-regular fa-heart"></i>
                            Add to Wishlist
                        </button>

                    </div>

                    <div class="pdp-rating">

                        <span class="pdp-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star-half-stroke"></i>
                        </span>

                        <strong>4.5</strong>

                        <span class="pdp-review-count">(64 Reviews)</span>

                    </div>

                    <div class="pdp-price">

                        <span class="pdp-price-now">₹899</span>

                        <span class="pdp-price-old">₹1,299</span>

                        <span class="pdp-price-off">31% OFF</span>

                    </div>

                    <p class="pdp-desc">
                        This beautiful Crystal Healing Bracelet is handmade with natural amethyst stones, known for their calming energy and spiritual healing properties.
                    </p>

                    <div class="pdp-features">

                        <div class="pdp-feature">
                            <span class="pdp-feature-ic"><i class="fa-solid fa-shield-halved"></i></span>
                            <span>100% Natural Crystals</span>
                        </div>

                        <div class="pdp-feature">
                            <span class="pdp-feature-ic"><i class="fa-regular fa-heart"></i></span>
                            <span>Handmade with Love</span>
                        </div>

                        <div class="pdp-feature">
                            <span class="pdp-feature-ic"><i class="fa-solid fa-sun"></i></span>
                            <span>Energized & Purified</span>
                        </div>

                        <div class="pdp-feature">
                            <span class="pdp-feature-ic"><i class="fa-solid fa-gem"></i></span>
                            <span>Premium Quality</span>
                        </div>

                    </div>

                    <div class="pdp-qty-row">

                        <span class="pdp-qty-label">Quantity:</span>

                        <div class="pdp-qty-box">

                            <button type="button" id="pdpQtyDec">
                                <i class="fa-solid fa-minus"></i>
                            </button>

                            <input type="text" id="pdpQtyVal" value="1" readonly>

                            <button type="button" id="pdpQtyInc">
                                <i class="fa-solid fa-plus"></i>
                            </button>

                        </div>

                    </div>

                    <div class="pdp-cta-row">

                        <button type="button" class="pdp-btn pdp-btn-cart">
                            <i class="fa-solid fa-bag-shopping"></i>
                            Add to Cart
                        </button>

                        <button type="button" class="pdp-btn pdp-btn-buy">
                            <i class="fa-solid fa-bolt"></i>
                            Buy Now
                        </button>

                    </div>

                    <div class="pdp-perks">

                        <div class="pdp-perk">
                            <span class="pdp-perk-ic"><i class="fa-solid fa-truck-fast"></i></span>
                            <div>
                                <div class="pdp-perk-title">Free Shipping</div>
                                <div class="pdp-perk-sub">On orders above ₹999</div>
                            </div>
                        </div>

                        <div class="pdp-perk">
                            <span class="pdp-perk-ic"><i class="fa-solid fa-lock"></i></span>
                            <div>
                                <div class="pdp-perk-title">Secure Payment</div>
                                <div class="pdp-perk-sub">100% secure &a trusted</div>
                            </div>
                        </div>

                        <div class="pdp-perk">
                            <span class="pdp-perk-ic"><i class="fa-solid fa-headset"></i></span>
                            <div>
                                <div class="pdp-perk-title">Easy Returns</div>
                                <div class="pdp-perk-sub">7 days return policy</div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <!--=========================
                TABS
            ==========================-->

            <div class="pdp-tabs">

                <div class="pdp-tabs-nav">

                    <button type="button" class="pdp-tab-btn active" data-tab="pdpDescription">Description</button>
                    <button type="button" class="pdp-tab-btn" data-tab="pdpBenefits">Benefits</button>
                    <button type="button" class="pdp-tab-btn" data-tab="pdpHowTo">How to Use</button>
                    <button type="button" class="pdp-tab-btn" data-tab="pdpShipping">Shipping & Returns</button>
                    <button type="button" class="pdp-tab-btn" data-tab="pdpReviews">Reviews (64)</button>

                </div>

                <div class="pdp-tab-panel active" id="pdpDescription">

                    <div class="pdp-tab-col">

                        <p>
                            Amethyst is a powerful and protective stone with a high spiritual vibration.
                            It enhances intuition, promotes calmness, relieves stress, and supports
                            emotional balance. Wearing this bracelet helps in spiritual growth and
                            positive energy.
                        </p>

                        <ul class="pdp-check-list">
                            <li><span class="pdp-check"><i class="fa-solid fa-check"></i></span> Made with 8mm natural Amethyst beads</li>
                            <li><span class="pdp-check"><i class="fa-solid fa-check"></i></span> Stretchable elastic cord – fits most wrist sizes</li>
                            <li><span class="pdp-check"><i class="fa-solid fa-check"></i></span> Helps in stress relief, focus & spiritual growth</li>
                            <li><span class="pdp-check"><i class="fa-solid fa-check"></i></span> Perfect for daily wear & meditation</li>
                        </ul>

                    </div>

                    <div class="pdp-spec-grid">

                        <div class="pdp-spec">
                            <span class="pdp-spec-ic"><i class="fa-solid fa-gem"></i></span>
                            <div>
                                <div class="pdp-spec-k">Material</div>
                                <div class="pdp-spec-v">Natural Amethyst</div>
                            </div>
                        </div>

                        <div class="pdp-spec">
                            <span class="pdp-spec-ic"><i class="fa-solid fa-ruler"></i></span>
                            <div>
                                <div class="pdp-spec-k">Bead Size</div>
                                <div class="pdp-spec-v">8mm</div>
                            </div>
                        </div>

                        <div class="pdp-spec">
                            <span class="pdp-spec-ic"><i class="fa-solid fa-link"></i></span>
                            <div>
                                <div class="pdp-spec-k">Bracelet Type</div>
                                <div class="pdp-spec-v">Elastic Stretchable</div>
                            </div>
                        </div>

                        <div class="pdp-spec">
                            <span class="pdp-spec-ic"><i class="fa-solid fa-user-group"></i></span>
                            <div>
                                <div class="pdp-spec-k">Unisex</div>
                                <div class="pdp-spec-v">Men & Women</div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="pdp-tab-panel" id="pdpBenefits">
                    <div class="pdp-tab-col">
                        <p>
                            Amethyst is believed to calm the mind, ease anxiety, and support restful
                            sleep. It's often worn to encourage clarity, patience, and emotional
                            balance during meditation or daily life.
                        </p>
                    </div>
                    <div></div>
                </div>

                <div class="pdp-tab-panel" id="pdpHowTo">
                    <div class="pdp-tab-col">
                        <p>
                            Wear on either wrist, cleanse under moonlight or gentle running water
                            monthly, and avoid contact with perfumes or harsh chemicals to keep the
                            beads vibrant.
                        </p>
                    </div>
                    <div></div>
                </div>

                <div class="pdp-tab-panel" id="pdpShipping">
                    <div class="pdp-tab-col">
                        <p>
                            Orders ship within 24–48 hours. Free shipping on orders above ₹999.
                            Easy 7-day return policy if you're not fully satisfied.
                        </p>
                    </div>
                    <div></div>
                </div>

                <div class="pdp-tab-panel" id="pdpReviews">
                    <div class="pdp-tab-col">
                        <p>
                            4.5 out of 5 based on 64 verified customer reviews. Most buyers highlight
                            the bracelet's calming effect and comfortable, adjustable fit.
                        </p>
                    </div>
                    <div></div>
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

            <div class="pdp-related-grid">

                @php
                    $related = [
                        ['name' => '7 Mukhi Rudraksha Bracelet', 'rating' => 4.5, 'reviews' => 140, 'price' => 1199, 'old' => 1799, 'off' => '33% OFF', 'badge' => 'Sale', 'img' => 'product-1.png'],
                        ['name' => 'Rose Quartz Bracelet', 'rating' => 4.5, 'reviews' => 86, 'price' => 699, 'old' => 999, 'off' => '30% OFF', 'img' => 'product-2.png'],
                        ['name' => 'Black Obsidian Bracelet', 'rating' => 4.4, 'reviews' => 98, 'price' => 799, 'old' => 1099, 'off' => '27% OFF', 'img' => 'product-3.png'],
                        ['name' => 'Tiger Eye Bracelet', 'rating' => 4.6, 'reviews' => 140, 'price' => 999, 'old' => 1499, 'off' => '33% OFF', 'badge' => 'Best Seller', 'img' => 'product-1.png'],
                        ['name' => '7 Chakra Bracelet', 'rating' => 4.5, 'reviews' => 76, 'price' => 899, 'old' => 1299, 'off' => '31% OFF', 'img' => 'product-2.png'],
                        ['name' => 'Green Aventurine Bracelet', 'rating' => 4.4, 'reviews' => 68, 'price' => 699, 'old' => 999, 'off' => '30% OFF', 'img' => 'product-3.png'],
                    ];
                @endphp

                @foreach($related as $item)
                    <div class="pdp-rcard">

                        @if(isset($item['badge']))
                            <span class="pdp-rtag {{ $item['badge'] == 'Sale' ? 'sale' : 'best' }}">{{ $item['badge'] }}</span>
                        @endif

                        <div class="pdp-rimg">
                            <img src="{{ asset('website') }}/images/{{ $item['img'] }}" alt="{{ $item['name'] }}">
                        </div>

                        <div class="pdp-rbody">

                            <p class="pdp-rname">{{ $item['name'] }}</p>

                            <div class="pdp-rrating">
                                <i class="fa-solid fa-star"></i>
                                {{ $item['rating'] }}
                                <span>({{ $item['reviews'] }})</span>
                            </div>

                            <div class="pdp-rprice">
                                <span class="now">₹{{ $item['price'] }}</span>
                                <span class="old">₹{{ $item['old'] }}</span>
                                <span class="off">{{ $item['off'] }}</span>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

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

@endsection