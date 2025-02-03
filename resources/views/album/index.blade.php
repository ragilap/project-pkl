@extends('layouts.byte-breadcrumb')
<!-- ======= Breadcrumbs ======= -->
@section('breadcrumb')
    <div class="container">
        <ol>
            <li><a href="{{ route('article.home') }}">Home</a></li>
            <li>Galery</li>
        </ol>
        <h2>Galery</h2>
    </div>
@endsection
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
                    <a href="/albums?sort=latest"
                        class="btn btn-primary {{ $request == 'latest' ? 'sort-open' : 'sort-close' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"
                            style="">
                            <path fill="{{ $request == 'latest' ? 'black' : '#ffffff' }}"
                                d="M304 416h-64a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.2 0 21.4-17.2 11.3-27.3l-80-96a16 16 0 0 0 -22.6 0l-80 96C-5.4 142.7 1.8 160 16 160zm416 0H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm-64 128H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM496 32H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h256a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z" />
                        </svg></a>
                </li>
                <li style="list-style:none">
                    <a href="/albums?sort=last"
                        class="btn btn-primary {{ $request == 'last' ? 'sort-open' : 'sort-close' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"
                            style="">
                            <path fill="{{ $request == 'last' ? 'black' : '#ffffff' }}"
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
                        <li><a href="/albums">All</a></li>
                        @foreach ($categories as $category)
                            {{-- @dd($category) --}}
                            <li><a href="/albums?category={{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row gy-4 col-lg-11 m-auto portfolio-container" style="display: flex; flex-direction: row;"
            data-aos="fade-up" data-aos-delay="200">

            @foreach ($albums as $album)
                @if ($album->draft == 0)
                    {{-- <a href="{{ route('galery.index', ['id' => $album->id]) }}"> --}}
                        <div class="row sortable-container sortable-container-gutter-fix hoverdir-grid text-center">
                        <div class="col-sm-6 col-lg-4 px-2 mb-3 sortable-item design portfolio-item filter-{{ strtolower($album->category_id) }}">
                            {{-- <div class="portfolio-wrap m-3" style="border-radius: 15px;">
                                <img src="{{ asset('storage/' . $album->gambar_album) }}" alt="{{ $album->title }}"
                                    class="image-class">
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
                        </div>
                    </a> --}}
                    {{-- <div class="row sortable-container sortable-container-gutter-fix hoverdir-grid text-center">
                        <div class="col-sm-6 col-lg-4 px-2 mb-3 sortable-item design"> --}}
                            <div class="hoverdir-item position-relative rounded overflow-hidden"><a class="d-block"
                                    href="../pages/single-post.html"><img class="img-fluid rounded image-class" src="{{ asset('storage/' . $album->gambar_album) }}"
                                        alt="" />
                                    <div class="hoverdir-item-content">
                                        <div class="h-100 d-flex align-items-center justify-content-center p-3 hoverdir-text">
                                            <div class="text-700">
                                                <h3 class="text-white lh-1 fs-0">{{ $album->nama_album }}</h3>
                                                <p class="ls-0 mb-0">Multipurpose HTML template<br class="d-sm-none d-md-block" /> with
                                                    bootstrap 4 </p>
                                            </div>
                                        </div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('.hoverdir-item').hoverdir();
                        });
                    </script>

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
