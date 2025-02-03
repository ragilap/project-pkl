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

                </div>
                <div class="col-sm-6">

                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12" style="padding-top: 2px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style=" padding-bottom:20px">
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
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Name</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="name" value="{{ old('name') }}" style="width: 675%; margin-left:30px;"/>
                                    </div>
                                </div><div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right: 25px">Username</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="username" value="{{ old('username') }}" style="width: 675%; margin-left:30px"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Email</label><label class="col-form-label" >:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="email" name="email" value="{{ old('email') }}" style="width: 675%; margin-left:30px"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Password</label><label class="col-form-label">:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="text" name="password" value="{{ old('password') }}" style="width: 675%; margin-left:30px"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" style="margin-right:25px">Gambar</label><label class="col-form-label" >:</label>
                                    <div class="col-md-6">
                                        <x-text-input class="form-control" type="file" name="profile_image"  style="width: 675%; border-style:solid; margin-left:30px"/>
                                    </div>
                                </div>
                                </div></div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" style="margin-right:25px;" >role </label><label class="col-form-label">:</label>
                                        <div class="col-md-4">
                                            <select name="roles[]" multiple class="form-control"  style="margin-left:30px; width:493%; height:40px">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group text-right" style="width:165%; margin-top:20px; ">
                                        <button class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-danger ml-2" href="{{ route('user.index') }}">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                          </div>
    </div>

@endsection
