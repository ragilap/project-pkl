@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Home Image Slider') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Slider For Your Home Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('sliderimage.update', $slider->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Judul Slider</label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama"
                    placeholder="paragraf pertama" value="{{ old('nama', $slider->nama) }}">
            </div>
            <div class="form-group">
                <label>Deskripsi </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="deskripsi"
                     placeholder="paragraf kedua" value="{{ old('deskripsi', $slider->deskripsi) }}">
            </div>
             <div class="form-group">
                <label>Image Slider</label>
                <img id="previewimage" src="{{ asset('storage/' . $slider->image) }}" alt="gambar"
                    style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control m-2" value="{{  $slider->image }}"
                    name="image" >
            </div>
                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('logo.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
