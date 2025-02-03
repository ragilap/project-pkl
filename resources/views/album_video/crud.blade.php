@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">List Album Video</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Gallery v1</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default col-md-11 bg-white p-4" style="margin-top: 5px; margin-left:50px;">
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari album"
                            style="width: 400px; border-radius:4px" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    <div class="form-group mr-1">
                        <a class="btn btn-primary " data-toggle="tooltip" title="Buat album" href="/Albums/create/"><i
                                class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Nama Gallery</th>
                        <th>Status</th>
                        <th>Publish At</th>
                        <th>Update At</th>
                        <th>Category</th>
                        <th>Position</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($albums as $album)
                        <tr>
                            <td class="sequential-number"></td>
                            <td>{{ $album->nama_album }}</td>
                            <td> {{ $album->draft == 0 ? 'Published' : 'Draft' }}</td>
                            @if ($album->published_at)
                                <td>{{ Carbon\Carbon::parse($album->published_at)->format('d-M-Y') }}</td>
                            @else
                                <td></td>
                            @endif
                            <td> {{ $album->updated_at->format('d-M-Y') }}</td>
                            <td> {{ $album->categories->name}}</td>
                            <td class="row" style="justify-content:center;">
                                <form method="post" action="{{ route('Albums.moveDown', $album) }}">
                                    @csrf
                                    <button data-toggle="tooltip" type="submit" title="Naikan barisan"><img
                                            src="{{ asset('img/panah-up.svg') }}" style="width: 35px; height:35x;"></button>
                                </form>
                                <form method="post" action="{{ route('Albums.moveUp', $album) }}">
                                    @csrf
                                    <button type="submit" data-toggle="tooltip" title="Turunkan barisan"><img
                                            src="{{ asset('img/panah-down.svg') }}"
                                            style="width: 35px; height:35x;"></button>
                                </form>
                            </td>
                            <td style="text-align:center;">
                                <a href="{{ route('video.index', ['id' => $album->id]) }}"><button data-toggle="tooltip"
                                        title="Lihat album" class="btn btn-sm btn-primary"><i
                                            class="fas fa-eye"></i></button></a>


                                <a href="/video/crud?id={{ $album->id }}">
                                    <button class="btn btn btn-success" data-toggle="tooltip" title="List Video">
                                        <img class="w-4 h-5 " src="{{ asset('img/video-list-video-album.svg') }}">
                                    </button>
                                </a>
                                <a href="{{ route('album.video.edit', ['id' => $album->id]) }}"><button
                                        data-toggle="tooltip" title="Edit album" class="btn btn-sm btn-warning"><i
                                            class="fas fa-pencil-alt" style="color: white;"></i></button></a>

                                <form method="POST" action="{{ route('album.video.destroy', $album->id) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus album"
                                        onclick="return confirm('Hapus Data?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <script>
                            $(document).ready(function() {
                                $('[data-toggle="tooltip"]').tooltip();
                            });
                        </script>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="margin-top: 10px;">
                <div style="">
                    {{ $albums->onEachSide(1)->links() }}
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let sequentialNumbers = document.querySelectorAll('.sequential-number');

                        function updateSequentialNumbers() {
                            let startingIndex = {{ ($albums->currentPage() - 1) * $albums->perPage() + 1 }};

                            sequentialNumbers.forEach(function(element, index) {
                                element.textContent = startingIndex + index;
                            });
                        }

                        // Pertama kali muat halaman
                        updateSequentialNumbers();

                        // Event handler untuk tautan paginate
                        document.querySelector('.pagination').addEventListener('click', function() {
                            // Jeda kecil untuk memastikan tautan paginate selesai diproses
                            setTimeout(function() {
                                updateSequentialNumbers();
                            }, 100);
                        });
                    });
                </script>
            </div>
        </div>
    @endsection
