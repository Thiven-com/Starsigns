@extends('layout.mainlayout')

@section('content')

    <div class="page-wrapper">
        <div class="content">

            <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
                <div>
                    <h4 class="mb-1">Testimonials</h4>
                    <h6 class="text-muted">Manage Your Testimonials</h6>
                </div>


            </div>


            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card table-list-card" style="border: transparent;">
                <div class="card-body">

                    <!-- Top Bar -->
                    <div class="table-top d-flex justify-content-between align-items-center">
                        <h5>Edit Testimonial</h5>

                        <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
                            Back
                        </a>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('admin.testimonial.update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row mt-3">

                            <!-- Name -->
                            <div class="col-lg-6 mb-3">
                                <label>Name *</label>

                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $testimonial->name) }}">
                            </div>

                            <!-- Image -->
                            <div class="col-lg-6 mb-3">
                                <label>Image</label>

                                <input type="file" name="image" class="form-control">

                                <!-- Old Image -->
                                @if($testimonial->image)
                                    <img src="{{ asset($testimonial->image) }}" width="80" class="mt-2 rounded">
                                @endif
                            </div>

                            <!-- Rating -->
                            <div class="col-lg-6 mb-3">
                                <label>Rating *</label>

                                <input type="number" name="rating" class="form-control" min="1" max="5"
                                    value="{{ old('rating', $testimonial->rating) }}">
                            </div>

                            <!-- Date -->
                            <div class="col-lg-6 mb-3">
                                <label>Date *</label>

                                <input type="date" name="date" class="form-control"
                                    value="{{ old('date', \Carbon\Carbon::parse($testimonial->date)->format('Y-m-d')) }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label>Status <span class="text-danger">*</span></label>

                                <select name="status" class="form-control">
                                    <option value="pending" {{ old('status', $testimonial->status) == 0 ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="approved" {{ old('status', $testimonial->status) == 1 ? 'selected' : '' }}>
                                        Approved
                                    </option>
                                    <option value="rejected" {{ old('status', $testimonial->status) == 2 ? 'selected' : '' }}>
                                        Rejected
                                    </option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div class="col-lg-12 mb-3">
                                <label>Message *</label>

                                <textarea name="message" class="form-control"
                                    rows="4">{{ old('message', $testimonial->message) }}</textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="col-lg-12 mt-3">

                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>

                                <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>

                            </div>

                        </div>

                    </form>

                </div>
            </div>

        </div>


    </div>
@endsection