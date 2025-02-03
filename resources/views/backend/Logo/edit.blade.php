@extends('layouts.app')
@section('container')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Brand Logo Header') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Logo For Your Brand Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('logo.update', $logo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama"
                    placeholder="paragraf pertama" value="{{ old('nama', $logo->nama) }}">
            </div>
            <div class="form-group">
                <label>Deskripsi </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="deskripsi"
                     placeholder="paragraf kedua" value="{{ old('deskripsi', $logo->deskripsi) }}">
            </div>
            <div class="form-group">
                <label>Quote</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="quote"
                     placeholder="paragraf kedua" value="{{ old('quote', $logo->quote) }}">
            </div>
             <div class="form-group">
                <label>Logo Brand</label>
                <img id="previewimage" src="{{ asset('storage/' . $logo->image) }}" alt="gambar"
                    style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control m-2" value="{{  $logo->image }}"
                    name="image" >
            </div>
            <div class="form-group">
                <label for="type">Type Logo</label>
                <select class="form-control" name="type" id="type">
                    <!-- Add options for different social media icons -->
                    <option value="1" {{ $logo->type_id == '1' ? 'selected' : '' }}>Gambar dan text</option>
                    <option value="2" {{ $logo->type_id == '2' ? 'selected' : '' }}>Hanya gambar</option>
                    <!-- Add more options as needed -->
                </select>
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
