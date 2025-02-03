@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Your Category') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Create For Your Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('categoryalbum.store') }}" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="album" value="{{ $teamId->id }}"> --}}
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="name"
                     placeholder="Nama kategory" >
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="slug"
                     placeholder="Slug" >
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
