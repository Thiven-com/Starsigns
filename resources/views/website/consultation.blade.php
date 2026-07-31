@extends('layouts.website')
@section('content')


    <section class="consultation-banner-section">

        <div class="container">

            <div class="consultation-banner-content">

                <h1>Consultation</h1>

                <div class="consultation-breadcrumb">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="active">Consultation</span>

                </div>

            </div>

        </div>

    </section>


    <section class="consultation-section">

        <div class="container">

            <div class="section-title">
                <h2>Our Consultation Services</h2>
            </div>

            <div class="consultation-grid">

                @php
                    $services = [
                        [
                            'icon' => 'assets/images/consultation/astrology.png',
                            'title' => 'Astrology Consultation',
                            'desc' => 'Get insights about your life, career, relationships and future.',
                            'price' => 499
                        ],
                        [
                            'icon' => 'assets/images/consultation/palm.png',
                            'title' => 'Palm Reading Consultation',
                            'desc' => 'Discover the secrets hidden in your palm and destiny.',
                            'price' => 499
                        ],
                        [
                            'icon' => 'assets/images/consultation/tarot.png',
                            'title' => 'Tarot Card Reading',
                            'desc' => 'Find clarity and guidance through ancient tarot wisdom.',
                            'price' => 599
                        ],
                        [
                            'icon' => 'assets/images/consultation/crystal.png',
                            'title' => 'Crystal Healing Guidance',
                            'desc' => 'Balance your energy and healing with the right crystals.',
                            'price' => 499
                        ],
                        [
                            'icon' => 'assets/images/consultation/spiritual.png',
                            'title' => 'Spiritual Guidance',
                            'desc' => 'Get spiritual advice for peace, positivity and personal growth.',
                            'price' => 499
                        ],
                    ];
                @endphp

                @for($i = 0; $i < count($services); $i++)

                    <div class="consultation-card">

                        <div class="consultation-icon">
                            <img src="{{ asset($services[$i]['icon']) }}" alt="{{ $services[$i]['title'] }}">
                        </div>

                        <h3>{{ $services[$i]['title'] }}</h3>

                        <p>{{ $services[$i]['desc'] }}</p>

                        <div class="consultation-footer">

                            <span class="duration">
                                <i class="fa-regular fa-clock"></i>
                                30 Min
                            </span>

                            <span class="price">
                                ₹{{ $services[$i]['price'] }}
                            </span>

                        </div>

                    </div>

                @endfor

            </div>

            <div class="view-all">

                <a href="#" class="view-btn">

                    View All Services

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </section>



    <section class="how-work-section">

        <div class="container">

            <div class="section-title">

                <h2>How It Works</h2>

                <img src="images/divider.png" alt="">

            </div>

            <div class="work-wrapper">

                <div class="work-card">

                    <div class="step">1</div>

                    <div class="icon">
                        <i class="fa-regular fa-calendar-days"></i>
                    </div>

                    <h4>Choose a Service</h4>

                    <p>Select the consultation service that you need.</p>

                </div>

                <div class="arrow">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>

                <div class="work-card">

                    <div class="step">2</div>

                    <div class="icon">
                        <i class="fa-regular fa-user"></i>
                    </div>

                    <h4>Pick an Expert</h4>

                    <p>Choose from our verified and experienced experts.</p>

                </div>

                <div class="arrow">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>

                <div class="work-card">

                    <div class="step">3</div>

                    <div class="icon">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>

                    <h4>Schedule a Time</h4>

                    <p>Pick a convenient time for your consultation.</p>

                </div>

                <div class="arrow">
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>

                <div class="work-card">

                    <div class="step">4</div>

                    <div class="icon">
                        <i class="fa-regular fa-comments"></i>
                    </div>

                    <h4>Get Guidance</h4>

                    <p>Connect and get personalized guidance and solutions.</p>

                </div>

            </div>

        </div>

    </section>


    <section class="consultation-cta-section">

        <div class="container">

            <div class="consultation-cta-card">

                <img src="{{ asset('website') }}/images/condown.png" alt="Consultation Banner">

            </div>

        </div>

    </section>


    <section class="faq-section">

        <div class="container" >

            <div class="section-title">

                <h2>Frequently Asked Questions</h2>

                <div class="divider"></div>

            </div>

            <div class="faq-grid">

                <div class="faq-column">

                    <div class="faq-item active">

                        <button class="faq-question">

                            How does the consultation work?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                Choose a service, book your preferred expert,
                                schedule your session and receive personalized
                                guidance.
                            </p>

                        </div>

                    </div>

                    <div class="faq-item">

                        <button class="faq-question">

                            Is my personal information safe?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                Yes. Your consultation and personal details remain
                                completely confidential.
                            </p>

                        </div>

                    </div>

                    <div class="faq-item">

                        <button class="faq-question">

                            Can I reschedule my appointment?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                Yes, you can reschedule before the consultation
                                begins.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="faq-column">

                    <div class="faq-item">

                        <button class="faq-question">

                            What payment methods do you accept?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                UPI, Credit Card, Debit Card, Net Banking and Wallets.
                            </p>

                        </div>

                    </div>

                    <div class="faq-item">

                        <button class="faq-question">

                            How will I connect with the expert?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                You will receive a secure meeting link after booking.
                            </p>

                        </div>

                    </div>

                    <div class="faq-item">

                        <button class="faq-question">

                            What if I'm not satisfied?

                            <i class="fa-solid fa-chevron-down"></i>

                        </button>

                        <div class="faq-answer">

                            <p>
                                Our support team will help resolve your concern.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <script>


        const faqItems = document.querySelectorAll(".faq-item");

        faqItems.forEach(item => {

            item.querySelector(".faq-question").addEventListener("click", () => {

                faqItems.forEach(f => {

                    if (f !== item) {

                        f.classList.remove("active");

                    }

                });

                item.classList.toggle("active");

            });

        });
    </script>



@endsection