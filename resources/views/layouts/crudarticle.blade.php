<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BPPI | Article</title>

    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-GLoNUvq4Wb6iozWzpCzsevUyazHnd9Fz2CeiRRy3WCMnILkZk6/7y/jo4KlW7fN9" crossorigin="anonymous') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    @yield('styles')
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- css admin lte -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}">
          {{-- css font mbri --}}
    <link rel="stylesheet" href="{{ asset('dist/css/mobirise/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- tooltip -->
    <link rel="stylesheet" href="{{ asset('path/ke/bootstrap.css') }}">
</head>

<!-- Page Heading -->
<header class="bg-white dark:bg-gray-800 shadow">

    <body class="hold-transition sidebar-mini layout-fixed font-sans antialiased ">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('template/img/favicon.png') }}" alt="Bppi"
                    height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" id="toggle-mini-sidebar-button"data-widget="pushmenu" href="#"
                            role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="navbar1" style="margin-left: 30px;">
                        <a style="margin-left:10px; margin-top:10px; font-size:1.0rem;"
                            href="{{ route('article.home') }}">Home</a>
                    </li>
                    <li class="navbar1" style="margin-left: 30px;">
                        <a style="margin-left:10px; margin-top:10px; font-size:1.0rem;"
                            href="{{ route('article.index') }}">Article</a>
                    </li>
                    <li class="navbar1" style="margin-left: 30px">
                        <a style="margin-left:10px; margin-top:10px; font-size:1.0rem;"
                            href="{{ route('album.index') }}">Galery</a>
                    </li>
                </ul>


                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto"><!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>

                    </li>

                    <!-- Messages Dropdown Menu -->


                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <!-- dropdown logo-->
                    <nav x-data="{ open: false }"
                        class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                        <!-- Primary Navigation Menu -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between">
                                <div class="flex">


                                    <!-- Settings Dropdown -->
                                    <div class="nav-item" style="margin-top:3px">
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <button class="btn btn navbar">
                                                    <div><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 448 512">
                                                            <path
                                                                d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                                                        </svg></div>

                                                    <div class="ml-1">
                                                        <svg class="fill-current h-4 w-4"
                                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('profile.edit')">
                                                    {{ 'Profile' }}
                                                </x-dropdown-link>

                                                <!-- Authentication -->
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                        {{ 'Log Out' }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    </div>

                                    <!-- Hamburger -->

                                </div>
                            </div>

                            <!-- Responsive Navigation Menu -->
                            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                                <div class="pt-2 pb-3 space-y-1">
                                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                        {{ 'Dashboard' }}
                                    </x-responsive-nav-link>
                                </div>

                                <!-- Responsive Settings Options -->
                                <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                                    <div class="px-4">
                                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                                            {{ Auth::user()->name }}</div>
                                        <div class="font-medium text-sm text-gray-500">
                                            {{ Auth::user()->email }}</div>
                                    </div>

                                    <div class="mt-3 space-y-1">
                                        <x-responsive-nav-link :href="route('profile.edit')">
                                            {{ 'Profile' }}
                                        </x-responsive-nav-link>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </ul>
            </nav>
        </div>
</header>

<!-- Main Sidebar Container -->
<aside class="main-sidebar position-fixed sidebar-dark-primary elevation-4 sidebar-mini">
    <!-- Brand Logo -->
    <a href="https://www.bppi.sch.id/" class="brand-link">
        <img src="https://i.pinimg.com/1200x/7c/ec/6b/7cec6b16f7ecc1ef777bc47ba1a78aa2.jpg" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light" style="text-decoration: none">𝙏𝙝𝙚 𝘽𝙋𝙋𝙄™
        </span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="height: 100%">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="width: 2.1rem height:2.1rem">
            <div class="image d-flex" style="width: 2.1rem height:2.1rem">
                @if (Auth::user()->profile_image)
                    <img src="{{ asset('uploads/profile_images/' . Auth::user()->profile_image) }}"
                        class="brand-image img-circle elevation-3 position-fixed" alt="Foto Profil">
                @else
                    <img src="{{ asset('img/default.png') }}"
                        class="brand-image img-circle elevation-3 position-fixed" alt="Foto Profil">
                @endif
            </div>
            <div class="info" style="padding-left: 50px">
                @auth
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                @endauth
            </div>
        </div>
        <!-- SidebarSearch Form -->
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
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="{{ route('article.crud') }}" class="nav-link active d-flex align-items-center">
                        <i class="nav-icon fas fa-book position-fixed"></i>
                        <p style="padding-left: 35px">Article</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Gallery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item pl-1 ">
                            <a href="{{route('album.crud')}}" class="nav-link">
                                <img class="ml-2 w-5 h-5 position-absolute"
                             src="{{ asset('img/album-photo-white.svg') }}">
                                <p style="padding-left: 40px;">Photo</p>
                            </a>
                        </li>
                        <li class="nav-item pl-1">
                            <a href="{{route('album.video.crud')}}" class="nav-link">
                                <img class="position-absolute ml-2 w-5 h-5" src="{{ asset('img/album-video white.svg') }}"
                                    >
                                <p style="padding-left:40px;">Video</p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <img class="w-5 h-5 position-fixed " style="margin-left: 5px;"
                            src="{{ asset('img/about-us.svg') }}" alt="about us">
                        <p style="padding-left: 35px;">
                            About Us
                            <i class="right fas fa-angle-left mt-1"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item pl-1 ">
                            <a href="{{route('contact.crud')}}" class="nav-link  ">
                                <img class="w-5 h-5 ml-2 position-absolute " src="{{ asset('img/contact-us.svg') }}"
                                    alt="about us">
                                <p style="padding-left: 43px;">Contact us</p>
                            </a>
                        </li>
                        <li class="nav-item pl-1 ">
                            <a href="{{route('info.crud')}}" class="nav-link ">
                                <img class="w-5 h-5 ml-2 position-absolute " src="{{ asset('img/information-white.svg') }}"
                                    alt="about us">
                                <p style="padding-left: 43px;">Information</p>
                            </a>
                        </li>

                </li>
                <li class="nav-item pl-1 ">
                    <a href="{{route('infovalue.crud')}}" class="nav-link ">
                        {{-- <img class="w-5 h-5 ml-2 position-absolute " src="{{ asset('img/information-black.svg') }}"
                                alt="about us"> --}}
                        <span class="mbri-growing-chart mt-1 position-absolute" style="color:white; margin-left:10px; font-weight:bold;"></span>
                        <p style="padding-left: 43px;">Our value</p>
                    </a>
                </li>
            </ul>
            </li>
            @can('superadmin-access')
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em"  style="fill:#fafafa; position:fixed; margin-left:5px" viewBox="0 0 640 512"><path d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z"/></svg>
                    <p style="padding-left: 35px">User</p>
                </a>
            </li>
            @endcan
                {{-- <li class="nav-item ">
                <a href="{{ route('pelanggan.index') }}" class="nav-link">
                    <i class="fas fa-users" style=" margin-left:3px; margin-right:8px;"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-bottom: 60px; background-color:white;">
    @yield('header')
    <div class="row">
        @yield('main')
        @yield('sidebar')
    </div>
    @yield('container')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
</div>
</div>
<footer class="main-footer position-fixed w-100" style="bottom: 0">
    <strong>Copyright &copy; 2021-2023 <a href="https://www.bppi.sch.id/">SMK BPPI Baleendah</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block position-fixed" style="right:10px">
        <b>Version</b> 3.2.0
    </div>
</footer>
<!-- ./wrapper --><!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- summernote -->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<!-- tooltip -->
<script src="{{ 'path/ke/jquery.js' }}"></script>
<script src="{{ 'path/ke/bootstrap.js' }}"></script>

<body>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                tabsize: 2,
                height: 300,
                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Merriweather'],
                fontNamesIgnoreCheck: ['Merriweather']
            });
        });
    </script>
    <script>
        $(document).ready$(function () {
         $('[data-toggle="tooltip"]').tooltip()
});
    </script>
</body>

</html>
