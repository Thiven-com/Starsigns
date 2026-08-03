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

        <!-- Page Header -->
        <div class="page-header">

            <div class="add-item d-flex">

                <div class="page-title">
                    <h4>Reviews</h4>
                    <h6>Manage customer reviews</h6>
                </div>

            </div>

            <ul class="table-top-head"></ul>

        </div>

        <!-- Review List -->
        <div class="card">

            <!-- Search Filter -->
            <div class="card mb-3 p-3">

                <form method="GET" class="row g-2">

                    <div class="col-md-4">
                        <label class="form-label">Search</label>

                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               class="form-control"
                               placeholder="Search by customer name or title">
                    </div>

                </form>

            </div>

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table">

                        <thead class="thead-light">
                            <tr>
                                <th>S.No</th>
                                <th>Image</th>
                                <th>Product ID</th>
                                <th>Customer</th>
                                <th>Rating</th>
                                <th>Title</th>
                                <th>Review</th>
                                <th>Date</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($reviews as $key => $review)

                                <tr>

                                    <td>
                                        {{ $key + 1 }}
                                    </td>

                                    <td>

                                        @if($review->image)

                                            <img src="{{ asset($review->image) }}"
                                                 alt="Review Image"
                                                 width="50"
                                                 height="50"
                                                 class="rounded border object-fit-cover">

                                        @else

                                            <span class="badge bg-light text-dark border">
                                                No Image
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        #{{ $review->product_id }}
                                    </td>

                                    <td>

                                        <div class="fw-semibold">
                                            {{ $review->name }}
                                        </div>

                                        @if($review->email)
                                            <small class="text-muted">
                                                {{ $review->email }}
                                            </small>
                                        @endif

                                    </td>

                                    <td>

                                        <span class="badge bg-warning text-dark">
                                            {{ $review->rating }} ★
                                        </span>

                                    </td>

                                    <td>

                                        <div class="fw-medium">
                                            {{ $review->title }}
                                        </div>

                                    </td>

                                    <td>

                                        <span title="{{ $review->review }}">
                                            {{ \Illuminate\Support\Str::limit($review->review, 40) }}
                                        </span>

                                    </td>

                                    <td>
                                        {{ $review->created_at->format('d M Y') }}
                                    </td>

                                    <td class="text-end">

                                        <div class="d-flex align-items-center justify-content-end gap-2">

                                            {{-- <a href="{{ route('admin.reviews.show', $review->id) }}"
                                               class="btn btn-sm btn-info">
                                                <i class="ti ti-eye"></i>
                                            </a> --}}

                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this review?');">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-danger">
                                                    <i class="ti ti-trash"></i>
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="9" class="text-center py-4">

                                        <div class="text-muted">
                                            No reviews found.
                                        </div>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                @if(method_exists($reviews, 'links'))

                    <div class="p-3">
                        {{ $reviews->links('pagination::bootstrap-5') }}
                    </div>

                @endif

            </div>

        </div>

    </div>

    <div class="footer d-sm-flex align-items-center justify-content-between border-top bg-white p-3">
    </div>

</div>

@endsection
