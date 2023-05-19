<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('logo/Logo_white.png') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Quantico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <style>
        body {
            background: #fff8ed;
            font-family: 'Quantico', sans-serif;
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
    </style>
</head>

<body>

    <div class="container">
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <img src="{{ asset('logo/Logo.png') }}" class="logo" alt="" srcset="">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">{{ __("app.home_page") }}</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">{{ __("app.project_page") }}</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">{{ __("app.pricing_page") }}</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">{{ __("app.faqs_page") }}</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">{{ __("app.about_page") }}</a></li>
                @if(session()->get('lang') == 'en')
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
                        <a href="{{ url('/home') }}" class="btn btn-outline-primary me-2">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ __("app.login_button") }}</a>
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
                        <h1 class="h2">{{ __("app.hi_label") }}</h1>
                        <h1 class="h2">{{ __("app.intro_label") }}</h1>
                        <p>{{ __("app.follow_label") }}</p>
                        <p>
                            <a class="btn btn-outline-primary" href="https://www.facebook.com/karona.srun"
                                target="_blank"><i class="ti ti-brand-facebook"></i></a>
                            <a class="btn btn-outline-dark" href="https://github.com/karona-srun" target="_blank"> <i
                                    class="ti ti-brand-github"></i></a>

                        </p>
                        <p>{{ __("app.thanks_label") }} <span class="text-danger">♥</span></p>
                    </div>
                </div>

            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
                integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
                integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
            </script>
    </body>

    </html>
