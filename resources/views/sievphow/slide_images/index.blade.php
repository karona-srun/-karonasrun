@extends('layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="card card-sm">
                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7">
                                </path>
                                <line x1="10" y1="10" x2="10.01" y2="10"></line>
                                <line x1="14" y1="10" x2="14.01" y2="10"></line>
                                <path d="M10 14a3.5 3.5 0 0 0 4 0"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1">Slide Images List</h3>
                                <div class="markdown text-muted">Slide Images List is design for show slide images list and
                                    read, create, update,
                                    and delete operations.
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('sievphow/slide-image/create') }}" class="btn btn-primary">
                                        <i class="ti ti-playlist-add"></i>
                                        Create new
                                    </a>
                                    {{-- <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modal-sievphow-image-slide">
                                        <i class="ti ti-playlist-add"></i>
                                        Create new
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p>Slide Image List</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                aria-label="Select all invoices"></th>
                                        <th>No</th>
                                        <th>Images</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Deleted At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $i => $item)
                                        <tr>
                                            <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                    aria-label="Select invoice"></td>
                                            <td><span class="text-muted">{{ ++$i }}</span></td>
                                            <td>
                                                <img src="{{ asset($item->image) }}" alt="" srcset=""
                                                    class="avatar me-2">
                                            </td>
                                            <td>{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>{{ $item->deleted_at }}</td>
                                            <td>
                                                <div class="row g-2 align-items-center">
                                                    <div class="col-6 col-sm-4 col-md-2 col-xl-auto">
                                                       <a href="{{ url('sievphow/slide-image/'. $item->id .'/edit') }}" class="btn btn-warning btn-edit btn-icon me-2">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                      </div>
                                                      <div class="col-6 col-sm-4 col-md-2 col-xl-auto py-3">
                                                       <form action="{{ url('sievphow/slide-image/'. $item->id )}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-icon btn-delete">
                                                    <i class="ti ti-playlist-x"></i>
                                                </button>
                                            </form>
                                                      </div>
                                        </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            <p class="m-0 text-muted">Showing <span>1</span> to <span>{{ $datas->count() }}</span> of
                                <span>{{ $datas->total() }}</span> entries
                            </p>
                            @if ($datas->lastPage() > 1)
                                <ul class="pagination m-0 ms-auto">
                                    @if ($datas->currentPage() != 1 && $datas->lastPage() >= 5)
                                        <li class="page-item me-3">
                                            <a href="{{ $datas->url($datas->url(1)) }}" aria-label="Previous"
                                                class="page-link">
                                                <span aria-hidden="true">First</span>
                                            </a>
                                        </li>
                                    @endif
                                    {{-- @if ($datas->currentPage() != 1) --}}
                                    <li class="page-item">
                                        <a href="{{ $datas->url($datas->currentPage() - 1) }}" class="page-link me-2"
                                            aria-label="Previous">
                                            <i class="ti ti-chevron-left mr-5"
                                                style="position: absolute; margin-left: -20px;"></i>
                                            <span aria-hidden="true">Prev</span>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                    @for ($i = max($datas->currentPage() - 2, 1); $i <= min(max($datas->currentPage() - 2, 1) + 4, $datas->lastPage()); $i++)
                                        @if ($datas->currentPage() == $i)
                                            <li class="active page-item">
                                            @else
                                            <li>
                                        @endif
                                        <a href="{{ $datas->url($i) }}" class="page-link">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    {{-- @if ($datas->currentPage() != $datas->lastPage()) --}}
                                    <li class="page-item">
                                        <a href="{{ $datas->url($datas->currentPage() + 1) }}" class="page-link"
                                            aria-label="Next">
                                            <span aria-hidden="true">Next</span>
                                            <i class="ti ti-chevron-right" style="position: absolute"></i>
                                        </a>
                                    </li>
                                    {{-- @endif --}}
                                    @if ($datas->currentPage() != $datas->lastPage() && $datas->lastPage() >= 5)
                                        <li class="page-item mx-3">
                                            <a href="{{ $datas->url($datas->lastPage()) }}" class="page-link"
                                                aria-label="Next">
                                                <span aria-hidden="true">Last</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal modal-blur fade" id="modal-sievphow-image-slide" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="contentTypeForm" name="contentTypeForm" method="post" class="form-horizontal"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">New Image Slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3 align-items-end">
                            <input type="hidden" name="id" id="id" value="" class="form-control">
                            <div class="col-auto">
                                <img id="preview-image-before-upload" class="avatar avatar-upload rounded" data-url=""
                                    src="https://icons.veryicon.com/png/o/miscellaneous/standard-general-linear-icon/plus-60.png"
                                    alt="preview" style="height: 64px; width: 64px;">
                                <input type="file" id="image" required name="image"
                                    class="form-control form-control-file" accept="image/*" id="exampleFormControlFile1"
                                    style="display: none">
                            </div>
                            <div class="col">
                                <label class="form-label">Status</label>
                                <select type="text" name="status" id="select-tags status content_type" class="form-select"
                                    placeholder="Select a video cagetory">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ms-auto" id="btn-save" data-bs-dismiss="modal">
                            <i class="ti ti-file-check me-2"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to remove video category? What you've done cannot be undone.
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><a href="#" class="btn btn-danger btn-modal-delete w-100"
                                    data-bs-dismiss="modal">
                                    Delete
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-success" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    <h3>Create successed</h3>
                    <div class="text-muted">Your created has been successfully submitted.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-success w-100 btn-reload"
                                    data-bs-dismiss="modal">
                                    Done
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-success-update" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-success"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2l4 -4" />
                    </svg>
                    <h3>Update successed</h3>
                    <div class="text-muted">Your updated has been successfully submitted.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-success w-100 btn-reload"
                                    data-bs-dismiss="modal">
                                    Done
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-success-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 9v2m0 4v.01" />
                        <path
                            d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                    </svg>
                    <h3>Delete successed</h3>
                    <div class="text-muted">Your delete has been successfully submitted.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn btn-danger w-100 btn-reload"
                                    data-bs-dismiss="modal">
                                    Done
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.avatar-upload').click(function() {
                $('#image').trigger('click');
            })

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('body').on('click', '.avatar-upload', function() {
                var url = $('#image').text();
            });

            $('body').on('click', '.btn-reload', function() {
                location.reload();
            })

            $('body').on('click', '.btn-create', function() {
                $('#contentTypeForm').trigger("reset");
                $('.modal-title').text("New Image Slide");
            });

            $('#contentTypeForm').submit(function(e) {
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    data: formData,
                    url: "{{ url('api/sievphow/slide') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $('#contentTypeForm').trigger("reset");
                        console.log(data.progress_status)
                        if(data.progress_status == true){
                            $('#modal-success').modal('toggle');
                        }else{
                            $('#modal-updated').modal('toggle');
                        }
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            var _id;
            $('body').on('click', '.btn-delete', function() {
                _id = $(this).data("id");
            });

            $('body').on('click', '.btn-edit', function() {
                var id = $(this).data('id');
                $.get("{{ url('api/sievphow/slide') }}" + '/' + id + '/edit', function(data) {
                    $('.modal-title').text("Edit Image Slide");
                    $('#id').val(id);
                    $('#image').text(data.data.image);
                    $('#status').val(data.data.status);
                    $('select option[value='+data.data.status+']').attr('selected', 'selected');
                    $('#preview-image-before-upload').attr('src', data.data.image);
                })
            });

            $('body').on('click', '.btn-modal-delete', function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('api/sievphow/slide') }}" + '/' + _id,
                    success: function(data) {
                        location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>

    @if(!empty(Session::get('code')) && Session::get('code') == 1)
    <script>
    $(document).ready(function() {
        $('#modal-success').modal('show');
    });
    </script>
    @endif
    @if(!empty(Session::get('code')) && Session::get('code') == 2)
    <script>
    $(document).ready(function() {
        $('#modal-success-update').modal('show');
    });
    </script>
    @endif
    @if(!empty(Session::get('code')) && Session::get('code') == 3)
    <script>
    $(document).ready(function() {
        $('#modal-success-delete').modal('show');
    });
    </script>
    @endif
    
@endsection
