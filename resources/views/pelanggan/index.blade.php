@extends('layouts.pelangganapp')
@section('container')

  <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous')}}">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer v1</li>
                    </ol>
                </div>
            </div>

            <div class="py-12" style="padding-top:1%">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="justify-content:center">
                    <div class="max-w-xl">
                        <div class="row" style="width: 500px">
                            <div class="col-sm-12">
                                <section class="panel">
                                    @if (session('success'))
                                        <p class="alert alert-success">{{ session('success') }}</p>
                                    @endif
                                    <div class="card card-default" style="width:207% ">
                                        <div class="card-header" style="">
                                            <form class="form-inline" style="padding: 5px">
                                                <div class="form-group mr-1">
                                                    <input class="form-control" type="text" name="q"
                                                        value="{{ $q}}" placeholder="Pencarian..." style="width: 400px"/>


                                                    </div>

                                                <div class="form-group mr-1">
                                                    <button class="btn btn-success"><i class="fas fa-search fa-fw"
                                                            style="opacity: 80%"></i></button>
                                                </div>

                                                <div class="form-group mr-1">
                                                    <a class="btn btn-primary" href="{{ route('pelanggan.create') }}"><i
                                                        class="fas fa-plus" style="margin: 3px"></i>Tambah</a>
                                                </div></form>@yield('contentt')
                                                <div class="card-body p-0 table-responsive" style="width: 100%">
                                                    <table class="table table-bordered table-striped table-hover mb-0"
                                                        style="margin-top:20px">
                                                        <thead >
                                                            <tr style="text-align: center">
                                                                <th>ID</th>
                                                                <th>Nama</th>
                                                                <th>Alamat</th>
                                                                <th>No.Hp</th>
                                                                <th>Email</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>

                                                        {{-- <?php $no = 1; ?> --}}

                                                        @foreach ($rows as $row)
                                                            <tr style="text-align: center " >
                                                                {{-- <td class="sequential-number"></td> --}}
                                                                <td>{{$row->kode}}</td>
                                                                <td>{{ $row->name }}</td>
                                                                <td>{{ $row->alamat }}</td>
                                                                <td>{{ $row->phone }}</td>
                                                                <td>{{ $row->email }}</td>
                                                                <td style="justify-content: space-between">

                                                                    <!-- Informasi user -->
                                                                    <a class="btn btn-sm btn-info"
                                                                        data-toggle="modal"
                                                                        data-target="#detailModal{{ $row->id }}"><i
                                                                            class="fas fa-eye"></i></a>



                                                                    <a class="btn btn-sm btn-warning"
                                                                        href="{{ route('pelanggan.edit', $row) }}"><i
                                                                            class="fas fa-pencil-alt"></i></a>

                                                                    @include('pelanggan.detail')

                                                                    <form method="POST"
                                                                    action ={{route('pelanggan.destroy', $row ->id) }}
                                                                        style="display: inline-block;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-danger"
                                                                            onclick="return confirm('Hapus Data?')"><i
                                                                                class="far fa-trash-alt"></i></button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            {{-- <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    // Update the sequential numbers
                                                                    let startingIndex = {{ $startingIndex }};
                                                                    let sequentialNumbers = document.querySelectorAll('.sequential-number');
                                                                    sequentialNumbers.forEach(function(element, index) {
                                                                        element.textContent = startingIndex + index + 1;
                                                                    });
                                                                });
                                                            </script> --}}
                                                        @endforeach
                                                    </table>
                                                    <div class="pagination" style="margin-top: 10px" >
                                                                {{ $rows->links() }}
                                                </div>
                                        </div>
                                        @if($rows->isEmpty())
                                        <p class="alert alert-danger">Tidak ada hasil ditemukan.</p>
                                    @endif
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div></div>
@endsection


