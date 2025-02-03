@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Customize Social</h1>
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
            {{-- <div class="row">
                <a class="m-0 row pr-3  font-sm-bold" style="padding-left:15px; font-size:23px;"
                    href="{{ route('info.crud') }}">
                    <span class="font-bolder mbri-left" style="fill:blue; font-size: 30px; margin-top:11px"></span>
                    <h3 class=" font-md-bold" style="padding-left:5px; margin-left:10px; margin-top:11px; font-size:20px; ">
                        Information</h3>
                </a>
            </div> --}}
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Social"
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
                        <th>Platform</th>
                        <th>Social Links </th>
                        <th>Icon</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($socials as $social)
                        <tr>
                            <td class="sequential-number"></td>
                            <td style="width: 270px; height: 150px;">
                                {{ $social->nama }}
                            </td>
                            <td>{{ $social->link }}</td>
                            <td><span class="bi bi-{{ $social->icon }}"></span></td>
                            <td style="text-align:center;">
                                <a href="{{ route('social.edit', $social->id) }}" data-toggle="tooltip"
                                    title="Edit Social"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
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

@section('styles')
{{-- css font flexstart --}}
<link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
@endsection
