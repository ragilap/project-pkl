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
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"rel="stylesheet">
    <!-- Custom css -->
    @yield('style')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"> --}}
    <link href="{{ asset('dist/css/flex-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- cdn tailwind --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
    {{-- icon mobirise --}}
    <link href="{{ asset('dist/css/mobirise/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header headerr d-flex fixed-top .transparent headerr-scrolled">
        @include('components.byte-craft.navbar')
        <script>
            // Ambil elemen navbar
            var header = document.querySelector('.headerr');
            var dropdown = document.querySelectorAll('.dropdown_a');
            var navbarr = document.getElementById('navbar');
            var sign_up = document.getElementById('sign-up-home');
            var sign_in = document.getElementById('sign-in-home');

            if (dropdown) {
                dropdown.forEach(item => {
                    var initialSignUpStyle = getComputedStyle(sign_up).backgroundColor;
                    var initialSignUpColor = getComputedStyle(sign_up).color;
                    var initialSignInColor = getComputedStyle(sign_in).color;
                    var dropdownbefore = 'black';

                    // Tambahkan event listener untuk mendeteksi scroll
                    window.addEventListener('scroll', function() {
                        changeColor(item, initialSignUpStyle, initialSignUpColor, initialSignInColor,
                            dropdownbefore)
                    });

                    window.addEventListener('DOMContentLoaded', function() {
                        changeColor(item, initialSignUpStyle, initialSignUpColor, initialSignInColor,
                            dropdownbefore)
                    });
                });
            }

            function changeColor(item, initialSignUpStyle, initialSignUpColor, initialSignInColor, dropdownbefore) {
                var scrollOffset = 70;
                var opacity = Math.min(1, Math.max(0.0, (window.scrollY / scrollOffset) * 0.1));
                var bg_white = `rgba(255, 255, 255, ${opacity})`;
                var bg_black = `rgb(64, 81, 137, ${opacity})`;
                var text_blue = `rgba(1, 50, 137, ${opacity})`;
                var text_white = `rgba(255, 255, 255, ${opacity})`;
                var borderColor = `rgba(255, 255, 255, ${1 - opacity * 0.85})`;
                header.style.backgroundColor = bg_white;
                navbar.style.color = text_blue;
                sign_up.style.backgroundColor = bg_black;
                sign_up.style.color = text_white;
                sign_in.style.color = text_blue;
                item.style.color = text_blue;
                // Periksa apakah halaman telah di-scroll melebihi offset
                if (window.scrollY > scrollOffset) {
                    // Tambahkan class "scrolled" pada navbar
                    header.classList.add('scrolled');
                    navbarr.classList.add('scrolled');
                    sign_up.classList.add('scrolled');
                    sign_in.classList.add('scrolled');
                    item.classList.add('scrolled');
                } else {
                    // Hapus class "scrolled" pada navbar
                    header.classList.remove('scrolled');
                    navbarr.classList.remove('scrolled');
                    sign_up.classList.remove('scrolled');
                    sign_in.classList.remove('scrolled');
                    item.classList.remove('scrolled');
                    sign_up.style.backgroundColor = initialSignUpStyle;
                    sign_in.style.color = initialSignInColor;
                    sign_up.style.color = initialSignUpColor;
                    item.style.color = dropdownbefore;
                }
            }
        </script>
        <style>
            /* Navbar Styles */
            .headerr {
                background-color: rgba(236, 229, 229, 0);
                border-bottom: 2px solid rgba(255, 255, 255, .15);
                color: white;
                height: 113px;
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
    <!-- ======= Hero Section ======= -->
    {{-- <section id="hero" style="background: url('{{ asset('template/img/hero-bg.png') }}') top center no-repeat;"
        class="hero d-flex align-items-center">
        @yield('hero-text')
    </section> --}}
    <!-- End Hero -->


    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        {{-- <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </header>
                @yield('faq')

            </div>
        </section> --}}
        @yield('intro')

        <section>
            <div class="container">
                <div class="row">
                    <div class="col mb-4 text-center"  >
                        <div class="overflow-hidden">
                            <h2 class="fs-md-5">how we did it</h2>
                        </div>
                        <div class="overflow-hidden">
                            <p class="fs--1 text-uppercase text-black ls-0 mb-0"
                               >working together to achieve great results
                            </p>
                        </div>
                        <div class="overflow-hidden">
                            <hr class="hr-short border-black" />
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 px-5">
                        <div class="media process-item pl-20 pb-4" data-zanim-timeline="{}"
                           >
                            <div class="process-icon-circle ml-5"><img class="process-icon"
                                    src="../assets/img/line-icons/medical-result.svg" alt="" /></div>
                            <div class="media-body ml-4 ml-sm-5">
                                <h5 class="text-md-left"><span class="bg-white pr-3 font-head">analysis &amp; planning</span><span class="process-devider-right border-right-0 r-0"></span></h5>
                                <p class="mb-0">
                                    At first, we will analyze the product and planning then convert to a full
                                    specification document that explains exactly what we will deliver to you. This
                                    process will include the technical & functional requirements captured along with
                                    your branding and styling guidelines.</p>
                            </div>
                        </div>
                        <div class="media process-item pr-20 pb-5"
                            data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="media-body position-relative ml-4 ">
                                <h5 class="text-md-right"> <span class="bg-white pl-md-3">Design &amp;
                                        Development</span><span class="process-devider-right border-right-0 l-0"></span></h5>
                                <p class="mb-0 text-md-right">
                                    This is the main production phase where we build the functionalities of your
                                    product. Once created, your product must pass through our quality assurance phase
                                    before you are finally presented with the finished deliverable.</p>
                            </div>
                            <div class="process-icon-circle"><img class="process-icon"
                                    src="../assets/img/line-icons/web-programming.svg" alt="" /></div>
                        </div>
                        <div class="media process-item pl-20 pb-5" data-zanim-timeline="{}"
                            data-zanim-trigger="scroll">
                            <div class="process-icon-circle ml-5"><img class="process-icon"
                                    src="../assets/img/line-icons/technical-support.svg" alt="" /></div>
                            <div class="media-body position-relative ml-4 "><span
                                    class="process-devider-right border-left-0 r-0"></span>
                                <h5 class="ls-1"> <span class="bg-white pr-3">Testing &amp; Fixing</span></h5>
                                <p class="mb-0">
                                    After building your product, we will review your product with our talented testing
                                    team. In these steps, we will test your product with different data set and
                                    conditions. Also, this phase is essential for fixing design and development issues.
                                </p>
                            </div>
                        </div>
                        <div class="media process-item pr-20" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                            <div class="media-body position-relative ml-4 ">
                                <h5 class="text-md-right"> <span class="bg-white pl-md-3">LAUNCH &amp; GROW</span><span
                                        class="process-devider-right border-right-0 l-0"></span></h5>
                                <p class="mb-0 text-md-right">
                                    The final step is where we launch your product to the production server. Here we
                                    consider components such as cloud architecture, performance, and cybersecurity if
                                    that is within that scope of your project. At this point, you are officially live!
                                </p>
                            </div>
                            <div class="process-icon-circle "><img class="process-icon"
                                    src="../assets/img/line-icons/server.svg" alt="" /></div>
                        </div>
                    </div>
                </div>
            </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

        <style>
      /* Process Item Styles */
.process-item {
    position: relative;
    margin-bottom: 30px;
}

.process-icon-circle {
    position: absolute;
    width: 5.5rem;
    height: 5.5rem;
    border: 1px dashed #9ba0a7;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff;
}
.font-head{
    font-family: Raleway,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    font-weight: 400;
    line-height: 3.125rem;
    color: #000;
    text-transform: uppercase;
}

.process-icon {
    width: 1.875rem;
}

.process-devider-left,
.process-devider-right {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    background-color: #9ba0a7;
    transform: translateX(-50%);
    z-index: -1;
}

.process-devider-left {
    left: 100%;

}

.process-devider-right {
    left: 100%;
    height: 90px;
}


/* Responsive Styles */
@media (min-width: 768px) {
    .process-item:nth-child(odd) .media-body {
        padding-right: 3.938rem;
    }

    .process-item:nth-child(odd) .process-icon-circle {
        left: -2.75rem;
    }

    .process-item:nth-child(even) .media-body {
        padding-left: 3.938rem;
    }

    .process-item:nth-child(even) .process-icon-circle {
        right: -2.75rem;
        left: auto;
    }

    .process-title {
        position: relative;
    }

    .process-title:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        height: 1px;
        background-color: #000;
        width: 100%;
        z-index: -1;
    }
}

/* Media Styles */
.media {
    display: flex;
    align-items: flex-start;
}

/* Text Alignment Styles */
.text-md-left {
    text-align: left !important;
}
.text-md-right {
    text-align: right !important;
}
/* Position Styles */
.l-0 {
    left: 0;
}
.r-0 {
    right: 0;
}
        </style>
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
    {{-- <footer id="footer" class="footer"> --}}
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

    #navbar a.dropdown_a {
        color: black
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


</html>
