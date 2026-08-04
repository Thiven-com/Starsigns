@extends('layouts.website')
@section('content')

    <!--==========================================
                LOGIN PAGE CONTENT
            ===========================================-->

    <section class="login-page-section">

        <div class="container">

            <div class="login-page-layout">

                <!--=========================
                            LEFT: WELCOME
                        ==========================-->

                <div class="login-page-welcome">

                    <h1 class="login-page-welcome-title">Welcome Back!</h1>

                    <span class="login-page-welcome-divider"></span>

                    <p class="login-page-welcome-text">
                        Sign in to your account and continue<br>
                        your spiritual journey with AstroVani.
                    </p>
<!-- 
                    <div class="login-page-welcome-img">

                        <img src="{{ asset('website') }}/images/login.png" alt="Spiritual crystals and bracelet">

                    </div> -->

                    <div class="login-page-privacy-note">

                        <span class="login-page-privacy-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </span>

                        <p>Your privacy & security are our top priority.</p>

                    </div>

                </div>

                <!--=========================
                            RIGHT: LOGIN FORM
                        ==========================-->

                <div class="login-page-form-wrap">

                    <h2 class="login-page-form-title">Login to Your Account</h2>
                    <span class="login-page-form-divider"></span>

                    <form id="loginPageForm" novalidate>

                        <div class="login-page-field">

                            <label for="loginNumber">Mobile Number <span class="login-page-req">*</span></label>

                            <div class="login-page-input-wrap">
                                <i class="fa-solid fa-phone"></i>
                                <input type="number" id="loginNumber" name="email" placeholder="Enter your mobile number"
                                    autocomplete="username">
                            </div>

                            <span class="login-page-error-msg" id="loginNumberError"></span>

                        </div>

                        <div class="login-page-field">

                            <label for="loginPassword">Otp <span class="login-page-req">*</span></label>

                            <div class="login-page-input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="loginPassword" name="password" placeholder="Enter your otp"
                                    autocomplete="current-password">
                                <button type="button" class="login-page-toggle-pass" id="loginPageTogglePass" tabindex="-1">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>

                            <span class="login-page-error-msg" id="loginPasswordError"></span>

                        </div>

                        <div class="login-page-form-meta">

                            <label class="login-page-remember">
                                <input type="checkbox" id="loginRemember" name="remember" checked>
                                <span class="login-page-checkbox"></span>
                                Remember me
                            </label>

                            {{-- <a href="/forgot-password" class="login-page-forgot-link">Forgot Password?</a> --}}

                        </div>

                        <button type="submit" class="login-page-submit-btn" id="loginPageSubmitBtn">
                            <i class="fa-solid fa-lock"></i>
                            <span class="login-page-submit-btn-text">Login</span>
                        </button>

                        {{-- <div class="login-page-divider-row">
                            <span></span>
                            <p>or continue with</p>
                            <span></span>
                        </div> --}}

                        {{-- <div class="login-page-social-row">

                            <a href="/auth/google/redirect" class="login-page-social-btn">
                                <i class="fa-brands fa-google"></i> Google
                            </a>

                            <a href="/auth/facebook/redirect" class="login-page-social-btn">
                                <i class="fa-brands fa-facebook"></i> Facebook
                            </a>

                            <a href="/auth/apple/redirect" class="login-page-social-btn">
                                <i class="fa-brands fa-apple"></i> Apple
                            </a>

                        </div> --}}

                        {{-- <p class="login-page-signup-note">
                            Don't have an account? <a href="/register">Sign Up</a>
                        </p> --}}

                    </form>

                </div>

            </div>

            <!--=========================
                        FEATURES STRIP
                    ==========================-->

            <div class="login-page-features">

                <div class="login-page-feature-item">

                    <div class="login-page-feature-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div class="login-page-feature-text">
                        <h4>Secure &amp; Safe</h4>
                        <p>Your data is encrypted and 100% secure with us.</p>
                    </div>

                </div>

                <div class="login-page-feature-item">

                    <div class="login-page-feature-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <div class="login-page-feature-text">
                        <h4>24/7 Support</h4>
                        <p>We are here to help you anytime, anywhere.</p>
                    </div>

                </div>

                <div class="login-page-feature-item">

                    <div class="login-page-feature-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>

                    <div class="login-page-feature-text">
                        <h4>Trusted Experts</h4>
                        <p>Connect with verified astrologers &amp; experts.</p>
                    </div>

                </div>

                <div class="login-page-feature-item">

                    <div class="login-page-feature-icon">
                        <i class="fa-solid fa-gift"></i>
                    </div>

                    <div class="login-page-feature-text">
                        <h4>Exclusive Benefits</h4>
                        <p>Get special offers and rewards on every order.</p>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <script>
        (function () {

            const form = document.getElementById("loginPageForm");
            const submitBtn = document.getElementById("loginPageSubmitBtn");

            const fields = {
                email: {
                    input: document.getElementById("loginNumber"),
                    error: document.getElementById("loginNumberError")
                },
                password: {
                    input: document.getElementById("loginPassword"),
                    error: document.getElementById("loginPasswordError")
                }
            };

            function isEmailValid(value) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
            }

            function setError(field, message) {
                field.input.classList.add("login-page-invalid");
                field.error.textContent = message;
            }

            function clearError(field) {
                field.input.classList.remove("login-page-invalid");
                field.error.textContent = "";
            }

            function validateField(key) {

                const field = fields[key];
                const value = field.input.value.trim();

                clearError(field);

                if (value === "") {
                    setError(field, key === "email" ? "Email address is required." : "Password is required.");
                    return false;
                }

                if (key === "email" && !isEmailValid(value)) {
                    setError(field, "Please enter a valid email address.");
                    return false;
                }

                if (key === "password" && value.length < 6) {
                    setError(field, "Password must be at least 6 characters.");
                    return false;
                }

                return true;
            }

            Object.keys(fields).forEach(key => {
                const el = fields[key].input;
                el.addEventListener("input", () => validateField(key));
                el.addEventListener("blur", () => validateField(key));
            });

            /* -----------------------------------
               Show / hide password
            ----------------------------------- */
            const togglePassBtn = document.getElementById("loginPageTogglePass");
            const passwordInput = document.getElementById("loginPassword");

            togglePassBtn.addEventListener("click", function () {

                const isPassword = passwordInput.type === "password";
                passwordInput.type = isPassword ? "text" : "password";

                const icon = this.querySelector("i");
                icon.classList.toggle("fa-eye", !isPassword);
                icon.classList.toggle("fa-eye-slash", isPassword);

            });

            /* -----------------------------------
               Form submit
            ----------------------------------- */
            form.addEventListener("submit", function (e) {

                e.preventDefault();

                let isFormValid = true;

                Object.keys(fields).forEach(key => {
                    const valid = validateField(key);
                    if (!valid) isFormValid = false;
                });

                if (!isFormValid) {
                    const firstInvalid = form.querySelector(".login-page-invalid");
                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                    return;
                }

                const originalContent = submitBtn.innerHTML;

                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <span>Logging in...</span>';

                // Replace this block with your real Laravel auth submission, e.g.:
                // form.submit();
                // or an AJAX call to POST /login with email, password, remember

                setTimeout(() => {

                    submitBtn.innerHTML = originalContent;
                    submitBtn.disabled = false;

                    // On success you would typically redirect:
                    // window.location.href = "/my-account";

                }, 1200);

            });

        })();
    </script>

@endsection