@extends('layouts.website')
@section('content')


    <section class="blogs-banner-section">

        <div class="container">

            <div class="blogs-banner-content">

                <h1>Blogs</h1>

                <div class="blogs-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">Blogs</span>

                </div>

            </div>

        </div>

    </section>


    <!--==========================================
                                    BLOG CONTENT
                                    ===========================================-->

    <section class="blog-section">

        <div class="container">

            <div class="blog-wrapper">

                <!--==========================
                                                        LEFT CONTENT
                                                ===========================-->

                <div class="blog-content">

                    <!-- Blog Cards -->
                    <!--==========================================
                                                     BLOG GRID
                                                       ===========================================-->

                    <div class="blog-grid">

                        @for($i = 1; $i <= 6; $i++)

                                            <article class="blog-card">

                                                <div class="blog-image">

                                                    <img src="{{ asset('website/images/blog/blog' . $i . '.jpg') }}" alt="Blog">

                                                </div>

                                                <div class="blog-card-content">

                                                    <span class="blog-category">

                                                        {{ ['ASTROLOGY', 'TAROT', 'SPIRITUALITY', 'CRYSTALS', 'ASTROLOGY', 'SPIRITUALITY'][($i - 1) % 6] }}

                                                    </span>

                                                    <h3>

                                                        <a href="#">

                                                            {{ [
                                'How Astrology Can Help You Find Clarity In Life',
                                '5 Powerful Tarot Spread For Daily Guidance',
                                'Morning Rituals For a Positive And Peaceful Day',
                                'Crystal Healing 101: Benefits And How To Use Them',
                                'Understanding Your Zodiac Sign Better',
                                'The Power of Meditation and Mindfulness'
                            ][($i - 1) % 6] }}

                                                        </a>

                                                    </h3>

                                                    <p>

                                                        Discover practical spiritual insights, ancient wisdom and
                                                        modern guidance to help improve your everyday life.

                                                    </p>

                                                    <div class="blog-meta">

                                                        <span>

                                                            <i class="fa-regular fa-calendar"></i>

                                                            May {{ 10 - $i }}, 2024

                                                        </span>

                                                        <span>

                                                            <i class="fa-regular fa-user"></i>

                                                            By Admin

                                                        </span>

                                                    </div>

                                                </div>

                                            </article>

                        @endfor

                    </div>

                    <!-- Pagination -->

                    <!--==========================================
                       PAGINATION
                   ===========================================-->

                    <div class="blog-pagination">

                        <ul>

                            <li>

                                <a href="#">

                                    <i class="fa-solid fa-chevron-left"></i>

                                </a>

                            </li>

                            <li>

                                <a href="#" class="active">1</a>

                            </li>

                            <li>

                                <a href="#">2</a>

                            </li>

                            <li>

                                <a href="#">3</a>

                            </li>

                            <li>

                                <span>...</span>

                            </li>

                            <li>

                                <a href="#">10</a>

                            </li>

                            <li>

                                <a href="#">

                                    <i class="fa-solid fa-chevron-right"></i>

                                </a>

                            </li>

                        </ul>

                    </div>

                </div>

                <!--==========================
                                                        SIDEBAR
                                                ===========================-->

                <aside class="blog-sidebar">

                    <!-- Search -->

                    <!--==========================
                    SEARCH WIDGET
                    ===========================-->

                    <div class="sidebar-widget">

                        <div class="blog-search">

                            <input type="text" placeholder="Search blogs...">

                            <button>

                                <i class="fa-solid fa-magnifying-glass"></i>

                            </button>

                        </div>

                    </div>

                    <!-- Categories -->
                    <!--==========================================
                CATEGORIES WIDGET
                ===========================================-->

                    <div class="sidebar-widget">

                        <div class="widget-title">

                            <h4>Categories</h4>

                        </div>

                        <ul class="category-list">

                            @php
                                $categories = [
                                    ['Astrology', 12],
                                    ['Tarot Reading', 8],
                                    ['Numerology', 15],
                                    ['Crystal Healing', 6],
                                    ['Vastu Tips', 10],
                                    ['Spirituality', 18],
                                ];
                            @endphp

                            @foreach($categories as $category)

                                <li>

                                    <a href="#">

                                        <span>

                                            <i class="fa-solid fa-angle-right"></i>

                                            {{ $category[0] }}

                                        </span>

                                        <strong>{{ $category[1] }}</strong>

                                    </a>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                    <!-- Popular Posts -->

                    <!--==========================================
            POPULAR POSTS WIDGET
            ===========================================-->

                    <div class="sidebar-widget">

                        <div class="widget-title">

                            <h4>Popular Posts</h4>

                        </div>

                        @php
                            $popularPosts = [
                                [
                                    'image' => 'blog1.jpg',
                                    'title' => 'How Astrology Can Guide Your Daily Life',
                                    'date' => 'May 08, 2024'
                                ],
                                [
                                    'image' => 'blog2.jpg',
                                    'title' => 'Top 5 Tarot Spreads for Beginners',
                                    'date' => 'May 06, 2024'
                                ],
                                [
                                    'image' => 'blog3.jpg',
                                    'title' => 'Benefits of Crystal Healing',
                                    'date' => 'May 03, 2024'
                                ],
                            ];
                        @endphp

                        <div class="popular-posts">

                            @foreach($popularPosts as $post)

                                <div class="popular-post">

                                    <div class="popular-post-image">

                                        <a href="#">

                                            <img src="{{ asset('website/images/blog/' . $post['image']) }}" alt="Blog">

                                        </a>

                                    </div>

                                    <div class="popular-post-content">

                                        <span>

                                            <i class="fa-regular fa-calendar"></i>

                                            {{ $post['date'] }}

                                        </span>

                                        <h5>

                                            <a href="#">

                                                {{ $post['title'] }}

                                            </a>

                                        </h5>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                    <!-- CTA -->

                    <!--==========================================
                          CONSULTATION CTA
                        ===========================================-->

                    <div class="sidebar-widget consultation-widget">

                        <div class="consultation-icon">

                            <i class="fa-solid fa-star-and-crescent"></i>

                        </div>

                        <h3>

                            Need Personal Guidance?

                        </h3>

                        <p>

                            Connect with our experienced astrologers for personalized
                            horoscope reading, tarot consultation and spiritual guidance.

                        </p>

                        <a href="{{ route('consultation') }}" class="consultation-btn">

                            Book Consultation

                            <i class="fa-solid fa-arrow-right"></i>

                        </a>

                    </div>

                </aside>

            </div>

        </div>

    </section>

@endsection