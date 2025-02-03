@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Your Galery') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('For your List Video informations.') }}
            </p>
        </header>
        <form action="/Albums/store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_album">Nama Album Video:</label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama_album"
                    placeholder="Nama album ">
            </div>
            <div class="form-group">
                <label for="gambar_album">Gambar Album:</label>
                <input type="file" class="form-control" name="gambar_album" placeholder="Update Gambar album">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="scheduled_at">Jadwal Publish:</label>
                <input type="datetime-local" class="form-control" name="scheduled_at" value="{{\Carbon\Carbon::now()}}" id="scheduled_at">

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        flatpickr("#scheduled_at", {
                            enableTime: true,
                            time_24hr: true,
                            showClearButton: true
                        });
                        var scheduledAtInput = document.querySelector("#scheduled_at");
                        scheduledAtInput.style.background = "#fff";
                    });
                </script>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" {{ old('status', $galery->draft ?? 0) == 0 ? 'selected' : '' }}>Publikasi</option>
                    <option value="1" {{ old('status', $galery->draft ?? 0) == 1 ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('album.video.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
            </div>
        </form>
    @endsection

    @section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
