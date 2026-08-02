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
    <section class="blogs-section">

        <div class="container">



            <!-- Blog Cards -->
            <!--==========================================
                                                         BLOG GRID
                                                   ===========================================-->
            @php
                $images = [
                    '7rudramala.png',
                    'bracelet.png',
                    'bracevio.png',
                    'gemstone.png',
                    'karungali.png',
                    'laxmiyantra.png'
                ];
            @endphp
            <div class="blogs-grid">

                @for($i = 1; $i <= 6; $i++)

                            <article class="blogs-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                                <div class="blogs-image">

                                    <img src="{{ asset('website/images/' . $images[$i - 1]) }}" alt="Blog">

                                </div>

                                <div class="blogs-card-content">

                                    <span class="blogs-category">

                                        {{ ['ASTROLOGY', 'TAROT', 'SPIRITUALITY', 'CRYSTALS', 'ASTROLOGY', 'SPIRITUALITY'][($i - 1) % 6] }}

                                    </span>

                                    <h3 class="blogs-title">

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

                                    <p class="blogs-description">

                                        Discover practical spiritual insights, ancient wisdom and modern guidance to help
                                        improve your everyday life.

                                    </p>

                                    <div class="blogs-meta">

                                        <span class="blogs-date">

                                            <i class="fa-regular fa-calendar"></i>

                                            May {{ 10 - $i }}, 2024

                                        </span>

                                        <span class="blogs-author">

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

            <div class="blogs-pagination">

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





    </section>



    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 120,
        });
    </script>

@endsection