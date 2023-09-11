@extends('layouts.master')

@section('css')
    <style>
        .card-body {
            border-top: 1px solid #e6e7e900 !important;
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
                        <div class="card-header">
                            <p>Book List</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="{{ asset('/images/sievphow/books/' . $datas->image) }}" class="col-sm-12 mb-3"
                                        alt="" srcset="" class="me-2">
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                            </path>
                                                            <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                        </svg> Title</h3>
                                                    <p class="card-subtitle">
                                                        KHMER: {{ $datas->short_description_kh }}
                                                    </p>
                                                    <p class="card-subtitle">
                                                        ENGLISH: {{ $datas->short_description_en }}
                                                    </p>
                                                </div>

                                                <div class="card-body">
                                                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                            </path>
                                                            <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                        </svg> Category</h3>
                                                    <p class="card-subtitle">
                                                        KHMER: {{ $datas->category->name_kh }}
                                                    </p>
                                                    <p class="card-subtitle">
                                                        ENGLISH: {{ $datas->category->name_en }}
                                                    </p>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="card-body">
                                                            <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <path
                                                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                                    </path>
                                                                    <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                                </svg> Info</h3>
                                                            <p class="card-subtitle">
                                                                Is Enabled: {{ $datas->is_enabled ? 'Yes' : 'No' }}
                                                            </p>
                                                            <p class="card-subtitle">
                                                                Is Free: {{ $datas->is_free ? 'Yes' : 'No' }}
                                                            </p>
                                                            <p class="card-subtitle">
                                                                Price: ${{ $datas->price }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="card-body">
                                                            <h3 class="card-title">.</h3>
                                                            <p class="card-subtitle">
                                                                Author: {{ $datas->author}}
                                                            </p>
                                                            <p class="card-subtitle">
                                                                Favorite: {{ $datas->favorite }}
                                                            </p>
                                                            
                                                            <p class="card-subtitle">
                                                                Publisher: {{ $datas->publisher }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                <div class="card-body">
                                                    <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                            </path>
                                                            <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                        </svg> Attachments</h3>
                                                    <p class="card-subtitle">
                                                        Audio File:
                                                    <div></div>
                                                    <audio controls>
                                                        <source
                                                            src="{{ asset('images/sievphow/audios/' . $datas->audio) }}"
                                                            type="audio/mpeg">
                                                    </audio>
                                                    </p>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                    </path>
                                                    <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                </svg> Attachments</h3>
                                            <p class="card-subtitle">
                                                PDF FIle:
                                            <div></div>
                                            <embed src="{{ asset('images/sievphow/pdfs/' . $datas->pdf) }}"
                                                type="application/pdf" width="100%" height="400px">
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <h3 class="card-title"><svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-album me-2" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path
                                                        d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z">
                                                    </path>
                                                    <path d="M12 4v7l2 -2l2 2v-7"></path>
                                                </svg> Title</h3>
                                            <p class="card-subtitle mt-3">
                                                KHMER: {{ $datas->short_description_kh }}
                                            </p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-subtitle">
                                                ENGLISH: {{ $datas->short_description_en }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
