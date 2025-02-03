@extends('layouts.app')
@section('container')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create Your Artikel') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Create your Artikel informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('modul.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" style="border-radius:4px" name="judul"
                    placeholder="Judul artikel">
            </div>
            {{-- <div class="form-group">
                <label>Intro Artikel</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="intro"
                    placeholder="Intro artikel">
            </div> --}}
            <div class="form-group">
                <label>Isi Artikel</label>
                <textarea class="form-control summernote" name="deskripsi" placeholder="isi Article" rows="10"></textarea>

            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-group">
                <label>Upload image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="scheduled_at">Jadwal Publish:</label>
                <input type="datetime-local" class="form-control" value="{{ \Carbon\Carbon::now() }}" id="scheduled_at"
                    style="border-radius:4px" name="scheduled_at" value="scheduled_at">
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
                    <option value="0">Publikasi
                    </option>
                    <option value="1">Draft</option>
                </select>
            </div>

            <div class="flex justify-end col-mt-8">
                <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                <a href="{{ route('modul.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
            </div>

        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
