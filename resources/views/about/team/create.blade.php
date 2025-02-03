@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Your Teams') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Add Teams For Your Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama"
                    placeholder="Nama">
            </div>
            <div class="form-group">
                <label>Jabatan </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="jabatan"
                     placeholder="Jabatan">
            </div>
            <div class="form-group">
                <label>Quote </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="quote"
                     placeholder="Quote">
            </div>
            <div class="form-group">
                <label>Deskripsi </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="deskripsi"
                     placeholder="Deskripsi">
            </div>
            <div class="form-group">
                <label>Upload image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
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

