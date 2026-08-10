@extends('layouts.website')
@section('content')

    <!--==========================================
                BLOG DETAILS PAGE CONTENT
            ===========================================-->

    <section class="blog-details-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="blog-details-crumb">

                <a href="/">Home</a>
                <span class="blog-details-crumb-sep">/</span>

                <a href="{{ route('blog') }}">Blogs</a>
                <span class="blog-details-crumb-sep">/</span>

                <span class="blog-details-crumb-active">
                    {{ $blog->title }}
                </span>

            </div>

            <div class="blog-details-layout">

                <!--=========================
                            MAIN ARTICLE
                        ==========================-->

                <article class="blog-details-article">

    <span class="blog-details-category">
        {{ $blog->category->name ?? 'BLOG' }}
    </span>

    <h1 class="blog-details-title">
        {{ $blog->title }}
    </h1>

    <div class="blog-details-meta">

        <span>
            <i class="fa-regular fa-user"></i>
            By Admin
        </span>

        <span>
            <i class="fa-regular fa-calendar"></i>
            {{ $blog->created_at->format('F d, Y') }}
        </span>

        <span>
            <i class="fa-regular fa-eye"></i>
            {{ number_format($blog->views ?? 0) }} Views
        </span>

    </div>

    <div class="blog-details-featured-img">

        <img src="{{ asset($blog->banner ?? $blog->image) }}"
             alt="{{ $blog->title }}">

    </div>

    <div class="blog-details-content">

        @if($blog->short_description)
            <p>
                {{ $blog->short_description }}
            </p>
        @endif

        {!! $blog->description !!}

    </div>

    @if($blog->tags)

        <div class="blog-details-tags mt-4">

            <strong>Tags:</strong>

            @foreach(explode(',', $blog->tags) as $tag)
                <span class="badge bg-light text-dark me-2">
                    {{ trim($tag) }}
                </span>
            @endforeach

        </div>

    @endif

</article>

            </div>

        </div>

    </section>

    <script>
        (function () {

            const currentUrl = window.location.href;
            const pageTitle = document.title;
            const toast = document.getElementById("blogDetailsToast");

            let toastTimer = null;

            function showToast() {
                toast.classList.add("show");
                clearTimeout(toastTimer);
                toastTimer = setTimeout(() => {
                    toast.classList.remove("show");
                }, 2200);
            }

            function openShareWindow(url) {
                window.open(url, "_blank", "noopener,noreferrer,width=600,height=500");
            }

            document.querySelectorAll(".blog-details-share-btn").forEach(function (btn) {

                btn.addEventListener("click", function () {

                    const platform = this.dataset.platform;

                    switch (platform) {

                        case "facebook":
                            openShareWindow("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(currentUrl));
                            break;

                        case "twitter":
                            openShareWindow("https://twitter.com/intent/tweet?url=" + encodeURIComponent(currentUrl) + "&text=" + encodeURIComponent(pageTitle));
                            break;

                        case "whatsapp":
                            openShareWindow("https://wa.me/?text=" + encodeURIComponent(pageTitle + " - " + currentUrl));
                            break;

                        case "pinterest":
                            openShareWindow("https://pinterest.com/pin/create/button/?url=" + encodeURIComponent(currentUrl) + "&description=" + encodeURIComponent(pageTitle));
                            break;

                        case "email":
                            window.location.href = "mailto:?subject=" + encodeURIComponent(pageTitle) + "&body=" + encodeURIComponent("Check out this article: " + currentUrl);
                            break;

                        case "copy":
                            if (navigator.clipboard) {
                                navigator.clipboard.writeText(currentUrl).then(showToast);
                            } else {
                                const tempInput = document.createElement("input");
                                tempInput.value = currentUrl;
                                document.body.appendChild(tempInput);
                                tempInput.select();
                                document.execCommand("copy");
                                document.body.removeChild(tempInput);
                                showToast();
                            }
                            break;

                    }

                });

            });

        })();
    </script>

@endsection