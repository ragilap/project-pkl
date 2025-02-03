@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Team') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Team For Your Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama" placeholder="Nama"
                    value="{{ old('nama', $team->nama) }}">
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="jabatan" placeholder="Jabatan"
                    value="{{ old('jabatan', $team->jabatan) }}">
            </div>
            <div class="form-grup">
                <label>Quote</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="quote" placeholder="Quote"
                    value="{{ old('quote', $team->quote) }}">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="deskripsi"
                    placeholder="Deskripsi" value="{{ old('deskripsi', $team->deskripsi) }}">
            </div>
            <div class="form-group">
                <label>Foto</label>
                <img id="previewimage" src="{{ asset('storage/' . $team->image) }}" alt="gambar"
                    style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control m-2" value="{{ $team->image }}" name="image">
            </div>
            <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('team.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
