<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">


    {{--  The Default fonts and css   --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
          rel="stylesheet">

    <link href="{{asset('assets/css/template_css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/template_css/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/template_css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/template_css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/template_css/tooplate-gotto-job.css')}}" rel="stylesheet">


    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/images/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('assets/images/favicon/android-chrome-512x512.png') }}">


    {{--  Custom styles pushed  --}}
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('homepage') }}">
            <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid logo-image">
            <div class="d-flex flex-column">
                <strong class="logo-text">StudentSphere</strong>
                <small class="logo-slogan">Empowering Connections, Elevating Futures.</small>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav align-items-center ms-lg-5">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('homepage') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('opportunities.index') }}">Opportunities</a>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarProjectsDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarProjectsDropdown">
                            <li><a class="dropdown-item" href="{{ route('account.projects') }}">My Projects</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('forums') }}">Forum</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('account.profile') }}">Account</a>
                    </li>
                @endauth

                @guest
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link" href="{{ route('register.form') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-btn btn" href="{{ route('login.form') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item ms-lg-auto">
                        <a class="nav-link custom-btn btn" href="{{ route('logout.submit') }}">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<main>
    <div class="container py-5 min-vh-100">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- The content from teh child page! --}}
        @yield('content')

    </div>
</main>

<footer class="site-footer">
    <div class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12 d-flex align-items-center">
                    <p class="copyright-text">Copyright © StudentSphere 2048</p>
                </div>

                <div class="col-lg-5 col-12 mt-2 mt-lg-0  d-flex align-items-center">
                    <p class="text-center">Made with ❤️ by team Wajahat</p>
                </div>

                <div class="col-lg-3 col-12 mt-2 d-flex align-items-center mt-lg-0">
                    <p><strong>Team: </strong><span>Wajahat</span></p>
                </div>

                <a class="back-top-icon bi-arrow-up smoothscroll d-flex justify-content-center align-items-center"
                   href="#top"></a>

            </div>
        </div>
    </div>
</footer>

{{-- Main Js files --}}
<script src="{{asset('assets/javascript/jquery.min.js')}}"></script>
<script src="{{asset('assets/javascript/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/javascript/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/javascript/counter.js')}}"></script>
<script src="{{asset('assets/javascript/custom.js')}}"></script>

{{-- Allow child pages to push additional JS --}}
@stack('scripts')
</body>
</html>

