@extends('layouts.website')
@section('content')
    <style>
        .contact-alert {
            position: fixed;
            top: 100px;
            right: 25px;
            z-index: 99999;

            display: flex;
            align-items: center;
            gap: 12px;

            width: min(420px, calc(100% - 30px));
            padding: 16px 18px;

            border-radius: 12px;
            color: #fff;

            box-shadow: 0 10px 30px rgba(0, 0, 0, .15);

            animation: contactSlideIn .4s ease;
        }

        .contact-alert-success {
            background: #198754;
        }

        .contact-alert-error {
            background: #dc3545;
        }

        .contact-alert-icon {
            font-size: 24px;
        }

        .contact-alert strong,
        .contact-alert span {
            display: block;
        }

        .contact-alert strong {
            font-size: 15px;
            margin-bottom: 2px;
        }

        .contact-alert span {
            font-size: 14px;
        }

        .contact-alert-close {
            margin-left: auto;

            border: 0;
            background: transparent;

            color: #fff;
            font-size: 20px;

            cursor: pointer;
        }

        @keyframes contactSlideIn {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 576px) {

            .contact-alert {
                top: 80px;
                right: 15px;
                width: calc(100% - 30px);
            }

        }
    </style>
    @if(session('success'))
        <div class="contact-alert contact-alert-success" id="contactSuccessMessage">
            <div class="contact-alert-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div>
                <strong>Success!</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button type="button" class="contact-alert-close"
                onclick="document.getElementById('contactSuccessMessage').remove()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="contact-alert contact-alert-error" id="contactErrorMessage">
            <div class="contact-alert-icon">
                <i class="fa-solid fa-circle-exclamation"></i>
            </div>

            <div>
                <strong>Error!</strong>
                <span>{{ session('error') }}</span>
            </div>

            <button type="button" class="contact-alert-close" onclick="document.getElementById('contactErrorMessage').remove()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    @endif

    <!--==========================
                                                                        PAGE BANNER (shared layout component - reused as-is)
                                                                    ===========================-->
    <section class="contact-banner-section" data-aos="zoom-out" data-aos-duration="1000">

        <div class="container">

            <div class="contact-banner-content">

                <h1 data-aos="fade-up" data-aos-delay="200">
                    Contact Us
                </h1>

                <div class="contact-breadcrumb" data-aos="fade-up" data-aos-delay="400">

                    <a href="/">Home</a>

                    <span>
                        <i class="fa-solid fa-chevron-right"></i>
                    </span>

                    <span class="contact-active">
                        Contact Us
                    </span>

                </div>

            </div>

        </div>

    </section>


    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            easing: "ease-in-out-cubic",
            once: true,
            offset: 80
        });
    </script>


    <!--==========================================
                                                                        CONTACT PAGE CONTENT
                                                                    ===========================================-->

    <section class="contact-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="contact-page-crumb">

                <a href="/">Home</a>
                <span class="contact-page-crumb-sep">/</span>
                <span class="contact-page-crumb-active">Contact Us</span>

            </div>

            <!--=========================
                                                                                HERO ROW
                                                                            ==========================-->

            <div class="contact-page-hero">

                <div class="contact-page-hero-text">

                    <h1 class="contact-page-title">Contact Us</h1>

                    <span class="contact-page-title-divider"></span>

                    <p class="contact-page-subtitle">
                        We are here to help you on your spiritual journey.<br>
                        Get in touch with us for any queries or assistance.
                    </p>

                </div>

                <div class="contact-page-hero-img" data-aos="zoom-out">

                    <img src="{{ asset('website') }}/images/blogbann.png" alt="Contact Astrovani">

                </div>

            </div>

            <!--=========================
                                                                                MAIN GRID
                                                                            ==========================-->

            <div class="contact-page-grid">

                <!-- ===== LEFT: FORM ===== -->
                <div class="contact-page-form-wrap">

                    <h2 class="contact-page-form-title">Send Us a Message</h2>
                    <span class="contact-page-form-divider"></span>
                    @if(session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: @json(session('success')),
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif
                    <form id="contactPageForm" novalidate action="{{ route('contactStore') }}" method="POST">

                        @csrf

                        <div class="contact-page-form-row">

                            <div class="contact-page-field">

                                <label for="contactName">Your Name <span class="contact-page-req">*</span></label>

                                <div class="contact-page-input-wrap">
                                    <i class="fa-solid fa-user"></i>
                                    <input type="text" id="contactName" name="name" placeholder="Enter your full name">
                                </div>

                                <span class="contact-page-error-msg" id="contactNameError"></span>

                            </div>

                            <div class="contact-page-field">

                                <label for="contactEmail">Email Address <span class="contact-page-req">*</span></label>

                                <div class="contact-page-input-wrap">
                                    <i class="fa-solid fa-envelope"></i>
                                    <input type="email" id="contactEmail" name="email"
                                        placeholder="Enter your email address">
                                </div>

                                <span class="contact-page-error-msg" id="contactEmailError"></span>

                            </div>

                        </div>

                        <div class="contact-page-form-row">

                            <div class="contact-page-field">

                                <label for="phone">Phone Number</label>

                                <div class="contact-page-input-wrap">
                                    <i class="fa-solid fa-phone"></i>
                                    <input type="tel" id="contactPhone" name="phone" placeholder="Enter your phone number">
                                </div>

                                <span class="contact-page-error-msg" id="contactPhoneError"></span>

                            </div>

                            <div class="contact-page-field">

                                <label for="contactSubject">Subject <span class="contact-page-req">*</span></label>

                                <div class="contact-page-input-wrap">
                                    <i class="fa-solid fa-tag"></i>
                                    <select id="contactSubject" name="subject">
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <!-- <option value="consultation">Consultation Booking</option> -->
                                        <option value="order">Order Support</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <span class="contact-page-error-msg" id="contactSubjectError"></span>

                            </div>

                        </div>

                        <div class="contact-page-field contact-page-field-full">

                            <label for="contactMessage">Message <span class="contact-page-req">*</span></label>

                            <div class="contact-page-input-wrap contact-page-textarea-wrap">
                                <i class="fa-solid fa-pen"></i>
                                <textarea id="contactMessage" name="message" rows="5"
                                    placeholder="Type your message here..."></textarea>
                            </div>

                            <span class="contact-page-error-msg" id="contactMessageError"></span>

                        </div>

                        <button type="submit" class="contact-page-submit-btn" id="contactSubmitBtn">
                            <i class="fa-solid fa-paper-plane"></i>
                            <span class="contact-page-submit-btn-text">Send Message</span>
                        </button>

                        <p class="contact-page-safe-note">
                            <i class="fa-solid fa-shield-halved"></i>
                            Your information is safe with us. We never share your details.
                        </p>

                        <div class="contact-page-success-msg" id="contactSuccessMsg">
                            <i class="fa-solid fa-circle-check"></i>
                            Your message has been sent successfully! We'll get back to you soon.
                        </div>

                    </form>

                </div>

                <!-- ===== RIGHT: INFO + MAP ===== -->
                <div class="contact-page-info-wrap">

                    <div class="contact-page-info-card">

                        <h3 class="contact-page-info-title">Get in Touch</h3>
                        <span class="contact-page-info-divider"></span>

                        <div class="contact-page-info-item">

                            <div class="contact-page-info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div class="contact-page-info-text">
                                <h4>Phone</h4>
                                <p><a href="tel:8904495819">+91 89044 95819</a></p>
                                {{-- <span>Mon - Sat: 9:00 AM - 7:00 PM</span> --}}
                            </div>

                        </div>

                        <div class="contact-page-info-item">

                            <div class="contact-page-info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div class="contact-page-info-text">
                                <h4>Email</h4>
                                <p><a href="mailto:Starsignsglobal@gmail.com">Starsignsglobal@gmail.com</a></p>
                                {{-- <span>We reply within 24 hours</span> --}}
                            </div>

                        </div>

                        <div class="contact-page-info-item">

                            <div class="contact-page-info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="contact-page-info-text">
                                <h4>Address</h4>
                                <p>
                                    LAKSHMI COMPLEX, ODABAI SULLIA DK, Pin -574239
                                </p>
                            </div>
                        </div>

                        <div class="contact-page-info-item">

                            <div class="contact-page-info-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>

                            <div class="contact-page-info-text">
                                <h4>Working Hours</h4>
                                <p>Monday - Saturday: 9:00 AM - 7:00 PM<br>Sunday: 10:00 AM - 4:00 PM</p>
                            </div>

                        </div>

                    </div>

                    <div class="contact-page-map-wrap">

                        <button type="button" class="contact-page-location-btn" id="contactLocationBtn">
                            <i class="fa-solid fa-location-dot"></i> Our Location
                        </button>

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62306.88155293873!2d75.32871215171718!3d12.570373489005403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba4f25fa71fbef1%3A0xb36c625679d164cf!2sSullia%2C%20Karnataka!5e0!3m2!1sen!2sin!4v1787230559651!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin"></iframe>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <script>
        (function () {

            const form = document.getElementById("contactPageForm");
            const submitBtn = document.getElementById("contactSubmitBtn");

            const fields = {
                name: {
                    input: document.getElementById("contactName"),
                    error: document.getElementById("contactNameError"),
                    required: true
                },

                email: {
                    input: document.getElementById("contactEmail"),
                    error: document.getElementById("contactEmailError"),
                    required: true
                },

                phone: {
                    input: document.getElementById("contactPhone"),
                    error: document.getElementById("contactPhoneError"),
                    required: false
                },

                subject: {
                    input: document.getElementById("contactSubject"),
                    error: document.getElementById("contactSubjectError"),
                    required: true
                },

                message: {
                    input: document.getElementById("contactMessage"),
                    error: document.getElementById("contactMessageError"),
                    required: true
                }
            };


            function isEmailValid(value) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            }


            function isPhoneValid(value) {
                return /^[0-9+\-\s()]{7,15}$/.test(value);
            }


            function setError(field, message) {
                field.input.classList.add("contact-page-invalid");
                field.error.textContent = message;
            }


            function clearError(field) {
                field.input.classList.remove("contact-page-invalid");
                field.error.textContent = "";
            }


            function validateField(key) {

                const field = fields[key];
                const value = field.input.value.trim();

                clearError(field);

                if (field.required && value === "") {
                    setError(field, "This field is required.");
                    return false;
                }

                if (
                    key === "email" &&
                    value !== "" &&
                    !isEmailValid(value)
                ) {
                    setError(field, "Please enter a valid email address.");
                    return false;
                }

                if (
                    key === "phone" &&
                    value !== "" &&
                    !isPhoneValid(value)
                ) {
                    setError(field, "Please enter a valid phone number.");
                    return false;
                }

                return true;
            }


            // Live validation
            Object.keys(fields).forEach(key => {

                const el = fields[key].input;

                const evt = el.tagName === "SELECT"
                    ? "change"
                    : "input";

                el.addEventListener(evt, () => {
                    validateField(key);
                });

                el.addEventListener("blur", () => {
                    validateField(key);
                });

            });


            // FORM SUBMIT
            form.addEventListener("submit", function (e) {

                let isFormValid = true;

                Object.keys(fields).forEach(key => {

                    const valid = validateField(key);

                    if (!valid) {
                        isFormValid = false;
                    }

                });


                // Stop Laravel submission if validation fails
                if (!isFormValid) {

                    e.preventDefault();

                    const firstInvalid =
                        form.querySelector(".contact-page-invalid");

                    if (firstInvalid) {

                        firstInvalid.focus();

                        firstInvalid.scrollIntoView({
                            behavior: "smooth",
                            block: "center"
                        });

                    }

                    return;
                }


                // IMPORTANT:
                // Do NOT use e.preventDefault() here.
                // Laravel will receive the POST request.

                submitBtn.disabled = true;

                submitBtn.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin"></i>' +
                    '<span>Sending...</span>';

            });


            // Google Maps button
            const locationBtn =
                document.getElementById("contactLocationBtn");

            if (locationBtn) {

                locationBtn.addEventListener("click", function () {

                    window.open(
                        "https://www.google.com/maps/search/?api=1&query=Mumbai,Maharashtra,India",
                        "_blank"
                    );

                });

            }

        })();
    </script>
@endsection