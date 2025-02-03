@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">List Photo :</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Photo v1</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default col-md-11 bg-white p-4" style="margin-top: 5px; margin-left:50px;">
            <div class="row" style="width: 100%;">
                <div class="col-md-8 " style="display: flex; flex-direction: row;">
                    <a class="m-0 pr-3 font-sm-bold" href="{{ route('album.video.crud') }}"
                        style="padding-left:15px; font-size:20px;">Album Video</a>
                    <span class="w-4 h-4 mbri-right" style="fill:blue; z-index:10; margin-top:7px;"></span>
                    <h3 class="font-md-bold " style="padding-left:13px; margin-top:3px; font-size:20px; ">
                        {{ $album->nama_album }}</h3>
                </div>
            </div>
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari galery"
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    <div class="form-group mr-1">
                        <a class="btn btn-primary " href="galery/create/{{ $galeriId }}" data-toggle="tooltip"
                            title="Tambah Galery"><i class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Published At</th>
                        <th>Updated At</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($galeries as $galery)
                        <tr>
                            <td class="sequential-number"></td>
                            <td style="width: 270px; height: 150px;">
                                <a type="submit" data-toggle="modal" data-target="#detailModal{{ $galery->id }}">
                                    <img src="{{ asset('storage/' . $galery->file_path) }}"
                                        style="width: 270px; height:150px; object-fit:cover;" alt="{{ $galery->title }}"
                                        data-toggle="tooltip" title="Photo gallery">
                                </a>
                                @include('galery.detail')
                            </td>
                            <td>{{ $galery->judul }}</td>
                            <td>{{ $galery->deskripsi }}</td>
                            <td> {{ $galery->draft == 0 ? 'Published' : 'Draft' }}</td>
                            @if ($galery->published_at)
                                <td>{{ Carbon\Carbon::parse($galery->published_at)->format('d-M-Y') }}</td>
                            @else
                                <td></td>
                            @endif
                            <td> {{ $galery->updated_at->format('d-M-Y') }}</td>
                            <td style="text-align:center;">
                                {{-- <a href="{{ asset('storage/' . $galery->file_path) }}" data-gallery="portfolioGallery"
                                    class="portfokio-lightbox" title="Detail-foto"
                                    style="width: 100%; height:600px; object-fit:cover;"><button
                                        class="btn btn-sm btn-primary" data-toggle="tooltip" title="Detail galery"><i
                                            class="fas fa-eye"></i></button></a> --}}


                                <a href="{{ route('galery.edit', ['galery' => $galery->id]) }}" data-toggle="tooltip"
                                    title="Edit Galery"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>

                                <form method="POST" action="{{ route('galery.destroy', $galery->id) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"
                                        data-toggle="tooltip" title="Hapus Galery">
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
                {{-- {{ $galeries->links() }} --}}
            </div>
        </div>
    </div>
@endsection
