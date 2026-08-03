@extends('layout.mainlayout')
@section('content')

  <style>
    :root {
        --theme: #6F42C1;
        --theme-dark: #5A32A3;
        --theme-light: #F3EEFF;
    }

    .page-wrapper {
        background: #F8F5FF;
    }

    .page-header-modern {
        background: linear-gradient(135deg, #6F42C1, #8B5CF6);
        border-radius: 20px;
        padding: 25px 30px;
        margin-bottom: 25px;
        color: #fff;
        box-shadow: 0 10px 25px rgba(111, 66, 193, .25);
    }

    .page-header-modern h3 {
        color: #fff;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .modern-card {
        background: #fff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(111, 66, 193, .08);
        overflow: hidden;
    }

    .table thead th {
        background: #F3EEFF;
        color: var(--theme);
        border: none;
        font-weight: 600;
        padding: 16px;
    }

    .table tbody td {
        padding: 16px;
        vertical-align: middle;
        border-color: #ECE8F8;
    }

    .table tbody tr {
        transition: all .3s ease;
    }

    .table tbody tr:hover {
        background: #FAF8FF;
    }

    .badge-service {
        background: linear-gradient(135deg, #6F42C1, #8B5CF6);
        color: #fff;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
    }

    .action-btn {
        width: 38px;
        height: 38px;
        border: none;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FEE2E2;
        color: #DC2626;
        transition: all .3s ease;
    }

    .action-btn:hover {
        background: #DC2626;
        color: #fff;
        transform: scale(1.05);
    }

    .small-text {
        font-size: 13px;
        color: #6B7280;
    }
</style>

    <div class="page-wrapper">
        <div class="content">

            <!-- Header -->
            <div class="page-header-modern">
                <h3>Service Requests</h3>
                <p class="mb-0">Manage all service bookings from website</p>
            </div>

            <!-- Filters -->
            <div class="modern-card mb-3 p-3">

                <form method="GET" action="{{ route('admin.servicerequest') }}">

                    <div class="row g-2 align-items-end">

                        <!-- Search -->
                        <div class="col-md-4">
                            <label class="small-text">Search</label>
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Name">
                        </div>

                        <!-- Service Filter -->
                        <div class="col-md-4">
                            <label class="small-text">Service</label>
                            <select name="service" class="form-control" required>
                                <option value="">Select Service</option>

                                <option value="Book Ambulance" {{ request('service') == 'Book Ambulance' ? 'selected' : '' }}>
                                    Book Ambulance</option>

                                <option value="Hospital Admission Assistance" {{ request('service') == 'Hospital Admission Assistance' ? 'selected' : '' }}>Hospital Admission Assistance</option>

                                <option value="Surgical Quotations" {{ request('service') == 'Surgical Quotations' ? 'selected' : '' }}>Surgical Quotations</option>

                                <option value="Doctor Appointments" {{ request('service') == 'Doctor Appointments' ? 'selected' : '' }}>Doctor Appointments</option>

                                <option value="Discount Coupons" {{ request('service') == 'Discount Coupons' ? 'selected' : '' }}>Discount Coupons</option>

                                <option value="Book Diagnostic Test" {{ request('service') == 'Book Diagnostic Test' ? 'selected' : '' }}>Book Diagnostic Test</option>

                                <option value="Book Scans" {{ request('service') == 'Book Scans' ? 'selected' : '' }}>Book
                                    Scans</option>

                                <option value="Health Checkup Packages" {{ request('service') == 'Health Checkup Packages' ? 'selected' : '' }}>Health Checkup Packages</option>

                                <option value="Home Visit Lab Test" {{ request('service') == 'Home Visit Lab Test' ? 'selected' : '' }}>Home Visit Lab Test</option>

                                <option value="Home Care Services" {{ request('service') == 'Home Care Services' ? 'selected' : '' }}>Home Care Services</option>

                                <option value="Online Pharmacy" {{ request('service') == 'Online Pharmacy' ? 'selected' : '' }}>Online Pharmacy</option>

                                <option value="Health Records" {{ request('service') == 'Health Records' ? 'selected' : '' }}>
                                    Health Records</option>

                                <option value="Get Membership" {{ request('service') == 'Get Membership' ? 'selected' : '' }}>
                                    Get Membership</option>
                            </select>
                        </div>

                        <!-- Date -->
                        <div class="col-md-3">
                            <label class="small-text">Date</label>
                            <input type="date" name="date" value="{{ request('date') }}" class="form-control">
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-1 d-grid">
                            <button class="btn btn-primary">
                                Filter
                            </button>
                        </div>

                    </div>

                </form>

            </div>

            <!-- Table Card -->
            <div class="modern-card">

                <div class="table-responsive">

                    <table class="table mb-0 align-middle">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                                <th width="80">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($requests as $key => $req)

                                <tr>
                                    <td>{{ $key + 1 }}</td>

                                    <td>
                                        <span class="badge-service">
                                            {{ $req->service }}
                                        </span>
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $req->name }}
                                    </td>

                                    <td>{{ $req->mobile }}</td>

                                    <td class="small-text">
                                        {{ $req->email ?? '-' }}
                                    </td>

                                    <td class="small-text">
                                        {{ \Illuminate\Support\Str::limit($req->message, 80) ?? '-' }}
                                    </td>

                                    <td class="small-text">
                                        {{ $req->created_at->format('d M Y') }}
                                    </td>

                                    <td>

                                        <form action="{{ route('admin.servicerequest.delete', $req->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn">
                                                <i class="ti ti-trash"></i>
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <h5>No Service Requests Found</h5>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection