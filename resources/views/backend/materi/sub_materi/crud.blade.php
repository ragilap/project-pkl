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
                    <h1 class="m-0" style="padding-left:15px;">Isi materi</h1>
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
                        <input class="form-control" data-toggle="tooltip" title="Tambah Artikel" type="text" name="q" placeholder="Pencarian..."
                            value="{{ $q }}" style="width: 400px; border-radius:4px"  />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success"><i class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>


                    <div class="form-group mr-1">
                        <a class="btn btn-primary " href="{{ route('sub-materi.create',$id) }}" data-toggle="tooltip" title="Tambah Artikel"><i class="fas fa-plus"
                                style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped table-bordered table-hover table-stripped">
                <thead>
                    <tr style="text-align: center;">
                        <th>No.</th>
                        <th>Judul</th>
                        <th>Kategory</th>
                        <th>Deskripsi</th>
                        <th>Type Isi</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach ($submateries as $i => $materi)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $materi->judul }}</td>
                            <td>{{ $materi->categories->name }}</td>
                            <td> {!!$materi->deskripsi!!}</td>
                            <td>{{ $materi->type_id ? 'Hanya text' : 'Text dan Code' }}</td>
                            <td>
                                <a href="materi/detail/{{ $materi->id }}"><button class="btn btn-sm btn-primary"><i
                                            class="fas fa-eye" data-toggle="tooltip" title="Detail kel"></i></button></a>
                                <a href="{{ route('sub-materi.edit', ['id' => $materi->id]) }}"><button
                                        class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="Edit Artikel"></i></button></a>
                                <form method="POST" action={{ route('sub-materi.destroy',['id'=> $materi->id]) }}
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')"><i
                                            class="far fa-trash-alt" data-toggle="tooltip" title="Hapus Artikel"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" style="margin-top: 10px;">
                {{ $submateries->onEachSide(1)->links() }}

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let sequentialNumbers = document.querySelectorAll('.sequential-number');

                        function updateSequentialNumbers() {
                            let startingIndex = {{ ($submateries->currentPage() - 1) * $submateries->perPage() + 1 }};

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
