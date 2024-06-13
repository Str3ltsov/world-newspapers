<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@yield('title')">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (config('app.env') == 'production')
        <meta name="google-site-verification" content="wFO90JaIl81Ih8190PmKMvXh_QgKPpH6f5WfAXMi9EY" />
    @endif
    <!-- Title -->
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name', 'World Newspapers and Magazines on your Finger Tip | World-Newspapers.com') }}
        @endif
    </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <!-- Styles -->
    @if (config('app.env') == 'production')
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/app-B2_SLc7X.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/app-eCr3CBEp.css') }}">
    @endif
    @stack('styles')
    <!-- Scripts -->
    @if (config('app.env') == 'production')
        <script src="{{ asset('build/assets/app-2TraeheH.js') }}"></script>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-0480756189296182"
            crossorigin="anonymous"></script>
    @else
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script>
        const printSessionErrorMessage = () => {
            const errorMessage = "{{ session('error') }}"
            errorMessage && console.error(errorMessage)
        }
        printSessionErrorMessage()
    </script>
    @stack('scripts')
</head>

<body>
    <div id="app" style="width: 100%; min-height: 100vh; display: flex; flex-direction: column;">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        @include('layouts.components.header')
        @include('layouts.components.logo_area')
        @include('layouts.components.main_menu')
        <div class="container my-3">
            <div class="row">
                @include('layouts.components.left_aside')
                @include('layouts.components.main')
                @include('layouts.components.right_aside')
            </div>
        </div>
        @include('layouts.components.footer')
    </div>
</body>

</html>
