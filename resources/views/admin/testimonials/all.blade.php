<?php $page = 'brand-list'; ?>
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


            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        {{-- <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{ asset('admin/build/img/icons/closes.svg') }}" alt="img"></span>
                            </a>
                        </div> --}}
                        {{-- <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </div> --}}
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
                                <i data-feather="plus"></i> Add Testimonial
                            </a>
                        </div>
                    </div>
                    <!-- Right side (Add Button) -->


                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    {{-- <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th> --}}
                                    <th class="no-sort">
                                        S.no
                                    </th>
                                    <th>Profile Picture</th>
                                    <th>Name</th>
                                    {{-- <th>Designation</th> --}}
                                    <th>Rating</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $testimonial)

                                    <tr>
                                        {{-- <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td> --}}
                                        <td>
                                            {{$i}}
                                        </td>
                                        <td>
                                            @if($testimonial->image)
                                                <img src="{{ asset($testimonial->image) }}" width="60" height="60"
                                                    style="object-fit:cover;border-radius:6px;">
                                            @endif
                                        </td>
                                        <td>
                                            {{$testimonial->name ?? ""}}
                                        </td>
                                        {{-- <td>{{$testimonial->technician->name ?? ""}}</td> --}}
                                        <td>
                                            {{$testimonial->rating ?? ""}}
                                        </td>
                                        <td>
                                            {{$testimonial->message ?? ""}}
                                        </td>
                                        <td>
                                            {{$testimonial->date ?? ""}}
                                        </td>
                                        <td>
                                            {{ $testimonial->status ?? "" }}
                                        </td>

                                        {{-- <td>{{\Carbon\Carbon::parse($testimonial->created_at)->format('d M Y h:i A') ??
                                            ""}}
                                        </td> --}}
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">

                                                <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"
                                                    class="p-2 me-2">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                @if ($testimonial->status == 'pending')
                                                    
                                                    <a href="{{ route('admin.testimonial.approve', $testimonial->id) }}"
                                                        style="background:#28a745; color:#fff; padding:6px 12px; border-radius:5px; text-decoration:none; margin-right:5px;">
                                                        Approve
                                                    </a>

                                                    <a href="{{ route('admin.testimonial.reject', $testimonial->id) }}"
                                                        style="background:#dc3545; color:#fff; padding:6px 12px; border-radius:5px; text-decoration:none;">
                                                        Reject
                                                    </a>
                                                @endif
                                                <a class="confirm-texts p-2" href="javascript:void(0);"
                                                    data-id="{{ $testimonial->id }}"
                                                    data-url="{{ route('admin.services.reviews.destroy', $testimonial->id) }}">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.confirm-texts', function () {
            var reviewId = $(this).data('id');
            var deleteUrl = $(this).data('url');

            var confirmation = confirm('Are you sure you want to delete this Review?');

            if (confirmation) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                        alert(xhr.responseJSON.message);
                    }
                });
            } else {
                console.log('Deletion canceled');
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#add-review').on('hidden.bs.modal', function () {

                $(this).find('form')[0].reset();

                $(this).find('select.select').val('').trigger('change');

            });

        });
    </script>
@endsection