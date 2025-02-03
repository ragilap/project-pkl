@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kolom contact</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default col-md-11 bg-white p-4" style="margin-top: 5px; margin-left:50px;">
            {{-- <div class="row">
                <a class="m-0 pr-3  font-sm-bold" style="padding-left:15px; font-size:23px;" href="{{route('album.index')}}">Album Galeri</a>
                <img class="w-4 h-4  " style="fill:blue; margin-top:11px" src="{{ asset('img/arrow-right.svg') }}">
                <h3 class=" font-md-bold" style="padding-left:13px;  margin-top:5px; font-size:20px; ">{{ $album->nama_album }}</h3>
            </div> --}}
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q"
                        value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Contact"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    {{-- <div class="form-group mr-1">
                        <a class="btn btn-primary " href="{{route('contact.create')}}" data-toggle="tooltip"
                            title="Tambah Galery"><i class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div> --}}
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Nama Kolom</th>
                        <th>Deskripsi kolom</th>
                        <th>Urutan kolom</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="sequential-number"></td>
                            <td>{{ $contactTypes[$contact->type] }}</td>
                            <td>{{ $contact->value }}</td>
                            <td class="row" style="justify-content:center;">
                                <form method="post" action="{{ route('contact.moveDown', $contact) }}">
                                    @csrf
                                    <button data-toggle="tooltip" type="submit" title="Naikan barisan"><img
                                            src="{{ asset('img/panah-up.svg') }}" style="width: 35px; height:35x;"></button>
                                </form>
                                <form method="post" action="{{ route('contact.moveUp', $contact) }}">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Turunkan barisan"><img
                                            src="{{ asset('img/panah-down.svg') }}"
                                            style="width: 35px; height:35x;"></button>
                                </form>
                            </td>

                            <td style="text-align:center;">
                                <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" data-toggle="tooltip"
                                    title="Edit Contact"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>

                                {{-- <form method="POST" action="{{ route('contact.destroy', $contact->id) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"
                                        data-toggle="tooltip" title="Hapus Galery">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form> --}}

                            </td>
                        </tr>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Update the sequential numbers
                                let startingIndex = {{ $startingIndex }};
                                let sequentialNumbers = document.querySelectorAll('.sequential-number');
                                sequentialNumbers.forEach(function(element, index) {
                                    element.textContent = startingIndex + index + 1;
                                });
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="margin-top: 10px;">
                {{-- {{ $galeries->links() }} --}}
            </div>
        </div>
    </div>
@endsection
{{-- @section('styles')

    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Favicons -->
    <link href="{{ asset('template/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}"
        rel="stylesheet">
    <link href="{{ asset('dist/css/album.css') }}" rel="stylesheet">
@endsection
@section('script') --}}
<!-- Template Main CSS File -->
{{-- <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('build/assets/main.js') }}"></script>
@endsection --}}
