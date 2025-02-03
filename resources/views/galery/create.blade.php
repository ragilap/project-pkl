@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                <a>Create For {{ $album->nama_album }} Photo</a>
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                <a>Add Photo for list informations.</a>
            </p>
        </header>
        <form action="{{ route('galery.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album" value="{{ $album->id }}">
            <div class="form-group">
                <label for="judul" class="form-group">Title:</label>
                <input type="text" name="judul" placeholder="Nama Gambar" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="judul" class="form-group">Deskripsi:</label>
                <input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="file_path" class="form-group">File :</label>
                <input type="file" name="file_path" class="form-control" accept="image/*,video/*" required>
            </div>
            <div class="form-group">
                <label for="scheduled_at">Tanggal Publish:</label>
                <input type="datetime-local" class="form-control" name="scheduled_at" value="{{ \Carbon\Carbon::now() }}"
                    id="scheduled_at">

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
                    <option value="0">Publikasi</option>
                    <option value="1">Draft</option>
                </select>
            </div>
            <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('galery.crud', ['id' => $galeriId]) }}"
                    class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>

            </div>
        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
