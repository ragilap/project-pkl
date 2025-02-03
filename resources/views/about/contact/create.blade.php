@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                <a>Create Coloumn of Contact us</a>
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                <a>Add Coloumn for Contact us informations.</a>
            </p>
        </header>
        <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="album" value="{{ $album->id }}"> --}}
            <div class="form-group">
                <label for="type">Type:</label>
                <select name="type" class="form-control" id="type" required>
                    @foreach($contactTypes as $key => $label)
                        <option value="{{ $key }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="value"> Deskripsi Kolom :</label>
                <input type="text" class="form-control" style="border-radius:4px;"  name="value" >
            </div>
            {{-- <div class="form-group">
                <label for="deskripsi_kolom">Deskripsi Kolom:</label>
                <input type="text" class="form-control" style="border-radius:4px;"  name="deskripsi_kolom" >
            </div>
            <div class="form-group">
                <label for="deskripsi_tambahan">Deskripsi Tambahan:</label>
                <input type="text" class="form-control" style="border-radius:4px;"  name="deskripsi_tambahan"> --}}

                <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('contact.crud') }}"
                    class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>

            </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
