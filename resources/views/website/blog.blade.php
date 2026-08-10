@extends('layouts.website')
@section('content')


    <section class="blogs-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="blogs-banner-content" data-aos="fade-up" data-aos-delay="200">

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

            <div class="blogs-grid">

                @forelse($blogs as $key => $blog)

                    <a href="{{ route('blog-details', $blog->slug) }}" class="blogs-card-link">

                        <article class="blogs-card" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">

                            <div class="blogs-image">

                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">

                            </div>

                            <div class="blogs-card-content">

                                <span class="blogs-category">
                                    {{ strtoupper($blog->category->name ?? 'BLOG') }}
                                </span>

                                <h3 class="blogs-title">
                                    {{ $blog->title }}
                                </h3>

                                <p class="blogs-description">
                                    {{ Str::limit(strip_tags($blog->short_description ?? $blog->description), 120) }}
                                </p>

                                <div class="blogs-meta">

                                    <span class="blogs-date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $blog->created_at->format('M d, Y') }}
                                    </span>

                                    <span class="blogs-author">
                                        <i class="fa-regular fa-user"></i>
                                        By Admin
                                    </span>

                                </div>

                            </div>

                        </article>

                    </a>

                @empty

                    <div class="col-12 text-center">
                        <p>No blogs available.</p>
                    </div>

                @endforelse

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


    <style>
        .blogs-card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
    </style>

@endsection