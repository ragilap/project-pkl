@extends('layouts.byte-craft')

{{-- @section('hero-text')
<div class="container">
    <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Where every byte of code tells a story, </h1>
            <h2 data-aos="fade-up" data-aos-delay="400">and each byte crafts innovation in the language of
                technology.</h2>
            <div data-aos="fade-up" data-aos-delay="600">
            </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('template/img/hero-img.png') }}" class="img-fluid" alt="">
        </div>
    </div>
</div>
@endsection --}}

{{-- <div class="text-center text-lg-start">
<a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
<span>Join us</span>
<i class="bi bi-arrow-right"></i>
</a>
</div> --}}


@section('hero-image')
    <div class="flexslider border-0 overflow-hidden rounded-0">
        <ul class="slides">
            @if ($sliders->count() > 0)
                @foreach ($sliders as $slider)
                    {{-- @dd($slider->image) --}}
                    <li class="text-center" data-zanim-timeline='{"delay":4.1}'
                        style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                        <div class="bg-holder overlay parallax"
                            style="background-image:url('{{ asset('storage/' . $slider->image) }}'); transform: translate3d(0px, 0px, 0px);"
                            data-rellax-percentage="0.5">
                        </div>
                        <!--/.bg-holder-->
                        <div class="header-overlay"></div>
                        <div class="d-flex flex-center vh-100">
                            <div class="header-text">
                                <div class="overflow-hidden">
                                    <h1 class="display-3 text-white fs-md-7" id="anime-heading"
                                        style="  max-width: 1500px; margin:auto; /* Adjust the max-width as needed */
                                        word-wrap: break-word;">
                                        {{ $slider->nama }}</h1>
                                </div>
                                <div class="overflow-hidden">
                                    <p class="text-uppercase text-400 ls-2 mt-4" style="color: white" id="anime-paragraph">
                                        {{ $slider->deskripsi }}<br class="d-block d-md-none"> part of it</p>
                                </div>
                                <div id="anime-btn" style="opacity: 0; transform: translateY(30px);">
                                    <a class="btn btn-sm btn-outline-light hvr-sweep-top mt-5 px-4"
                                        href="javascript:void(0);" id="fadeButton">our
                                        services</a>
                                </div>
                            </div>
                        </div>

                        <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#about-us"
                                data-fancyscroll="data-fancyscroll" data-offset="64"><span id="indicator"
                                    class="mbri-arrow-down indicator-arrow-one arrow-down"
                                    style="opacity: 0; transform:matrix(0.70711, 0.7071, -0.7071, 0.70711, -6, 0);">
                                </span></a>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="text-center" data-zanim-timeline='{"delay":4.1}'
                    style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                    <div class="bg-holder overlay parallax"
                        style="background-image:url('{{ asset('img/fotokelas.JPG') }}'); transform: translate3d(0px, 0px, 0px);"
                        data-rellax-percentage="0.5">
                    </div>
                    <!--/.bg-holder-->
                    <div class="header-overlay"></div>
                    <div class="d-flex flex-center vh-100">
                        <div class="header-text">
                            <div class="overflow-hidden">
                                <h1 class="display-3 text-white fs-md-7" id="anime-heading"
                                    style="  max-width: 1500px; margin:auto; /* Adjust the max-width as needed */
                                word-wrap: break-word;">
                                    Welcome to Byte Craft</h1>
                            </div>
                            <div class="overflow-hidden">
                                <p class="text-uppercase text-400 ls-2 mt-4" style="color: white" id="anime-paragraph">
                                    For Next generations</p>
                            </div>
                        </div>
                    </div>

                    <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#panah-bawah"
                            data-fancyscroll="data-fancyscroll" data-offset="64"><span id="indicator"
                                class="mbri-arrow-down indicator-arrow-one arrow-down"
                                style="opacity: 0; transform:matrix(0.70711, 0.7071, -0.7071, 0.70711, -6, 0);">
                            </span></a>
                    </div>
                </li>
            @endif
        </ul>
        <!-- Sertakan jQuery di halaman Anda -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <ol class="flex-control-nav flex-control-paging">
            <li><a href="#" class="">1</a></li>
            <li><a href="#" class="flex-active">2</a></li>
            <li><a href="#" class="">3</a></li>
        </ol>
        <div class="flex-direction-nav">
            <a class="flex-prev" href="#"><span class="mbri-arrow-prev" style="font-weight: bolder;"></span></a>
            <a class="flex-next" href="#"><span class="mbri-arrow-next" style="font-weight: bolder;"></span></a>
        </div>
    </div>

    <script src="{{ asset('anime-master/lib/anime.min.js') }}"></script>
    <script src="{{ asset('dist/js/jquery.flexslider-min.js') }}"></script>


    <style>
        /* Custom styles for FlexSlider arrows */
        .flex-direction-nav a {
            /* background: white; */
            color: white;
        }

        .flex-direction-nav a:hover {
            color: white;
        }
    </style>

    <!-- Initialize Flexslider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            anime({
                targets: '#anime-heading',
                translateY: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: [100, 0],
                        duration: 800,
                        easing: 'easeInOutCubic',
                        delay: 50
                    } // Bergerak ke atas
                ],
                opacity: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: 1,
                        duration: 500,
                        easing: 'easeInOutExpo'
                    } // Bergerak ke atas
                ],
                delay: 500,
            });

            anime({
                targets: '#anime-paragraph',
                translateY: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: [150, 0],
                        duration: 800,
                        easing: 'easeInOutCubic',
                        delay: 150
                    } // Bergerak ke atas
                ],
                opacity: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: 1,
                        duration: 500,
                        easing: 'easeInOutExpo'
                    } // Bergerak ke atas
                ],
                delay: 500,
            });

            anime({
                targets: '#indicator',
                translateY: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: [0, 50],
                        duration: 800,
                        easing: 'easeInOutCubic',
                        delay: 160
                    } // Bergerak ke atas
                ],
                opacity: [
                    //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                    {
                        value: 1,
                        duration: 500,
                        easing: 'easeInOutExpo'
                    } // Bergerak ke atas
                ],
                delay: 500,
            });

            $('.flexslider').flexslider({
                animation: "fade",
                controlNav: false,
                directionNav: true,
                slideshowSpeed: 4000, // Set the desired speed in milliseconds
                animationSpeed: 100, // Set the desired animation speed in milliseconds

                before: function(slider) {
                    // Callback yang dijalankan setelah setiap slide selesai
                    runAnime();
                }

            });

            function runAnime() {
                anime({
                    targets: '#anime-heading',
                    translateY: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: [100, 0],
                            duration: 800,
                            easing: 'easeInOutCubic',
                            delay: 50
                        } // Bergerak ke atas
                    ],
                    opacity: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: 1,
                            duration: 500,
                            easing: 'easeInOutExpo'
                        } // Bergerak ke atas
                    ],
                    delay: 500,
                });

                anime({
                    targets: '#anime-paragraph',
                    translateY: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: [150, 0],
                            duration: 800,
                            easing: 'easeInOutCubic',
                            delay: 150
                        } // Bergerak ke atas
                    ],
                    opacity: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: 1,
                            duration: 500,
                            easing: 'easeInOutExpo'
                        } // Bergerak ke atas
                    ],
                    delay: 500,
                });

                anime({
                    targets: '#indicator',
                    translateY: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: [0, 50],
                            duration: 800,
                            easing: 'easeInOutCubic',
                            delay: 160
                        } // Bergerak ke atas
                    ],
                    opacity: [
                        //   { value: 0, duration: 1000, easing: 'easeOutCubic' }, // Muncul perlahan dari bawah
                        {
                            value: 1,
                            duration: 500,
                            easing: 'easeInOutExpo'
                        } // Bergerak ke atas
                    ],
                    delay: 500,
                });
            }
        });
    </script>
@endsection
@section('intro')
    <section class="container mx-auto px-4 lg:max-w-7xl mt-16">
        <div class="font-bold uppercase text-teal-600 dark:text-teal-400 text-sm mb-2">Materi</div>
        <h2 class="text-3xl font-bold tracking-tight mb-2">Sudah siap untuk belajar?</h2>
        <p class="text-lg mb-8 text-slate-500 dark:text-slate-300">Cari dan sesuai kan dengan bakat dan minat mu! </p>
        <div class="row d-flex">
            @foreach ($categories as $category)

            <div class="col-lg-4 col-md-6 col-12 gap-1" style="margin-top:30px;">
            <a href="/module/index?category={{ $category->slug }}">
                    <div class="block dark:bg-slate-800 rounded-2xl height-category px-6 py-8 bg-white shadow-lg active:scale-95 active:shadow-sm"
                        style="border-radius:15px;">
                        <span class="inline-flex items-center justify-center p-2 w-12 rounded-md shadow-lg">
                            <img src="{{ asset('storage/' . $category->icon) }}"></span>
                        <h3 class="text-slate-900 dark:text-white mt-3 w-fit text-lg font-extrabold tracking-tight">
                            {{ $category->name }}</h3>
                        <p class="text-slate-500 dark:text-slate-300 mt-2 w-fit text-sm">{{ $category->deskripsi }}</p>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        </div>
    </section>
@endsection

@section('article')
    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h2>Updates</h2>
            <p>Postingan terbaru dari Byte-craft </p>
        </header>

        <div class="row">
            @foreach ($articles as $article)
                @if ($article->draft === 0)
                    <div class="col-lg-4" style="margin-top:30px;">
                        <div class="post-box garis" style="border-radius:15px;">
                            <div class="post-img"><img src="{{ asset('storage/' . $article->image_path) }}"
                                    class="img-fluid"
                                    style="height: 250px; width:100%; object-fit: cover;object-position: top;"
                                    alt="">
                            </div>
                            <span
                                class="post-date">{{ Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</span>
                            <a href="{{ route('article.detaill', $article->id) }}">
                                <h2 class="post-title">{{ $article->judul }}</h2>
                            </a>
                            <p>{{ $article->intro }}</p>
                            <a href="{{ route('article.detaill', $article->id) }}"
                                class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
            @endforeach
            <a style="justify-content: end; display:flex; margin-top:30px;" href="{{ route('article.index') }}">See
                More</a>
        </div>
    </div>
@endsection
<!-- End Recent Blog Posts Section -->
{{-- <li data-filter="*" id="filter-all-none" class="filter-active">All</li> --}}
<!-- ======= Portfolio Section ======= -->
{{-- @section('galery')
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Portfolio</h2>
            <p>Check our latest Gallery</p>
        </header>

        <div class="row m-auto" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    @foreach ($types as $type)
                        <li class="portfolio-flters-{{ $type->name }}"
                            data-filter=".filter-{{ strtolower($type->id) }}" class="filter-active">{{ $type->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row gy-4 col-lg-11 m-auto portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($galeries['album'] as $album)
                @if ($album->draft == 0)
                    <div class="col-lg-4 col-md-6 col-12 portfolio-item filter-{{ strtolower($album->type_id) }}">
                        <a href="{{ route('galery.index', ['id' => $album->id]) }}" title="More Details">

                            <div class="portfolio-wrap m-3" style="border-radius: 15px;">
                                <img class="image-class" src="{{ asset('storage/' . $album->gambar_album) }}"
                                    alt="{{ $album->nama_album }}">
                                <div class="box-header">
                                    <div class="title">
                                        <h4>{{ $album->nama_album }}</h4>
                                        <div class="box-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25"
                                                viewBox="0 0 576 512">
                                                <path fill="#f2f2f2"
                                                    d="M160 32c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320H328 280 200c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V344c0 75.1 60.9 136 136 136H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-48.6 0-88-39.4-88-88V120z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            @foreach ($galeries['video'] as $galery)
                @if ($galery->draft === 0)
                    <div class="col-lg-4 col-md-6 col-12 portfolio-item filter-{{ strtolower($galery->type_id) }}">
                        <a href="{{ route('video.index', ['id' => $galery->id]) }}" title="More Details">

                            <div class="portfolio-wrap m-3" style="border-radius: 10px;">

                                @if ($galery->type_id)
                                    <img class="image-class" src="{{ asset('storage/' . $galery->gambar_album) }}"
                                        alt="{{ $galery->title }}">
                                @elseif($galery->type_id === 2)
                                    <video style="width:400px; height:300px; object-fit:cover; " controls>
                                        <source src="{{ asset('storage/' . $galery->gambar_album) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @endif
                                <div class="box-header">
                                    <div class="title">
                                        <h4>{{ $galery->nama_album }}</h4>
                                        <div class="box-icon" style="bottom:10px; left:88%;">
                                            <svg id="SvgjsSvg1012" width="288" height="288"
                                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs">
                                                <defs id="SvgjsDefs1013"></defs>
                                                <g id="SvgjsG1014">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"
                                                        width="30" height="30">
                                                        <path fill="none" d="M0 0h48v48H0z"></path>
                                                        <path
                                                            d="M8 12H4v28c0 2.21 1.79 4 4 4h28v-4H8V12zm32-8H16c-2.21 0-4 1.79-4 4v24c0 2.21 1.79 4 4 4h24c2.21 0 4-1.79 4-4V8c0-2.21-1.79-4-4-4zM24 29V11l12 9-12 9z"
                                                            fill="#c7c7c7" class="color000 svgShape"></path>
                                                    </svg>
                                                </g>
                                            </svg>

                                        </div>
                                        <div class="box-icon-video icon-video-home">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="65"
                                                height="65" viewBox="0 0 256 256" xml:space="preserve">
                                                <defs></defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                                    <path
                                                        d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z"
                                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(190,190,190); fill-rule: nonzero; opacity: 1;"
                                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <a style="justify-content: end; display:flex; margin-top:30px;" id="seemore" href="">See More</a>
    </div>
 @endsection --}}


<!-- ======= Team Section ======= -->
{{-- @section('team')
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </header>

            <div class="row gy-4" style="justify-content: center;">
                @foreach ($teams as $team)
                    <div class="col-lg-3 col-md-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('storage/' . $team->image) }}" class="img-fluid" alt="">
                                <div class="social">
                                    @foreach ($team->SocialTeam as $social)
                                        <a href="{{ $social->link }}"><i class="bi bi-{{ $social->icon }}"></i></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $team->nama }}</h4>
                                <span>{{ $team->jabatan }}</span>
                                <p>{{ $team->quote }} <span>{{ $team->deskripsi }}
                                    </span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection --}}
<!-- End Team Section -->

{{-- @section('style')
    <link href="{{ asset('dist/css/_corousel.scss') }}" rel="stylesheet">
@endsection --}}
{{-- </main> --}}
<!-- End #main -->
