<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.3" name="viewport">
    @include('components.byte-craft.favicon')
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- css tambahan --}}
    <link href="{{ asset('dist/css/mobirise/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mobirise/fonts/mobirise.eot') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mobirise/fonts/mobirise.ttf') }}" rel="stylesheet">
    {{-- slider image --}}
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css') }}" />

    <!-- Template Main CSS File -->
    {{-- <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{asset('dist/css/album.css')}}" rel="stylesheet">

    {{-- google font --}}
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap') }}"
        rel="stylesheet">
    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header absolute-top header-scrolled ">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            @include('components.byte-craft.navbar')
        </div>
    </header><!-- End Header -->

    {{-- <main id="main">
        <section id="header2-1" data-sortbtn="btn-primary">
            @yield('image-header')
        </section>


        <section class="about-us">
            @yield('about-us')
        </section>

        <section class="section-header" style="margin-top:10%; margin-bottom:2%; ">
            @yield('head-value')
        </section>

        <section class="our-values">

            @yield('value')
        </section> --}}

        <section class="accordion1 contact" id="accordions1-4" data-sortbtn="btn-primary">
            @yield('contact')
        </section>
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        @include('components.byte-craft.footer')
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>

    {{-- slider image script --}}
    <script type="text/javascript"
        src="{{ asset('https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('main.js') }}"></script>

</body>

</html>
