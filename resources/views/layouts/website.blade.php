<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StarSigns</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('website/css/website.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/shop.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/wishlist.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/orders.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/contact.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/myaccount.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/blog-details.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/faq.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/shippolicy.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/refundpolicy.css') }}">



    <!-- <link rel="stylesheet" href="{{ asset('website/css/consultation.css') }}"> -->

    <!-- <link rel="stylesheet" href="{{ asset('website/css/offers.css') }}"> -->




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">



</head>

<body style="margin: 0px;">
    <style>
        /* Hide mobile logo on desktop */
        .mobile-nav-logo {
            display: none;
        }

        /* ========================= DESKTOP (992px and above) ========================= */
        @media (min-width: 992px) {
            .navbar .container {
                max-width: 1400px;
                margin: auto;
                padding: 0 20px;
            }

            .nav-wrapper {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 40px;
                height: 60px;
            }

            .nav-toggle {
                display: none;
            }

            .nav-menu {
                display: flex !important;
                align-items: center;
                justify-content: center;
                gap: 28px;
                list-style: none;
                margin: 0;
                padding: 0;
                width: auto;
                background: transparent;
                position: static;
            }

            .nav-menu li {
                width: auto;
            }

            .nav-menu li a {
                display: inline-block;
                padding: 0;
                border: none;
                white-space: nowrap;
            }
        }

        /* ========================= TABLET (768px - 991px) ========================= */
        @media (min-width:768px) and (max-width:991px) {

            /* Header */
            .main-header {
                padding: 18px 0;
            }

            .header-wrapper {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
            }

            .header-logo {
                width: 180px;
            }

            .header-search {
                order: 3;
                width: 100%;
            }

            .search-box {
                height: 52px;
            }

            .search-box select {
                width: 160px;
                font-size: 14px;
            }

            .header-icons {
                gap: 16px;
            }

            /* Navbar */
            .mobile-nav-logo {
                display: block;
                flex: 1;
            }

            .mobile-nav-logo img {
                width: 150px;
                height: auto;
                display: block;
            }

            .nav-wrapper {
                position: relative;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                width: 100%;
                height: auto;
                padding: 12px 0;
            }

            .nav-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 44px;
                height: 44px;
                border: none;
                border-radius: 8px;
                background: #f4b42d;
                color: #fff;
                font-size: 20px;
                cursor: pointer;
                flex-shrink: 0;
            }

            .nav-menu {
                display: none !important;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #0a0825;
                border-radius: 10px;
                overflow: hidden;
                z-index: 999;
                margin-top: 10px;
                padding: 0;
                list-style: none;
                flex-direction: column !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, .25);
            }

            .nav-menu.active {
                display: flex !important;
            }

            .nav-menu li {
                width: 100%;
            }

            .nav-menu li::after,
            .nav-menu li::before {
                display: none !important;
            }

            .nav-menu li a {
                display: block;
                width: 100%;
                padding: 15px 20px;
                color: #fff;
                text-decoration: none;
                border-bottom: 1px solid rgba(255, 255, 255, .08);
                font-size: 15px;
                font-weight: 500;
                white-space: nowrap;
            }

            .nav-menu li:last-child a {
                border-bottom: none;
            }

            .nav-menu li a:hover,
            .nav-menu li a.active {
                background: rgba(244, 180, 45, .08);
                color: #f4b42d;
            }
        }

        /* ========================= MOBILE (up to 767px) ========================= */
        @media (max-width:767px) {

            /* Hide desktop header */
            .main-header {
                display: none;
            }

            .navbar {
                background: #0a0825;
                border-top: 1px solid rgba(255, 255, 255, .08);
                position: sticky;
                top: 0;
                z-index: 9999;
            }

            .navbar .container {
                padding: 0 15px;
            }

            /* Mobile top row */
            .mobile-nav-logo {
                display: block;
                flex: 1;
            }

            .mobile-nav-logo img {
                width: 135px;
                height: auto;
                display: block;
            }

            .nav-wrapper {
                position: relative;
                display: flex !important;
                align-items: center;
                justify-content: space-between;
                flex-direction: row !important;
                width: 100%;
                height: auto;
                padding: 12px 0;
                gap: 10px;
            }

            .nav-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 42px;
                height: 42px;
                border: none;
                border-radius: 8px;
                background: #f4b42d;
                color: #fff;
                font-size: 18px;
                cursor: pointer;
                flex-shrink: 0;
                margin: 0;
            }

            /* Mobile dropdown */
            .nav-menu {
                display: none !important;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #0a0825;
                border-radius: 10px;
                overflow: hidden;
                z-index: 9999;
                margin-top: 10px;
                padding: 0;
                list-style: none;
                flex-direction: column !important;
                box-shadow: 0 12px 30px rgba(0, 0, 0, .35);
            }

            .nav-menu.active {
                display: flex !important;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .nav-menu li {
                width: 100%;
            }

            .nav-menu li::after,
            .nav-menu li::before {
                display: none !important;
            }

            .nav-menu li a {
                display: block;
                width: 100%;
                padding: 5px 8px;
                color: #fff;
                text-decoration: none;
                border-bottom: 1px solid rgba(255, 255, 255, .08);
                font-size: 15px;
                font-weight: 500;
                line-height: 1;
                white-space: nowrap;
            }

            .nav-menu li:last-child a {
                border-bottom: none;
            }

            .nav-menu li a:hover,
            .nav-menu li a.active {
                background: rgba(244, 180, 45, .08);
                color: #f4b42d;
            }

            /* Footer */
            .newsletter-wrapper {
                flex-direction: column;
                text-align: center;
                gap: 25px;
            }

            .newsletter-form {
                width: 100%;
                flex-direction: column;
            }

            .newsletter-form input,
            .newsletter-form button {
                width: 100%;
                height: 52px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-bottom-wrapper {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .payment-methods {
                justify-content: center;
                flex-wrap: wrap;
            }
        }
    </style>
    <style>
        /* =========================================
   MOBILE BOTTOM BAR
========================================= */

        .mobile-bottom-bar {
            display: none;
        }

        @media (max-width: 767px) {

            .mobile-bottom-bar {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 65px;

                background: #0a0825;
                border-top: 1px solid rgba(255, 255, 255, .08);

                display: flex;
                align-items: center;
                justify-content: space-around;

                z-index: 99999;

                box-shadow: 0 -5px 20px rgba(0, 0, 0, .15);
            }

            .mobile-bottom-bar .bottom-item {
                flex: 1;
                height: 100%;

                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 4px;

                color: #fff;
                text-decoration: none;

                font-size: 12px;
                font-weight: 500;

                transition: .3s ease;
            }

            .mobile-bottom-bar .bottom-item i {
                font-size: 20px;
            }

            .mobile-bottom-bar .bottom-item:hover,
            .mobile-bottom-bar .bottom-item.active {
                color: #f4b42d;
            }

            /* Prevent content from hiding behind bottom bar */
            body {
                padding-bottom: 75px;
            }
        }
    </style>
    <!--=========================
        TOP BAR
==========================-->
    <!-- <div class="top-bar">
        <div class="container">
            <div class="topbar-wrapper">

                 Left 
                <div class="topbar-left">
                    <a href="#">
                        <i class="fa-solid fa-truck-fast"></i>
                        Free Shipping on Orders Above ₹999
                    </a>

                    <span class="divider">|</span>

                    <a href="#">
                        <i class="fa-solid fa-circle-dollar-to-slot"></i>
                        Cash on Delivery Available
                    </a>
                </div>

                 Right 
                <div class="topbar-right">
                    <a href="#">Track Order</a>

                    <span class="divider">|</span>

                    <a href="#">Help Center</a>

                    <span class="divider">|</span>

                    <a href="#">Contact Us</a>
                </div>

            </div>
        </div>
    </div> -->


    <!--==================================
        MAIN HEADER
===================================-->

    <header class="main-header" data-aos="fade-down" data-aos-duration="900">
        <div class="container" data-aos="fade-left" data-aos-delay="100">

            <div class="header-wrapper">

                <!-- Logo -->
                <div class="header-logo">

                    <a href="#">
                        <img src="{{ asset('website') }}/images/logistar1.png" alt="Logo">
                    </a>

                </div>

                <!-- Search -->
                <div class="header-search">

                    <div class="search-box">

                        <select>
                            <option>All Categories</option>
                            <option>Rudraksha</option>
                            <option>Bracelets</option>
                            <option>Gemstones</option>
                        </select>

                        <input type="text" placeholder="Search for products, categories...">

                        <button>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>

                </div>

                <!-- Right -->
                <div class="header-icons">

                    <div class="header-item">

                        <i class="fa-regular fa-user"></i>

                        <div class="account-info">

                            <a href="{{ route('login') }}" class="login-link">
                                Login
                            </a>

                            <a href="{{ route('myaccount') }}" class="account-link">
                                My Account
                                <i class="fa-solid fa-angle-down"></i>
                            </a>

                        </div>

                    </div>

                    <a href="{{ route('wishlist') }}" class="wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </a>

                    <a href="{{ route('cart') }}" class="cart">

                        <div class="cart-icon">

                            <i class="fa-solid fa-cart-shopping"></i>

                            <span>0</span>

                        </div>

                        <strong>₹0.00</strong>

                    </a>

                </div>

            </div>

        </div>

    </header>


    <!--==================================
        NAVIGATION BAR
===================================-->

    <nav class="navbar">
        <div class="container" data-aos="fade-right" data-aos-delay="50">

            <div class="nav-wrapper">

                <!-- Mobile Logo -->
                <div class="mobile-nav-logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('website/images/logistar1.png') }}" alt="Logo">
                    </a>
                </div>

                <!-- Menu Toggle -->
                <button class="nav-toggle" id="navToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <ul class="nav-menu" id="navMenu">
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('blog') }}">Blogs</a></li>
                    <li><a href="{{ route('product') }}">Product Details</a></li>
                    <li><a href="{{ route('checkout') }}">Checkout</a></li>
                    <li><a href="{{ route('orders') }}">My Orders</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')





    <!--==================================
        FOOTER NEWSLETTER
===================================-->

    <section class="footer-newsletter">
        <div class="container">

            <div class="newsletter-wrapper">

                <!-- Left -->

                <div class="newsletter-content">

                    <div class="newsletter-icon">
                        <i class="fa-regular fa-envelope" style="color: #fff;"></i>
                    </div>

                    <div class="newsletter-text">

                        <h2>Subscribe to our Newsletter</h2>

                        <p>Get updates on offers, new arrivals & more.</p>

                    </div>

                </div>

                <!-- Right -->

                <form class="newsletter-form">

                    <input type="email" placeholder="Enter your email address" required>

                    <button type="submit">
                        Subscribe
                    </button>

                </form>

            </div>

        </div>

    </section>



    <!--==================================
            MAIN FOOTER
===================================-->

    <section class="main-footer">

        <div class="container">

            <div class="footer-grid">

                <!-- Footer About -->

                <div class="footer-about" data-aos="fade-right" data-aos-delay="100">

                    <img src="{{ asset('website') }}/images/logistar1.png" alt="Logo" class="footer-logo">

                    <p>
                        Premium spiritual products to attract wealth,
                        health, prosperity and happiness. Trusted by
                        thousands of happy customers.
                    </p>

                    <div class="social-icons">

                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>

                        <a href="#"><i class="fa-brands fa-instagram"></i></a>

                        <a href="#"><i class="fa-brands fa-youtube"></i></a>

                        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>

                    </div>

                </div>

                <!-- Information -->

                <div class="footer-links" data-aos="fade-up" data-aos-delay="200">

                    <h3>Information</h3>

                    <ul>

                        <li><a href="{{ route('about') }}">About Us</a></li>

                        <li><a href="{{ route('contact') }}">Contact Us</a></li>

                        <li><a href="{{ route('blog') }}">Blog</a></li>

                        <li><a href="{{ route('orders') }}">Track Order</a></li>

                        <li><a href="{{ route('faq') }}">FAQ</a></li>

                    </ul>

                </div>

                <!-- Customer Service -->

                <div class="footer-links" data-aos="fade-down" data-aos-delay="300">

                    <h3>Customer Service</h3>

                    <ul>

                        <li><a href="{{ route('shippolicy') }}">Shipping Policy</a></li>

                        <li><a href="{{ route('refundpolicy') }}">Return & Refund</a></li>

                        <li><a href="#">Terms & Conditions</a></li>

                        <li><a href="#">Privacy Policy</a></li>

                        <li><a href="#">Help Center</a></li>

                    </ul>

                </div>

                <!-- Account -->

                <div class="footer-links" data-aos="fade-up" data-aos-delay="400">
                    <h3>My Account</h3>

                    <ul>

                        <li><a href="{{ route('orders') }}">My Orders</a></li>

                        <li><a href="{{ route('wishlist') }}">Wishlist</a></li>

                        <li><a href="{{ route('contact') }}">My Address</a></li>

                        <li><a href="{{ route('myaccount') }}">My Profile</a></li>

                        <!-- <li><a href="#">Consultations</a></li> -->

                    </ul>

                </div>

                <!-- Categories -->

                <div class="footer-links" data-aos="fade-up">

                    <h3>Popular Categories</h3>

                    <ul>

                        <li><a href="#">Rudraksha</a></li>

                        <li><a href="#">Gemstones</a></li>

                        <li><a href="#">Bracelets</a></li>

                        <li><a href="#">Yantras</a></li>

                        <li><a href="#">Pyramids</a></li>

                    </ul>

                </div>

            </div>

        </div>

    </section>



    <!--==================================
        FOOTER BOTTOM
===================================-->

    <section class="footer-bottom">

        <div class="container">

            <div class="footer-bottom-wrapper">

                <!-- Copyright -->

                <div class="copyright">

                    <p>
                        © 2025 StarSigns. All Rights Reserved. Developed by <a href="https://www.thiven.com/"
                            target="_blank" style="text-decoration: none;color:white;">ThiVen</a>
                    </p>

                </div>

                <!-- Payment Methods -->

                <div class="payment-methods">

                    <a href="#"> <img src="{{ asset('website') }}/images/visa.png" alt="Visa"></a>
                    <a href="#"> <img src="{{ asset('website') }}/images/visa.png" alt="Visa"></a>

                    <a href="#"> <img src="{{ asset('website') }}/images/mastercard.png" alt="Mastercard"></a>

                    <a href="#"> <img src="{{ asset('website') }}/images/upi.png" alt="UPI"></a>

                    <a href="##"> <img src="{{ asset('website') }}/images/paytm.png" alt="Paytm"></a>

                    <a href="#"> <img src="{{ asset('website') }}/images/phonepay.png" alt="PhonePe"></a>

                </div> -->

                <!-- Back To Top -->

                <a href="#" class="scroll-top">

                    <i class="fa-solid fa-arrow-up"></i>

                </a>

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




    <script>

        const navToggle = document.getElementById("navToggle");
        const navMenu = document.getElementById("navMenu");

        navToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");
        });

    </script>



    <script>


        window.addEventListener("scroll", function () {

            const header = document.querySelector(".main-header");

            if (window.scrollY > 80) {

                header.classList.add("sticky");

            } else {

                header.classList.remove("sticky");

            }

        });
    </script>



    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 900,
            easing: "ease-in-out-cubic",
            once: true,
            offset: 60
        });
    </script>

</body>
<!-- =========================
     MOBILE BOTTOM NAVBAR
========================= -->
<div class="mobile-bottom-bar">

    <a href="{{ route('home') }}" class="bottom-item">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
    </a>

    <a href="javascript:void(0)" class="bottom-item" id="mobileSearchBtn">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span>Search</span>
    </a>

    <a href="{{ route('cart') }}" class="bottom-item">
        <i class="fa-solid fa-cart-shopping"></i>
        <span>Cart</span>
    </a>

<<<<<<< HEAD
<style>



</style>
=======
</div>
>>>>>>> 805d2cd1096a76ae697a75e008566a6f161df5c8

</html>