@extends('layouts.byte-breadcrumb')
<!-- ======= Breadcrumbs ======= -->
@section('breadcrumb')
    <div class="container">

        <ol>
            <li><a href="{{ route('article.home') }}">Home</a></li>
            <li><a href="{{ route('article.index') }}">Article</a></li>
            <li>Details Article</li>
        </ol>
        <h2>Details</h2>

    </div>
@endsection
<!-- End Breadcrumbs -->

<!-- ======= Blog Single Section ======= -->
@section('content')
    <div class="container" data-aos="fade-up">

        <div class="row">



            <div class="col-lg-8 entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="{{ asset('storage/' . $article->image_path) }}" alt="" class="img-fluid"
                            style="width: 100%; height:auto;">
                    </div>
                    @auth
                        <div style="margin: 10px; margin-left:4px;">
                            @if ($article->draft === 1)
                                <a> Status : {{ $article->draft == 0 ? 'published' : 'Draft' }}</a>
                            @endif
                        </div>
                    @endauth
                    <h2 class="entry-title">
                        <a>{{ $article->judul }}</a>
                    </h2>

                    <div class="entry-meta">
                        <ul>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                <a>{{ $article->user->name }}</a>
                            </li>
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a>
                                    {{ $article->created_at->format('d M Y') }}</a>
                            </li>
                            <li class="tags"><span class="bi bi-tags p-2"></span><a
                                    href="/article/index?category={{ $article->categories->slug }}">{{ $article->categories->name }}</a>
                            </li>
                            <li class="align-items-center d-flex "><span class="mbri-preview p-2"
                                    style="font-weight: 570;  font-size: 20px;"></span><a>{{ $article->views }}</a>
                            </li>
                            <li>
                                <div class="bubble-container " style="width: fit-content;">
                                    <div class="bubble" onclick="togglePopup(event)" style="width: fit-content;">
                                        <span class="mbri-paper-plane p-2" style="font-weight: 570;"></span><a>Share</a>
                                    </div>
                                    <div class="popup-container" style="width: max-content;">
                                        <div class="popup" style="width: 100%;">
                                            <a class="social" style="margin-bottom: 15px;">Share:</a>
                                            <div class="social-btn-sp flex-flex-row d-flex row ">

                                                {!! $Buttons !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                        </ul>
                        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
                            rel="stylesheet"> --}}

                        <link rel="stylesheet"
                            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
                        {{-- <link rel="stylesheet"
                            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> --}}

                        <div class="container mt-4">
                            <table class="table">


                                {{-- @foreach ($articles as $post)
                                    <tr>

                                        <td>

                                            {{ $post->title }}

                                            {!! Share::page(url('articles' . $post->name))->facebook()->twitter()->whatsapp() !!}

                                        </td>

                                    </tr>
                                @endforeach --}}



                            </table>

                        </div>


                    </div>

                    <div class="entry-content" style="width: 100%;">
                        <p>
                            {!! $article->deskripsi !!}

                        </p>
                    </div>

                    <div class="entry-footer">

                    </div>
                </article><!-- End blog entry -->

                <!-- End blog author bio -->
                <div class="d-flex justify-content-between" data-aos="fade-up" data-aos-delay="160">
                    @if ($previousArticleId)
                        <div class="col-md-6 d-flex items-center justify-start">
                            <a href="{{ route('article.detaill', $previousArticleId->id) }}" class="d-flex">
                                <ul class="ch-grid">
                                    <li style="list-style: none;">
                                        <div class="ch-item"
                                            style="background-image: url('{{ asset('storage/' . $previousArticleId->image_path) }}'); ">
                                            <a href="{{ route('article.detaill', $previousArticleId->id) }}">
                                                <div class="ch-info" style="text-align: center;">
                                                    <h3> <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="1em"
                                                            viewBox="0 0 448 512">
                                                            <style>
                                                                svg {
                                                                    fill: #ffffff
                                                                }
                                                            </style>
                                                            <path
                                                                d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                                        </svg>
                                                    </h3>
                                                </div>
                                                <a href="{{ route('article.detaill', $previousArticleId->id) }}"
                                                    class="d-flex">
                                                    <div class="row"
                                                        style="color:black; margin-left:113px; margin-top:6px;">
                                                        <p style="font-weight:bold; text-align:left; margin-bottom:23px;">
                                                            Prev</p>
                                                        <p style="width: 180px; text-align: left;">
                                                            {{ $previousArticleId->judul }}</p>
                                                    </div>
                                                </a>
                                        </div>
                                    </li>
                                </ul>

                            </a>
                        </div>
                    @else
                        <div class="col-md-6 d-flex items-center justify-start"></div>
                    @endif

                    @if ($nextArticleId)
                        <div class="flex items-center justify-end col-span-6 md:col-span-3 d-flex items-center  justify-end flex-row-reverse">
                            <a href="{{ route('article.detaill', $nextArticleId->id) }}" class="d-flex">
                                <ul class="ch-grid">
                                    <li style="list-style: none;">
                                        <div class="ch-item"
                                            style="background-image: url('{{ asset('storage/' . $nextArticleId->image_path) }}'); ">
                                            <a href="{{ route('article.detaill', $nextArticleId->id) }}">
                                                <div class="ch-info" style="text-align: center;">
                                                    <h3> <svg xmlns="http://www.w3.org/2000/svg" class="inline" height="1em"
                                                            viewBox="0 0 448 512">
                                                            <style>
                                                                svg {
                                                                    fill: #ffffff
                                                                }
                                                            </style>
                                                            <path
                                                                d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z" />
                                                        </svg>
                                                    </h3>
                                                </div>
                                                <a href="{{ route('article.detaill', $nextArticleId->id) }}"
                                                    class=" d-flex flex-row-reverse">
                                                    <div class="flex-row-reverse"
                                                        style="color: black; margin-right:121px; margin-top:6px">
                                                        <p style="font-weight: bold; text-align:right; margin-bottom:25px">
                                                            Next
                                                        </p>
                                                        <p style="width: 170px; text-align:right;">
                                                            {{ $nextArticleId->judul }}</p>
                                                    </div>
                                                </a>
                                        </div>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    @else
                        <div class="col-md-6 d-flex items-center justify-end flex-row-reverse"></div>
                    @endif
                </div>

            </div>

            <div class="col-lg-4">

                <div class="sidebar">

                    <h3 class="sidebar-title">Recent Posts</h3>
                    @foreach ($recents as $recent)
                        @if ($recent->draft === 0)
                            <div class="sidebar-item recent-posts" style="margin-top: 10px;">
                                <div class="post-item clearfix">
                                    <a href="{{ route('article.detaill', $recent->id) }}"> <img
                                            src="{{ asset('storage/' . $recent->image_path) }}" alt=""
                                            style="height:47px; object-fit:cover;"></a>
                                    <h4><a href="{{ route('article.detaill', $recent->id) }}">{{ $recent->judul }}</a>
                                    </h4>
                                    <time datetime="2020-01-01">{{ $recent->created_at->format('D M Y') }}</time>
                                </div>
                        @endif
                    @endforeach

                </div><!-- End sidebar recent posts-->
                <h3 class="sidebar-title">Tags</h3>
                <div class="sidebar-item tags">
                    <ul>
                        @foreach ($categories as $category)
                            <li><a href="/article/index?category={{ $category->slug }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>

            </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

    </div>

    </div>
@endsection

@section('script')
<script src="{{asset('dist/js/ui-popover.js')}}"></script>
@endsection
