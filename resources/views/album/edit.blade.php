@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Gallery') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update your Gallery informations.') }}
            </p>
        </header>

        <form action="{{ route('album.update', ['id' => $album->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_album">Nama Gallery:</label>
                <input type="text" class="form-control" style="border-radius:4px" name="nama_album"
                    placeholder="Nama_Gallery" value="{{ old('nama_album', $album->nama_album) }}" required>
            </div>
            <div class="forn-group">
                <label for="gambar_album">Gambar Gallery:</label>
                <input type="file" class="form-control" name="gambar_album" value="{{ $album->gambar_album }}">
            </div>

            {{-- Display the current image for reference --}}
            @if ($album->gambar_album)
                <img src="{{ asset('storage/' . $album->gambar_album) }}" alt="Current Image"
                    style="max-width: 200px; margin-top: 10px;">
            @endif

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
                <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduled_at"
                    value="{{ $album->scheduled_at ?: \Carbon\Carbon::now() }}">

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
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{ old('status', $album->draft ?? 0) == 0 ? 'selected' : '' }}>Publikasi</option>
                        <option value="1" {{ old('status', $album->draft ?? 0) == 1 ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('album.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
<script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
