
<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')

    <style>
        :root {
            --theme: #0a0825;
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

        .dashboard-header p {
            color: rgba(255, 255, 255, .85);
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

        .dashboard-section {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
            overflow: hidden;
        }

        .dashboard-section .section-header {
            padding: 20px 25px;
            border-bottom: 1px solid #eee;
        }

        .dashboard-section .section-body {
            padding: 25px;
        }

        .dashboard-section .section-title {
            font-size: 17px;
            font-weight: 700;
            color: #0a0825;
        }

        .dashboard-item {
            padding: 14px 0;
            border-bottom: 1px solid #f0edf7;
        }

        .dashboard-item:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .dashboard-item:first-child {
            padding-top: 0;
        }

        .dashboard-item h6 {
            color: #0a0825;
        }

        .dashboard-item h6 a {
            color: inherit;
        }

        .dashboard-item h6 a:hover {
            color: #8B5CF6;
        }

        .dashboard-item .item-price {
            color: #0a0825;
            font-weight: 600;
        }

        .dashboard-item .item-date {
            color: #888;
            font-size: 13px;
        }

        .dashboard-footer {
            background: #fff;
            border-radius: 15px;
            padding: 20px;
            margin-top: 30px;
            box-shadow: 0 4px 15px rgba(111, 66, 193, .08);
        }

        @media (max-width: 767px) {
            .dashboard-header {
                padding: 25px 20px;
            }

            .dashboard-header h1 {
                font-size: 24px;
            }

            .dashboard-section .section-header,
            .dashboard-section .section-body {
                padding: 18px;
            }

            .dashboard-count {
                font-size: 27px;
            }
        }
    </style>

    <div class="page-wrapper">
        <div class="content">

            {{-- Dashboard Header --}}
            <div class="dashboard-header">
                <h1>Welcome Back 👋</h1>
                <p class="mb-0">
                    StarSigns website activities from your dashboard.
                </p>
            </div>

            {{-- Dashboard Statistics --}}
            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12 d-flex mb-4">
                    <div class="dashboard-card flex-fill">
                        <div class="d-flex align-items-center">
                            <div class="dashboard-icon">
                                <i class="ti ti-shopping-bag"></i>
                            </div>
                            <div class="ms-3">
                                <p class="dashboard-title">Total Orders</p>
                                <h4 class="dashboard-count">
                                    {{ number_format($ordersCount ?? 0) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex mb-4">
                    <div class="dashboard-card flex-fill">
                        <div class="d-flex align-items-center">
                            <div class="dashboard-icon">
                                <i class="ti ti-users"></i>
                            </div>
                            <div class="ms-3">
                                <p class="dashboard-title">Total Customers</p>
                                <h4 class="dashboard-count">
                                    {{ number_format($counts['customers'] ?? 0) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex mb-4">
                    <div class="dashboard-card flex-fill">
                        <div class="d-flex align-items-center">
                            <div class="dashboard-icon">
                                <i class="ti ti-box"></i>
                            </div>
                            <div class="ms-3">
                                <p class="dashboard-title">Total Products</p>
                                <h4 class="dashboard-count">
                                    {{ number_format($counts['products'] ?? 0) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex mb-4">
                    <div class="dashboard-card flex-fill">
                        <div class="d-flex align-items-center">
                            <div class="dashboard-icon">
                                <i class="ti ti-wallet"></i>
                            </div>
                            <div class="ms-3">
                                <p class="dashboard-title">Total Sales</p>
                                <h4 class="dashboard-count">
                                    ₹{{ number_format($totals['sales'] ?? 0, 2) }}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Main Dashboard Sections --}}
            <div class="row">

                {{-- Top Selling Products --}}
                <div class="col-xxl-4 col-md-6 d-flex mb-4">
                    <div class="dashboard-section flex-fill">

                        <div class="section-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-pink fs-16 me-2">
                                    <i class="ti ti-box"></i>
                                </span>
                                <h5 class="section-title mb-0">Top Selling Products</h5>
                            </div>
                        </div>

                        <div class="section-body">
                            @forelse($topSelling ?? [] as $p)
                                <div class="dashboard-item">
                                    <h6 class="fw-bold mb-1">
                                        {{ $p->product_title }}
                                    </h6>
                                    <div class="d-flex align-items-center gap-3">
                                        <p class="item-price mb-0">
                                            ₹{{ number_format($p->unit_price, 2) }}
                                        </p>
                                        <p class="item-date mb-0">
                                            {{ $p->total_quantity }} Sold
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted text-center mb-0">
                                    No selling products found
                                </p>
                            @endforelse
                        </div>

                    </div>
                </div>

                {{-- Low Stock Products --}}
                <div class="col-xxl-4 col-md-6 d-flex mb-4">
                    <div class="dashboard-section flex-fill">

                        <div class="section-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-danger fs-16 me-2">
                                    <i class="ti ti-alert-triangle"></i>
                                </span>
                                <h5 class="section-title mb-0">Low Stock Products</h5>
                            </div>

                            <a href="{{ route('admin.products.index') }}"
                                class="fs-13 fw-medium text-decoration-underline">
                                View All
                            </a>
                        </div>

                        <div class="section-body">
                            @forelse($lowStockProducts ?? [] as $ls)
                                <div class="dashboard-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.products.edit', $ls->product_id) }}"
                                                class="avatar avatar-lg">
                                                <img src="{{ $ls->image ? asset($ls->image) : asset('build/img/products/product-06.jpg') }}"
                                                    alt="{{ $ls->title }}" class="img-fluid">
                                            </a>

                                            <div class="ms-2">
                                                <h6 class="fw-bold mb-1">
                                                    <a href="{{ route('admin.products.edit', $ls->product_id) }}">
                                                        {{ $ls->title }}
                                                    </a>
                                                </h6>
                                                <p class="item-date mb-0">
                                                    ID : #{{ $ls->sku ?? $ls->id }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <p class="item-date mb-1">Instock</p>
                                            <h6 class="text-orange fw-medium mb-0">
                                                {{ $ls->stock }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted text-center mb-0">
                                    No low stock products
                                </p>
                            @endforelse
                        </div>

                    </div>
                </div>

                {{-- Recent Sales --}}
                <div class="col-xxl-4 col-md-12 d-flex mb-4">
                    <div class="dashboard-section flex-fill">

                        <div class="section-header d-flex justify-content-between align-items-center">
                            <div class="d-inline-flex align-items-center">
                                <span class="title-icon bg-soft-pink fs-16 me-2">
                                    <i class="ti ti-shopping-cart"></i>
                                </span>
                                <h5 class="section-title mb-0">Recent Sales</h5>
                            </div>

                            <a href="{{ route('admin.orders.index') }}"
                                class="fs-13 fw-medium text-decoration-underline">
                                View All
                            </a>
                        </div>

                        <div class="section-body">
                            @forelse($recentSales ?? [] as $sale)
                                <div class="dashboard-item">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="fw-bold mb-1">
                                                <a href="{{ route('admin.orders.show', $sale->id) }}">
                                                    {{ $sale->customer_name ?? 'Customer' }}
                                                </a>
                                            </h6>

                                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                                <p class="item-price mb-0">
                                                    ₹{{ number_format($sale->grand_total, 2) }}
                                                </p>
                                                <p class="item-date mb-0">
                                                    {{ $sale->created_at->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <span class="badge {{ $sale->status == 'completed' ? 'badge-success' : 'badge-cyan' }} badge-xs">
                                                {{ ucfirst($sale->status) }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted text-center mb-0">
                                    No recent sales
                                </p>
                            @endforelse
                        </div>

                    </div>
                </div>

            </div>

            {{-- Today's Orders --}}
            <div class="dashboard-section mb-4">

                <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-warning fs-16 me-2">
                            <i class="ti ti-shopping-bag"></i>
                        </span>
                        <h5 class="section-title mb-0">Today's Orders</h5>
                    </div>

                    <a href="{{ route('admin.reports.orders.today') }}" class="btn btn-sm btn-warning">
                        Export Excel
                    </a>
                </div>

                <div class="section-body">
                    @forelse($todayOrders ?? [] as $order)
                        <div class="dashboard-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        <a href="{{ route('admin.orders.show', $order->id) }}">
                                            Order #{{ $order->invoice_id }}
                                        </a>
                                    </h6>

                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <p class="item-price mb-0">
                                            ₹{{ number_format($order->grand_total, 2) }}
                                        </p>
                                        <p class="item-date mb-0">
                                            {{ $order->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>

                                <span class="badge {{ $order->status == 'completed' ? 'badge-success' : 'badge-warning' }} badge-xs">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mb-0">
                            No orders today
                        </p>
                    @endforelse
                </div>

            </div>

            {{-- Today's Transactions --}}
            <div class="dashboard-section mb-4">

                <div class="section-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="d-inline-flex align-items-center">
                        <span class="title-icon bg-soft-primary fs-16 me-2">
                            <i class="ti ti-cash"></i>
                        </span>
                        <h5 class="section-title mb-0">Today's Transactions</h5>
                    </div>

                    <a href="{{ route('admin.reports.transactions.today') }}" class="btn btn-sm btn-primary">
                        Export Excel
                    </a>
                </div>

                <div class="section-body">
                    @forelse($todayTransactions ?? [] as $txn)
                        <div class="dashboard-item">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1">
                                        Order #{{ $txn->reference_no ?? $txn->order_id }}
                                    </h6>

                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <p class="item-price mb-0">
                                            ₹{{ number_format($txn->amount, 2) }}
                                        </p>
                                        <p class="item-date mb-0">
                                            {{ $txn->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>

                                <span class="badge {{ $txn->status == 'paid' ? 'badge-success' : 'badge-danger' }} badge-xs">
                                    {{ ucfirst($txn->status) }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center mb-0">
                            No transactions today
                        </p>
                    @endforelse
                </div>

            </div>

            {{-- Top Categories --}}
            <div class="dashboard-section mb-4">

                <div class="section-header d-flex align-items-center">
                    <span class="title-icon bg-soft-orange fs-16 me-2">
                        <i class="ti ti-users"></i>
                    </span>
                    <h5 class="section-title mb-0">Top Categories</h5>
                </div>

                <div class="section-body">

                    <div class="row">
                        @forelse($topCategories ?? [] as $cat)
                            <div class="col-md-4 mb-3">
                                <div class="dashboard-card">
                                    <p class="dashboard-title mb-1">
                                        {{ $cat->title }}
                                    </p>
                                    <h2 class="dashboard-count">
                                        {{ $cat->products_count }}
                                        <span class="fs-13 fw-normal text-default ms-1">
                                            Products
                                        </span>
                                    </h2>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted text-center mb-0">
                                    No categories found
                                </p>
                            </div>
                        @endforelse
                    </div>

                    <div class="border br-8 p-2 mt-3">
                        <div class="d-flex align-items-center justify-content-between border-bottom p-2">
                            <p class="mb-0">Total Number Of Categories</p>
                            <h5>{{ $counts['categories'] ?? 0 }}</h5>
                        </div>

                        <div class="d-flex align-items-center justify-content-between p-2">
                            <p class="mb-0">Total Number Of Products</p>
                            <h5>{{ $counts['products'] ?? 0 }}</h5>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <div class="dashboard-footer d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <p class="fs-13 text-gray-9 mb-0">
                © 2026 StarSigns. All Rights Reserved.
            </p>

            <p class="mb-0">
                Designed & Developed By
                <a href="https://www.thiven.com/" target="_blank" rel="noopener"
                    class="link-primary">
                    ThiVen
                </a>
            </p>
        </div>

    </div>
@endsection