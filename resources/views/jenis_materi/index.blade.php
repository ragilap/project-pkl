@extends('layouts.byte-breadcrumb')
<!-- ======= Breadcrumbs ======= -->
@section('breadcrumb')
    <div class="container position-relative">

        <ol>
            <li><a href="{{ route('article.home') }}">Home</a></li>
            <li><a href="{{ route('article.index') }}">Lesson</a></li>
        </ol>
        <h2>Learn</h2>
    </div>
@endsection



<!-- ======= Blog Single Section ======= -->
@section('content')
    <div>
        <h3 class="m-3 font-bold"> All Modules</h3>
        <span class="ml-3" style="font-size: 13px;"> Di sini kamu bisa mengambil kelas sesuai dengan ketertarikanmu menggunakan pilihan
            bahasa pemrograman R, Python, SQL
            , dan Pentaho. Semua kelas dirancang terstruktur, untuk melatih problem-solving, dan kreativitas, dengan studi
            kasus
            yang mencerminkan kondisi data riil di Indonesia.</span>
    </div>
    {{-- <div class="navbar">
        <li style="float:right; list-style: none; left:250px; bottom:57px;">
            <a href="/article/index?sort=last" class="btn btn-primary" style="color: white; margin-right:18px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                    <path fill="#ffffff"
                        d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                </svg></a>
        </li>
        <li style="float:right; list-style: none; right:200px; bottom:57px;">
            <a href="/article/index?sort=latest"
                class="btn btn-primary" style="color: white; margin-right:18px;">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                    <path fill="#ffffff"
                        d="M304 416h-64a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.2 0 21.4-17.2 11.3-27.3l-80-96a16 16 0 0 0 -22.6 0l-80 96C-5.4 142.7 1.8 160 16 160zm416 0H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm-64 128H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM496 32H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h256a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z" />
                </svg></a>
        </li>
    </div> --}}





    <div class="container" data-aos="fade-up">
        <div style="flex-direction: row; display:flex; justify-content: end; margin-bottom:20px;">
            {{-- <div style="flex-direction:row; padding-left: 10px; display: flex;">
                <li style="list-style: none; margin-right: 10px;">
                    <a href="/article/index?sort=latest"
                        class="btn btn-primary {{ $request == 'latest' ? 'sort-open' : 'sort-close' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"
                            style="">
                            <path fill="{{ $request == 'latest' ? 'black' : '#ffffff' }}"
                                d="M304 416h-64a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.2 0 21.4-17.2 11.3-27.3l-80-96a16 16 0 0 0 -22.6 0l-80 96C-5.4 142.7 1.8 160 16 160zm416 0H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm-64 128H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM496 32H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h256a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z" />
                        </svg>
                    </a>
                </li>
                <li style="list-style:none">
                    <a href="/article/index?sort=last"
                        class="btn btn-primary {{ $request == 'last' ? 'sort-open' : 'sort-close' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"
                            style="">
                            <path fill="{{ $request == 'last' ? 'black' : '#ffffff' }}"
                                d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                        </svg></a>
                </li>
            </div> --}}
            <div class="navbar">
                <li class="dropdown btn btn-primary"
                    style="left:6%; border-radius:20px;  height:38px; padding-left:1px; padding-right:1px; display:flex;align-items:center;">
                    <a href="#" style="color: white; margin-right:18px;"><span>Kategory</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul style="background-color:rgb(255, 255, 255); z-index:100;">
                        <li><a href="/module/index">All</a></li>
                        @foreach ($categories as $category)
                            <li><a href="/module/index?category={{ $category->slug }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </div>
    </div>
    <div class="divider"></div>
    <div class="col">
        <div class="row">
            @foreach ($materies as $article)
                {{-- @dd($article) --}}
                <div class="col-lg-4 col-md-6 col-14">
                    @if ($article->draft == 0)
                        <a href="{{ route('materi.index',$article->id) }}">
                            <article class="entry garis" style="border-radius:15px;">
                                <div class="entry-img">
                                    <img src="{{ asset('storage/' . $article->image_path) }}" alt=""
                                        class="object-top img-article img-fluid">
                                </div>
                                <div class="judul" style="height:80px;">
                                    <h2 class="entry-title {{ strlen($article->judul) > 30 ? 'baris-dua' : '' }}">
                                        <a href="{{ route('modul.index', $article->id) }}">{{ $article->judul }}</a>
                                    </h2>
                                </div>


                                <div class="entry-meta">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="{{ route('article.detaill', $article->id) }}">
                                                {{-- {{ $article->user->name }} --}}
                                            </a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                href="{{ route('article.detaill', $article->id) }}">
                                                {{ Carbon\Carbon::parse($article->scheduled_at)->format('d M Y') }}</a>
                                        </li>
                                        <li class="d-flex align-items-center kategory"><i class="bi bi-tags"></i><a
                                                href="/module/index?category={{ $article->categories->slug }}">{{ $article->categories->name }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="container-entry">
                                    <div class="entry-content {{ strlen($article->judul) > 50 ? 'baris-tiga' : '' }}">
                                        <p>
                                            {{ $article->intro }}
                                        </p>
                                    </div>
                                </div>

                                <div id="container">
                                    <a href="{{ route('article.detaill', $article->id) }}">
                                        <div class="read-more">
                                            {{-- <button class="learn-more" style="">
                                            <span class="circle" aria-hidden="true" style="margin-left:30px; ">
                                                <span class="icon arrow"></span>
                                            </span> --}}
                                            <span class="button-text">Start-Learn</span>
                                            <i class="bi bi-arrow-right"></i>
                                            {{-- </button> --}}
                                        </div>
                                    </a>
                                </div>
                            </article><!-- End blog entry -->
                    @endif
                    </a>
                </div>
            @endforeach
        </div>

        {{-- <div class="blog-pagination" style="margin-bottom: 60px;">
                <ul class="justify-content-center">
                    @if ($materies->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $materies->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif

                    @foreach (range(1, $materies->lastPage()) as $i)
                        <li class="page-item {{ $materies->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $materies->url($i) }}">{{ $i }}</a>
                        </li>
                    @endforeach

                    @if ($materies->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $materies->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link">&raquo;</span>
                        </li>
                    @endif
                </ul>
            </div> --}}

    </div>
    {{-- <div class="col">
                <div class="sidebar">
                    <!-- End sidebar categories-->
                    <h3 class="sidebar-title">Recent Posts</h3>
                    @foreach ($recents as $recent)
                        @if ($recent->draft === 0)
                            <div class="sidebar-item recent-posts" style="margin-top: 20px;">
                                <div class="post-item clearfix">
                                    <a href="{{ route('article.detaill', $recent->id) }}"> <img
                                            src="{{ asset('storage/' . $recent->image_path) }}" alt=""
                                            style="width: 80px; height:50px;"></a>
                                    <h4><a href="{{ route('article.detaill', $recent->id) }}">{{ $recent->judul }}</a>
                                    </h4>
                                    <time
                                        datetime="2020-01-01">{{ Carbon\carbon::parse($recent->created_at)->format('D M Y') }}</time>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <h3 class="sidebar-title">Tags</h3>
                    <div class="sidebar-item tags">
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="/article?category={{ $category->slug }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div><!-- End blog entries list --> --}}

    </div>
@endsection
<!-- End Blog Single Section -->
