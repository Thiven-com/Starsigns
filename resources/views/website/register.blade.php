@extends('layouts.website')

@section('content')

<!--==========================================
            REGISTER PAGE CONTENT
===========================================-->

<section class="login-page-section">
<div class="container">

    <div class="login-page-layout">

        <!--=========================
                LEFT: WELCOME
        ==========================-->

        <div class="login-page-welcome">

            <h1 class="login-page-welcome-title">Join AstroVani</h1>

            <span class="login-page-welcome-divider"></span>

            <p class="login-page-welcome-text">
                Create your account and begin<br>
                your spiritual journey with AstroVani.
            </p>

            <div class="login-page-privacy-note">

                <span class="login-page-privacy-icon">
                    <i class="fa-solid fa-shield-halved"></i>
                </span>

                <p>Your privacy & security are our top priority.</p>

            </div>

        </div>

        <!--=========================
                RIGHT: REGISTER FORM
        ==========================-->

        <div class="login-page-form-wrap">

            <h2 class="login-page-form-title">Create Your Account</h2>
            <span class="login-page-form-divider"></span>

            <form id="registerPageForm" novalidate>

                <div class="login-page-field">

                    <label for="registerName">Full Name <span class="login-page-req">*</span></label>

                    <div class="login-page-input-wrap">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="registerName" name="name"
                            placeholder="Enter your full name" autocomplete="name">
                    </div>

                    <span class="login-page-error-msg" id="registerNameError"></span>

                </div>

                <div class="login-page-field">

                    <label for="registerEmail">Email Address <span class="login-page-req">*</span></label>

                    <div class="login-page-input-wrap">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" id="registerEmail" name="email"
                            placeholder="Enter your email address" autocomplete="email">
                    </div>

                    <span class="login-page-error-msg" id="registerEmailError"></span>

                </div>

                <div class="login-page-field">

                    <label for="registerPhone">Phone Number <span class="login-page-req">*</span></label>

                    <div class="login-page-input-wrap">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" id="registerPhone" name="phone"
                            placeholder="Enter your phone number" autocomplete="tel">
                    </div>

                    <span class="login-page-error-msg" id="registerPhoneError"></span>

                </div>

                <div class="login-page-field">

                    <label for="registerPassword">Password <span class="login-page-req">*</span></label>

                    <div class="login-page-input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="registerPassword" name="password"
                            placeholder="Create a password" autocomplete="new-password">
                        <button type="button" class="login-page-toggle-pass" id="registerTogglePass" tabindex="-1">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <span class="login-page-error-msg" id="registerPasswordError"></span>

                </div>

                <div class="login-page-field">

                    <label for="registerConfirmPassword">Confirm Password <span class="login-page-req">*</span></label>

                    <div class="login-page-input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="registerConfirmPassword" name="password_confirmation"
                            placeholder="Confirm your password" autocomplete="new-password">
                        <button type="button" class="login-page-toggle-pass" id="registerToggleConfirmPass" tabindex="-1">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>

                    <span class="login-page-error-msg" id="registerConfirmPasswordError"></span>

                </div>

                <div class="login-page-form-meta">

                    <label class="login-page-remember">
                        <input type="checkbox" id="registerTerms" name="terms">
                        <span class="login-page-checkbox"></span>
                        I agree to the <a href="/terms-and-conditions">Terms & Conditions</a>
                    </label>

                </div>

                <button type="submit" class="login-page-submit-btn" id="registerPageSubmitBtn">
                    <i class="fa-solid fa-user-plus"></i>
                    <span class="login-page-submit-btn-text">Create Account</span>
                </button>

                <div class="login-page-divider-row">
                    <span></span>
                    <p>or sign up with</p>
                    <span></span>
                </div>

                <div class="login-page-social-row">

                    <a href="/auth/google/redirect" class="login-page-social-btn">
                        <i class="fa-brands fa-google"></i> Google
                    </a>

                    <a href="/auth/facebook/redirect" class="login-page-social-btn">
                        <i class="fa-brands fa-facebook"></i> Facebook
                    </a>

                    <a href="/auth/apple/redirect" class="login-page-social-btn">
                        <i class="fa-brands fa-apple"></i> Apple
                    </a>

                </div>

                <p class="login-page-signup-note">
                    Already have an account? <a href="/login">Login</a>
                </p>

            </form>

        </div>

    </div>

</div>

</section>

<script>
    (function () {

        const form = document.getElementById("registerPageForm");
        const submitBtn = document.getElementById("registerPageSubmitBtn");

        const fields = {
            name: {
                input: document.getElementById("registerName"),
                error: document.getElementById("registerNameError")
            },
            email: {
                input: document.getElementById("registerEmail"),
                error: document.getElementById("registerEmailError")
            },
            phone: {
                input: document.getElementById("registerPhone"),
                error: document.getElementById("registerPhoneError")
            },
            password: {
                input: document.getElementById("registerPassword"),
                error: document.getElementById("registerPasswordError")
            },
            confirmPassword: {
                input: document.getElementById("registerConfirmPassword"),
                error: document.getElementById("registerConfirmPasswordError")
            }
        };

        function isEmailValid(value) {
            return /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/.test(value);
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
                setError(field, "This field is required.");
                return false;
            }

            if (key === "email" && !isEmailValid(value)) {
                setError(field, "Please enter a valid email address.");
                return false;
            }

            if (key === "phone" && !/^[0-9]{10}$/.test(value)) {
                setError(field, "Please enter a valid 10-digit phone number.");
                return false;
            }

            if (key === "password" && value.length < 6) {
                setError(field, "Password must be at least 6 characters.");
                return false;
            }

            if (key === "confirmPassword" && value !== fields.password.input.value.trim()) {
                setError(field, "Passwords do not match.");
                return false;
            }

            return true;
        }

        Object.keys(fields).forEach(key => {
            const el = fields[key].input;
            el.addEventListener("input", () => validateField(key));
            el.addEventListener("blur", () => validateField(key));
        });

        // Toggle password visibility
        ["registerTogglePass", "registerToggleConfirmPass"].forEach(id => {
            const btn = document.getElementById(id);

            btn.addEventListener("click", function () {

                const input = this.parentElement.querySelector("input");
                const isPassword = input.type === "password";

                input.type = isPassword ? "text" : "password";

                const icon = this.querySelector("i");
                icon.classList.toggle("fa-eye", !isPassword);
                icon.classList.toggle("fa-eye-slash", isPassword);

            });
        });

        // Submit
        form.addEventListener("submit", function (e) {

            e.preventDefault();

            let isFormValid = true;

            Object.keys(fields).forEach(key => {
                const valid = validateField(key);
                if (!valid) isFormValid = false;
            });

            if (!document.getElementById("registerTerms").checked) {
                alert("Please accept the Terms & Conditions.");
                return;
            }

            if (!isFormValid) return;

            const original = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Creating Account...';

            // Replace with Laravel registration submission
            // form.submit();

            setTimeout(() => {
                submitBtn.innerHTML = original;
                submitBtn.disabled = false;
            }, 1200);

        });

    })();
</script>

@endsection
