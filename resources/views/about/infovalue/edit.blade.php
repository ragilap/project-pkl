@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                <a>Update About Our Values</a>
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                <a>Update Our Values For About Informations.</a>
            </p>
        </header>
        <form action="{{ route('infovalue.update', $infos->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="judul"> Judul :</label>
                <input type="text" class="form-control" style="border-radius:4px;" value="{{ old('judul', $infos->judul) }}" name="judul">
            </div>
            <div class="form-group">
                <label for="deksripsi">Deskripsi :</label>
                <input type="text" class="form-control" style="border-radius:4px;" value="{{ old('deksripsi', $infos->deskripsi) }}" name="deskripsi">
            </div>

            <div class="form-group">
                <label for="icon">Icon :</label>
                <input type="text" class="form-control" style="border-radius:4px;" value="{{ old('icon', $infos->icon) }}" name="icon">
            </div>

            <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('infovalue.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>

            </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
