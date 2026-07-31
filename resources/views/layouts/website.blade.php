<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
    <link rel="stylesheet" href="{{ asset('website/css/consultation.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/blog.css') }}">





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />



</head>

<body>

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

    <header class="main-header">

        <div class="container">

            <div class="header-wrapper">

                <!-- Logo -->
                <div class="header-logo">

                    <a href="#">
                        <img src="{{ asset('website/images/logo.png') }}" alt="Logo">
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

                            <a href="#" class="login-link">
                                Login / Register
                            </a>

                            <a href="#" class="account-link">
                                My Account
                                <i class="fa-solid fa-angle-down"></i>
                            </a>

                        </div>

                    </div>

                    <a href="#" class="wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </a>

                    <a href="#" class="cart">

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

        <div class="container">

            <div class="nav-wrapper">

                <!-- Categories -->

                <!-- <div class="categories-btn">

                    <a href="#">
                        <i class="fa-solid fa-bars"></i>

                        <span>All Categories</span>

                        <i class="fa-solid fa-angle-down"></i>
                    </a>

                    <div class="category-dropdown">

                        <a href="#">Rudraksha</a>
                        <a href="#">Bracelets</a>
                        <a href="#">Gemstones</a>
                        <a href="#">Yantras</a>
                        <a href="#">Puja Items</a>
                        <a href="#">Astrology</a>

                    </div>

                </div> -->

                <!-- Menu -->

                <button class="nav-toggle" id="navToggle">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <ul class="nav-menu" id="navMenu">

                    <li><a href="{{ route('home') }}" class="active">Home</a></li>

                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('consultation') }}">Consultation</a></li>

                    <li><a href="#">Offers</a></li>

                    <li><a href="{{ route('blog') }}">Blogs</a></li>
                    <li><a href="#">Contact</a></li>

                    <!-- <li><a href="#">Rudraksha</a></li>

                    <li><a href="#">Bracelets</a></li>

                    <li><a href="#">Gemstones</a></li>

                    <li><a href="#">Yantras</a></li>

                    <li><a href="#">Astrology</a></li>

                    <li><a href="#">Numerology</a></li> -->



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
                        <i class="fa-regular fa-envelope"></i>
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

                <div class="footer-about">

                    <img src="{{ asset('website/images/logo.png') }}" alt="Logo" class="footer-logo">

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

                <div class="footer-links">

                    <h3>Information</h3>

                    <ul>

                        <li><a href="#">About Us</a></li>

                        <li><a href="#">Contact Us</a></li>

                        <li><a href="#">Blog</a></li>

                        <li><a href="#">Track Order</a></li>

                        <li><a href="#">FAQ</a></li>

                    </ul>

                </div>

                <!-- Customer Service -->

                <div class="footer-links">

                    <h3>Customer Service</h3>

                    <ul>

                        <li><a href="#">Shipping Policy</a></li>

                        <li><a href="#">Return & Refund</a></li>

                        <li><a href="#">Terms & Conditions</a></li>

                        <li><a href="#">Privacy Policy</a></li>

                        <li><a href="#">Help Center</a></li>

                    </ul>

                </div>

                <!-- Account -->

                <div class="footer-links">

                    <h3>My Account</h3>

                    <ul>

                        <li><a href="#">My Orders</a></li>

                        <li><a href="#">Wishlist</a></li>

                        <li><a href="#">My Address</a></li>

                        <li><a href="#">My Profile</a></li>

                        <li><a href="#">Consultations</a></li>

                    </ul>

                </div>

                <!-- Categories -->

                <div class="footer-links">

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
                        © 2025 StarSigns. All Rights Reserved.
                    </p>

                </div>

                <!-- Payment Methods -->

                <div class="payment-methods">

                    <img src="{{ asset('website/images/visa.png') }}" alt="Visa">

                    <img src="{{ asset('website/images/mastercard.png') }}" alt="Mastercard">

                    <img src="{{ asset('website/images/upi.png') }}" alt="UPI">

                    <img src="{{ asset('website/images/paytm.png') }}" alt="Paytm">

                    <img src="{{ asset('website/images/phonepe.png') }}" alt="PhonePe">

                </div>

                <!-- Back To Top -->

                <a href="#" class="scroll-top">

                    <i class="fa-solid fa-arrow-up"></i>

                </a>

            </div>

        </div>

    </section>




    <script>

        const navToggle = document.getElementById("navToggle");
        const navMenu = document.getElementById("navMenu");

        navToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");
        });

    </script>

</body>

</html>