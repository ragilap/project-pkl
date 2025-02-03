@extends('layouts.app')

@section('container')
    <div class="container-fluid">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0" style="padding-left:15px;">Customize Contact Footer</h1>
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
                <a class="m-0 row pr-3  font-sm-bold" style="padding-left:15px; font-size:23px;" href="{{route('info.crud')}}">
                    <span class="font-bolder mbri-left" style="fill:blue; font-size: 30px; margin-top:11px" ></span>
                    <h3 class=" font-md-bold" style="padding-left:5px; margin-left:10px; margin-top:11px; font-size:20px; ">Information</h3>
                </a>
            </div> --}}
            <div class="card-header" style="padding-left:0;">
                <form class="form-inline" style="padding: 5px">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q }}"
                            placeholder="Pencarian..." data-toggle="tooltip" title="Cari Footer"
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
                        <th>No</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody style="text-align:center;">
                    <?php $no = 1; ?>
                    @foreach ($contactfoots as $contact)
                        <tr>
                            <td>1</td>
                            <td>{{ $contact->alamat }}</td>
                            <td>{{ $contact->kota }}</td>
                            <td>{{ $contact->provinsi }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('contactfooter.edit', $contact->id) }}" data-toggle="tooltip"
                                    title="Edit Footer"><button class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"
                                            style="color: white;"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
<script href="{{asset('dist/js/demo.js')}}"></script>
<script href="{{asset('dist/js/ui-modals.js')}}"></script>
<link href="{{asset('dist/css/_modal.scss')}}" rel="stylesheet">
<link href="{{asset('dist/css/_tooltip.scss')}}" rel="stylesheet">
@endsection
