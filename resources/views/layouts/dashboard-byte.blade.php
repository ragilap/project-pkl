<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Materi - Byte craft</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->

    <!-- Layout config Js -->
    <script src="{{ asset('velzon/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('velzon/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="{{ asset('velzon/css/icons.min.css') }}" rel="stylesheet" />
    <!-- App Css-->
    <link href="{{ asset('velzon/css/app.min.css') }}" rel="stylesheet" />
    <!-- custom Css-->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"rel="stylesheet">
    <!-- Custom css -->
    @yield('style')
    <link href="{{ asset('dist/css/flex-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mobirise/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            {{-- <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mbri-search search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div> --}}

                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                                <i class='bx bx-fullscreen fs-22'></i>
                            </button>
                        </div>

                        <div class="ms-1 header-item d-none d-sm-flex">
                            <button type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                                <i class='bx bx-moon fs-22'></i>
                            </button>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item">
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    @if (Auth::user()->profile_image)
                                        <img src="{{ asset('uploads/profile_images/' . Auth::user()->profile_image) }}"
                                            class="rounded-circle header-profile-user" alt="Foto Profil">
                                    @else
                                        <img src="{{ asset('img/default.png') }}"
                                            class="rounded-circle header-profile-user" alt="Foto Profil">
                                    @endif
                                    <span class="text-start ms-xl-2">
                                        <span
                                            class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->role }}</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}</h6>
                                {{-- <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i
                                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i
                                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Balance : <b>$5971.67</b></span></a> --}}
                                <a class="dropdown-item" href="{{ route('profile.user-edit') }}"> <i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                {{-- <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Lock screen</span></a> --}}
                                <form class="dropdown-item" method="POST" action="{{ route('logout') }}"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                                    @csrf
                                    <a :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                        <span class="align-middle" data-key="t-logout">Logout</span>
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box mt-3">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark mt">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('dist/img/iconbyte-craft.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('dist/img/logo-byte-craft-white.png') }}" alt="" height="17">
                    </span>
                </a>
                <button type="button"
                    class="collapse btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar" class="position-fixed">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    @include('components.byte-craft.sidebar-user')
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        <div class="main-content overflow-hidden">
            @yield('content')
            <div class="page-content">
                <div class="container-fluid">
                    @yield('text')
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            {{-- <div class="main-content overflow-hidden"> --}}

            <section class="py-0 overflow-hidden" id="top">
                @yield('hero-image')
            </section>

            <div class="container-fluid">
                {{-- <main id="main">
                @yield('main')


                <section id="recent-blog-posts" class="recent-blog-posts">
                    @yield('article')
                </section>
                <!-- End Recent Blog Posts Section -->
                <!-- ======= Portfolio Section ======= -->
                <section id="portfolio" class="portfolio">
                    @yield('galery')
                </section>

                <!-- End Portfolio Section -->



                <!-- ======= Team Section ======= -->
                <section id="team" class="team">

                    @yield('team')

                </section><!-- End Team Section -->

                <!-- ======= Contact Section ======= -->
                <section id="contact" class="contact">

                    @yield('about-us')
                </section>
                <!-- End Contact Section -->

            </main><!-- End #main --> --}}
            </div>
            <!-- ======= Footer ======= -->
            {{-- <footer class="custom-footer bg-dark py-5 position-relative">
            @include('components.byte-craft.footer')
        </footer><!-- End Footer --> --}}
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script>2023 © Byte-craft.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block ">
                                Design &amp; Develop by Ragil adi prasetio
                            </div>
                        </div>
                    </div>
                </div>
            </footer>



        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <!-- Theme Settings -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('velzon/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('velzon/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('velzon/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('velzon/js/plugins.js') }}"></script>

    <!-- aos js -->
    <script src="{{ asset('velzon/libs/aos/aos.js') }}"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('velzon/libs/prismjs/prism.js') }}"></script>
    <!-- animation init -->
    <script src="{{ asset('velzon/js/pages/animation-aos.init.js') }}"></script>
    <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    {{-- <script src="{{ asset('template/vendor/aos/aos.js') }}"></script> --}}
    {{-- <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
    <!-- Custom script -->
    @yield('script')
    <!-- Template Main JS File -->
    <script src="{{ asset('main.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('velzon/js/app.js') }}"></script>
</body>

</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('components.byte-craft.favicon')
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Google Fonts -->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"rel="stylesheet">
    <!-- Custom css -->
    @yield('style')
    <link href="{{ asset('dist/css/flex-slider.css') }}" rel="stylesheet">
    <link href="{{asset('template/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/mobirise/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header headerr fixed-top .transparent headerr-scrolled">
        @include('components.byte-craft.navbar')
        <script>
            // Ambil elemen navbar
            var header = document.querySelector('.headerr');
            var navbarr = document.getElementById('navbar');
            // Tambahkan event listener untuk mendeteksi scroll
            window.addEventListener('scroll', function() {
                var scrollOffset = 70;
                var opacity = Math.min(1, Math.max(0.0, (window.scrollY / scrollOffset) * 0.1));
                var backgroundColor = `rgba(255, 255, 255, ${opacity})`;
                var TextColor = `rgba(1, 50, 137, ${opacity})`;
                var borderColor = `rgba(255, 255, 255, ${1 - opacity * 0.85})`;
                header.style.backgroundColor = backgroundColor;
                navbar.style.color = TextColor;
                // Periksa apakah halaman telah di-scroll melebihi offset
                if (window.scrollY > scrollOffset) {
                    // Tambahkan class "scrolled" pada navbar
                    header.classList.add('scrolled');
                    navbarr.classList.add('scrolled');
                } else {
                    // Hapus class "scrolled" pada navbar
                    header.classList.remove('scrolled');
                    navbarr.classList.remove('scrolled');
                }
            });
        </script>
        <style>
            /* Navbar Styles */
            .headerr {
                background-color: rgba(236, 229, 229, 0);
                border-bottom: 2px solid rgba(255, 255, 255, .15);
                color: white;
                transition: background-color 0.5s ease, opacity 0.5s ease;
                /* Transisi warna background, border, dan opacity selama 0.5 detik dengan efek transisi yang lembut */
            }

            /* Optional: Styling for the scrolled state of the headerr */
            .headerr.scrolled {
                background-color: #333;
                /* Warna latar belakang saat di-scroll */
                border-color: transparent;
                opacity: 1 !important;
                /* Opacity penuh saat di-scroll */
            }

            .headerr.transparent {
                opacity: 0.2;
                /* Opacity awal sebelum di-scroll */
            }
        </style>
    </header><!-- End Header -->

    <section class="py-0 overflow-hidden" id="top">
        @yield('hero-image')
    </section>
    <main id="main">
        <section class="container mx-auto px-4 lg:max-w-7xl mt-16" style="background-color: ">
           <div class="font-bold uppercase text-teal-600 dark:text-teal-400 text-sm mb-2">Pengenalan</div>
           <h2 class="text-3xl font-bold tracking-tight mb-2">Mau belajar apa hari ini</h2>
           <p class="text-lg mb-8 text-slate-500 dark:text-slate-300">Temukan tutorial berdasarkan minatmu.</p>
           <div class="row ">
                <div class="col-lg-4 col-md-6 col-12 gap-3" style="margin-top:30px;">
                    <div class="block dark:bg-slate-800 rounded-2xl px-6 py-8 bg-white shadow-lg active:scale-95 active:shadow-sm" style="border-radius:15px;">
                        <span
                            class="inline-flex items-center justify-center p-2 w-12 bg-indigo-500 rounded-md shadow-lg"><i class="bi bi-code text-white text-lg"></i></span>
                        <h3 class="text-slate-900 dark:text-white mt-3 w-fit text-lg font-extrabold tracking-tight">Basic Programing</h3>
                        <p class="text-slate-500 dark:text-slate-300 mt-2 w-fit text-sm">Baca tutorial dasar-dasar pemrograman menggunakan C, C++, C#, Java, Javascript, dan masih banyak lagi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 gap-3" style="margin-top:30px;">
                    <div class="block dark:bg-slate-800 rounded-2xl px-6 py-8 bg-white shadow-lg active:scale-95 active:shadow-sm" style="border-radius:15px;">
                        <span
                            class="inline-flex items-center justify-center p-2 w-12 bg-indigo-500 rounded-md shadow-lg"><i class="bi bi-code text-white text-lg"></i></span>
                        <h3 class="text-slate-900 dark:text-white mt-3 w-fit text-lg font-extrabold tracking-tight">Basic Programing</h3>
                        <p class="text-slate-500 dark:text-slate-300 mt-2 w-fit text-sm">Baca tutorial dasar-dasar pemrograman menggunakan C, C++, C#, Java, Javascript, dan masih banyak lagi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 gap-3" style="margin-top:30px;">
                    <div class="block dark:bg-slate-800 rounded-2xl px-6 py-8 bg-white shadow-lg active:scale-95 active:shadow-sm" style="border-radius:15px;">
                        <span
                            class="inline-flex items-center justify-center p-2 w-12 bg-indigo-500 rounded-md shadow-lg"><i class="bi bi-code text-white text-lg"></i></span>
                        <h3 class="text-slate-900 dark:text-white mt-3 w-fit text-lg font-extrabold tracking-tight">Basic Programing</h3>
                        <p class="text-slate-500 dark:text-slate-300 mt-2 w-fit text-sm">Baca tutorial dasar-dasar pemrograman menggunakan C, C++, C#, Java, Javascript, dan masih banyak lagi.</p>

                    </div>
                </div>
            </div>
            </div>
        </section>

        <section id="recent-blog-posts" class="recent-blog-posts">
            @yield('article')
        </section>
        <!-- End Recent Blog Posts Section -->
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            @yield('galery')
        </section>

        <!-- End Portfolio Section -->



        <!-- ======= Team Section ======= -->
        <section id="team" class="team">

            @yield('team')

        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            @yield('about-us')
        </section>
        <!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer class="custom-footer bg-dark py-5 position-relative">
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
    <!-- Custom script -->
    @yield('script')
    <!-- Template Main JS File -->
    <script src="{{ asset('main.js') }}"></script>
</body>


<style>
    #navbar a {
        color: white;
        transition: color 0.5s ease-in-out;
    }

    #navbar a:hover {
        color: burlywood;
        transition: color 0.5s ease-in-out;
    }

    #navbar.scrolled a {
        color: #013289;
    }

    #navbar a.active {
        color: burlywood;
    }

    #navbar.scrolled a.active {
        color: #4154f1;
    }

    #navbar.scrolled a:hover {
        color: #4154f1;
    }

    @media (max-width: 1366px) {
        .navbar .dropdown .dropdown ul {
            left: -90%;
        }

        .navbar .dropdown .dropdown:hover>ul {
            left: -100%;
            /* color: #007BFF; */
        }



        .mobile-nav-toggle {
            color: white;
        }

        .kategory {
            width: 10px;
            padding-left: 3px;
        }
    }

    @media (max-width: 1200px) {
        #navbar a.active {
            color: #4154f1;
        }

        #navbar a {
            color: #013289;
        }
    }
</style>

</html> --}}
