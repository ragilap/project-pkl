@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Category') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Category For Your Photo or video.') }}
            </p>
        </header>
        <form method="post" action="{{ route('categoryalbum.update', $category->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- <input type="hidden" name="album" value="{{ $teamId->id }}"> --}}
            <div class="form-group">
                <label>Nama </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="name"
                     placeholder="Nama Kategory" value="{{ old('name', $category->name) }}">
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="slug"
                     placeholder="Slug" value="{{ old('slug', $category->slug) }}">
            </div>
                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('categoryalbum.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
        </form>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
