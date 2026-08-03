@extends('layout.mainlayout')

@section('content')

    <style>
        .page-title-box {
            background: linear-gradient(135deg, #6F42C1, #8B5CF6);
            border-radius: 15px;
            padding: 25px;
            color: #fff;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(111, 66, 193, .25);
        }

        .appointment-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 30px rgba(111, 66, 193, .08);
        }

        .appointment-card .card-header {
            background: #fff;
            border-bottom: 1px solid #ECE8F8;
            padding: 18px 25px;
        }

        .table thead th {
            background: #F3EEFF;
            border: none;
            font-weight: 600;
            color: #6F42C1;
            white-space: nowrap;
        }

        .table tbody td {
            vertical-align: middle;
            padding: 16px;
            border-color: #ECE8F8;
        }

        .table tbody tr {
            transition: all .3s ease;
        }

        .table tbody tr:hover {
            background: #FAF8FF;
        }

        .avatar-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #8B5CF6, #6F42C1);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 12px;
        }

        .user-box {
            display: flex;
            align-items: center;
        }

        .badge-gender {
            padding: 7px 14px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-male {
            background: #DBEAFE;
            color: #2563EB;
        }

        .badge-female {
            background: #FCE7F3;
            color: #DB2777;
        }

        .badge-other {
            background: #EDE9FE;
            color: #6F42C1;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #FEE2E2;
            color: #DC2626;
            border: none;
            transition: all .3s ease;
        }

        .action-btn:hover {
            background: #DC2626;
            color: #fff;
            transform: scale(1.05);
        }

        .stats-box {
            background: #fff;
            border-radius: 15px;
            padding: 18px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(111, 66, 193, .08);
            margin-bottom: 20px;
            transition: all .3s ease;
        }

        .stats-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(111, 66, 193, .15);
        }
    </style>

    <div class="page-wrapper">
        <div class="content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="page-title-box">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white mb-1">
                            Appointment Management
                        </h2>
                        <p class="mb-0">
                            Manage all booked appointments from one place.
                        </p>
                    </div>

                    <div class="text-end">
                        <h3 class="text-white">{{ $appointments->total() }}</h3>
                        <small>Total Appointments</small>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="stats-box">
                        <h3>{{ $appointments->total() }}</h3>
                        <small>Total Bookings</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-box">
                        <h3>{{ $appointments->where('gender', 'Male')->count() }}</h3>
                        <small>Male</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-box">
                        <h3>{{ $appointments->where('gender', 'Female')->count() }}</h3>
                        <small>Female</small>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stats-box">
                        <h3>{{ date('d M') }}</h3>
                        <small>Today</small>
                    </div>
                </div>

            </div>

            <div class="card appointment-card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        Appointment List
                    </h5>

                    <span class="badge bg-primary">
                        {{ $appointments->total() }} Records
                    </span>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table align-middle mb-0">

                            <thead>

                                <tr>

                                    <th>#</th>
                                    <th>Patient</th>
                                    <th>Contact</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Appointment</th>
                                    <th>Booked On</th>
                                    <th width="100">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($appointments as $key => $appointment)

                                    <tr>

                                        <td>
                                            {{ $appointments->firstItem() + $key }}
                                        </td>

                                        <td>

                                            <div class="user-box">

                                                <div class="avatar-circle">
                                                    {{ strtoupper(substr($appointment->name, 0, 1)) }}
                                                </div>

                                                <div>

                                                    <strong>
                                                        {{ $appointment->name }}
                                                    </strong>

                                                    <br>

                                                    <small class="text-muted">
                                                        {{ $appointment->email }}
                                                    </small>

                                                </div>

                                            </div>

                                        </td>

                                        <td>

                                            {{ $appointment->mobile }}

                                        </td>

                                        <td>

                                            <span class="badge badge-gender
                                        @if($appointment->gender == 'Male') badge-male
                                        @elseif($appointment->gender == 'Female') badge-female
                                        @else badge-other
                                        @endif">

                                                {{ $appointment->gender }}

                                            </span>

                                        </td>

                                        <td>

                                            {{ $appointment->age }}

                                        </td>

                                        <td>

                                            <strong>
                                                {{ date('d M Y', strtotime($appointment->appointment_date)) }}
                                            </strong>

                                            <br>

                                            <small class="text-muted">

                                                {{ date('h:i A', strtotime($appointment->appointment_time)) }}

                                            </small>

                                        </td>

                                        <td>

                                            {{ $appointment->created_at->format('d M Y') }}

                                        </td>

                                        <td>
                                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST"
                                                style="display:inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger action-btn"
                                                    onclick="return confirm('Delete Appointment?')">
                                                    <i class="ti ti-trash"></i>
                                                </button>

                                            </form>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8" class="text-center py-5">

                                            <i class="ti ti-calendar-off fs-1 text-muted"></i>

                                            <h5 class="mt-3">

                                                No Appointments Found

                                            </h5>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

            <div class="mt-4">
                {{ $appointments->links() }}
            </div>

        </div>
    </div>

@endsection