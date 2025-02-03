@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Coloumn Information') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Your Coloumn Informations.') }}
            </p>
        </header>

        <form method="post" action="{{ route('info.update', $infos->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- <input type="hidden" value="{{ $infos->id }}" name="id"> --}}

            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" value="{{ old('judul', $infos->judul) }}" name="judul"
                    placeholder="Judul ">
            </div>
            <div class="form-group">
                <label>Isi Judul</label>
                <input type="text" class="form-control" value="{{ old('isi', $infos->isi) }}" name="isi"
                    placeholder="isi">
            </div>
            <div class="form-group">
                <label>Image</label>
                <img id="previewImage" src="{{ asset('storage/' . $infos->image) }}" alt="gambar"
                    style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control m-2" value="{{  $infos->image }}"
                    name="image" placeholder="Judul artikel">
            </div>
                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('info.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
<script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
