@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Our Value</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">About us</li>
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
                        <input class="form-control" type="text" name="q" info="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Our Value"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    {{-- <div class="form-group ml-1">
                        <a class="btn btn-primary" style="margin-left: 600px; border-radius:10%;" href="{{ route('infovalue.create') }}" data-toggle="tooltip"
                            title="Tambah Galery"><i class="fas fa-plus" style="margin:3px;"></i>Image info</a>
                    </div> --}}
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>judul</th>
                        <th>Deskripsi</th>
                        <th>icon</th>
                        <th>Position</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($infos as $info)
                        <tr>
                            <td class="sequential-number"></td>
                            <td style="width: fit-content;">{{ $info->judul }}</td>
                            <td>{{ $info->deskripsi }}</td>
                            <td>{{ $info->icon }}</td>
                            <td class="row" style="justify-content:center;">
                                <form method="post" action="{{ route('infovalue.moveDown', $info) }}">
                                    @csrf
                                    <button data-toggle="tooltip" type="submit" title="Naikan barisan"><img
                                            src="{{ asset('img/panah-up.svg') }}" style="width: 35px; height:35x;"></button>
                                </form>
                                <form method="post" action="{{ route('infovalue.moveUp', $info) }}">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Turunkan barisan"><img
                                            src="{{ asset('img/panah-down.svg') }}"
                                            style="width: 35px; height:35x;"></button>
                                </form>
                            </td>
                            <td style="text-align:center;">
                                <a href="{{ route('infovalue.edit', ['id' => $info->id]) }}" data-toggle="tooltip"
                                    title="Edit Our Value"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
@endsection
