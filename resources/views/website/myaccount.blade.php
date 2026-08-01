@extends('layouts.website')
@section('content')

    <!--==========================================
                    MY ACCOUNT PAGE CONTENT
                ===========================================-->

    <section class="account-page-section">

        <div class="container">

            <!-- In-page breadcrumb -->
            <div class="account-page-crumb">

                <a href="/">Home</a>
                <span class="account-page-crumb-sep">/</span>
                <span class="account-page-crumb-active">My Account</span>

            </div>

            <div class="account-page-layout">

                <!--=========================
                                SIDEBAR
                            ==========================-->

                <aside class="account-page-sidebar">

                    <div class="account-page-user-card">

                        <div class="account-page-user-avatar">
                            <img src="{{ asset('website') }}/images/avatar-placeholder.png" alt="Priya Sharma">
                        </div>

                        <div class="account-page-user-info">
                            <h4>{{ $user['name'] ?? 'Priya Sharma' }}</h4>
                            <p>{{ $user['email'] ?? 'star.signs@email.com' }}</p>
                        </div>

                    </div>

                    <nav class="account-page-nav" id="accountPageNav">

                        <a href="#" class="account-page-nav-link active" data-target="dashboard">
                            <i class="fa-solid fa-grip"></i> Dashboard
                        </a>

                        <a href="{{ route('orders') }}" class="account-page-nav-link" data-target="orders">
                            <i class="fa-solid fa-bag-shopping"></i> My Orders
                        </a>

                        <a href="{{ route('wishlist') }}" class="account-page-nav-link" data-target="wishlist">
                            <i class="fa-regular fa-heart"></i> Wishlist
                        </a>

                        <a href="#" class="account-page-nav-link" data-target="profile">
                            <i class="fa-regular fa-user"></i> Profile Information
                        </a>

                        <a href="#" class="account-page-nav-link" data-target="address">
                            <i class="fa-regular fa-bookmark"></i> Address Book
                        </a>

                        <!-- <a href="/consultations" class="account-page-nav-link" data-target="consultations">
                                <i class="fa-regular fa-clock"></i> My Consultations
                            </a> -->
                       
                          <!--  <a href="/coupons" class="account-page-nav-link" data-target="coupons">
                                <i class="fa-regular fa-id-badge"></i> Coupons
                            </a>

                            <a href="/payment-methods" class="account-page-nav-link" data-target="payments">
                                <i class="fa-regular fa-credit-card"></i> Payment Methods
                            </a>

                            <a href="/notifications" class="account-page-nav-link" data-target="notifications">
                                <i class="fa-regular fa-bell"></i> Notifications
                            </a>

                            <a href="/change-password" class="account-page-nav-link" data-target="password">
                                <i class="fa-solid fa-lock"></i> Change Password
                            </a> -->

                        <a href="#" class="account-page-nav-link account-page-logout-link" id="accountPageLogoutBtn">
                            <i class="fa-solid fa-right-from-bracket"></i> Logout
                        </a>

                    </nav>

                    <div class="account-page-refer-card">

                        <div class="account-page-refer-icon">
                            <i class="fa-solid fa-gift"></i>
                        </div>

                        <div class="account-page-refer-text">
                            <h5>Refer & Earn</h5>
                            <p>Refer your friends and get<br><strong>₹200 StarSigns Credits</strong></p>
                        </div>

                        <a href="#" class="account-page-refer-arrow">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>

                    </div>

                </aside>

                <!--=========================
                                MAIN CONTENT
                            ==========================-->

                <div class="account-page-main">

                    <!-- Header -->
                    <div class="account-page-header">

                        <div class="account-page-header-text">

                            <h1>My Account</h1>
                            <span class="account-page-header-divider"></span>

                            <p>Welcome back, <strong>{{ $user['name'] ?? 'Priya Sharma' }}</strong>! Manage your account and
                                track your spiritual journey.</p>

                        </div>

                        <div class="account-page-header-img">
                            <img src="{{ asset('website') }}/images/shopbann.png" alt="Spiritual items">
                        </div>

                    </div>

                    <!-- Stats -->
                    <div class="account-page-stats">

                        <div class="account-page-stat-card">

                            <div class="account-page-stat-icon account-page-stat-icon-purple">
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>

                            <div class="account-page-stat-text">
                                <h3>{{ $stats['orders'] ?? 12 }}</h3>
                                <p>Total Orders</p>
                                <a href="{{ route('orders') }}">View all orders <i class="fa-solid fa-chevron-right"></i></a>
                            </div>

                        </div>

                        <div class="account-page-stat-card">

                            <div class="account-page-stat-icon account-page-stat-icon-pink">
                                <i class="fa-solid fa-heart"></i>
                            </div>

                            <div class="account-page-stat-text">
                                <h3>{{ $stats['wishlist'] ?? 8 }}</h3>
                                <p>Wishlist Items</p>
                                <a href="{{ route('wishlist') }}">View wishlist <i class="fa-solid fa-chevron-right"></i></a>
                            </div>

                        </div>
                        <!-- 
                            <div class="account-page-stat-card">

                                <div class="account-page-stat-icon account-page-stat-icon-purple">
                                    <i class="fa-solid fa-user"></i>
                                </div>

                                <div class="account-page-stat-text">
                                    <h3>{{ $stats['consultations'] ?? 3 }}</h3>
                                    <p>Consultations</p>
                                    <a href="/consultations">View all <i class="fa-solid fa-chevron-right"></i></a>
                                </div>

                            </div>

                            <div class="account-page-stat-card">

                                <div class="account-page-stat-icon account-page-stat-icon-gold">
                                    <i class="fa-solid fa-ticket"></i>
                                </div>

                                <div class="account-page-stat-text">
                                    <h3>{{ $stats['coupons'] ?? 2 }}</h3>
                                    <p>Available Coupons</p>
                                    <a href="/coupons">View coupons <i class="fa-solid fa-chevron-right"></i></a>
                                </div>

                            </div> -->

                    </div>

                    <!-- Orders + Account Info -->
                    <div class="account-page-split">

                        <!-- Recent Orders -->
                        <div class="account-page-card">

                            <div class="account-page-card-header">
                                <h3>Recent Orders</h3>
                                <a href="{{ route('orders') }}">View All Orders <i class="fa-solid fa-chevron-right"></i></a>
                            </div>

                            @php
                                $recentOrders = [
                                    ['id' => 'AV78495', 'name' => 'Crystal Healing Bracelet', 'price' => 899, 'date' => 'May 18, 2024', 'status' => 'Delivered', 'img' => 'product-1.png'],
                                    ['id' => 'AV78432', 'name' => '7 Mukhi Rudraksha Bracelet', 'price' => 1199, 'date' => 'May 12, 2024', 'status' => 'Shipped', 'img' => 'product-2.png'],
                                    ['id' => 'AV77221', 'name' => 'Rose Quartz Bracelet', 'price' => 699, 'date' => 'May 05, 2024', 'status' => 'Processing', 'img' => 'product-1.png'],
                                ];
                            @endphp

                            <div class="account-page-order-list">

                                @foreach($recentOrders as $order)
                                    <div class="account-page-order-item">

                                        <div class="account-page-order-img">
                                            <img src="{{ asset('website') }}/images/{{ $order['img'] }}"
                                                alt="{{ $order['name'] }}">
                                        </div>

                                        <div class="account-page-order-details">
                                            <h4>{{ $order['name'] }}</h4>
                                            <p>Order ID: #{{ $order['id'] }}</p>
                                            <span>{{ $order['date'] }}</span>
                                        </div>

                                        <div class="account-page-order-right">
                                            <span class="account-page-order-price">₹{{ number_format($order['price']) }}</span>
                                            <span
                                                class="account-page-order-status account-page-status-{{ strtolower($order['status']) }}">{{ $order['status'] }}</span>
                                        </div>

                                    </div>
                                @endforeach

                            </div>

                            <a href="{{ route('orders') }}" class="account-page-view-all-btn">View All Orders</a>

                        </div>

                        <!-- Account Information -->
                        <div class="account-page-card">

                            <div class="account-page-card-header">
                                <h3>Account Information</h3>
                                <a href="#" id="accountPageEditProfileBtn"><i
                                        class="fa-regular fa-pen-to-square"></i> Edit Profile</a>
                            </div>

                            @php
                                $accountInfo = [
                                    ['icon' => 'fa-regular fa-user', 'label' => 'Full Name', 'value' => $user['name'] ?? 'Priya Sharma'],
                                    ['icon' => 'fa-regular fa-envelope', 'label' => 'Email Address', 'value' => $user['email'] ?? 'priya.sharma@email.com'],
                                    ['icon' => 'fa-solid fa-phone', 'label' => 'Phone Number', 'value' => $user['phone'] ?? '+91 98765 43210'],
                                    ['icon' => 'fa-regular fa-calendar', 'label' => 'Date of Birth', 'value' => $user['dob'] ?? '12 May 1995'],
                                    ['icon' => 'fa-regular fa-user', 'label' => 'Gender', 'value' => $user['gender'] ?? 'Female'],
                                ];
                            @endphp

                            <div class="account-page-info-list">

                                @foreach($accountInfo as $info)
                                    <div class="account-page-info-row">

                                        <div class="account-page-info-icon">
                                            <i class="{{ $info['icon'] }}"></i>
                                        </div>

                                        <div class="account-page-info-label">{{ $info['label'] }}</div>

                                        <div class="account-page-info-value">{{ $info['value'] }}</div>

                                    </div>
                                @endforeach

                            </div>

                            <a href="#" class="account-page-view-all-btn">Manage Profile</a>

                        </div>

                    </div>

                    <!-- Quick Links -->
                    <div class="account-page-quick-links">

                        <a href="#" class="account-page-quick-card">

                            <div class="account-page-quick-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>

                            <div class="account-page-quick-text">
                                <h4>Address Book</h4>
                                <p>Manage your saved addresses</p>
                                <span>View Addresses <i class="fa-solid fa-chevron-right"></i></span>
                            </div>

                        </a>

                        <!-- <a href="/payment-methods" class="account-page-quick-card">

                            <div class="account-page-quick-icon">
                                <i class="fa-regular fa-credit-card"></i>
                            </div>

                            <div class="account-page-quick-text">
                                <h4>Payment Methods</h4>
                                <p>Manage your payment options</p>
                                <span>View Payments <i class="fa-solid fa-chevron-right"></i></span>
                            </div>

                        </a> -->
                        <!-- 
                            <a href="/consultations" class="account-page-quick-card">

                                <div class="account-page-quick-icon">
                                    <i class="fa-regular fa-user"></i>
                                </div>

                                <div class="account-page-quick-text">
                                    <h4>My Consultations</h4>
                                    <p>View your consultation history</p>
                                    <span>View Consultations <i class="fa-solid fa-chevron-right"></i></span>
                                </div>

                            </a> -->

                        <!-- <a href="/notifications" class="account-page-quick-card">

                            <div class="account-page-quick-icon">
                                <i class="fa-regular fa-bell"></i>
                            </div>

                            <div class="account-page-quick-text">
                                <h4>Notifications</h4>
                                <p>Manage your notifications</p>
                                <span>View Notifications <i class="fa-solid fa-chevron-right"></i></span>
                            </div>

                        </a> -->

                    </div>

                    <!-- Features Strip -->
                    <div class="account-page-features">

                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>

                            <div class="account-page-feature-text">
                                <h4>Secure & Safe</h4>
                                <p>Your data is encrypted and 100% secure with us.</p>
                            </div>

                        </div>

                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">
                                <i class="fa-solid fa-headset"></i>
                            </div>

                            <div class="account-page-feature-text">
                                <h4>24/7 Support</h4>
                                <p>We are here to help you anytime, anywhere.</p>
                            </div>

                        </div>

                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">
                                <i class="fa-solid fa-award"></i>
                            </div>

                            <div class="account-page-feature-text">
                                <h4>Trusted Experts</h4>
                                <p>Connect with verified astrologers & experts.</p>
                            </div>

                        </div>

                        <div class="account-page-feature-item">

                            <div class="account-page-feature-icon">
                                <i class="fa-solid fa-star"></i>
                            </div>

                            <div class="account-page-feature-text">
                                <h4>Customer Satisfaction</h4>
                                <p>Your happiness and trust are our top priority.</p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Logout Confirm Modal -->
    <div class="account-page-modal-overlay" id="accountPageLogoutModal">

        <div class="account-page-modal">

            <div class="account-page-modal-icon">
                <i class="fa-solid fa-right-from-bracket"></i>
            </div>

            <h3>Log out of your account?</h3>
            <p>You'll need to sign in again to access your dashboard.</p>

            <div class="account-page-modal-actions">

                <button type="button" class="account-page-modal-cancel" id="accountPageLogoutCancel">Cancel</button>
                <button type="button" class="account-page-modal-confirm" id="accountPageLogoutConfirm">Yes, Logout</button>

            </div>

        </div>

    </div>

    <script>
        (function () {

            /* -----------------------------------
               Sidebar active link highlight
               (data-target="dashboard" stays active
               on this page; other links navigate away
               to their own Blade pages/routes)
            ----------------------------------- */
            const navLinks = document.querySelectorAll("#accountPageNav .account-page-nav-link:not(.account-page-logout-link)");

            navLinks.forEach(link => {
                link.addEventListener("click", function (e) {

                    // Dashboard link stays on this page — just refresh active state
                    if (this.dataset.target === "dashboard") {
                        e.preventDefault();
                        navLinks.forEach(l => l.classList.remove("active"));
                        this.classList.add("active");
                        window.scrollTo({ top: 0, behavior: "smooth" });
                    }

                    // Other links use their real href and navigate normally
                });
            });

            /* -----------------------------------
               Logout confirmation modal
            ----------------------------------- */
            const logoutBtn = document.getElementById("accountPageLogoutBtn");
            const logoutModal = document.getElementById("accountPageLogoutModal");
            const logoutCancel = document.getElementById("accountPageLogoutCancel");
            const logoutConfirm = document.getElementById("accountPageLogoutConfirm");

            logoutBtn.addEventListener("click", function (e) {
                e.preventDefault();
                logoutModal.classList.add("show");
            });

            logoutCancel.addEventListener("click", function () {
                logoutModal.classList.remove("show");
            });

            logoutModal.addEventListener("click", function (e) {
                if (e.target === logoutModal) {
                    logoutModal.classList.remove("show");
                }
            });

            logoutConfirm.addEventListener("click", function () {

                logoutConfirm.disabled = true;
                logoutConfirm.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Logging out...';

                // Replace this with your real logout call, e.g.:
                // document.getElementById('logout-form').submit();
                setTimeout(() => {
                    window.location.href = "/login";
                }, 800);

            });

            /* -----------------------------------
               Stat cards: clicking anywhere on the
               card triggers its "View" link
            ----------------------------------- */
            document.querySelectorAll(".account-page-stat-card").forEach(card => {
                card.addEventListener("click", function (e) {
                    if (e.target.closest("a")) return;
                    const link = this.querySelector("a");
                    if (link) window.location.href = link.getAttribute("href");
                });
            });

            /* -----------------------------------
               Quick link cards: subtle press feedback
            ----------------------------------- */
            document.querySelectorAll(".account-page-quick-card").forEach(card => {
                card.addEventListener("mousedown", function () {
                    this.style.transform = "scale(.98)";
                });
                card.addEventListener("mouseup", function () {
                    this.style.transform = "";
                });
                card.addEventListener("mouseleave", function () {
                    this.style.transform = "";
                });
            });

        })();
    </script>

@endsection