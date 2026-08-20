@extends('layouts.website')

@section('content')

    <style>
        .edit-profile-page {
            background: #faf9f7;
            min-height: 75vh;
            padding: 45px 0 70px;
        }

        .edit-profile-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 18px;
        }


        /* Breadcrumb */

        .edit-profile-breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 28px;
            font-size: 13px;
            color: #888;
        }

        .edit-profile-breadcrumb a {
            color: #555;
            text-decoration: none;
        }

        .edit-profile-breadcrumb a:hover {
            color: #b48a3c;
        }

        .edit-profile-breadcrumb .active {
            color: #b48a3c;
            font-weight: 600;
        }


        /* Header */

        .edit-profile-header {
            margin-bottom: 25px;
        }

        .edit-profile-header h1 {
            margin: 0 0 7px;
            color: #222;
            font-size: 30px;
            font-weight: 600;
        }

        .edit-profile-header p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }


        /* Main Card */

        .edit-profile-card {
            background: #fff;
            border: 1px solid #e9e6e1;
            border-radius: 15px;
            overflow: hidden;
        }


        /* Profile Top */

        .edit-profile-top {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 25px;
            background: linear-gradient(135deg,
                    #fff,
                    #faf6ee);
            border-bottom: 1px solid #eee;
        }

        .edit-profile-avatar {
            width: 75px;
            height: 75px;
            flex: 0 0 75px;
            overflow: hidden;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .08);
            background: #f4efe6;
        }

        .edit-profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .edit-profile-user h3 {
            margin: 0 0 5px;
            color: #222;
            font-size: 18px;
            font-weight: 600;
        }

        .edit-profile-user p {
            margin: 0;
            color: #888;
            font-size: 13px;
        }


        /* Form */

        .edit-profile-body {
            padding: 28px;
        }

        .edit-profile-section-title {
            margin-bottom: 20px;
        }

        .edit-profile-section-title h2 {
            margin: 0 0 5px;
            color: #222;
            font-size: 18px;
            font-weight: 600;
        }

        .edit-profile-section-title p {
            margin: 0;
            color: #888;
            font-size: 12px;
        }


        .edit-profile-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .edit-profile-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .edit-profile-group.full {
            grid-column: 1 / -1;
        }

        .edit-profile-group label {
            color: #444;
            font-size: 12px;
            font-weight: 600;
        }

        .edit-profile-group label span {
            color: #d33;
        }

        .edit-profile-input,
        .edit-profile-select {
            width: 100%;
            min-height: 45px;
            box-sizing: border-box;
            padding: 10px 13px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            color: #333;
            font-size: 13px;
            outline: none;
            transition: .2s;
        }

        .edit-profile-input:focus,
        .edit-profile-select:focus {
            border-color: #b48a3c;
            box-shadow:
                0 0 0 3px rgba(180,
                    138,
                    60,
                    .08);
        }


        /* Read Only */

        .edit-profile-readonly {
            background: #f7f6f4;
            color: #888;
            cursor: not-allowed;
        }


        /* Error */

        .edit-profile-errors {
            margin-bottom: 22px;
            padding: 13px 15px;
            border-radius: 9px;
            border: 1px solid #f0cccc;
            background: #fff3f3;
            color: #c33;
            font-size: 13px;
        }

        .edit-profile-errors div {
            margin-bottom: 4px;
        }

        .edit-profile-errors div:last-child {
            margin-bottom: 0;
        }


        /* Footer */

        .edit-profile-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #eee;
        }

        .edit-profile-back {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #555;
            text-decoration: none;
            font-size: 13px;
        }

        .edit-profile-back:hover {
            color: #b48a3c;
        }

        .edit-profile-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .edit-profile-cancel {
            min-height: 45px;
            padding: 0 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            color: #555;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .edit-profile-save {
            min-height: 45px;
            padding: 0 23px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: 0;
            border-radius: 8px;
            background: #222;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }

        .edit-profile-save:hover {
            background: #b48a3c;
        }


        /* Mobile */

        @media(max-width: 767px) {

            .edit-profile-page {
                padding: 25px 0 45px;
            }

            .edit-profile-container {
                padding: 0 13px;
            }

            .edit-profile-header h1 {
                font-size: 24px;
            }

            .edit-profile-top {
                padding: 18px;
            }

            .edit-profile-avatar {
                width: 60px;
                height: 60px;
                flex-basis: 60px;
            }

            .edit-profile-body {
                padding: 18px;
            }

            .edit-profile-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .edit-profile-group.full {
                grid-column: auto;
            }

            .edit-profile-footer {
                align-items: stretch;
                flex-direction: column;
            }

            .edit-profile-actions {
                width: 100%;
                flex-direction: column-reverse;
            }

            .edit-profile-cancel,
            .edit-profile-save {
                width: 100%;
            }

        }
    </style>


    <section class="edit-profile-page">

        <div class="edit-profile-container">


            {{-- Breadcrumb --}}

            <div class="edit-profile-breadcrumb">

                <a href="{{ url('/') }}">
                    Home
                </a>

                <span>/</span>

                <a href="{{ route('myaccount') }}">
                    My Account
                </a>

                <span>/</span>

                <span class="active">
                    Edit Profile
                </span>

            </div>


            {{-- Header --}}

            <div class="edit-profile-header">

                <h1>
                    Edit Profile
                </h1>

                <p>
                    Update your personal information and account details.
                </p>

            </div>


            {{-- Main Card --}}

            <div class="edit-profile-card">


                {{-- User Header --}}

                <div class="edit-profile-top">

                    <div class="edit-profile-avatar">

                        <img src="{{ asset('website/images/avatar-placeholder.png') }}" alt="{{ $customer->name }}">

                    </div>


                    <div class="edit-profile-user">

                        <h3>
                            {{ $customer->name }}
                        </h3>

                        <p>
                            {{ $customer->email }}
                        </p>

                    </div>

                </div>


                {{-- Form --}}

                <div class="edit-profile-body">


                    @if($errors->any())

                        <div class="edit-profile-errors">

                            @foreach($errors->all() as $error)

                                <div>
                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    {{ $error }}
                                </div>

                            @endforeach

                        </div>

                    @endif


                    <form action="{{ route('customer.profile.update') }}" method="POST">

                        @csrf


                        <div class="edit-profile-section-title">

                            <h2>
                                Personal Information
                            </h2>

                            <p>
                                Keep your account information up to date.
                            </p>

                        </div>


                        <div class="edit-profile-grid">


                            {{-- Name --}}

                            <div class="edit-profile-group">

                                <label>
                                    Full Name
                                    <span>*</span>
                                </label>

                                <input type="text" name="name" class="edit-profile-input" value="{{ old(
        'name',
        $customer->name
    ) }}" placeholder="Enter your name" required>

                            </div>


                            {{-- Email --}}

                            <div class="edit-profile-group">

                                <label>
                                    Email Address
                                    <span>*</span>
                                </label>

                                <input type="email" name="email" class="edit-profile-input" value="{{ old(
        'email',
        $customer->email
    ) }}" placeholder="Enter your email" required>

                            </div>


                            {{-- Mobile --}}

                            <div class="edit-profile-group">

                                <label>
                                    Mobile Number
                                </label>

                                <input type="text" name="mobile" class="edit-profile-input" value="{{ old(
        'mobile',
        $customer->mobile
    ) }}" placeholder="Enter mobile number">

                            </div>
                        </div>


                        {{-- Footer --}}

                        <div class="edit-profile-footer">


                            <a href="{{ route('myaccount') }}" class="edit-profile-back">

                                <i class="fa-solid fa-arrow-left"></i>

                                Back to Account

                            </a>


                            <div class="edit-profile-actions">

                                <a href="{{ route('myaccount') }}" class="edit-profile-cancel">
                                    Cancel
                                </a>


                                <button type="submit" class="edit-profile-save">

                                    <i class="fa-solid fa-check"></i>

                                    Save Changes

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </section>

@endsection