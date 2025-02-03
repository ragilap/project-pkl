{{-- <!-- ======= Footer ======= -->
<div class="footer-top" style="background: url('{{ asset('template/img/footer-bg.png') }}');">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info m-2">
                @if ($logos->type_id == 1)
                    <a class="logo d-flex align-items-center">
                        <img src="{{ asset('storage/' . $logos->image) }}" alt="">
                        <span>{{ $logos->nama }}</span>
                    </a>
                @elseif($logos->type_id == 2)
                    <a class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $logos->image) }}" style="width: 100px; height:50px;"
                            alt="">
                    </a>
                @endif
                <p>{{ $logos->quote }}
                <p>{{ $logos->deskripsi }}</p>
                </p>
                <div class="social-links mt-3">
                    @foreach ($socials as $social)
                        <a href="{{ $social->link }}/" class="{{ $social->nama }}"><i
                                class="bi bi-{{ $social->icon }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('article.index') }}">Article</a>
                    </li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('galery.index') }}">Photo</a>
                    </li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('video.index') }}">Video</a>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('info.index') }}">Contact</a>
                </ul>
            </div>


            <div class="col-lg-3 col-6 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                <div style="margin-bottom: 10px; width: 300px;">{{ $tempat->value }}</div>

                <div>
                    <strong>Phone:</strong> {{ $no->value }}<br>
                    <strong>Email:</strong> {{ $email->value }}<br>
                    <div>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Byte-craft</span></strong>. All Rights Reserved
            </div>
            <div class="credits">Designed by <a href="#">Ragil adi prasetio</a>
            </div>
        </div> --}}

{{-- <link href="{{asset('dist/css/velzon-boot.min.css')}}" rel="stylesheet"> --}}
<div class="container">
    <div class="row">
        <div class="col-lg-4 mt-4">
            <div>
                <div>
                    <img src="{{ asset('storage/' . $logos->image) }}" alt="logo light" height="17">
                </div>
                <div class="mt-4 fs-13 custom-footer">
                    <p>{{ $logos->quote }}</p>
                    <p class="ff-secondary">{{ $logos->deskripsi }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-7 ms-lg-auto">
            <div class="row">
                <div class="col-sm-4 mt-4">
                    <h5 class="text-white mb-0" style="font-weight: bold;">App Pages</h5>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled ff-secondary footer-list">
                            <li><a href="{{route('article.home')}}"><i class="bi bi-chevron-right"></i> Home</a></li>
                            <li><a href="{{route('article.index')}}"><i class="bi bi-chevron-right"></i> Article</a></li>
                            <li><a href="{{route('album.index')}}"><i class="bi bi-chevron-right"></i> Photo</a></li>
                            <li><a href="{{route('album.video.index')}}"><i class="bi bi-chevron-right"></i> Video</a></li>
                            <li><a href="{{route('contact.index')}}"><i class="bi bi-chevron-right"></i> contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 mt-4">
                    <h5 class="text-white mb-0" style="font-weight: bold;">Contact-us</h5>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled ff-secondary footer-list">
                            <li><a href="pages-pricing.html">{{ $tempat->value }}</a></li>
                            <li><a href="apps-chat.html"><strong>Phone:</strong>
                                    {{ $no->value }}<br><strong>Email:</strong> {{ $email->value }}<br></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 mt-4">
                    <h5 class="text-white mb-0" style="font-weight: bold;">Support</h5>
                    <div class="text-muted mt-3">
                        <ul class="list-unstyled ff-secondary footer-list">
                            <li><a href="pages-faqs.html"><i class="bi bi-chevron-right"></i> FAQ</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i> Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row text-center text-sm-start align-items-center mt-5">
        <div class="col-sm-6">

            <div>
                <p class="copy-rights mb-0">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Byte-Craft - Ragil adi prasetio
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="text-sm-end mt-3 mt-sm-0">
                <ul class="list-inline mb-0 footer-social-link">
                    @foreach ($socials as $social)
                        <li class="list-inline-item">
                            <a href="{{ $social->link }}" class="avatar-xs d-block">
                                <div class="avatar-title rounded-circle">
                                    <i class="ri-{{ $social->icon }}-fill icon-contact"></i>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    {{-- <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-github-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-linkedin-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-google-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-dribbble-line"></i>
                                        </div>
                                    </a>
                                </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>

<style>
    .footer-list li a {
        color: #9ba7b3;
        padding: 7px 0;
        display: block;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }

    .custom-footer {
        color: #9ba7b3;
    }

    .avatar-title {
        height: 40px;
        margin: auto;
        width: 40px;
        border-radius: 100%;
        background-color: white;
    }

    .icon-contact {
        justify-content: center;
        display: flex;
        padding-top: 7px;
    }
</style>
