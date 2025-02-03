@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Informations </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Informations</li>
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
                <form class="form-inline" style="padding: 5px;">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Informations"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi Judul</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($infos as $info)
                    <tr>
                            <td class="sequential-number"></td>
                            <td style="width: 270px; height: 150px;">
                                <a type="submit" data-toggle="modal"
                                    data-target="#detailModal{{ $info->id }}">
                                    <img src="{{ asset('storage/' . $info->image) }}" style="width: 270px; height:150px; border-radius:5px; object-fit:cover;" alt="{{ $info->Judul }}"
                                        data-toggle="tooltip" title="Photo Information">
                                </a>
                                @include('about.information.detail')
                            </td>
                            <td style="width: fit-content;">{{ $info->judul }}</td>
                            <td>{{ $info->isi }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('info.edit', ['id' => $info->id]) }}" data-toggle="tooltip"
                                    title="Edit Informations"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>
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
