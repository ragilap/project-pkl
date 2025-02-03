<div class="container-fluid container-m d-flex align-items-center pt-1 pb-1 justify-content-between">

    @if ($logos->type_id == 1)
        <a class="logo d-flex  align-items-center">
            <img src="{{ asset('storage/' . $logos->image) }}" alt="">
            <span>{{ $logos->nama }}</span>
        </a>
    @elseif($logos->type_id == 2)
        <a class="d-flex align-items-center ml-12">
            <img src="{{ asset('storage/' . $logos->image) }}" style="width: 100px; height:50px;" alt="">
        </a>
    @endif
    <nav id="navbar" class="navbar stroke">
        <ul>
            <li><a class="nav-link scrollto {{ url()->current() == route('article.home') ? 'active' : '' }}"
                    href="{{ route('article.home') }}"><span>Home</span></a></li>
            <!-- <li><a class="nav-link scrollto" href="#about">About</a></li>-->
            <li>
            <li class="dropdown"><a><span>Tutorial</span><i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a class="dropdown_a nav-link scrollto {{ Request::is('module*') ? 'active' : '' }}"
                            href="{{ route('modul.index') }}"><span>Start learn</span></a></li>
                    <li><a class="dropdown_a nav-link scrollto {{ Request::is('article*') ? 'active' : '' }}"
                            href="{{ route('article.index') }}">Article</a></li>
                </ul>
            </li>
            <li class="dropdown "><a><span>Album</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                    <li><a class="dropdown_a nav-link {{ Request::is('Albums*') || Request::is('video*') ? 'active' : '' }}"
                            href="{{ route('album.video.index') }}">Video</a></li>
                    <li><a class="dropdown_a nav-link {{ Request::is('albums*') || Request::is('galery*') ? 'active' : '' }}"
                            href="{{ route('album.index') }}">Photo</a></li>
                </ul>
            </li>
            <li class="drop"><a class="nav-link scrollto {{ Request::is('info/*') ? 'active' : '' }}"
                    href="{{ route('info.index') }}"><span>Contact</span>   </a></li>
            @guest
                <li class="row ml-11">
                <li class="w-fit"> <button
                        id="{{ url()->current() == route('article.home') ? 'sign-in-home' : 'sign-in' }}"
                        class="sign-in-home">Sign in</button></li>
                <li class="ml-3 w-fit"><button
                        id="{{ url()->current() == route('article.home') ? 'sign-up-home' : 'sign-up' }}"
                        href="auth-signup-basic.html" class="sign-up scrollto">Sign Up</button></li>
                </li>
            @endguest
        </ul>
        @auth
            <div class="dropdown ms-sm-3 h-3 ml-26 header-item topbar-user">
                <button type="button" class="btn button-log" id="sign-up-home" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center">
                        @if (Auth::user()->profile_image)
                            <img src="{{ asset('uploads/profile_images/' . Auth::user()->profile_image) }}"
                                class="rounded-circle header-profile-user" alt="Foto Profil">
                        @else
                            <img src="{{ asset('img/default.png') }}" class="rounded-circle header-profile-user"
                                alt="Foto Profil">
                        @endif
                        <span class="text-start ms-xl-2">
                            <span
                                class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                            <span
                                class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">{{ Auth::user()->role }}</span>
                        </span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" id="sign-in-home">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}</h6>
                    <a class="dropdown-item" href="{{ route('profile.user-edit') }}"> <i
                            class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                            class="align-ma">Settings</span></a>
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
        @endauth
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.sign-in-home').click(function() {
            window.location.href = '/login';
        });

        $('.sign-up').click(function() {
            window.location.href = '/register';
        });
    });
</script>
