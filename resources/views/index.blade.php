@extends('layouts.frontend')

@section('contents')
    <div class="container-fluid" id="project_page">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mx-auto pb-2">
                    <div class="mb-3">
                        <h3><i class="bi bi-file-earmark-code me-1"></i>{{ __('app.project_page') }}
                        </h3>
                    </div>
                    <p class="text-muted">{{ __('app.label_project_info') }}</p>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                    {{-- <div class="col">
                        <div class="card">
                            <img class="card-img-top p-3" src="{{ asset('logo/mobile-development.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('app.label_web_application') }}</h5>
                                <p class=" text-primary">{{ __('app.label_web_application') }}</p>
                                <p class="card-text">{{ __('app.label_web_application_info') }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ url('projects/show/1') }}" class="btn display-7">បន្តការអាន</a>
                                <i class="bi bi-arrow-right-circle me-3 display-8"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top p-3" src="{{ asset('logo/mobile-development.png') }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('app.label_web_application') }}</h5>
                                <p class="card-text">{{ __('app.label_web_application_info') }}</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ url('projects/show/1') }}" class="btn display-7">បន្តការអាន</a>
                                <i class="bi bi-arrow-right-circle me-3 display-8"></i>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid" id="services_page">
        <div class="container">
            <div class="mt-5">
                <div class="border-bottom">
                    <h3><i class="bi bi-file-earmark-code me-1"></i>{{ __('app.services_page') }}
                    </h3>
                </div>

                <div class="row row-cols-1 row-cols-md-2 align-items-md-top g-5 py-5">
                    <div class="col d-flex flex-column align-items-start gap-2">
                        <h2 class="fw-bold text-body-emphasis">{{ __('app.services_page_title') }}
                        </h2>
                        <p class="text-muted">{{ __('app.services_page_info') }}​
                            {{ __('app.label_web_application') }} {{ __('app.label_mobile_application') }}
                            {{ __('app.label_tester') }} {{ __('app.label_apis') }}
                            {{ __('app.label_design_logo_and_poster_') }}</p>
                        <a href="#services_page" class="btn btn-primary">{{ __('app.btn_get_more') }}</a>
                    </div>

                    <div class="col">
                        <div class="row row-cols-1 row-cols-sm-2 g-4">
                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3 p-3">
                                    <img src="{{ asset('logo/web-development.png') }}" alt="" srcset=""
                                        width="128px" height="128px">
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">{{ __('app.label_web_application') }}
                                </h4>
                                <p class="text-body-secondary">{{ __('app.label_web_application_info') }}</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-light bg-gradient fs-4 rounded-3 p-3">
                                    <img src="{{ asset('logo/mobile-development.png') }}" alt="" srcset=""
                                        width="128px" height="128px">
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">
                                    {{ __('app.label_mobile_application') }}</h4>
                                <p class="text-body-secondary">{{ __('app.label_mobile_application_info') }}</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-info  bg-gradient fs-4 rounded-3 p-3">
                                    <img src="{{ asset('logo/software.png') }}" alt="" srcset=""
                                        width="128px" height="128px">
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">{{ __('app.label_tester') }}</h4>
                                <p class="text-body-secondary">{{ __('app.label_tester_info') }}</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-secondary  bg-gradient fs-4 rounded-3 p-3">
                                    <img src="{{ asset('logo/api.png') }}" alt="" srcset="" width="128px"
                                        height="128px">
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">{{ __('app.label_apis') }}</h4>
                                <p class="text-body-secondary">{{ __('app.label_apis_info') }}</p>
                            </div>

                            <div class="col d-flex flex-column gap-2">
                                <div
                                    class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-warning bg-gradient fs-4 rounded-3 p-3">
                                    <img src="{{ asset('logo/design.png') }}" alt="" srcset="" width="128px"
                                        height="128px">
                                </div>
                                <h4 class="fw-semibold mb-0 text-body-emphasis">
                                    {{ __('app.label_design_logo_and_poster') }}</h4>
                                <p class="text-body-secondary">{{ __('app.label_design_logo_and_poster_info') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
