<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @include('components.byte-craft.favicon')
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">
    {{-- custom css --}}
    @yield('style')
    <!-- Vendor CSS Files -->
    {{-- <link href="{{asset('template/vendor/aos/aos.css')}}" rel="stylesheet"> --}}
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    {{-- <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mobirise/style.css') }}" rel="stylesheet">


    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <style>
        #page-header-user-dropdown {
            background-color: steelblue;
        }
    #sign-up-home{
            background-color: steelblue;
        }
    </style>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top header-scrolled d-flex" style="background:white;">
        @include('components.byte-craft.navbar')
    </header><!-- End Header -->

    <main id="main" style="margin-top: 10px; ">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            @yield('breadcrumb')
        </section>
        <!-- End Breadcrumbs -->
        <!-- ======= content Section ======= -->
        <section id="content" class="blog portfolio ">
            @yield('content')
        </section>


    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" class="footer"> --}}
    <footer class="custom-footer bg-dark py-5 position-relative">
        @include('components.byte-craft.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
    <script src="{{asset('dist/js/jquery.hoverdir.js')}}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>

    {{-- custom script --}}
    @yield('script')
    <!-- Template Main JS File -->
    <script src="{{ asset('main.js') }}"></script>

</body>

</html>
