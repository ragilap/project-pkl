@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Image Header</h1>
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
                <a class="m-0 row pr-3  font-sm-bold" style="padding-left:15px; font-size:23px;" href="{{route('info.crud')}}">
                    <span class="font-bolder mbri-left" style="fill:blue; font-size: 30px; margin-top:11px" ></span>
                    <h3 class=" font-md-bold" style="padding-left:5px; margin-left:10px; margin-top:11px; font-size:20px; ">Information</h3>
                </a>
            </div> --}}
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Image Header"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    {{-- <div class="form-group mr-1">
                        <a class="btn btn-primary " href="{{ route('image.create') }}" data-toggle="tooltip"
                            title="Tambah Galery"><i class="fas fa-plus" style="margin:3px;"></i>Image info</a>
                    </div> --}}
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Gambar</th>
                        <th>Nama Web</th>
                        <th>Quote</th>
                        <th>Deskripsi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($images as $image)

                    <tr>
                            <td class="sequential-number"></td>
                            <td style="width: 270px; height: 150px;">
                                <a type="submit" data-toggle="modal"
                                    data-target="#detailModal{{ $image->id }}">
                                    <img src="{{ asset('storage/' . $image->image) }}" style="width: 270px; height:150px; object-fit:cover;" alt="{{ $image->title }}"
                                        data-toggle="tooltip" title="Photo About us Header">
                                </a>
                                @include('about.image_info.detail')
                            </td>
                            <td>{{ $image->kalimat3 }}</td>
                            <td>{{ $image->kalimat1 }}</td>
                            <td>{{ $image->kalimat2 }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('image.edit', ['id' => $image->id]) }}" data-toggle="tooltip"
                                    title="Edit Image Header"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
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
