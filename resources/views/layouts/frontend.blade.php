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

        .display-7{
            font-size: 1em;
        }

        .display-8{
            font-size: 1.2em;
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

        /* .card:hover {
            padding: 5px;
            transition-delay: 50ms;
            transition-duration: 500ms;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        } */
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
                    <li><a href="/#home_page" class="nav-link px-2 link-secondary"><i
                                class="bi bi-house me-1"></i>{{ __('app.home_page') }}</a></li>
                    <li><a href="/#project_page" class="nav-link px-2 link-dark"><i
                                class="bi bi-file-earmark-code me-1"></i>{{ __('app.project_page') }}</a></li>
                    <li><a href="/#services_page" class="nav-link px-2 link-dark"><i
                                class="bi bi-mouse me-1"></i>{{ __('app.services_page') }}</a></li>
                    <li><a href="/#faqs_page" class="nav-link px-2 link-dark">{{ __('app.faqs_page') }}</a></li>
                    <li><a href="/#about_page" class="nav-link px-2 link-dark"><i
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

        @yield('contents')

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
                            <h4 class="mb-2">{{ __('app.contact_info') }}</h4>
                            <div class="row g-3">
                                <div class="col">
                            <div class="mb-2">
                                <label for="floatingName" class="form-label">{{ __('app.full_name') }}</label>
                                <input type="text" class="form-control" id="floatingName"
                                    placeholder="{{ __('app.input_name') }}">
                            </div>
                                </div>
                                <div class="col">
                            <div class="mb-2">
                                <label for="floatingInput" class="form-label">{{ __('app.email') }}</label>
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="{{ __('app.input_email') }}">
                            </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="floatingTextarea2" class="form-label">{{ __('app.description') }}</label>
                                <textarea class="form-control" placeholder="{{ __('app.input_description') }}" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-send-fill me-1"></i>
                                {{ __('app.btn_submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <footer class="py-0">
              <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-2">
                <p>© {{ now()->year}} Karona Srun, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="btn btn-outline-primary" href="#"><i class="bi bi-facebook"></i></a></li>
                  <li class="ms-3"><a class="btn btn-outline-danger" href="#"><i class="bi bi-instagram"></i></a></li>
                  <li class="ms-3"><a class="btn btn-outline-primary" href="#"><i class="bi bi-telegram"></i></a></li>
                  <li class="ms-3"><a class="btn btn-outline-secondary" href="#"><i class="bi bi-github"></i></a></li>
                </ul>
              </div>
            </footer>
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
