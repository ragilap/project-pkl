@extends('layouts.app')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <style>.colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
      }

      .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
      }
      </style>
    <div class="content-header" style="margin-bottom:1px">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="padding-top: 2px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style=" padding-bottom:20px">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" style=" padding-left: 40px;">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Register User') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Create your account for the new account.') }}
                    </p>
                </header>
                <div class="max-w-xl" style="margin-top: 10px">
                    <div class="row">
                        <div class="col-md-6">
                            @if ($errors->any())
                                @foreach ($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                @endforeach
                            @endif
                            <form action="{{ route('pelanggan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">ID</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="kode" value="{{ old('kode') }}" style="width: 600%; margin-left:30px;"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Nama</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="name" value="{{ old('name') }}" style="width: 600%; margin-left:30px;"/>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="margin-right:25px">Alamat</label><label class="col-form-label">:</label>
                                        <div class="col-md-6">
                                            <x-text-input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}" style="width: 600%; margin-left:30px"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label" style="margin-right:25px">No.Telepon</label><label class="col-form-label" >:</label>
                                        <div class="col-md-6">
                                            <x-text-input class="form-control" type="text" name="phone" value="{{ old('phone') }}" style="width: 600%; margin-left:30px"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right: 25px">Email</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="email" value="{{ old('email') }}" style="width: 600%; margin-left:30px"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Gambar</label><label class="col-form-label" >:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="file" name="profile_image"  style="width: 600%; border-style:solid; margin-left:30px"/>
                                    </div>
                                </div>
                                </div></div>
                                    {{-- <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="margin-right:25px;" >role </label><label class="col-form-label">:</label> --}}
                                        {{-- <div class="col-md-4">
                                            <select class="form-control" name="role" style="margin-left:30px; width:437%;">
                                                @foreach ($roles as $key => $val)
                                                @if ($key == old('role'))
                                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}">{{ $val }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    {{-- </div> --}}



                                    <div class="form-group text-right" style="width:165%; margin-top:20px; ">
                                        <button class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-danger ml-2" href="{{ route('pelanggan.index') }}">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                          </div>
    </div>

@endsection
