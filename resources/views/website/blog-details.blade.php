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
                <a href="/blogs">Blogs</a>
                <span class="blog-details-crumb-sep">/</span>
                <span class="blog-details-crumb-active">Blog Details</span>

            </div>

            <div class="blog-details-layout">

                <!--=========================
                        MAIN ARTICLE
                    ==========================-->

                <article class="blog-details-article">

                    <span class="blog-details-category">Spirituality</span>

                    <h1 class="blog-details-title">Benefits of Wearing Rudraksha: A Complete Guide</h1>

                    <div class="blog-details-meta">

                        <span><i class="fa-regular fa-user"></i> By Admin</span>
                        <span><i class="fa-regular fa-calendar"></i> May 15, 2025</span>
                        <span><i class="fa-regular fa-eye"></i> 1.2K Views</span>
                        <span><i class="fa-regular fa-comment"></i> 08 Comments</span>

                    </div>

                    <div class="blog-details-featured-img">

                        <img src="{{ asset('website') }}/images/blogbann.png" alt="Benefits of Wearing Rudraksha">

                    </div>

                    <div class="blog-details-content">

                        <p>Rudraksha beads have been revered for centuries in Hindu tradition for their spiritual and medicinal properties. These sacred beads, originating from the tears of Lord Shiva, are more than just ornaments — they are powerful tools for spiritual growth and well-being.</p>

                        <h2>What is Rudraksha?</h2>

                        <p>Rudraksha is a seed obtained from the Rudraksha tree (Elaeocarpus ganitrus). The word "Rudraksha" is derived from two words: "Rudra" (another name for Lord Shiva) and "Aksha" (meaning eyes or tears).</p>

                        <h2>Benefits of Wearing Rudraksha</h2>

                        <ul class="blog-details-list">

                            <li><i class="fa-solid fa-gear"></i> <strong>Reduces Stress &amp; Anxiety:</strong> Rudraksha beads help in calming the mind and reducing stress.</li>
                            <li><i class="fa-solid fa-gear"></i> <strong>Enhances Focus &amp; Concentration:</strong> Ideal for students and professionals.</li>
                            <li><i class="fa-solid fa-gear"></i> <strong>Improves Health:</strong> Helps in regulating blood pressure and improving heart health.</li>
                            <li><i class="fa-solid fa-gear"></i> <strong>Spiritual Growth:</strong> Aids in meditation and connects the wearer with divine energy.</li>
                            <li><i class="fa-solid fa-gear"></i> <strong>Protection:</strong> Shields from negative energies and evil forces.</li>

                        </ul>

                        <h2>How to Wear Rudraksha?</h2>

                        <p>Rudraksha should be worn after proper purification and chanting of mantras. It is best to consult an expert to choose the right Mukhi (face) as per your needs.</p>

                        <blockquote class="blog-details-quote">

                            <span class="blog-details-quote-icon">
                                <i class="fa-solid fa-quote-left"></i>
                            </span>

                            <p>"Rudraksha is not just a bead, it's a divine blessing that brings peace, prosperity, and protection."</p>

                        </blockquote>

                    </div>

                    <!--=========================
                            SHARE ROW
                        ==========================-->

                    <!-- <div class="blog-details-share-row">

                        <span class="blog-details-share-label">Share this article:</span>

                        <div class="blog-details-share-icons">

                            <button type="button" class="blog-details-share-btn blog-details-share-facebook" data-platform="facebook" title="Share on Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </button>

                            <button type="button" class="blog-details-share-btn blog-details-share-twitter" data-platform="twitter" title="Share on Twitter">
                                <i class="fa-brands fa-x-twitter"></i>
                            </button>

                            <button type="button" class="blog-details-share-btn blog-details-share-whatsapp" data-platform="whatsapp" title="Share on WhatsApp">
                                <i class="fa-brands fa-whatsapp"></i>
                            </button>

                            <button type="button" class="blog-details-share-btn blog-details-share-pinterest" data-platform="pinterest" title="Share on Pinterest">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </button>

                            <button type="button" class="blog-details-share-btn blog-details-share-email" data-platform="email" title="Share via Email">
                                <i class="fa-regular fa-envelope"></i>
                            </button>

                            <button type="button" class="blog-details-share-btn blog-details-share-copy" data-platform="copy" title="Copy link">
                                <i class="fa-solid fa-link"></i>
                            </button>

                        </div>

                    </div> -->

                    <!-- Copy-link toast -->
                    <!-- <div class="blog-details-toast" id="blogDetailsToast">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Link copied to clipboard!</span>
                    </div> -->

                    <!--=========================
                            PREV / NEXT NAV
                        ==========================-->

                    <!-- <div class="blog-details-nav-row">

                        <a href="/blog/how-gemstones-can-change-your-life" class="blog-details-nav-card blog-details-nav-prev">

                            <div class="blog-details-nav-img">
                                <img src="{{ asset('website') }}/images/blog-gemstones.jpg" alt="How Gemstones Can Change Your Life">
                            </div>

                            <div class="blog-details-nav-text">
                                <span><i class="fa-solid fa-chevron-left"></i> Previous Post</span>
                                <h4>How Gemstones Can Change Your Life?</h4>
                            </div>

                        </a>

                        <a href="/blog/top-5-gemstones-for-wealth-and-prosperity" class="blog-details-nav-card blog-details-nav-next">

                            <div class="blog-details-nav-text">
                                <span>Next Post <i class="fa-solid fa-chevron-right"></i></span>
                                <h4>Top 5 Gemstones for Wealth and Prosperity</h4>
                            </div>

                            <div class="blog-details-nav-img">
                                <img src="{{ asset('website') }}/images/blog-prosperity.jpg" alt="Top 5 Gemstones for Wealth and Prosperity">
                            </div>

                        </a>

                    </div> -->

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