@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Customize Your categories </h1>
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
            <div class="row" style="width: fit-content">
                {{-- <a class="m-0 row pr-3 font-sm-bold" data-toggle="tooltip" title="back" style="padding-left:8px; font-size:23px;"
                    href="{{ route('categorys.crud') }}">
                    <span class="font-bolder mbri-left" style="fill:blue; font-size: 30px; margin-top:-3px"></span>
                    <h3 class=" position-absolute font-md-bold" style="padding-left:50px; font-size:20px; padding-bottom:10px; ">
                        {{$categorys->marker}}</h3>
                </a> --}}
            </div>
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari "
                            style="width: 400px; border-radius:4px;" />
                    </div>
                    <div class="form-group mr-1">
                        <button class="btn btn-success" data-toggle="tooltip" title="Telusuri"><i
                                class="fas fa-search fa-fw" style="opacity: 80%"></i></button>
                    </div>
                    <div class="form-group mr-1">
                        <a class="btn btn-primary " data-toggle="tooltip" title="Buat Slider"
                            href="{{ route('category.create') }}"><i class="fas fa-plus" style="margin:3px;"></i>Tambah</a>
                    </div>
                </form>
            </div>
            <table class="table table-responsive table-striped  table-bordered table-hover table-stripped">
                <thead>

                    <tr style="text-align: center;">
                        <th style="width: 1%;">No.</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($categories as $category)
                        <tr>
                            <td class="sequential-number">{{ $no++ }}</td>
                            <td style="width: 270px; height: 150px;">
                                {{ $category->name }}
                            </td>
                            <td>{{ $category->slug }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('category.edit', $category->id) }}" data-toggle="tooltip"
                                    title="Edit kategory"><button class="btn btn-sm btn-warning"><i
                                            class="fas fa-pencil-alt" style="color: white;"></i></button></a>
                                <form method="POST" action="{{ route('category.destroy', $category->id) }}"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus F"
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
        </div>
    </div>
@endsection
