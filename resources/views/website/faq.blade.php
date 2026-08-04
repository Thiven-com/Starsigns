@extends('layouts.website')
@section('content')

    <!--==========================================
            FAQ PAGE CONTENT
        ===========================================-->

    <!--=========================
            FAQ BANNER
        ==========================-->

    <section class="faq-page-banner">

        <!-- <div class="faq-page-banner-pattern faq-page-banner-pattern-left" aria-hidden="true"></div>
        <div class="faq-page-banner-pattern faq-page-banner-pattern-right" aria-hidden="true"></div> -->


        <div class="faq-page-banner-content">

            <div class="faq-page-eyebrow">
                <span class="faq-page-eyebrow-line"></span>
                <span class="faq-page-eyebrow-text">FAQ</span>
                <span class="faq-page-eyebrow-line"></span>
            </div>

            <h1 class="faq-page-title">Frequently Asked Questions</h1>

            <div class="faq-page-divider">
                <span class="faq-page-divider-line"></span>
                <span class="faq-page-divider-diamond">✦</span>
                <span class="faq-page-divider-line"></span>
            </div>

            <p class="faq-page-subtitle">
                Find answers to common questions about our services,
                consultations, orders, and more.
            </p>

        </div>

    </section>

    <div class="container">

        <!--=========================
                SEARCH BAR
            ==========================-->

        <section class="faq-page-search">

            <div class="faq-page-search-bar">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input type="text" id="faqPageSearchInput" placeholder="Search for answers...">

                <button type="button" class="faq-page-search-clear" id="faqPageSearchClear" title="Clear search">
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </div>

            <p class="faq-page-search-empty" id="faqPageSearchEmpty">
                No questions matched your search. Try a different keyword.
            </p>

        </section>

        <!--=========================
                FAQ ACCORDION LIST
            ==========================-->

        <section class="faq-page-list" id="faqPageList">

            <div class="faq-page-item faq-page-item-open" data-question="what is astrovani">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-minus"></i>
                    </span>
                    <span class="faq-page-item-question">What is Starsigns?</span>
                    <span class="faq-page-item-right">
                        <span class="faq-page-badge">Popular</span>
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Starsigns is a trusted platform that connects you with experienced astrologers for accurate predictions and personalized guidance on love, career, health, marriage, and more.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="how do i book a consultation">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">How do I book a consultation?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Simply choose an astrologer, pick a convenient time slot, and confirm your booking with a few clicks. You'll receive a confirmation instantly.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="what types of consultations do you offer">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">What types of consultations do you offer?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>We offer chat, voice call, and video consultations across astrology, numerology, palmistry, and tarot reading services.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="is my personal information safe">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">Is my personal information safe?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Yes, we use industry-standard encryption and never share your personal details with third parties without your consent.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="what payment methods are accepted">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">What payment methods are accepted?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>We accept all major credit/debit cards, UPI, net banking, and popular digital wallets for a smooth checkout experience.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="how will i receive my consultation">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">How will I receive my consultation?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Once booked, you can access your consultation directly through our app or website at your scheduled time.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="can i reschedule or cancel my appointment">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">Can I reschedule or cancel my appointment?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Yes, you can reschedule or cancel your appointment up to 2 hours before the scheduled time from your account dashboard.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="do you offer refunds">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">Do you offer refunds?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>Refunds are processed for eligible cases as per our refund policy, typically within 5-7 business days.</p>
                    </div>
                </div>
            </div>

            <div class="faq-page-item" data-question="how can i track my order">
                <button type="button" class="faq-page-item-head">
                    <span class="faq-page-item-icon">
                        <i class="fa-solid fa-plus"></i>
                    </span>
                    <span class="faq-page-item-question">How can I track my order?</span>
                    <span class="faq-page-item-right">
                        <i class="fa-solid fa-chevron-down faq-page-chev"></i>
                    </span>
                </button>
                <div class="faq-page-item-body">
                    <div class="faq-page-item-body-inner">
                        <p>You can track your order status anytime from the "My Orders" section in your account.</p>
                    </div>
                </div>
            </div>

        </section>

        <!--=========================
                STILL HAVE QUESTIONS CTA
            ==========================-->

        <section class="faq-page-support">

            <div class="faq-page-support-pattern" aria-hidden="true"></div>

            <div class="faq-page-support-icon">
                <i class="fa-solid fa-headset"></i>
            </div>

            <div class="faq-page-support-text">
                <h3>Still Have Questions?</h3>
                <p>Our support team is here to help you 24/7.<br>Get in touch with us anytime.</p>
            </div>

            <a href="/contact" class="faq-page-support-btn">
                Contact Support
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </section>

    </div>

    <script>
        (function () {

            const items = document.querySelectorAll(".faq-page-item");

            /*==========================================
                ACCORDION OPEN / CLOSE
            ==========================================*/

            function closeItem(item) {
                item.classList.remove("faq-page-item-open");
                const body = item.querySelector(".faq-page-item-body");
                body.style.maxHeight = null;

                const icon = item.querySelector(".faq-page-item-icon i");
                icon.classList.remove("fa-minus");
                icon.classList.add("fa-plus");
            }

            function openItem(item) {
                item.classList.add("faq-page-item-open");
                const body = item.querySelector(".faq-page-item-body");
                body.style.maxHeight = body.scrollHeight + "px";

                const icon = item.querySelector(".faq-page-item-icon i");
                icon.classList.remove("fa-plus");
                icon.classList.add("fa-minus");
            }

            items.forEach(function (item) {

                const head = item.querySelector(".faq-page-item-head");

                head.addEventListener("click", function () {

                    const isOpen = item.classList.contains("faq-page-item-open");

                    // accordion behaviour — close any other open item
                    items.forEach(function (otherItem) {
                        if (otherItem !== item && otherItem.classList.contains("faq-page-item-open")) {
                            closeItem(otherItem);
                        }
                    });

                    if (isOpen) {
                        closeItem(item);
                    } else {
                        openItem(item);
                    }

                });

            });

            // set the initial open item's max-height on load (first item is open by default)
            window.addEventListener("load", function () {
                items.forEach(function (item) {
                    if (item.classList.contains("faq-page-item-open")) {
                        const body = item.querySelector(".faq-page-item-body");
                        body.style.maxHeight = body.scrollHeight + "px";
                    }
                });
            });

            /*==========================================
                LIVE SEARCH FILTER
            ==========================================*/

            const searchInput = document.getElementById("faqPageSearchInput");
            const clearBtn = document.getElementById("faqPageSearchClear");
            const emptyMsg = document.getElementById("faqPageSearchEmpty");

            function filterFaqs() {

                const term = searchInput.value.trim().toLowerCase();
                let visibleCount = 0;

                items.forEach(function (item) {
                    const match = item.dataset.question.includes(term);
                    item.style.display = match ? "" : "none";
                    if (match) visibleCount++;
                });

                emptyMsg.classList.toggle("faq-page-search-empty-show", visibleCount === 0 && term.length > 0);
                clearBtn.classList.toggle("faq-page-search-clear-show", term.length > 0);
            }

            searchInput.addEventListener("input", filterFaqs);

            clearBtn.addEventListener("click", function () {
                searchInput.value = "";
                filterFaqs();
                searchInput.focus();
            });

            /*==========================================
                SCROLL-REVEAL ANIMATION
            ==========================================*/

            const revealTargets = document.querySelectorAll(".faq-page-item, .faq-page-support, .faq-page-search-bar");

            if ("IntersectionObserver" in window) {

                const observer = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("faq-page-visible");
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: "0px 0px -30px 0px" });

                revealTargets.forEach(function (el) {
                    el.classList.add("faq-page-fade");
                    observer.observe(el);
                });

            }

        })();
    </script>

@endsection