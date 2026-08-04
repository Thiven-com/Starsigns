
@extends('layout.mainlayout')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Subscriptions</h4>
                        <h6>Manage your subscribers</h6>
                    </div>
                </div>
            </div>

            <!-- Subscription list -->
            <div class="card">

                <div class="card mb-3 p-3">
                    <form method="GET" class="row g-2">

                        <div class="col-md-4">
                            <label class="form-label">Search</label>

                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   class="form-control"
                                   placeholder="Search email...">
                        </div>

                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">
                                Filter
                            </button>
                        </div>

                        {{-- <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('subscriptions.all') }}"
                               class="btn btn-outline-secondary w-100">
                                Clear
                            </a>
                        </div> --}}

                    </form>
                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-striped align-middle">

                            <thead class="thead-light">
                                <tr>
                                    <th width="80">S.No</th>
                                    <th>Email</th>
                                    <th width="150">Status</th>
                                    <th width="180">Subscribed On</th>
                                    <th width="120">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($subscriptions as $index => $subscription)

                                    <tr>

                                        <td>
                                            {{ $subscriptions->firstItem() + $index }}
                                        </td>

                                        <td>
                                            {{ $subscription->email }}
                                        </td>

                                        <td>

                                            @if($subscription->status == 'active')

                                                <span class="badge bg-success">
                                                    Active
                                                </span>

                                            @else

                                                <span class="badge bg-secondary">
                                                    Inactive
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $subscription->created_at->format('d M Y h:i A') }}
                                        </td>

                                        <td>

                                            <form action="{{ route('admin.subscriptions.destroy', $subscription->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this subscription?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">

                                                    <i class="ti ti-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            No subscriptions found.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    @if(method_exists($subscriptions, 'links'))

                        <div class="p-3">
                            {{ $subscriptions->links('pagination::bootstrap-5') }}
                        </div>

                    @endif

                </div>
            </div>
            <!-- /Subscription list -->

        </div>

        <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
        </div>
    </div>

@endsection