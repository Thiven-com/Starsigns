@extends('layouts.website')
@section('content')
    <style>
        /* =========================================================
           LOGIN PAGE
        ========================================================= */

        section.py-5 {
            background: #f8f9f4 !important;
            min-height: 70vh !important;

            display: flex;
            align-items: center;

            padding-top: 70px !important;
            padding-bottom: 70px !important;
        }


        /* =========================================================
           CONTAINER
        ========================================================= */

        section.py-5 .container {
            width: 100%;
        }


        /* =========================================================
           LOGIN COLUMN
        ========================================================= */

        section.py-5 .col-lg-5 {
            width: 100%;
        }


        /* =========================================================
           LOGIN CARD
        ========================================================= */

        section.py-5 .card {
            width: 100%;
            max-width: 500px;

            margin: 0 auto;

            border: none !important;
            border-radius: 24px !important;

            background: #ffffff;

            box-shadow:
                0 15px 45px rgba(0, 0, 0, 0.08) !important;

            overflow: hidden;

            transition: all 0.3s ease;
        }


        section.py-5 .card:hover {
            box-shadow:
                0 20px 55px rgba(0, 0, 0, 0.10) !important;
        }


        /* =========================================================
           CARD BODY
        ========================================================= */

        section.py-5 .card-body {
            padding: 50px !important;
        }


        /* =========================================================
           TITLE
        ========================================================= */

        section.py-5 h2 {
            margin-bottom: 10px;

            font-size: 34px;
            line-height: 1.2;

            font-weight: 600;

            color: #252525;
        }


        /* =========================================================
           SUBTITLE
        ========================================================= */

        section.py-5 .text-muted {
            font-size: 15px;

            line-height: 1.6;

            color: #777 !important;
        }


        /* =========================================================
           LABEL
        ========================================================= */

        section.py-5 .form-label {
            display: block;

            margin-bottom: 9px;

            font-size: 14px;

            font-weight: 600;

            color: #333;
        }


        /* =========================================================
           INPUT
        ========================================================= */

        section.py-5 .form-control {
            width: 90%;

            height: 54px;

            padding: 0 16px;

            border: 1px solid #dddddd;

            border-radius: 10px;

            background: #ffffff;

            color: #333;

            font-size: 15px;

            box-shadow: none;

            outline: none;

            transition: all 0.25s ease;
        }


        section.py-5 .form-control::placeholder {
            color: #aaaaaa;
        }


        section.py-5 .form-control:hover {
            border-color: #c8c8c8;
        }


        section.py-5 .form-control:focus {
            border-color: #8b6f35;

            box-shadow:
                0 0 0 3px rgba(139, 111, 53, 0.10);
        }


        /* =========================================================
           OTP INPUT
        ========================================================= */

        section.py-5 input[name="otp"] {
            text-align: center;

            font-size: 22px;

            font-weight: 600;

            letter-spacing: 8px;
        }


        section.py-5 input[name="otp"]::placeholder {
            font-size: 14px;

            font-weight: 400;

            letter-spacing: 1px;
        }


        /* =========================================================
           BUTTON
        ========================================================= */

        section.py-5 .tf-btn {
            width: 100%;

            min-height: 54px;

            border: none !important;

            border-radius: 10px !important;

            background: #8b6f35 !important;

            color: #ffffff !important;

            font-size: 15px;

            font-weight: 600;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            text-decoration: none;

            transition: all 0.25s ease;
        }


        section.py-5 .tf-btn:hover {
            background: #735b2d !important;

            color: #ffffff !important;

            transform: translateY(-1px);

            box-shadow:
                0 8px 20px rgba(139, 111, 53, 0.20);
        }


        section.py-5 .tf-btn:active {
            transform: translateY(0);
        }


        /* =========================================================
           OTP FORM
        ========================================================= */

        #modalVerifyOtpForm {
            padding-top: 5px;

            border-top: 1px solid #eeeeee;
        }


        /* =========================================================
           FORM SPACING
        ========================================================= */

        #modalSendOtpForm .mb-4,
        #modalVerifyOtpForm .mb-4 {
            margin-bottom: 24px !important;
        }


        /* Remove unnecessary <br> spacing */

        #modalSendOtpForm br,
        #modalVerifyOtpForm br {
            display: none;
        }


        /* =========================================================
           MOBILE NUMBER
        ========================================================= */

        input[name="mobile"] {
            letter-spacing: 0.5px;
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 767px) {

            section.py-5 {
                min-height: auto !important;

                padding: 40px 15px !important;

                display: block;
            }


            section.py-5 .container {
                padding-left: 0;
                padding-right: 0;
            }


            section.py-5 .row {
                margin-left: 0;
                margin-right: 0;
            }


            section.py-5 .col-lg-5 {
                padding-left: 0;
                padding-right: 0;
            }


            section.py-5 .card {
                max-width: 100%;

                border-radius: 18px !important;

                box-shadow:
                    0 10px 30px rgba(0, 0, 0, 0.07) !important;
            }


            section.py-5 .card-body {
                padding: 30px 22px !important;
            }


            section.py-5 h2 {
                font-size: 28px;
            }


            section.py-5 .text-muted {
                font-size: 14px;
            }


            section.py-5 .form-label {
                font-size: 14px;
            }


            section.py-5 .form-control {
                height: 52px;

                font-size: 14px;

                border-radius: 9px;
            }


            section.py-5 .tf-btn {
                min-height: 52px;

                font-size: 14px;
            }


            section.py-5 input[name="otp"] {
                font-size: 20px;

                letter-spacing: 6px;
            }

        }


        /* =========================================================
           SMALL MOBILE
        ========================================================= */

        @media (max-width: 480px) {

            section.py-5 {
                padding: 25px 12px !important;
            }


            section.py-5 .card {
                border-radius: 16px !important;
            }


            section.py-5 .card-body {
                padding: 25px 18px !important;
            }


            section.py-5 h2 {
                font-size: 25px;
            }


            section.py-5 .text-muted {
                font-size: 13px;
            }


            section.py-5 .form-control {
                height: 50px;

                padding-left: 13px;
                padding-right: 13px;

                font-size: 14px;
            }


            section.py-5 .tf-btn {
                min-height: 50px;

                font-size: 14px;
            }


            section.py-5 input[name="otp"] {
                font-size: 19px;

                letter-spacing: 5px;
            }

        }


        /* =========================================================
           EXTRA SMALL MOBILE
        ========================================================= */

        @media (max-width: 360px) {

            section.py-5 {
                padding: 20px 10px !important;
            }


            section.py-5 .card-body {
                padding: 22px 15px !important;
            }


            section.py-5 h2 {
                font-size: 22px;
            }


            section.py-5 .form-control {
                height: 48px;
            }


            section.py-5 .tf-btn {
                min-height: 48px;
            }

        }
    </style>

    <section class="py-5" style="background:#f8f9f4; min-height:70vh;">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-5 col-md-7 col-12">

                    <div class="card border-0 shadow rounded-4">
                        <div class="card-body p-4 p-lg-5">

                            <div class="text-center mb-4">
                                <h2 class="font-instrument_serif">Welcome Back</h2>
                                <p class="text-muted mb-0">
                                    Login using your mobile number
                                </p>
                            </div>

                            {{-- SEND OTP --}}
                            <form id="modalSendOtpForm">

                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">
                                        Mobile Number
                                    </label>

                                    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number"
                                        maxlength="10" required><br>

                                </div>

                                <button type="submit" class="tf-btn type-2 style-2 w-100">
                                    Send OTP
                                </button>

                            </form>

                            {{-- VERIFY OTP --}}
                            <form id="modalVerifyOtpForm" style="display:none;" class="mt-4">

                                @csrf

                                <div class="mb-4">

                                    <label class="form-label">
                                        Enter OTP
                                    </label>

                                    <input type="text" name="otp" maxlength="6" class="form-control text-center"
                                        placeholder="Enter 4 Digit OTP" required><br>

                                </div>

                                <button type="submit" class="tf-btn type-2 style-2 w-100">
                                    Verify & Login
                                </button>

                            </form>

                            {{-- <div class="text-center mt-4">
                                Don't have an account?
                                <a href="{{ route('register') }}">
                                    Register
                                </a>
                            </div> --}}

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {

            let mobile = '';

            // ==========================================
            // SEND OTP
            // ==========================================

            $("#modalSendOtpForm").on("submit", function (e) {

                e.preventDefault();

                mobile = $("input[name='mobile']").val().trim();

                // Validate mobile
                if (!/^[0-9]{10}$/.test(mobile)) {

                    alert("Please enter a valid 10 digit mobile number.");

                    return;
                }

                let button = $(this).find("button");

                button.prop("disabled", true);
                button.text("Sending OTP...");


                $.ajax({

                    url: "{{ url('/send-otp') }}",

                    type: "POST",

                    data: {
                        _token: "{{ csrf_token() }}",
                        mobile: mobile
                    },

                    dataType: "json",

                    success: function (res) {

                        console.log("Send OTP Response:", res);

                        if (res.status) {

                            alert("OTP sent successfully. Your OTP is 1234");

                            $("#modalSendOtpForm").hide();

                            $("#modalVerifyOtpForm")
                                .css("display", "block")
                                .hide()
                                .fadeIn();

                            $("input[name='otp']").val('').focus();

                        } else {

                            alert(res.message || "Unable to send OTP.");

                        }
                    },

                    error: function (xhr) {

                        console.error("Send OTP Error:", xhr);

                        console.error("Response:", xhr.responseText);

                        if (xhr.status === 422) {

                            alert("Please enter a valid mobile number.");

                        } else {

                            alert(
                                "Something went wrong while sending OTP. " +
                                "HTTP Status: " + xhr.status
                            );

                        }

                    },

                    complete: function () {

                        button.prop("disabled", false);

                        button.text("Send OTP");

                    }

                });

            });


            // ==========================================
            // VERIFY OTP
            // ==========================================

            $("#modalVerifyOtpForm").on("submit", function (e) {

                e.preventDefault();

                let otp = $("input[name='otp']").val().trim();


                console.log("Mobile:", mobile);
                console.log("OTP:", otp);


                // Validate OTP
                if (!/^[0-9]{4}$/.test(otp)) {

                    alert("Please enter the 4 digit OTP.");

                    return;
                }


                // Check mobile exists
                if (!mobile) {

                    alert("Mobile number is missing. Please request OTP again.");

                    $("#modalVerifyOtpForm").hide();

                    $("#modalSendOtpForm").fadeIn();

                    return;
                }


                let button = $(this).find("button");

                button.prop("disabled", true);
                button.text("Verifying...");


                $.ajax({

                    url: "{{ url('/verify-otp') }}",

                    type: "POST",

                    data: {

                        _token: "{{ csrf_token() }}",

                        mobile: mobile,

                        otp: otp

                    },

                    dataType: "json",

                    success: function (res) {

                        console.log("Verify OTP Response:", res);


                        if (res.status) {

                            alert("Login Successful");

                            window.location.href = "{{ url('/') }}";

                        } else {

                            alert(res.message || "Invalid OTP.");

                        }

                    },

                    error: function (xhr) {

                        console.error("Verify OTP Error:", xhr);

                        console.error(
                            "Verify Response:",
                            xhr.responseText
                        );


                        if (xhr.status === 422) {

                            alert("Mobile number and OTP are required.");

                        } else {

                            alert(
                                "Something went wrong while verifying OTP. " +
                                "HTTP Status: " + xhr.status
                            );

                        }

                    },

                    complete: function () {

                        button.prop("disabled", false);

                        button.text("Verify & Login");

                    }

                });

            });


            // ==========================================
            // ONLY NUMBERS - MOBILE
            // ==========================================

            $("input[name='mobile']").on("input", function () {

                this.value = this.value
                    .replace(/\D/g, '')
                    .substring(0, 10);

            });


            // ==========================================
            // ONLY NUMBERS - OTP
            // ==========================================

            $("input[name='otp']").on("input", function () {

                this.value = this.value
                    .replace(/\D/g, '')
                    .substring(0, 4);

            });

        });
    </script>
    {{-- @if(session('showLoginModal')) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = new bootstrap.Modal(document.getElementById('loginModal'));
            modal.show();
        });
    </script>
    {{-- @endif --}}
    <!-- /Log -->
@endsection