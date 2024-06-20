<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@yield('title')">
    <meta name="description" content="Administrator Panel for World-Newspapers.com">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css?v=3.2.0') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">

    <style type="text/css">
        /* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor,
        .chartjs-size-monitor-expand,
        .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand>div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink>div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }
    </style>
    @stack('adminStyles')
</head>

<body class="sidebar-mini layout-fixed" __processed_0bc9fc71-5f63-4b1c-8d38-e8a0ceb3ab75__="true" style="height: auto;"
    data-new-gr-c-s-check-loaded="14.1184.0" data-gr-ext-installed="">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center" style="height: 0px;">
            {{-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60" style="display: none;"> --}}
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('adminDashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light px-3">World-Newspapers.com</span>
            </a>

            <div
                class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 1175px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">

                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                <div class="image">
                                    <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image">
                                </div>
                                <div class="info">
                                    <a href="javascript:void(0)" class="d-block">{{ Auth::user()->name }}</a>
                                </div>
                            </div>

                            <div class="form-inline">
                                <div class="input-group" data-widget="sidebar-search">
                                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-sidebar">
                                            <i class="fas fa-search fa-fw"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="sidebar-search-results">
                                    <div class="list-group"><a href="#" class="list-group-item">
                                            <div class="search-title"><strong class="text-light"></strong>N<strong
                                                    class="text-light"></strong>o<strong class="text-light"></strong>
                                                <strong class="text-light"></strong>e<strong
                                                    class="text-light"></strong>l<strong
                                                    class="text-light"></strong>e<strong
                                                    class="text-light"></strong>m<strong
                                                    class="text-light"></strong>e<strong
                                                    class="text-light"></strong>n<strong
                                                    class="text-light"></strong>t<strong class="text-light"></strong>
                                                <strong class="text-light"></strong>f<strong
                                                    class="text-light"></strong>o<strong
                                                    class="text-light"></strong>u<strong
                                                    class="text-light"></strong>n<strong
                                                    class="text-light"></strong>d<strong
                                                    class="text-light"></strong>!<strong class="text-light"></strong>
                                            </div>
                                            <div class="search-path"></div>
                                        </a></div>
                                </div>
                            </div>
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
                                    role="menu" data-accordion="false">

                                    {{-- <li class="nav-item menu-open">
                                        <a href="#" class="nav-link active">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                Dashboard
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./index.html" class="nav-link active">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v1</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index2.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v2</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./index3.html" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Dashboard v3</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('adminDashboard') }}"
                                            class="nav-link
                                            @if (str_contains(route('adminDashboard'), request()->path())) active @endif">
                                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                            <p>
                                                {{ __('Dashboard') }}
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="nav-link">
                                            @csrf
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); confirm('{{ __('Are you sure you want to logout?') }}') && document.getElementById('logout-form').submit();">
                                                <i class="nav-icon fas fa-solid fa-door-open"></i>
                                                <p>
                                                    {{ __('Logout') }}
                                                </p>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="height: 53.8215%; transform: translate(0px, 0px);">
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>

        </aside>

        <div class="content-wrapper" style="min-height: 1095px;">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('adminDashboard') }}">{{ __('Home') }}</a>
                                </li>
                                @hasSection('title')
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>

        </div>

        <footer class="main-footer">
            <strong>World-Newspapers.com © 2024</strong>
            All rights reserved
        </footer>

        <aside class="control-sidebar control-sidebar-dark" style="display: none; top: 57px; height: 1176px;">

            <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition"
                style="height: 1176px;">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer"></div>
                </div>
                <div class="os-content-glue" style="margin: -16px; width: 0px; height: 0px;"></div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible">
                        <div class="os-content" style="padding: 16px; height: 100%; width: 100%;">
                            <h5>Customize AdminLTE</h5>
                            <hr class="mb-2">
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Dark
                                    Mode</span></div>
                            <h6>Header Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1"
                                    class="mr-1"><span>Fixed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Dropdown
                                    Legacy Offset</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>No
                                    border</span></div>
                            <h6>Sidebar Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1"
                                    class="mr-1"><span>Collapsed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" checked="checked"
                                    class="mr-1"><span>Fixed</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" checked="checked"
                                    class="mr-1"><span>Sidebar Mini</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar
                                    Mini MD</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar
                                    Mini XS</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav
                                    Flat Style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav
                                    Legacy Style</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav
                                    Compact</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav
                                    Child Indent</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Nav
                                    Child Hide on Collapse</span></div>
                            <div class="mb-4"><input type="checkbox" value="1" class="mr-1"><span>Disable
                                    Hover/Focus Auto-Expand</span></div>
                            <h6>Footer Options</h6>
                            <div class="mb-4"><input type="checkbox" value="1"
                                    class="mr-1"><span>Fixed</span></div>
                            <h6>Small Text Options</h6>
                            <div class="mb-1"><input type="checkbox" value="1"
                                    class="mr-1"><span>Body</span></div>
                            <div class="mb-1"><input type="checkbox" value="1"
                                    class="mr-1"><span>Navbar</span></div>
                            <div class="mb-1"><input type="checkbox" value="1"
                                    class="mr-1"><span>Brand</span></div>
                            <div class="mb-1"><input type="checkbox" value="1" class="mr-1"><span>Sidebar
                                    Nav</span></div>
                            <div class="mb-4"><input type="checkbox" value="1"
                                    class="mr-1"><span>Footer</span></div>
                            <h6>Navbar Variants</h6>
                            <div class="d-flex"><select class="custom-select mb-3 text-light border-0 bg-white">
                                    <option class="bg-primary">Primary</option>
                                    <option class="bg-secondary">Secondary</option>
                                    <option class="bg-info">Info</option>
                                    <option class="bg-success">Success</option>
                                    <option class="bg-danger">Danger</option>
                                    <option class="bg-indigo">Indigo</option>
                                    <option class="bg-purple">Purple</option>
                                    <option class="bg-pink">Pink</option>
                                    <option class="bg-navy">Navy</option>
                                    <option class="bg-lightblue">Lightblue</option>
                                    <option class="bg-teal">Teal</option>
                                    <option class="bg-cyan">Cyan</option>
                                    <option class="bg-dark">Dark</option>
                                    <option class="bg-gray-dark">Gray dark</option>
                                    <option class="bg-gray">Gray</option>
                                    <option class="bg-light">Light</option>
                                    <option class="bg-warning">Warning</option>
                                    <option class="bg-white">White</option>
                                    <option class="bg-orange">Orange</option>
                                </select></div>
                            <h6>Accent Color Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Dark Sidebar Variants</h6>
                            <div class="d-flex"></div><select
                                class="custom-select mb-3 text-light border-0 bg-primary">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Light Sidebar Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-fuchsia">Fuchsia</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-maroon">Maroon</option>
                                <option class="bg-orange">Orange</option>
                                <option class="bg-lime">Lime</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-olive">Olive</option>
                            </select>
                            <h6>Brand Logo Variants</h6>
                            <div class="d-flex"></div><select class="custom-select mb-3 border-0">
                                <option>None Selected</option>
                                <option class="bg-primary">Primary</option>
                                <option class="bg-secondary">Secondary</option>
                                <option class="bg-info">Info</option>
                                <option class="bg-success">Success</option>
                                <option class="bg-danger">Danger</option>
                                <option class="bg-indigo">Indigo</option>
                                <option class="bg-purple">Purple</option>
                                <option class="bg-pink">Pink</option>
                                <option class="bg-navy">Navy</option>
                                <option class="bg-lightblue">Lightblue</option>
                                <option class="bg-teal">Teal</option>
                                <option class="bg-cyan">Cyan</option>
                                <option class="bg-dark">Dark</option>
                                <option class="bg-gray-dark">Gray dark</option>
                                <option class="bg-gray">Gray</option>
                                <option class="bg-light">Light</option>
                                <option class="bg-warning">Warning</option>
                                <option class="bg-white">White</option>
                                <option class="bg-orange">Orange</option><a href="#">clear</a>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden">
                    <div class="os-scrollbar-track">
                        <div class="os-scrollbar-handle" style="transform: translate(0px, 0px);"></div>
                    </div>
                </div>
                <div class="os-scrollbar-corner"></div>
            </div>
        </aside>

        <div id="sidebar-overlay"></div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    {{-- <script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
    <script src="{{ asset('adminlte/dist/js/adminlte.js?v=3.2.0') }}"></script>
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
    {{-- <script src="{{ asset('adminlte/dist/js/pages/dashboard.js') }}"></script> --}}
    @stack('adminScripts')
</body>

</html>
