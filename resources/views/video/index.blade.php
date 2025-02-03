      @extends('layouts.byte-breadcrumb')
      <!-- ======= Breadcrumbs ======= -->
      @section('breadcrumb')
          <div class="container">

              <ol>
                  <li><a href="{{ route('article.home') }}">Home</a></li>
                  <li><a href="{{ route('album.index') }}">galery</a></li>
                  <li>List-Video</li>
              </ol>
              <h2>List-Video</h2>

          </div>
      @endsection
      <!-- End Breadcrumbs -->

      <!-- End Recent Blog Posts Section -->
      <!-- ======= Portfolio Section ======= -->
      @section('content')
          <div class="container" data-aos="fade-up">
              <header class="section-header">
                  <h2>Portfolio</h2>
                  <p style="margin-bottom: 20px;">List Video of Byte craft</p>
                  <h2 class="album" style="color:white; margin:auto;">{{ $albums->nama_album }}</h2>
              </header>



              {{-- <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach ($types as $type)
                                <li data-filter=".filter-{{ strtolower($type->id) }}">{{ $type->name }}</li>
                            @endforeach

                        </ul>
                    </div>
                </div> --}}

                <div style="flex-direction: row; display:flex; justify-content: end; margin-bottom:20px;">
                    <div style="flex-direction:row; padding-left: 10px; display: flex;">
                        <li style="list-style: none; margin-right: 10px;">
                            <a href="/video?id={{$albums->id}}&sort=latest" class="btn btn-primary {{$request == 'latest' ? 'sort-open' : 'sort-close'}}" >
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"
                                    style="">
                                    <path fill="{{$request == 'latest' ? 'black' : '#ffffff'}}"
                                        d="M304 416h-64a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM16 160h48v304a16 16 0 0 0 16 16h32a16 16 0 0 0 16-16V160h48c14.2 0 21.4-17.2 11.3-27.3l-80-96a16 16 0 0 0 -22.6 0l-80 96C-5.4 142.7 1.8 160 16 160zm416 0H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h192a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm-64 128H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h128a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zM496 32H240a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h256a16 16 0 0 0 16-16V48a16 16 0 0 0 -16-16z" />
                                </svg></a>
                        </li>
                        <li style="list-style:none">
                            <a href="/video?id={{$albums->id}}&sort=last" class="btn btn-primary {{$request == 'last' ? 'sort-open' : 'sort-close'}}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512"
                                    style="">
                                    <path fill="{{$request == 'last' ? 'black' : '#ffffff'}}"
                                        d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7V64c0-17.7 14.3-32 32-32s32 14.3 32 32V365.7l32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 480c-17.7 0-32-14.3-32-32s14.3-32 32-32h32c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H320zm0-128c-17.7 0-32-14.3-32-32s14.3-32 32-32H544c17.7 0 32 14.3 32 32s-14.3 32-32 32H320z" />
                                </svg></a>
                        </li>
                    </div>
                    <div class="navbar">
                        {{-- <li class="dropdown btn btn-primary"
                            style="left:6%; border-radius:20px;  height:38px; padding-left:1px; padding-right:1px; display:flex;align-items:center;">
                            <a href="video?id={{$albums->id}}" style="color: white; margin-right:18px;"><span>All</span> --}}
                                {{-- <i class="bi bi-chevron-down"></i> --}}
                            {{-- </a> --}}
                            {{-- <ul style="background-color:rgb(255, 255, 255); z-index:100;">
                                <li><a href="/video?id={{$albums->id}}">All</a></li>
                                @foreach ($categories as $category)
                                    <li><a href="/article/index?category={{ $category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul> --}}
                        {{-- </li> --}}
                    </div>
                </div>
                <div class="divider"></div>

              <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                  @foreach ($videos as $galery)
                      @if ($galery->draft == 0)
                          <a href="{{ asset('storage/' . $galery->file_path) }}" {{-- target="_blank" --}}
                              data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{$galery->judul}}</br> {{$galery->deskripsi}}" >
                              <div class="col-lg-4 p-4 col-md-6 col-12 portfolio-item filter-{{ strtolower($galery->type_id) }}">
                                  <div class="portfolio-wrap putih" >
                                      <video width="500;" height="300" style="object-fit: cover;">
                                          <source src="{{ asset('storage/' . $galery->file_path) }}"  type="video/mp4">
                                          Your browser does not support the video tag.
                                      </video>
                                      <div class="portfolio-info" >
                                          <h4>{{ $galery->judul }}</h4>
                                          <p>{{ $galery->categoryid }}</p>
                                          <div class="portfolio-links">
                                              <i class="bi bi-plus"></i>
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
                    @if ($videos->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link">&laquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $videos->previousPageUrl() }}&id={{ $albums->id }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&laquo;</a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $videos->lastPage(); $i++)
                        <li class="page-item {{ $videos->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $videos->url($i) }}&id={{ $albums->id }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($videos->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $videos->nextPageUrl() }}&id={{ $albums->id }}" rel="next"
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

      @section('style')
          <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
          <link href="{{asset('dist/css/mobirise/style.css')}}" rel="stylesheet">
      @endsection
