<?php $page = 'testimonial-create'; ?>
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

            <!-- Form Card -->
            <div class="card table-list-card" style="border: transparent;">
                <div class="card-body">

                    <!-- Top Bar -->
                    <div class="table-top d-flex justify-content-between align-items-center">
                        <div class="search-set">
                            <h5>Add New Testimonial</h5>
                        </div>

                        <div>
                            <a href="{{ route('admin.testimonial.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mt-3">

                            <!-- Customer -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Image *</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>



                            <!-- Rating -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Rating *</label>
                                    <input type="number" name="rating" class="form-control">
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date *</label>
                                    <input type="date" name="date" class="form-control"></input>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Message *</label>
                                    <textarea type="text" name="message" class="form-control" rows="4"></textarea>
                                </div>
                            </div>


                            <!-- Buttons -->
                            <div class="col-lg-12 mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            let reader = new FileReader();
            reader.onload = function () {
                let output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@endsection