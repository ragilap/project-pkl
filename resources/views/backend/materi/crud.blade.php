@extends('layouts.app')

@section('header')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
@endsection

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">List materi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">materi v1</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card card-default col-md-11 bg-white p-4 " style="margin-top:5px; margin-left:50px;">
            <div class="card-header" style="padding-left:0px;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" data-toggle="tooltip" title="Tambah Artikel" type="text"
                            name="q" placeholder="Pencarian..." value="{{ $q }}"
                            style="width: 400px; border-radius:4px" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success"><i class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    <div class="form-group mr-1">
                        <a class="btn btn-primary " href="{{ route('materi.create',$id) }}" data-toggle="tooltip"
                            title="Tambah Artikel"><i class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped table-bordered table-hover table-stripped">
                <thead>
                    <tr style="text-align: center;">
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Published At</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach ($materies as $i => $materi)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $materi->judul }}</td>
                            <td>{!! $materi->deskripsi !!}</td>
                            @if ($materi->published_at)
                                <td> {{ Carbon\Carbon::parse($materi->published_at)->format('d-M-Y') }}</td>
                            @else
                                <td></td>
                            @endif
                            <td> {{ $materi->updated_at->format('d-M-Y') }}</td>
                            <td> {{ $materi->draft == 0 ? 'Published' : 'Draft' }}</td>
                            <td>
                                <a href="{{ route('materi.edit', ['id' => $materi->id]) }}"><button
                                        class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt" data-toggle="tooltip"
                                            title="Edit Artikel"></i></button></a>
                                <a href="/sub-materi/crud?id={{ $materi->id }}">
                                    <button class="btn btn-sm btn-success " style="margin-top: 1px;" data-toggle="tooltip"
                                        title="List gambar">
                                        <img class="w-4 h-5 text-white " src="{{ asset('img/photo-list-album.svg') }}">
                                    </button>
                                </a>
                                <form method="POST" action={{ route('materi.destroy', ['id' => $materi->id]) }}
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><i
                                            class="far fa-trash-alt" data-toggle="tooltip"
                                            title="Hapus Artikel"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="margin-top: 10px;">
                {{ $materies->onEachSide(1)->links() }}

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let sequentialNumbers = document.querySelectorAll('.sequential-number');

                        function updateSequentialNumbers() {
                            let startingIndex = {{ ($materies->currentPage() - 1) * $materies->perPage() + 1 }};

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
    </div>
@endsection
