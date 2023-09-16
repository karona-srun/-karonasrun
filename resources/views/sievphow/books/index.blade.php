@extends('layouts.master')

@section('css')
<style>
    .btn-icon {
    padding: 0px;
    }
</style>
    
@endsection
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
                                <h3 class="h1">Book List</h3>
                                <div class="markdown text-muted">Book List is design for show book list and
                                    read, create, update,
                                    and delete operations.
                                </div>
                                <div class="mt-3">
                                    <a href="/sievphow/book/create" class="btn btn-primary">
                                        <i class="ti ti-playlist-add"></i>
                                        Create new
                                    </a>
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
                            <p>Book List</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Images</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Is Enabled</th>
                                        <th>Is Free</th>
                                        <th>Price</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $i => $item)
                                        <tr>
                                            <td><span class="text-muted">{{ ++$i }}</span></td>
                                            <td>
                                                <img src="{{ asset('/images/sievphow/books/'.$item->image) }}" alt="" srcset=""
                                                    class="avatar me-2">
                                            </td>
                                            <td>{{ $item->category->name_kh
                                             }} <br> {{ $item->category->name_en }}</td>
                                            <td>{{ $item->title_kh }} <br> {{ $item->title_en }}</td>
                                            <td>{{ $item->is_enabled ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->is_free ? 'Yes' : 'No' }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->author }}</td>
                                            <td>{{ $item->publisher }}</td>
                                            <td>
                                                <a href="{{ url('/sievphow/book',$item->id) }}" class="btn btn-link btn-show btn-icon"
                                                    data-id="{{ $item->id }}">
                                                    <img src="{{ asset('images/icons/u_documents.png')}}" width="30px" height="30px" alt="" srcset="">
                                                </a>
                                                <a href="{{ route('book.edit',$item->id) }}" class="btn  btn-show  btn-link btn-icon"
                                                    data-id="{{ $item->id }}">
                                                    <img src="{{ asset('images/icons/u_edit.png')}}" width="30px" height="30px" alt="" srcset="">
                                                </a>
                                                <button type="button" class="btn btn-link btn-icon btn-delete"
                                                    data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#modal-danger">
                                                    <img src="{{ asset('images/icons/u_trash.png')}}" width="32px" height="32px" alt="" srcset="">
                                                </button>
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
    <div class="modal modal-blur fade" id="modal-book-category" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="contentTypeForm" name="contentTypeForm" method="post" class="form-horizontal"
                    enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Book Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="" class="form-control">
                            <div class="col-sm-4">
                                <img id="preview-image-before-upload" class="avatar avatar-upload rounded" data-url=""
                                    src="https://icons.veryicon.com/png/o/miscellaneous/mobile-aone/plus-46.png"
                                    alt="preview" style="height: 210px; width: 210px;">
                                <input type="file" id="image" required name="image"
                                    class="form-control form-control-file" accept="image/*" id="exampleFormControlFile1"
                                    style="display: none">
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="co-12 mb-2 align-items-end">
                                        <label class="form-label">Status</label>
                                        <select type="text" name="status" id="select-tags status content_type"
                                            class="form-select" placeholder="Select a video cagetory">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-2 align-items-end">
                                        <label class="form-label">Name as Khmer</label>
                                        <input type="text" name="name_kh" id="name_kh" class="form-control name_kh">
                                    </div>
                                    <div class="col-12 mb-2 align-items-end">
                                        <label class="form-label">Name as English</label>
                                        <input type="text" name="name_en" id="name_en" class="form-control name_en">
                                    </div>
                                </div>
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
                    url: "{{ url('api/sievphow/book-categories') }}",
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
                $.get("{{ url('api/sievphow/book-categories') }}" + '/' + id + '/edit', function(data) {
                    $('.modal-title').text("Edit Book Category");
                    $('#id').val(id);
                    $('#image').text(data.data.images);
                    $('#status').val(data.data.status);
                    $('#name_kh').val(data.data.name_kh);
                    $('#name_en').val(data.data.name_en);
                    $('select option[value='+data.data.status+']').attr('selected', 'selected');
                    $('#preview-image-before-upload').attr('src', '/images/sievphow/book_category/'+data.data.images);
                })
            });

            $('body').on('click', '.btn-modal-delete', function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('api/sievphow/books') }}" + '/' + _id,
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
@endsection
