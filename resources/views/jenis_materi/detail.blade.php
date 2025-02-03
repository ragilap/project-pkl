@extends('layouts.byte-breadcrumb')
@section('breadcrumb')
    <div class="container position-relative">

        <ol>
            <li><a href="{{ route('article.home') }}">Home</a></li>
            <li><a href="{{ route('article.index') }}">Lesson</a></li>
        </ol>
        <h2>Learn</h2>
    </div>
@endsection
@section('content')
    <!-- CSRF Token -->
    <style>
        .box-information {
            position: relative;
            border: 3px solid grey;
            border-radius: 15px;
            padding: 30px;
        }
    </style>
    <div id="page" class="">
        <main>
            <div class="box-wrap bg-grey-alt">
                <!-- Content -->
                <div class="container flex-grow-1 container-p-y title">
                    <div class="title-heading font-bold" style="font-size: 30px;">
                        <h1>Pengenalan Apa itu html?</h1>
                    </div>{{--
                    <div class="row justify-content-between mb-5">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="item-media">
                                        <div class="box-icon-media">
                                            <div class="thumbnail-img">
                                                <img src="https://smartlms.4visionmedia.net/assets/tmplts_backend/images/profile.jpg"
                                                    alt width="70px" class="ui-w-40 rounded-circle">
                                            </div>
                                            <i class="las la-user-tie"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Instruktur</span>
                                            <h6>
                                                <a href="https://smartlms.4visionmedia.net/pelatihan/creator/5"
                                                    style="text-decoration: none; color: inherit;">
                                                    Smartcoop.id
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="item-media">
                                        <div class="box-icon-media">
                                            <i class="las la-tag"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Kategori</span>
                                            <h6>
                                                <a href="https://smartlms.4visionmedia.net/pelatihan/category/1"
                                                    style="text-decoration: none; color: inherit;">
                                                    Akuntansi
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="item-media">
                                        <div class="box-icon-media">
                                            <i class="las la-star-half-alt"></i>
                                        </div>
                                        <div class="media-body">
                                            <span>Review</span>
                                            <div class="box-stars">
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <strong style="margin-left: 5px; color: black">
                                                    (0)</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="d-flex flex-column">
                                <div class="box-price mb-3">
                                    <div class="large free">Free
                                    </div>
                                </div>


                                <a href="https://smartlms.4visionmedia.net/register/5/free" style="font-size: 1.2em"
                                    class="btn btn-primary filled">Daftar</a>
                            </div>
                        </div>
                    </div> --}}
                    <ul class="nav nav-tabs tabs-alt container-m-nx container-p-x mb-4 justify-end">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#search-pages">
                                <span>Tentang materi</span>
                                <i class="las la-file-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#search-people">
                                <span>module Materi</span>
                                <i class="las la-book-open"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#search-images">
                                <span>Dosen</span>
                                <i class="las la-user-tie"></i>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#search-videos">
                                <span>Reviews</span>
                                <i class="las la-star-half-alt"></i>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#search-comment">
                                <span>Komentar</span>
                                <i class="las la-comment"></i>
                            </a>
                        </li> --}}
                    </ul>

                    <div class="tab-content">
                        <!-- overview -->
                        <div class="tab-pane fade show active" id="search-pages">
                            <div class="row justify-content-between">
                                <div class="col-lg-7">
                                    <!-- <div class="card mb-4">
                                                                                                                                                            <div class="card-body">
                                                                                                                                                                <div class="ui-bordered">
                                                                                                                                                                    <div class="p-4">


                                                                                                                                                                    </div>
                                                                                                                                                                </div>
                                                                                                                                                            </div>
                                                                                                                                                        </div> -->
                                    <article>
                                        <h1 class="font-bold mb-3">Tentang materi</h1>
                                        <p>Jika Anda baru bergabung dengan Byte-craft.id, kami sangat merekomendasikan untuk
                                            mengikuti modul pengenalan R ini.

                                            Modul ini dirancang dengan cara yang interaktif dan didukung oleh AI menggunakan
                                            metode HERO (Hands-On, Experiential Learning and Outcome-Based) untuk membantu
                                            Anda memperoleh manfaat maksimal dari seluruh materi yang tersedia di
                                            Byte-craft.id.
                                        </p>
                                    </article>
                                </div>
                                <div class="col-lg-4">
                                    <div class="box-information">
                                        <ul class="module-detail-list">
                                            <style>
                                                .box-information .chapter_type {
                                                    position: relative;
                                                    display: flex;
                                                    align-items: center;
                                                    flex: row;
                                                    width: 100%;
                                                }

                                                .box-information .chapter_type .title-information i {
                                                    font-size: 24px;
                                                    color: #ffb606;
                                                    margin-right: 5px;
                                                }

                                                .box-information .chapter_type {
                                                    position: relative;
                                                    display: flex;
                                                    justify-content: space-between;
                                                    padding: 15px 0;
                                                    padding-top: 15px;
                                                    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                                                }
                                            </style>
                                            <li class="chapter_type">
                                                <div class="left"><i class="mbri-key"></i>
                                                    Kategory</div> Html
                                            </li>
                                            <li class="chapter_type">
                                                <div class="left"><i class="mbri-key"></i>
                                                    Modul</div> Free
                                            </li>
                                            <li class="chapter_type">
                                                <div class="left"><i class="la la-book-open"></i> Bab</div> <span
                                                    class="value sum_of_chapter">3</span>
                                            </li>
                                            <li class="chapter_type">
                                                <div class="left"><i class="la la-bookmark"></i> Sub-bab</div> <span
                                                    class="value sum_of_subbab">16</span>
                                            </li>
                                            <li class="chapter_type">
                                                <div class="left"><i class="lar la-star"></i> Review</div> <span
                                                    class="value package_rating">4</span>
                                            </li>
                                            <li class="chapter_type">
                                                <div class="left"><i class="lar la-star"></i> Rating</div> <span
                                                    class="value package_rating">4.76 / 5 </span>
                                            </li>
                                            <li id="discountRow" style="display:none;">
                                                <div class="left"><i class="las la-percentage"></i> Discount</div> <span
                                                    class="value discount">0%</span>
                                            </li>
                                            <li id="priceRow" style="display:none;">
                                                <div class="left price"><i class="las la-money-bill-wave"></i> Price</div>
                                                <span class="value price">Rp. 46.460 </span>
                                            </li>
                                            <!-- <li>
                                                                                                                                                                                        <div class="left"><i class="la la-stopwatch"></i> Approx Time</div> <span class="value sum_of_time">30 </span><span class="suffix"> min</span>
                                                                                                                                                                                    </li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / overview -->

                        <!-- curiculum -->
                        <style>
                            .mobile-styling .judul-bahan {
                                margin-left: 25px;
                                max-width: 35ch;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }
                        </style>

                        <!-- Kurikulum -->
                        <div class="tab-pane fade" id="search-people">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="item-curiculum">
                                        <style>
                                            .chapter_item_contents {
                                                width: 100%;
                                                margin: 0;
                                                background: white;
                                                padding: 15px 30px;
                                                position: relative;
                                                border-radius: 10px;
                                                border: 2px solid #DEDEDE;
                                                box-shadow: 0px 0px 13px 0px rgb(82 63 105 / 5%);
                                            }

                                            .list_chapter_container {
                                                margin-bottom: 50px;
                                            }

                                            .list_chapter_container .v2_chapter_item .number span {
                                                margin: auto;
                                                font-size: 15px;
                                                font-weight: bold;
                                            }

                                            .list_chapter_container .v2_chapter_item {
                                                display: -webkit-box;
                                                display: -webkit-flex;
                                                display: -moz-box;
                                                display: -ms-flexbox;
                                                display: flex;
                                                -webkit-flex-wrap: wrap;
                                                -ms-flex-wrap: wrap;
                                                flex-wrap: wrap;
                                                margin-bottom: 20px;
                                            }

                                            .package_name {
                                                font-size: 20px;
                                                font-weight: bold;
                                                color: #333333;
                                                margin-left: 12px;
                                            }

                                            .list_chapter_container .v2_chapter_item .number {
                                                display: -webkit-box;
                                                display: -webkit-flex;
                                                display: -moz-box;
                                                display: -ms-flexbox;
                                                display: flex;
                                                -webkit-flex-wrap: wrap;
                                                -ms-flex-wrap: wrap;
                                                flex-wrap: wrap;
                                                align-items: center;
                                                text-align: center;
                                                width: 40px;
                                                height: 40px;
                                                color: white;
                                                background: #179ab1;
                                                border: 2px solid white;
                                                border-radius: 7px;
                                            }

                                            .chapter_item_list_toggle {
                                                color: #179AB1;
                                                color: #424242;
                                                cursor: pointer;
                                                font-size: 15px;
                                                display: -webkit-box;
                                                display: -webkit-flex;
                                                display: -moz-box;
                                                display: -ms-flexbox;
                                                display: flex;
                                                -webkit-flex-wrap: wrap;
                                                -ms-flex-wrap: wrap;
                                                flex-wrap: wrap;
                                            }

                                            .chapter_item_list {
                                                color: #179ab1;
                                                cursor: pointer;
                                                margin-top: 10px;
                                                float: left;
                                            }

                                            .chapter_item_list .chapter_item_item {
                                                color: #179ab1;
                                                cursor: pointer;
                                                text-decoration: none;
                                                padding: 5px;
                                                border-bottom: 1px solid #efefef;
                                                float: left;
                                                width: 100%;
                                                font-size: 15px;
                                            }

                                            /* .chapter_item_footer {
                                                                                                                                    float: left;
                                                                                                                                    display: flex;
                                                                                                                                    -webkit-flex-wrap: wrap;
                                                                                                                                    -ms-flex-wrap: wrap;
                                                                                                                                    flex-wrap: wrap;
                                                                                                                                    align-items: center;
                                                                                                                                    width: 100%;
                                                                                                                                    padding-top: 20px;
                                                                                                                                } */
                                        </style>
                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                        <script>
                                            $(document).ready(function() {
                                                $('.chapter_item_list_toggle').click(function() {
                                                    var list = $(this).next('.chapter_item_list');
                                                    list.slideToggle();
                                                    console.log(list.slideToggle());
                                                    var downIcon = $(this).find('.la-angle-down');
                                                    var upIcon = $(this).find('.la-angle-up');
                                                    downIcon.toggle();
                                                    upIcon.toggle();
                                                });
                                            });
                                        </script>


                                        <div class="title-curiculum" data-toggle="collapse">
                                            {{-- <h6 class="mr-auto mb-0"><strong> Apa itu Html?</strong></h6> --}}
                                            <i class="las la-chevron-circle-down"></i>
                                            <div class="list_chapter_container">
                                                <div class="v2_chapter_item">
                                                    <div class="chapter_item_contents">
                                                        <div style="display: flex;place-items: center;">
                                                            <div class="number mb-3"><span>1</span></div>
                                                            <span class="package_name mb-3">
                                                                Apa dan Kenapa Belajar di Byte-craft?
                                                            </span>
                                                        </div>
                                                        <p></p>
                                                        <p>
                                                            <span style="color: rgb(33, 37, 41);">
                                                                Bab ini disiapkan khusus
                                                                untuk Anda yang ingin memulai belajar pemrograman R di
                                                                Byte-craft. Dalam bab ini, Anda akan belajar tentang apa itu
                                                                Byte-craft, manfaat dari memilih Byte-craft sebagai platform
                                                                belajar,
                                                                dan cara mengikuti modul ini untuk memaksimalkan
                                                                pembelajaran Anda.
                                                            </span>
                                                            <br />
                                                        </p>
                                                        <p></p>
                                                        <div class="chapter_item_list_toggle">
                                                            <div class="mt-3" style="flex:2;font-weight: 600;">
                                                                Sub-bab yang akan dipelajari:
                                                                <i class="la la-angle-down down-icon"></i>
                                                                <i class="la la-angle-up up-icon"></i>
                                                            </div>
                                                            <div class=""><i class="la la-medal"></i>430 / 430</div>
                                                        </div>
                                                        <div class="chapter_item_list" style="display: none; width: 100%;">
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5385?pr=0">
                                                                <i class="la la-book-open"></i> | Metode Belajar dengan AI
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5386?pr=0">
                                                                <i class="la la-book-open"></i> | Kenapa Belajar Data harus
                                                                Coding?
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5387?pr=0">
                                                                <i class="la la-code"></i> | Mengenal Live Code
                                                                Editor
                                                                <span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5388?pr=0"><i
                                                                    class="la la-code"></i> | Praktek bersama AI<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5389?pr=0"><i
                                                                    class="la la-code"></i> | Belajar melalui Error<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5410?pr=0"><i
                                                                    class="la la-code"></i> | Menghasilkan Grafik pada Live
                                                                Code Editor<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5390?pr=0"><i
                                                                    class="la la-book-open"></i> | Storytelling dan
                                                                Karakter Byte-craft<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="chapter_item_footer">
                                                            <div class="progress" style="margin-top:20px;">
                                                                <div class="progress-bar progress-bars" role="progressbar"
                                                                    aria-valuenow="100.00" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width: 100%; background-color: rgb(52, 191, 163);">
                                                                    100%
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-raised  " data-chapter-id="928"
                                                                data-last-chapter-item-id="5390"
                                                                style="background-color: #179AB1; color:white;padding: 6px 16px 6px 16px;border-radius: 8px; float: right; margin-top:10px;"
                                                                href="main/livecode/389/928/5390?pr=0">Mulai Belajar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title-curiculum" data-toggle="collapse">
                                            {{-- <h6 class="mr-auto mb-0"><strong> Apa itu Html?</strong></h6> --}}
                                            <i class="las la-chevron-circle-down"></i>
                                            <div class="list_chapter_container">
                                                <div class="v2_chapter_item">
                                                    <div class="chapter_item_contents">
                                                        <div style="display: flex;place-items: center;">
                                                            <div class="number mb-3"><span>1</span></div>
                                                            <span class="package_name mb-3">
                                                                Apa dan Kenapa Belajar di Byte-craft?
                                                            </span>
                                                        </div>
                                                        <p></p>
                                                        <p>
                                                            <span style="color: rgb(33, 37, 41);">
                                                                Bab ini disiapkan khusus
                                                                untuk Anda yang ingin memulai belajar pemrograman R di
                                                                Byte-craft. Dalam bab ini, Anda akan belajar tentang apa itu
                                                                Byte-craft, manfaat dari memilih Byte-craft sebagai platform
                                                                belajar,
                                                                dan cara mengikuti modul ini untuk memaksimalkan
                                                                pembelajaran Anda.
                                                            </span>
                                                            <br />
                                                        </p>
                                                        <p></p>
                                                        <div class="chapter_item_list_toggle">
                                                            <div class="mt-3" style="flex:2;font-weight: 600;">
                                                                Sub-bab yang akan dipelajari:
                                                                <i class="la la-angle-down down-icon"></i>
                                                                <i class="la la-angle-up up-icon"></i>
                                                            </div>
                                                            <div class=""><i class="la la-medal"></i>430 / 430</div>
                                                        </div>
                                                        <div class="chapter_item_list" style="display: none; width: 100%;">
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5385?pr=0">
                                                                <i class="la la-book-open"></i> | Metode Belajar dengan AI
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5386?pr=0">
                                                                <i class="la la-book-open"></i> | Kenapa Belajar Data harus
                                                                Coding?
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5387?pr=0">
                                                                <i class="la la-code"></i> | Mengenal Live Code
                                                                Editor
                                                                <span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5388?pr=0"><i
                                                                    class="la la-code"></i> | Praktek bersama AI<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5389?pr=0"><i
                                                                    class="la la-code"></i> | Belajar melalui Error<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5410?pr=0"><i
                                                                    class="la la-code"></i> | Menghasilkan Grafik pada Live
                                                                Code Editor<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5390?pr=0"><i
                                                                    class="la la-book-open"></i> | Storytelling dan
                                                                Karakter Byte-craft<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="chapter_item_footer">
                                                            <div class="progress" style="margin-top:20px;">
                                                                <div class="progress-bar progress-bars" role="progressbar"
                                                                    aria-valuenow="100.00" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width: 100%; background-color: rgb(52, 191, 163);">
                                                                    100%
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-raised  " data-chapter-id="928"
                                                                data-last-chapter-item-id="5390"
                                                                style="background-color: #179AB1; color:white;padding: 6px 16px 6px 16px;border-radius: 8px; float: right; margin-top:10px;"
                                                                href="main/livecode/389/928/5390?pr=0">Mulai Belajar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title-curiculum" data-toggle="collapse">
                                            {{-- <h6 class="mr-auto mb-0"><strong> Apa itu Html?</strong></h6> --}}
                                            <i class="las la-chevron-circle-down"></i>
                                            <div class="list_chapter_container">
                                                <div class="v2_chapter_item">
                                                    <div class="chapter_item_contents">
                                                        <div style="display: flex;place-items: center;">
                                                            <div class="number mb-3"><span>1</span></div>
                                                            <span class="package_name mb-3">
                                                                Apa dan Kenapa Belajar di Byte-craft?
                                                            </span>
                                                        </div>
                                                        <p></p>
                                                        <p>
                                                            <span style="color: rgb(33, 37, 41);">
                                                                Bab ini disiapkan khusus
                                                                untuk Anda yang ingin memulai belajar pemrograman R di
                                                                Byte-craft. Dalam bab ini, Anda akan belajar tentang apa itu
                                                                Byte-craft, manfaat dari memilih Byte-craft sebagai platform
                                                                belajar,
                                                                dan cara mengikuti modul ini untuk memaksimalkan
                                                                pembelajaran Anda.
                                                            </span>
                                                            <br />
                                                        </p>
                                                        <p></p>
                                                        <div class="chapter_item_list_toggle">
                                                            <div class="mt-3" style="flex:2;font-weight: 600;">
                                                                Sub-bab yang akan dipelajari:
                                                                <i class="la la-angle-down down-icon"></i>
                                                                <i class="la la-angle-up up-icon"></i>
                                                            </div>
                                                            <div class=""><i class="la la-medal"></i>430 / 430</div>
                                                        </div>
                                                        <div class="chapter_item_list" style="display: none; width: 100%;">
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5385?pr=0">
                                                                <i class="la la-book-open"></i> | Metode Belajar dengan AI
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5386?pr=0">
                                                                <i class="la la-book-open"></i> | Kenapa Belajar Data harus
                                                                Coding?
                                                                <span class="float-right">
                                                                    <i class="la la-check"></i>
                                                                </span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5387?pr=0">
                                                                <i class="la la-code"></i> | Mengenal Live Code
                                                                Editor
                                                                <span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5388?pr=0"><i
                                                                    class="la la-code"></i> | Praktek bersama AI<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5389?pr=0"><i
                                                                    class="la la-code"></i> | Belajar melalui Error<span
                                                                    class="float-right"><i class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5410?pr=0"><i
                                                                    class="la la-code"></i> | Menghasilkan Grafik pada Live
                                                                Code Editor<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                            <a class="chapter_item_item "
                                                                href="main/livecode/389/928/5390?pr=0"><i
                                                                    class="la la-book-open"></i> | Storytelling dan
                                                                Karakter Byte-craft<span class="float-right"><i
                                                                        class="la la-check"></i></span>
                                                            </a>
                                                        </div>
                                                        <div class="chapter_item_footer">
                                                            <div class="progress" style="margin-top:20px;">
                                                                <div class="progress-bar progress-bars" role="progressbar"
                                                                    aria-valuenow="100.00" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width: 100%; background-color: rgb(52, 191, 163);">
                                                                    100%
                                                                </div>
                                                            </div>
                                                            <a class="btn btn-raised  " data-chapter-id="928"
                                                                data-last-chapter-item-id="5390"
                                                                style="background-color: #179AB1; color:white;padding: 6px 16px 6px 16px;border-radius: 8px; float: right; margin-top:10px;"
                                                                href="main/livecode/389/928/5390?pr=0">Mulai Belajar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="company-faq-2" class="collapse sublist-curiculum"
                                            data-parent="#search-people">
                                            <div class="card-body px-0">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-1">
                                                        <a href="javascript:void(0)"
                                                            class="text-big font-weight-semibold">
                                                            <i class="las la-file-pdf mr-2"
                                                                style="font-size: 3em; color:orange"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-11" id="dynamicContent-0-0">
                                                        <div class="row no-gutters align-items-center">
                                                            <div class="col-11">
                                                                <h6 class="judul-bahan">Panduan Penggunaan Fitur Data
                                                                    Master</h6>
                                                            </div>
                                                            <div class="media col-1 align-items-center">
                                                                <div class="media-body flex-truncate ml-2"
                                                                    style="color: orange">
                                                                    <h6><i class="fas fa-lock"></i></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                // Check if the screen width is below a certain threshold (e.g., 768px for typical mobile devices)
                                                if (window.innerWidth <= 768) {
                                                    var dynamicContent = document.getElementById('dynamicContent-0-0');
                                                    if (dynamicContent) {
                                                        dynamicContent.classList.add('mobile-styling');
                                                    }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / People -->
                        <!-- / curiculum -->

                        <!-- instructor -->
                        <div class="tab-pane fade" id="search-images">
                            <!-- Header -->
                            <div class="container">
                                <div class="media col-md-12">


                                    <img src="https://smartlms.4visionmedia.net/assets/tmplts_backend/images/profile.jpg"
                                        alt width="70px" height="70px" class="ui-w-40 rounded-circle">
                                    <div class="media-body pt-2 ml-3">
                                        <h6 class="mb-2"> <strong style="color: grey">Dosen</strong></h6>
                                        <h6><strong style="color: rgb(53, 53, 53)">Ragil adi prasetio</strong></h6>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / instructor -->

                        <!-- Reviews -->
                        <div class="tab-pane fade" id="search-videos">
                            <div class="row">
                                <div class="container">
                                    <div class="card mb-4">
                                        <h6 class="card-header with-elements">
                                            <span class="card-header-title"> Rating</span>
                                        </h6>
                                        <div class="card-body shadow">
                                            <div class="progress-course mb-4">
                                                <div class="progress">
                                                    <span class="badge badge-warning"> 5 </span>
                                                    <div class="progress-bar" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-course mb-4">
                                                <div class="progress">
                                                    <span class="badge badge-warning"> 4 </span>
                                                    <div class="progress-bar" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-course mb-4">
                                                <div class="progress">
                                                    <span class="badge badge-warning"> 3 </span>
                                                    <div class="progress-bar" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-course mb-4">
                                                <div class="progress">
                                                    <span class="badge badge-warning"> 2 </span>
                                                    <div class="progress-bar" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress-course mb-4">
                                                <div class="progress">
                                                    <span class="badge badge-warning"> 1 </span>
                                                    <div class="progress-bar" style="width: 0%;">
                                                        0%
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center text-muted">
                                                <h3 class="badge badge-primary" style="font-size: 20px;">
                                                    0
                                                </h3><br>
                                                0 Rating Peserta <br class="mb-2">
                                                <div class="mb-1"></div>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                                <i class="far fa-star text-warning" style="font-size: 1.2em;"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Reviews -->

                        <!-- Comment -->
                        <div class="tab-pane fade" id="search-comment">
                            <div class="col-md-12" style="margin-top: 40px" id="comment-list">
                            </div>
                        </div>
                        <!-- / Comment -->
                    </div>
                </div>
                <!-- / Content -->

                <!-- Modal input otp -->


                <!-- Modal -->

            </div>
        </main>
    </div>


    <!-- jQuery.min.js -->

    <!-- jQuery Global-->
    <script src="https://smartlms.4visionmedia.net/assets/tmplts_frontend/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-f8BIrFI0l-uJ5HRS"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>



    <script>
        //PRE-LOAD
        $(document).ready(function() {
            $('.preloader').delay(1000).fadeOut();
            $('#main').delay(1000).fadeIn();
        });
    </script>

    <script>
        var session = "";
        if (session) {
            $('#myModal').modal('show');
        }
    </script>
@endsection
