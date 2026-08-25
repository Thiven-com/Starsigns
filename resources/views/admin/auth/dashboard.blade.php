<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <style>
        :root {
            --theme: #0a0825;
            --theme-dark: #5A32A3;
            --theme-light: #F3EEFF;
        }

        .page-wrapper {
            background: #F8F5FF;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #0a0825, #8B5CF6);
            padding: 35px;
            border-radius: 20px;
            color: #fff;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(111, 66, 193, .25);
        }

        .dashboard-header h1 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .dashboard-card {
            background: #fff;
            border: none;
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
            transition: all .3s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(111, 66, 193, .20);
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 5px;
            height: 100%;
            background: #0a0825;
        }

        .dashboard-icon {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            background: rgba(111, 66, 193, .12);
            color: #0a0825;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .dashboard-title {
            color: #7A7A7A;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .dashboard-count {
            font-size: 32px;
            font-weight: 700;
            color: #0a0825;
            margin-bottom: 0;
        }

        .copyright-footer {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(111, 66, 193, .08);
        }
    </style>
    <div class="page-wrapper">
        <div class="content">

            <div class="dashboard-header">
                <h1>Welcome Back 👋</h1>
                <p class="mb-0">
                    StarSigns website activities from your dashboard.
                </p>
            </div>
            {{-- <div class="col-xxl-4 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-inline-flex align-items-center">
                            <span class="title-icon bg-soft-pink fs-16 me-2"><i class="ti ti-box"></i></span>
                            <h5 class="card-title mb-0">Top Selling Products</h5>
                        </div>
                    </div>
                    <div class="card-body sell-product">

                        <div class="d-flex align-items-center justify-content-between border-bottom mb-3">
                            <div class="d-flex align-items-center">
                                <a href="#" class="avatar avatar-lg">
                                    <img src="" alt="img">
                                </a>
                                <div class="ms-2">
                                    <h6 class="fw-bold mb-1"><a href=""></a></h6>
                                    <div class="d-flex align-items-center item-list">
                                        <p>525</p>
                                        <p>200+ Sales</p>
                                    </div>
                                </div>
                            </div>
                            <span class="badge bg-outline-success badge-xs d-inline-flex align-items-center"><i
                                    class="ti ti-arrow-up-left me-1"></i>0%</span>
                        </div>

                    </div>
                </div> --}}
                {{--
            </div> --}}


            {{-- <div class="col-xxl-4 col-md-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-inline-flex align-items-center">
                            <span class="title-icon bg-soft-danger fs-16 me-2"><i class="ti ti-alert-triangle"></i></span>
                            <h5 class="card-title mb-0">Low Stock Products</h5>
                        </div>
                        <a href="" class="fs-13 fw-medium text-decoration-underline">View All</a>
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">
                                <a href="" class="avatar avatar-lg">
                                    <img src="" alt="img">
                                </a>
                                <div class="ms-2">
                                    <h6 class="fw-bold mb-1"><a href=""></a></h6>
                                    <p class="fs-13">ID : #1245</p>
                                </div>
                            </div>
                            <div class="text-end">
                                <p class="fs-13 mb-1">Instock</p>
                                <h6 class="text-orange fw-medium">515</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}



            {{-- <div class="col-xxl-4 col-md-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-inline-flex align-items-center">
                            <span class="title-icon bg-soft-pink fs-16 me-2"><i class="ti ti-box"></i></span>
                            <h5 class="card-title mb-0">Recent Sales</h5>
                        </div>
                        <a href="" class="fs-13 fw-medium text-decoration-underline">View
                            All</a>
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center">

                                <div class="ms-2">
                                    <h6 class="fw-bold mb-1"><a href=""></a>
                                    </h6>
                                    <div class="d-flex align-items-center item-list">
                                        <p class="text-gray-9">₹</p>
                                        <p class="text-muted ms-2"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <span
                                    class="badge {{ status == 'completed' ? 'badge-success' : 'badge-cyan' }} badge-xs"></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}

        </div>



        <div class="copyright-footer text-center">
            <p class="mb-1">
                © 2026 StarSigns. All Rights Reserved.
            </p>
            <small class="text-muted">
                Designed & Developed By <a href="https://www.thiven.com/" target="_blank" rel="noopener"
                            style="text-decoration:none;color:black;">
                            ThiVen
                        </a>
            </small>
        </div>
    </div>
@endsection