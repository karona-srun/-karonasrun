@extends('layouts.master')
@section('css')
    
@endsection
@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="card card-sm">
                    <div class="card-stamp card-stamp-lg">
                        <div class="card-stamp-icon bg-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M9 17h6"></path>
                                <path d="M9 13h6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <h3 class="h1">Create Broadcast</h3>
                                <div class="markdown text-muted">Broadcast is design for show Broadcast and
                                    read, create, update,
                                    and delete operations.
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('/sievphow/broadcasts') }}" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon me-2 icon-tabler icon-tabler-clipboard-list" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path
                                                d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                            </path>
                                            <path
                                                d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                            </path>
                                            <path d="M9 12l.01 0"></path>
                                            <path d="M13 12l2 0"></path>
                                            <path d="M9 16l.01 0"></path>
                                            <path d="M13 16l2 0"></path>
                                        </svg>
                                        Back
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
            <div class="card">
                <div class=" card-header">
                    <h4>Create Broadcast</h4>
                </div>
                <form action="{{ url('/sievphow/broadcasts') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="col-sm-12 col-md-2 p-3">
                                        <input type="hidden" name="id" id="id" value=""
                                            class="form-control">
                                        <div class="col-sm-12">
                                            <img id="preview-image-before-upload"
                                                class="center col-sm-12 avatar avatar-upload rounded" data-url=""
                                                src="{{ asset('logo/user.png') }}" alt="preview">
                                            <input type="file" id="image" name="image"
                                                class="form-control form-control-file" accept="image/*"
                                                id="exampleFormControlFile1" style="display: none">
                                        </div>
                                    </div> --}}
                    <div class="card-body">
                        <div class="form-group mb-3 ">
                            <label class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-checklist me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                                <path d="M14 19l2 2l4 -4"></path>
                                <path d="M9 8h4"></path>
                                <path d="M9 12h2"></path>
                            </svg>Title </label>
                            <div>
                              <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Input Title">
                              @if ($errors->has('title'))
                              <small class="form-hint text-danger">{{ $errors->first('title') }}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label required"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5"></path>
                             </svg>Image </label>
                            <div class="form-control">
                                <img id="preview-image-before-upload"
                                    class="center col-sm-12 avatar avatar-upload rounded" data-url=""
                                    src="{{ asset('logo/plus_icon.png') }}" alt="preview">
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-file" accept="image/*"
                                    id="exampleFormControlFile1" style="display: none">
                           
                            </div>
                        </div>
                        <div class="form-group mb-3 ">
                            <label class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-keyboard me-2" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M2 6m0 2a2 2 0 0 1 2 -2h16a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-16a2 2 0 0 1 -2 -2z">
                                </path>
                                <path d="M6 10l0 .01"></path>
                                <path d="M10 10l0 .01"></path>
                                <path d="M14 10l0 .01"></path>
                                <path d="M18 10l0 .01"></path>
                                <path d="M6 14l0 .01"></path>
                                <path d="M18 14l0 .01"></path>
                                <path d="M10 14l4 .01"></path>
                            </svg>Body </label>
                            <div>
                                <textarea class="form-control" name="body" rows="6" placeholder="Write something..."
                                style="height: 167px;">{{ old('body') }}</textarea>
                              @if ($errors->has('body'))
                              <small class="form-hint text-danger">{{ $errors->first('body') }}</small>
                              @endif
                            </div>
                        </div>
                    </div>
                    <div class=" card-footer">
                        <button type="reset" class="btn btn-danger me-2"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-square-rounded-minus me-2" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 12h6"></path>
                                <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                            </svg>Cancel</button>
                        <button type="submit" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-square-rounded-check-filled me-2" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z"
                                    fill="currentColor" stroke-width="0"></path>
                            </svg>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('.avatar-upload').click(function() {
                $('#image').trigger('click');
            })

            $('#image').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                $('#preview-image-before-upload').addClass('autoSizeImage');
                $('#preview-image-before-upload').removeClass('center');
            });

            $('body').on('click', '.avatar-upload', function() {
                var url = $('#image').text();
            });

        });
    </script>
@endsection
