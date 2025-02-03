@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Customize Slider image</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default col-md-11 bg-white p-4" style="margin-top: 5px; margin-left:50px;">
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Slider"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>
                    <div class="form-group mr-1">
                        <a class="btn btn-primary " data-toggle="tooltip" title="Buat Slider" href="{{route('sliderimage.create')}}"><i
                                class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Gambar Logo</th>
                        <th>Nama </th>
                        <th>Deskripsi</th>
                        <th>Position</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($sliders as $slider)

                    <tr>
                            <td class="sequential-number"></td>
                            <td style="width: 270px; height: 150px;">
                                <a type="submit" data-toggle="modal"
                                    data-target="#detailModal{{ $slider->id }}">
                                    <img src="{{ asset('storage/' . $slider->image) }}" style="width: 270px; height:150px; border-radius:5px; object-fit:cover;" alt="{{ $slider->nama }}"
                                        data-toggle="tooltip" title="Photo Slider">
                                </a>
                                @include('backend.slider_image.detail')
                            </td>
                            <td>{{ $slider->nama }}</td>
                            <td>{{ $slider->deskripsi }}</td>
                            <td class="row " style="justify-content:center; border-style: none;">
                                <form style="border: " method="post" action="{{ route('sliderimage.moveDown', $slider) }}">
                                    @csrf
                                    <button data-toggle="tooltip" type="submit" title="Naikan barisan"><img
                                            src="{{ asset('img/panah-up.svg') }}" style="width: 35px; height:35x;"></button>
                                </form>
                                <form method="post" action="{{ route('sliderimage.moveUp', $slider) }}">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Turunkan barisan"><img
                                            src="{{ asset('img/panah-down.svg') }}"
                                            style="width: 35px; height:35x;"></button>
                                </form>
                            </td>
                            <td style="text-align:center;">
                                <a href="{{ route('sliderimage.edit', $slider->id) }}" data-toggle="tooltip"
                                    title="Edit Slider"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>

                                            <form method="POST" action="{{ route('sliderimage.destroy', $slider->id) }}"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Slider"
                                                    onclick="return confirm('Hapus Data?')">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </form>
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
            </div>
        </div>
    </div>
@endsection
