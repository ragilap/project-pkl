@extends('layouts.app')
@section('container')
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

        <div class="py-12" style="padding-top:5px">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="padding-bottom:5px">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg ">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" >
                    {{ __('Profile Information') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                    {{ __("Update your account's profile information and email address.") }}
                </p>
            </header>
            <div class="max-w-xl">
                <div class="row">
                    <div class="col-md-6">
                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <p class="alert alert-danger">{{ $err }}</p>
                            @endforeach
                        @endif
                        <form action="{{ route('pelanggan.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"  style="margin-right:25px">ID</label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                    <x-text-input class="form-control" type="text" name="kode" value="{{ old('kode', $row->kode) }}" style="width: 600%; margin-left:30px;" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"  style="margin-right:25px">Nama </label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                    <x-text-input class="form-control" type="text" name="name" value="{{ old('name', $row->name) }}" style="width: 600%; margin-left:30px;" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"  style="margin-right:25px">Alamat</label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                    <x-text-input class="form-control" type="alamat" name="alamat" style="width: 600%; margin-left:30px;" />
                                </div>
                            </div>
                           <div class="form-group row">
                           <label class="col-md-4 col-form-label"  style="margin-right:25px">No.Telepon</label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="phone" value="{{ old('phone', $row->phone) }}" style="width: 600%; margin-left:30px;" />
                                </div>
                           </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label"  style="margin-right:25px">Email</label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                    <x-text-input class="form-control" type="email" name="email" value="{{ old('email', $row->email) }}" style="width: 600%; margin-left:30px;" />
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="gambar"  style="margin-right:25px">Gambar</label> <label class="col-form-label">:</label>
                               <div class="col-md-6">
                                <x-text-input type="file" class="form-control-file" name="profile_image" value="{{old('profile_image',$row->profile_image)}}" style="width: 600%; margin-left:30px;" />
                            </div>
                            </div>
                            {{-- <div class="form-group row" >
                                <label class="col-md-4 col-form-label" style="margin-right:25px" >Level</label><label class="col-form-label">:</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="role" style="width: 600%; margin-left:30px;">
                                        @foreach ($role as $key => $val)
                                            @if ($key == old('role', $row->role))
                                                <option value="{{ $key }}" selected>{{ $val }}</option>
                                            @else
                                                <option value="{{ $key }}">{{ $val }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="form-group text-right" style="margin-top: 20px; width:340%;">
                                <button class="btn btn-primary">Simpan</button>
                                <a class="btn btn-danger ml-2" href="{{ route('pelanggan.index') }}">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div></div></div>
@endsection
