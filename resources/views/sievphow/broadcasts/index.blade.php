@extends('layouts.master')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="card card-sm">
                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 14l11 -11"></path>
                                <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                             </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1">Broadcasts List</h3>
                                <div class="markdown text-muted">Broadcasts List is design for show broadcasts list and
                                    read, create, update,and delete operations.
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('/sievphow/broadcasts/create') }}" class="btn btn-primary">
                                        <i class="ti ti-message-plus me-2"></i>
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
                            <p>Broadcast List</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable" id="tableContainerId">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $i => $item)
                                        <tr>
                                            <td><span class="text-muted">{{ ++$i }}</span></td>
                                            <td>
                                                <img src="{{ asset('images/sievphow/broadcasts/'.$item->image) }}" alt="" srcset=""
                                                    class="avatar me-2">
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->body }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td>
                                                <a href="#" type="button" class="btn btn-info btn-edit btn-icon">
                                                    <i class="ti ti-send"></i>
                                                </a>
                                                <a href="{{ url('sievphow/broadcasts/'.$item->id.'/edit') }}" type="button" class="btn btn-warning btn-edit btn-icon">
                                                    <i class="ti ti-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-icon btn-delete"
                                                    data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#modal-danger">
                                                    <i class="ti ti-playlist-x"></i>
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

    <div class="modal modal-blur fade" id="modal-success-delete" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
          <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-success"></div>
            <div class="modal-body text-center py-4">
              <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
              <h3>Delete succedeed</h3>
              <div class="text-muted">Your has been deleted successfully.</div>
            </div>
            <div class="modal-footer">
              <div class="w-100">
                <div class="row">
                  <div class="col">
                    <a href="{{ url('/sievphow/broadcasts') }}" class="btn btn-success btn-reload w-100">
                      Okay
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

            var _id;
            $('body').on('click', '.btn-delete', function() {
                _id = $(this).data("id");
            });


            $('body').on('click', '.btn-modal-delete', function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('sievphow/broadcasts') }}" + '/' + _id,
                    success: function(data) {
                        $('#modal-success-delete').modal('toggle');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
            $('body').on('click', '.btn-reload, .btn-close', function() {
                location.reload();
                // $("#tableContainerId").load("{{ url('sievphow/broadcasts') }}");
            });

        });
    </script>
@endsection
