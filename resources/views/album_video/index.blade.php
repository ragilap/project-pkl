@extends('layouts.byte-breadcrumb')
<!-- ======= Breadcrumbs ======= -->
@section('breadcrumb')
    <div class="container">

        <ol>
            <li><a href="{{ route('article.home') }}">Home</a></li>
            <li>Gallery</li>
        </ol>
        <h2>Video</h2>

    </div>
@endsection
<!-- End Breadcrumbs -->

<!-- End Recent Blog Posts Section -->
<!-- ======= Portfolio Section ======= -->
@section('content')
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h2>Portfolio</h2>
            <p>Gallery of Byte Craft</p>
        </header>

        <div style="flex-direction: row; display:flex; justify-content: end; margin-bottom:20px;">
            <div style="flex-direction:row; padding-left: 10px; display: flex;">
                <li style="list-style: none; margin-right: 10px;">
                    <a href="/Albums?sort=latest" class="btn btn-primary {{$request == 'latest' ? 'sort-open' : 'sort-close'}}" >
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"
                            style="">
                            <path fill="{{$request == 'latest' ? 'black' : '#ffffff'}}"
                                d="M304 416h-64a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.2 0 21.4-17.2 11.3-27.3l-80-96a16 16 0 0 0 -22.6 0l-80 96C-5.4 142.7 1.8 160 16 160zm416 0H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm-64 128H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM496 32H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h256a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z" />
                        </svg></a>
                </li>
                <li style="list-style:none">
                    <a href="/Albums?sort=last" class="btn btn-primary {{$request == 'last' ? 'sort-open' : 'sort-close'}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"
                            style="">
                            <path fill="{{$request == 'last' ? 'black' : '#ffffff'}}"
                                d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                        </svg></a>
                </li>
            </div>
            <div class="navbar">
                <li class="dropdown btn btn-primary"
                    style="left:6%; border-radius:20px;  height:38px; padding-left:1px; padding-right:1px; display:flex;align-items:center;">
                    <a href="#" style="color: white; margin-right:18px;"><span>Kategory</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul style="background-color:rgb(255, 255, 255); z-index:100;">
                        <li><a href="/Albums">All</a></li>
                        @foreach ($categories as $category)
                            <li><a href="/Albums/?category={{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </div>
        </div>
        <div class="divider"></div>


        <div class="row gy-4 col-lg-11 m-auto portfolio-container" data-aos="fade-up" data-aos-delay="200">

            @foreach ($albums as $album)
                @if ($album->draft == 0)
                    <a href="{{ route('video.index', ['id' => $album->id]) }}">
                        <div class="col-lg-4 col-md-6 col-12 portfolio-item filter-{{ strtolower($album->type_id) }}">
                            <div class="portfolio-wrap m-3" style="border-radius:15px;">
                                <img src="{{ asset('storage/' . $album->gambar_album) }}" alt="{{ $album->title }}"
                                    class="image-class">
                                <div class="box-header ">
                                    <div class="title">
                                        <h4>{{ $album->nama_album }}</h4>
                                       <div class="box-icon" style="bottom:10px; left:88%;">
                                        <svg id="SvgjsSvg1012" width="288" height="288" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs">
                                        <defs id="SvgjsDefs1013"></defs><g id="SvgjsG1014">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30" height="30"><path fill="none" d="M0 0h48v48H0z"></path><path d="M8 12H4v28c0 2.21 1.79 4 4 4h28v-4H8V12zm32-8H16c-2.21 0-4 1.79-4 4v24c0 2.21 1.79 4 4 4h24c2.21 0 4-1.79 4-4V8c0-2.21-1.79-4-4-4zM24 29V11l12 9-12 9z" fill="#c7c7c7" class="color000 svgShape"></path></svg></g></svg>
                                        </div>
                                        <div class="box-icon-video icon-video" >
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="65" height="65" viewBox="0 0 256 256" xml:space="preserve">
                                            <defs></defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
	                                        <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 62.251 46.633 L 37.789 60.756 c -1.258 0.726 -2.829 -0.181 -2.829 -1.633 V 30.877 c 0 -1.452 1.572 -2.36 2.829 -1.634 l 24.461 14.123 C 63.508 44.092 63.508 45.907 62.251 46.633 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(190,190,190); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            </g>
                                            </svg>
                                            </svg>
                                            {{-- <span class="mbri-video position-relative;" style="background-color:white;"></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>
        <div class="blog-pagination" style="margin-bottom: 60px;">
            <ul class="justify-content-center">
                @if ($albums->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link">&laquo;</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $albums->previousPageUrl() }}" rel="prev"
                            aria-label="@lang('pagination.previous')">&laquo;</a>
                    </li>
                @endif

                @foreach (range(1, $albums->lastPage()) as $i)
                    <li class="page-item {{ $albums->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $albums->url($i) }}">{{ $i }}</a>
                    </li>
                @endforeach

                @if ($albums->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $albums->nextPageUrl() }}" rel="next"
                            aria-label="@lang('pagination.next')">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link">&raquo;</span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
@endsection
