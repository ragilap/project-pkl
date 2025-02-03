<ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-item {{ Request::is('backend') ? 'menu-open' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('backend') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
        </a>
    </li>

    <li class="nav-item {{ Request::is('article*') || Request::is('admin*') ? 'menu-open' : '' }} ">
        <a href="{{ route('article.crud') }}"
            class="nav-link d-flex align-items-center {{ Request::is('article*') || Request::is('admin*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book position-absolute"></i>
            <p style="padding-left: 35px">Article</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('materi*') || Request::is('sub-materi*')||Request::is('module*') ? 'menu-open' : '' }} ">
        <a href="#"
            class="nav-link d-flex align-items-center {{ Request::is('materi*') || Request::is('sub-materi')||Request::is('module*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-book position-absolute"></i>
            <p style="padding-left: 35px">Ruang belajar <i class="right fas fa-angle-left"></i></p>
        </a>

        <ul class="nav nav-treeview">
            <li class="nav-item {{ Request::is('module*') || Request::is('module*') ? 'menu-open' : '' }} ">
                <a href="{{ route('modul.crud') }}"
                    class="nav-link d-flex align-items-center {{ Request::is('module*') || Request::is('module*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book position-absolute"></i>
                    <p style="padding-left: 35px">Module</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('materi*') || Request::is('materi*') ? 'menu-open' : '' }} ">
                <a href="{{ route('materi.crud') }}"
                    class="nav-link d-flex align-items-center {{ Request::is('materi*') || Request::is('materi') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book position-absolute"></i>
                    <p style="padding-left: 35px">Materi</p>
                </a>
            </li>
        </ul>
    </li>
    <li
        class="nav-item {{ Request::is('albums*') || Request::is('galery*') || Request::is('Albums*') || Request::is('video*') || Request::is('crud*') || Request::is('categoryalbum*') ? 'menu-open' : '' }}">
        <a href="#"
            class="nav-link {{ Request::is('albums*') || Request::is('galery*') || Request::is('Albums*') || Request::is('video*') || Request::is('crud*') || Request::is('categoryalbum*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-folder"></i>
            <p>
                Gallery
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item  ">
                <a href="{{ route('album.crud') }}"
                    class="nav-link {{ Request::is('albums*') || Request::is('galery*') || Request::is('crud*') ? 'active' : '' }}">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('albums*') || Request::is('galery*') || Request::is('crud*') ? asset('img/album-photo.svg') : asset('img/album-photo-white.svg') }}">

                    <p style="padding-left: 40px;">Photo</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('album.video.crud') }}"
                    class="nav-link {{ Request::is('Albums*') || Request::is('video*') ? 'active' : '' }}">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('Albums*') || Request::is('video*') ? asset('img/album-video.svg') : asset('img/album-video white.svg') }}">
                    <p style="padding-left:40px;">Video</p>
                </a>
            </li>
            {{-- <li class="nav-item  ">
                <a href="{{ route('categoryalbum.crud') }}"
                    class="nav-link {{ Request::is('categoryalbum*') ? 'active' : '' }}">
                    <span class="bi bi-tags position-absolute ml-1 mb-2 "></span>
                    <p style="padding-left: 40px;">Category Galery</p>
                </a>
            </li> --}}
        </ul>
    </li>
    <li
        class="nav-item {{ Request::is('About-us*') || Request::is('info*') || Request::is('infovalue*') || Request::is('image/*') || Request::is('team/*') || Request::is('social*') || Request::is('map*') || Request::is('contact*') || Request::is('message*') ? 'menu-open' : '' }}">
        <a href="#"
            class="nav-link {{ Request::is('About-us*') || Request::is('info*') || Request::is('infovalue*') || Request::is('image/*') || Request::is('team/*') || Request::is('social*') || Request::is('map*') || Request::is('contact*') || Request::is('message*') ? 'active' : '' }} ">
            <img class="w-5 h-5 position-absolute " style="margin-left: 5px;" src="{{ asset('img/about-us.svg') }}"
                alt="about us">
            <p style="padding-left: 35px;">
                Contact
                <i class="right fas fa-angle-left mt-1"></i>
                <span class="right badge badge-danger icon-jumlah">New</span>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item ">
                <a href="{{ route('team.crud') }}"
                    class="nav-link {{ Request::is('team/*') || Request::is('socialteams/*') ? 'active' : '' }} ">
                    <span class="mbri-users font-bold position-absolute mt-1 ml-1 w-5 h-5"></span>
                    <p style="padding-left: 43px;">Team</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('map.crud') }}" class="nav-link {{ Request::is('map*') ? 'active' : '' }} ">
                    <span class="mbri-map-pin font-bold position-absolute mt-1 ml-1 w-5 h-5"></span>
                    <p style="padding-left: 43px;">Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('contact.crud') }}"
                    class="nav-link {{ Request::is('About-us*') ? 'active' : '' }} ">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('About-us*') ? asset('img/contact-us-black.svg') : asset('img/contact-us.svg') }}">
                    <p style="padding-left: 43px;">Contact </p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('message.crud') }}" class="nav-link {{ Request::is('message*') ? 'active' : '' }} ">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('Message*') ? asset('img/contact-us-black.svg') : asset('img/mailbox.svg') }}">
                    <p style="padding-left: 43px;">Mail-box <span class=" icon-jumlah badge badge-info right">
                            {{ \App\Models\Message::unreadCount() }} </span></p>
                </a>
            </li>
            {{-- <li class="nav-item  ">
                <a href="{{ route('info.crud') }}" class="nav-link {{ Request::is('info/*') ? 'active' : '' }} ">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('info/*') ? asset('img/information-black.svg') : asset('img/information-white.svg') }}">

                    <p style="padding-left: 43px; ">Information</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item ">
                <a href="{{ route('infovalue.crud') }}"
                    class="nav-link {{ Request::is('infovalue*') ? 'active' : '' }}">

                    <span
                        class="mbri-{{ Request::is('infovalue*') ? 'growing-chart mt-1 position-absolute' : 'growing-chart mt-1 position-absolute' }}"
                        style="margin-left:5px; font-weight:bold;"></span>
                    <p style="padding-left: 43px; ">Our value</p>
                </a>
            </li> --}}
            {{-- <li class="nav-item ">
                <a href="{{ route('image.crud') }}" class="nav-link {{ Request::is('image/*') ? 'active' : '' }} ">
                    <span class="position-absolute ml-1 mt-1 w-5 h-5 mbri-photo"></span>
                    <p style="padding-left: 43px;">Image Header</p>
                </a>
            </li> --}}
            <li class="nav-item  ">
                <a href="{{ route('social.crud') }}" class="nav-link {{ Request::is('social/*') ? 'active' : '' }}">
                    <span class="position-absolute ml-1 mt-1 w-5 h-5 mbri-globe"></span>
                    <p style="padding-left: 40px;">Socials</p>
                </a>
            </li>
            {{-- <li class="nav-item  ">
                <a href="{{ route('contactfooter.crud') }}"
                    class="nav-link {{ Request::is('contactfooter*') ? 'active' : '' }}">
                    <span class="mbri-pin position-absolute ml-1 mt-1"></span>
                    <p style="padding-left: 40px;">Contact Footer</p>
                </a>
            </li> --}}
        </ul>
    <li
        class="nav-item {{ Request::is('Logo*') || Request::is('sliderimage*') || Request::is('category/*') ? 'menu-open' : '' }}">
        <a href="#"
            class="nav-link  {{ Request::is('Logo*') || Request::is('sliderimage*') || Request::is('category/*') ? 'active' : '' }}">
            <span class="mbri-setting3 position-absolute mt-1" style="margin-left: 6px;"></span>
            <p style="padding-left:35px;">
                Settings
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item ">
                <a href="{{ route('logo.crud') }}" class="nav-link {{ Request::is('Logo*') ? 'active' : '' }}">
                    <img class="position-absolute ml-1 w-5 h-5"
                        src="{{ Request::is('Logo*') ? asset('img/logo-black.svg') : asset('img/logo-white.svg') }}">

                    <p style="padding-left: 40px;">Logo</p>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('sliderimage.crud') }}"
                    class="nav-link {{ Request::is('sliderimage*') ? 'active' : '' }}">
                    <span class="mbri-image-slider position-absolute ml-1 mt-1"></span>
                    <p style="padding-left: 40px;">Slider</p>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('category.crud') }}"
                    class="nav-link {{ Request::is('category/*') ? 'active' : '' }}">
                    <span class="bi bi-tags position-absolute ml-1 mb-2 "></span>
                    <p style="padding-left: 40px;">Category</p>
                </a>
            </li>
        </ul>
    </li>
    @can('superadmin-access')
        <li class="nav-item {{ Request::is('user*') ? 'menu-open' : '' }}">
            <a href="{{ route('user.index') }}"
                class="nav-link d-flex align-items-center {{ Request::is('user*') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                    style="fill:#fafafa; position:absolute; margin-left:5px" viewBox="0 0 640 512">
                    <path
                        d="M224 0a128 128 0 1 1 0 256A128 128 0 1 1 224 0zM178.3 304h91.4c11.8 0 23.4 1.2 34.5 3.3c-2.1 18.5 7.4 35.6 21.8 44.8c-16.6 10.6-26.7 31.6-20 53.3c4 12.9 9.4 25.5 16.4 37.6s15.2 23.1 24.4 33c15.7 16.9 39.6 18.4 57.2 8.7v.9c0 9.2 2.7 18.5 7.9 26.3H29.7C13.3 512 0 498.7 0 482.3C0 383.8 79.8 304 178.3 304zM436 218.2c0-7 4.5-13.3 11.3-14.8c10.5-2.4 21.5-3.7 32.7-3.7s22.2 1.3 32.7 3.7c6.8 1.5 11.3 7.8 11.3 14.8v30.6c7.9 3.4 15.4 7.7 22.3 12.8l24.9-14.3c6.1-3.5 13.7-2.7 18.5 2.4c7.6 8.1 14.3 17.2 20.1 27.2s10.3 20.4 13.5 31c2.1 6.7-1.1 13.7-7.2 17.2l-25 14.4c.4 4 .7 8.1 .7 12.3s-.2 8.2-.7 12.3l25 14.4c6.1 3.5 9.2 10.5 7.2 17.2c-3.3 10.6-7.8 21-13.5 31s-12.5 19.1-20.1 27.2c-4.8 5.1-12.5 5.9-18.5 2.4l-24.9-14.3c-6.9 5.1-14.3 9.4-22.3 12.8l0 30.6c0 7-4.5 13.3-11.3 14.8c-10.5 2.4-21.5 3.7-32.7 3.7s-22.2-1.3-32.7-3.7c-6.8-1.5-11.3-7.8-11.3-14.8V454.8c-8-3.4-15.6-7.7-22.5-12.9l-24.7 14.3c-6.1 3.5-13.7 2.7-18.5-2.4c-7.6-8.1-14.3-17.2-20.1-27.2s-10.3-20.4-13.5-31c-2.1-6.7 1.1-13.7 7.2-17.2l24.8-14.3c-.4-4.1-.7-8.2-.7-12.4s.2-8.3 .7-12.4L343.8 325c-6.1-3.5-9.2-10.5-7.2-17.2c3.3-10.6 7.7-21 13.5-31s12.5-19.1 20.1-27.2c4.8-5.1 12.4-5.9 18.5-2.4l24.8 14.3c6.9-5.1 14.5-9.4 22.5-12.9V218.2zm92.1 133.5a48.1 48.1 0 1 0 -96.1 0 48.1 48.1 0 1 0 96.1 0z" />
                </svg>
                <p style="padding-left: 35px">User</p>
            </a>
        </li>
    @endcan
    {{-- <li class="nav-item ">
                <a href="{{ route('pelanggan.index') }}" class="nav-link">
                    <i class="fas fa-users" style=" margin-left:3px; margin-right:8px;"></i>
                    <p>
                        Customer
                    </p>
                </a>
            </li> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            var pesan = {{ \App\Models\Message::unreadCount() }}

            if (pesan != null && pesan != undefined && pesan != "") {
                $(".icon-jumlah").show();
            } else {
                $(".icon-jumlah").hide();
            }

        });
    </script>
