@extends('layouts.master')
@section('css')
    <style>
        .avatar-upload {
            border: 1px dashed #fff !important;
        }

        .center {
            transform: translate(85%, 142%);
            padding: 0px;
        }

        .autoSizeImage {
            padding-top: 5px;
            width: 11rem !important;
            height: 15rem !important;
        }
    </style>
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
                                <h3 class="h1">Book Detail</h3>
                                <div class="markdown text-muted">Book List is design for show book list and
                                    read, create, update,
                                    and delete operations.
                                </div>
                                <div class="mt-3">
                                    <a href="{{ url('/sievphow/book') }}" class="btn btn-primary">
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
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ url('sievphow/book') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <p>Book List</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2" style=" height: 250px; border: 1px dashed #e6e7e9;">
                                        <input type="hidden" name="id" id="id" value=""
                                            class="form-control">
                                        <div class="col-sm-12">
                                            <img id="preview-image-before-upload"
                                                class="center col-sm-12 avatar avatar-upload rounded" data-url=""
                                                src="https://icons.veryicon.com/png/o/miscellaneous/mobile-aone/plus-46.png"
                                                alt="preview">
                                            <input type="file" id="image" name="image"
                                                class="form-control form-control-file" accept="image/*"
                                                id="exampleFormControlFile1" style="display: none">
                                        </div>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="">
                                            <div class="row mt-2 mb-3">
                                                <div class="col-sm-6">
                                                    <div class="mb-0">
                                                        <label class="form-label required"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-album me-2"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                </path>
                                                                <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                            </svg> ចំណងជើង</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('title_kh') }}" name="title_kh"
                                                            placeholder="បញ្ចូលចំណងជើង  ">
                                                    </div>
                                                    @if ($errors->has('title_kh'))
                                                        <span class="error text-danger float-start mb-1 mt-1">
                                                            {{ $errors->first('title_kh') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-0">
                                                        <label class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-album me-2"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                </path>
                                                                <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                            </svg> Title</label>
                                                        <input type="text" class="form-control"
                                                            value="{{ old('title_en') }}" name="title_en"
                                                            placeholder="Input title">
                                                    </div>
                                                    @if ($errors->has('title_en'))
                                                        <span class="error text-danger float-start mb-1 mt-1">
                                                            {{ $errors->first('title_en') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-album me-2"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                </path>
                                                                <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                            </svg>Choose Categoty</label>
                                                        <select type="text" class="form-select"
                                                            name="book_categories_id" placeholder="Select a date"
                                                            id="select-users">
                                                            @foreach ($datas as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name_kh }} |
                                                                    {{ $item->name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('book_categories_id'))
                                                        <span class="error text-danger float-start mb-3 mt-1">
                                                            {{ $errors->first('book_categories_id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <circle cx="12" cy="7" r="4">
                                                                </circle>
                                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                            </svg> Author
                                                        </label>

                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <circle cx="12" cy="7" r="4">
                                                                    </circle>
                                                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="text" name="author" class="form-control"
                                                                value="{{ old('author') }}" placeholder="Author">
                                                        </div>
                                                        @if ($errors->has('author'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('author') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-calendar-event"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                </path>
                                                                <path d="M16 3l0 4"></path>
                                                                <path d="M8 3l0 4"></path>
                                                                <path d="M4 11l16 0"></path>
                                                                <path d="M8 15h2v2h-2z"></path>
                                                            </svg> Publisher</label>
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-calendar-event"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                    </path>
                                                                    <path d="M16 3l0 4"></path>
                                                                    <path d="M8 3l0 4"></path>
                                                                    <path d="M4 11l16 0"></path>
                                                                    <path d="M8 15h2v2h-2z"></path>
                                                                </svg>
                                                            </span>
                                                            <input type="date" name="publisher"
                                                                value="{{ old('publisher') }}" class="form-control"
                                                                placeholder="Day-Month-Year">
                                                        </div>
                                                        @if ($errors->has('publisher'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('publisher') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-heart" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                                </path>
                                                            </svg> Favorite</label>
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-heart"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="text" name="favorite"
                                                                value="{{ old('favorite') }}" class="form-control"
                                                                placeholder="Input number">
                                                        </div>
                                                        @if ($errors->has('favorite'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('favorite') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-lock-access"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                                                                <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                                                                <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                                                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                                                                <path
                                                                    d="M8 11m0 1a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1v3a1 1 0 0 1 -1 1h-6a1 1 0 0 1 -1 -1z">
                                                                </path>
                                                                <path d="M10 11v-2a2 2 0 1 1 4 0v2"></path>
                                                            </svg> Is Enabled
                                                        </label>

                                                        <select type="text" class="form-select select-option"
                                                            name="is_enabled" placeholder="Select a date">
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        @if ($errors->has('is_enabled'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('is_enabled') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"> <svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-free-rights"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                stroke-width="2" stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0">
                                                                </path>
                                                                <path
                                                                    d="M13.867 9.75c-.246 -.48 -.708 -.769 -1.2 -.75h-1.334c-.736 0 -1.333 .67 -1.333 1.5c0 .827 .597 1.499 1.333 1.499h1.334c.736 0 1.333 .671 1.333 1.5c0 .828 -.597 1.499 -1.333 1.499h-1.334c-.492 .019 -.954 -.27 -1.2 -.75">
                                                                </path>
                                                                <path d="M12 7v2"></path>
                                                                <path d="M12 15v2"></path>
                                                                <path d="M6 6l1.5 1.5"></path>
                                                                <path d="M16.5 16.5l1.5 1.5"></path>
                                                            </svg> Is Free</label>
                                                        <select type="text" class="form-select select-users is_free"
                                                            name="is_free" placeholder="Select a date">
                                                            <option value="1" selected>Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                        @if ($errors->has('is_free'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('is_free') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label required"><svg
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                class="icon icon-tabler icon-tabler-cash" width="24"
                                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" fill="none"
                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none">
                                                                </path>
                                                                <path
                                                                    d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                                                </path>
                                                                <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                                                <path
                                                                    d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2">
                                                                </path>
                                                            </svg> Price</label>
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-cash"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    stroke-width="2" stroke="currentColor" fill="none"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z"
                                                                        fill="none"></path>
                                                                    <path
                                                                        d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z">
                                                                    </path>
                                                                    <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0">
                                                                    </path>
                                                                    <path
                                                                        d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                            <input type="number" name="price" step="any" readonly
                                                                value="{{ old('price') ?? '0.0' }}"
                                                                class="form-control price" placeholder="Input number">
                                                        </div>
                                                        @if ($errors->has('price'))
                                                            <span class="error text-danger float-start mb-3 mt-1">
                                                                {{ $errors->first('price') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-0">
                                            <label class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-list-details me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M13 5h8"></path>
                                                    <path d="M13 9h5"></path>
                                                    <path d="M13 15h8"></path>
                                                    <path d="M13 19h5"></path>
                                                    <path
                                                        d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                    <path
                                                        d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                </svg>ការពិពណ៌នាខ្លីៗ</label>
                                            <textarea class="form-control" name="short_description_kh" data-bs-toggle="autosize"
                                                placeholder="ការពិពណ៌នាខ្លីៗ..."
                                                style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 100px !important;">{{ old('short_description_kh') }}</textarea>
                                        </div>
                                        @if ($errors->has('short_description_kh'))
                                            <span class="error text-danger float-start mb-3 mt-1">
                                                {{ $errors->first('short_description_kh') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-0">
                                            <label class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-list-details me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M13 5h8"></path>
                                                    <path d="M13 9h5"></path>
                                                    <path d="M13 15h8"></path>
                                                    <path d="M13 19h5"></path>
                                                    <path
                                                        d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                    <path
                                                        d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z">
                                                    </path>
                                                </svg>Short Description</label>
                                            <textarea class="form-control" name="short_description_en" data-bs-toggle="autosize" placeholder="Type something…"
                                                style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 100px; !important">{{ old('short_description_en') }}</textarea>
                                        </div>
                                        @if ($errors->has('short_description_en'))
                                            <span class="error text-danger float-start mb-3 mt-1">
                                                {{ $errors->first('short_description_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-sm-4 mt-3">
                                        <div class="mb-0">
                                            <div class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-vinyl me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M16 3.937a9 9 0 1 0 5 8.063"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M20 4m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M20 4l-3.5 10l-2.5 2"></path>
                                                </svg>Choose File Audio</div>
                                            <input type="file" name="audio" accept=".mp3,audio/*"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has('audio'))
                                            <span class="error text-danger float-start mb-3 mt-1">
                                                {{ $errors->first('audio') }}</span>
                                        @endif
                                    </div> --}}
                                    {{-- <div class="col-sm-4 mt-3">
                                        <div class="mb-0">
                                            <div class="form-label required"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-file-type-pdf me-2  "
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                                    <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4"></path>
                                                    <path d="M5 18h1.5a1.5 1.5 0 0 0 0 -3h-1.5v6"></path>
                                                    <path d="M17 18h2"></path>
                                                    <path d="M20 15h-3v6"></path>
                                                    <path d="M11 15v6h1a2 2 0 0 0 2 -2v-2a2 2 0 0 0 -2 -2h-1z"></path>
                                                </svg>Choose File PDF</div>
                                            <input type="file" name="pdf" accept="application/pdf"
                                                class="form-control">
                                        </div>
                                        @if ($errors->has('pdf'))
                                            <span class="error text-danger float-start mb-3 mt-1">
                                                {{ $errors->first('pdf') }}</span>
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                            <div class=" card-footer">
                                <button type="reset" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-square-rounded-minus me-2" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M9 12h6"></path>
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                    </svg>Cancel</button>
                                <button type="submit" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-square-rounded-check-filled me-2"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
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

            $('.is_free').change(function() {
                var val = $(this).val();

                if (val == 0) {
                    $(".price").attr("readonly", false);
                } else {
                    $(".price").attr("readonly", true);
                    $(".price").val('0.0');
                }
            })
        });
    </script>
@endsection
