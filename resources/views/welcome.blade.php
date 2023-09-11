<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Karona Developer</title>

    <link rel="shortcut icon" href="{{ asset('logo/Logo_white.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #ffffff;
            /* font-family: 'Quantico', sans-serif; */
            font-family: 'Kantumruy Pro', sans-serif;
        }

        .img-35 {
            width: 35px;
        }

        .logo {
            width: 35px;
        }

        .box {
            position: absolute;
            padding: 10px;
            border-radius: 2px;
            border: 8px solid #000000
        }

        .h2,
        h2 {
            font-size: 2rem;
            line-height: 1.5;
        }

        .form-control,
        .btn,
        .card,
        .card-img,
        .card-img-top {
            border-radius: 2px;
        }

        #scroll-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .border-top-wide {
            border-top: 2px solid rgb(13 110 252) !important;
        }
    </style>
</head>

<body>
    <button id="scroll-to-top" class="btn btn-outline-primary"><i
            class="text-lg bi bi-arrow-up-square me-2"></i>{{ __('app.scroll_top') }}</button>
    <div class="container-fluid bg-light border-top-wide" id="home_page">
        <div class="container">
            <header
                class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
                <a href="/"
                    class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    <img src="{{ asset('logo/Logo.png') }}" class="logo" alt="" srcset="">
                </a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#home_page" class="nav-link px-2 link-secondary"><i
                                class="bi bi-house me-1"></i>{{ __('app.home_page') }}</a></li>
                    <li><a href="#project_page" class="nav-link px-2 link-dark"><i
                                class="bi bi-file-earmark-code me-1"></i>{{ __('app.project_page') }}</a></li>
                    <li><a href="#services_page" class="nav-link px-2 link-dark"><i
                                class="bi bi-mouse me-1"></i>{{ __('app.services_page') }}</a></li>
                    <li><a href="#faqs_page" class="nav-link px-2 link-dark">{{ __('app.faqs_page') }}</a></li>
                    <li><a href="#about_page" class="nav-link px-2 link-dark"><i
                                class="bi bi-shield-exclamation me-1"></i>
                            {{ __('app.about_page') }}</a></li>
                    @if (session()->get('lang') == 'en')
                        <li>
                            <a href="{{ url('lang/kh') }}" class="nav-link px-2 link-dark">
                                <img src="{{ asset('flags/en.png') }}" class="img-35" alt="" srcset="">
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('lang/en') }}" class="nav-link px-2 link-dark">
                                <img src="{{ asset('flags/kh.png') }}" class="img-35" alt="" srcset="">
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="col-md-3 text-end">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-outline-primary me-2"><i
                                    class="bi bi-house me-1"></i> Home</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2"> <i
                                    class="bi bi-arrow-right-square me-1"></i> {{ __('app.login_button') }}</a>
                        @endif
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Sign-up</a>
                        @endif
                    </div>
                </header>
            </div>

            <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="mb-3">{{ __('app.hi_label') }}</h1>
                            <h2>{{ __('app.intro_label') }}</h2>
                            <h5 class="mt-3 mb-3">{{ __('app.follow_label') }}</h5>
                            <p>
                                <a class="btn btn-outline-primary" href="https://www.facebook.com/karona.srun"
                                    target="_blank"><i class="ti ti-brand-facebook"></i></a>
                                <a class="btn btn-outline-dark" href="https://github.com/karona-srun" target="_blank"> <i
                                        class="ti ti-brand-github"></i></a>

                            </p>
                            <h5>{{ __('app.thanks_label') }} <span class="text-danger">♥</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" id="project_page">
            <div class="container pt-3 pb-5">
                <div class="row rounded">
                    <section class="text-center container">
                        <div class="row py-lg-2 px-lg-2">
                            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto">
                                <h3 class="fw-light mb-4"><i
                                        class="bi bi-file-earmark-code me-1"></i>{{ __('app.project_page') }}</h3>
                                <p class="lead text-muted">{{ __('app.label_project_info') }}</p>
                            </div>
                        </div>
                    </section>
                    <div class="album">
                        <div class="">

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect><text
                                                x="50%" y="50%" fill="#eceeef"
                                                dy=".3em">Thumbnail</text>
                                        </svg>

                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect><text
                                                x="50%" y="50%" fill="#eceeef"
                                                dy=".3em">Thumbnail</text>
                                        </svg>

                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card shadow-sm">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect><text
                                                x="50%" y="50%" fill="#eceeef"
                                                dy=".3em">Thumbnail</text>
                                        </svg>

                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="card shadow-sm">
                                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                            xmlns="http://www.w3.org/2000/svg" role="img"
                                            aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                            focusable="false">
                                            <title>Placeholder</title>
                                            <rect width="100%" height="100%" fill="#55595c"></rect><text
                                                x="50%" y="50%" fill="#eceeef"
                                                dy=".3em">Thumbnail</text>
                                        </svg>

                                        <div class="card-body">
                                            <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">View</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-outline-secondary">Edit</button>
                                                </div>
                                                <small class="text-muted">9 mins</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <h2 class="fw-bold text-body-emphasis">Left-aligned title explaining these awesome features
                            </h2>
                            <p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.
                                We'll add onto it with another sentence and probably just keep going until we run out of
                                words.</p>
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
                                        <img src="{{ asset('logo/mobile-development.png') }}" alt=""
                                            srcset="" width="128px" height="128px">
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
                                        <img src="{{ asset('logo/api.png') }}" alt="" srcset=""
                                            width="128px" height="128px">
                                    </div>
                                    <h4 class="fw-semibold mb-0 text-body-emphasis">{{ __('app.label_apis') }}</h4>
                                    <p class="text-body-secondary">{{ __('app.label_apis_info') }}</p>
                                </div>

                                <div class="col d-flex flex-column gap-2">
                                    <div
                                        class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-warning bg-gradient fs-4 rounded-3 p-3">
                                        <img src="{{ asset('logo/design.png') }}" alt="" srcset=""
                                            width="128px" height="128px">
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

        </div>

        <div class="container-fluid bg-light" id="about_page">
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mt-3 mb-3"><i class="bi bi-shield-exclamation me-1"></i>
                            {{ __('app.about_page') }}</h3>
                        <p>{{ __('app.about_page_info') }}</p>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ url('/') }}" method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingName" placeholder="Name">
                                <label for="floatingName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="bi bi-send-fill me-1"></i>
                                Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(function() {
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 500) {
                        $('#scroll-to-top').fadeIn();
                    } else {
                        $('#scroll-to-top').fadeOut();
                    }
                });
                $('#scroll-to-top').click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                });
            });
        </script>
    </body>

    </html>
