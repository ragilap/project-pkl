@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                <a>Update Your {{$galery->album->nama_album}}  Photo</a>
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update your Photo for Galery informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('galery.update', $galery->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" value="{{ $galery->id }}" name="id">
            <input type="hidden" name="album" value="{{ $galery->parent_id }}">
            <div class="form-group">
                <label>Nama Gambar</label>
                <input type="text" class="form-control" style="border-radius:4px"
                    value="{{ old('judul', $galery->judul) }}" name="judul" placeholder="Judul artikel">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <input type="text" class="form-control" style="border-radius:4px"
                    value="{{ old('deskripsi', $galery->deskripsi) }}" name="deskripsi" placeholder="Deskripsi">
            </div>

            <div class="form-group">
                <label for="file_path">File Gambar :</label>
                <input type="file" name="file_path" value="{{ old('file_path', $galery->file_path) }}"
                    class="form-control" accept="image/">
            </div>
            <div class="form-group">
                    <img src="{{ asset('storage/' . $galery->file_path) }}" alt="gambar"
                        style="max-width: 300px; max-height: 250px; border-radius:4px;">
            </div>


            <div class="form-group">
                <label for="scheduled_at">Tanggal Publish:</label>
                <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduled_at"
                    value="{{ $galery->scheduled_at ?: \Carbon\Carbon::now()}}">

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
                <a href="{{ route('galery.crud', ['id' => $galery->parent_id]) }}"
                    class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
            </div>
    </div>
    <script>
        function checkFileType() {
            var typeInput = document.getElementsByName('type')[0];
            var fileInput = document.getElementsByName('file_path')[0];

            if (typeInput.value === 'photo' && fileInput.files.length > 0) {
                // Display SweetAlert for mismatched type and file
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You selected "Foto" as the type, but you have uploaded a video. Please choose the correct type.',
                });

                // Reset the file input
                fileInput.value = '';
            } else if (typeInput.value === 'video' && fileInput.files.length > 0) {
                // Display SweetAlert for mismatched type and file
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You selected "Video" as the type, but you have uploaded a photo. Please choose the correct type.',
                });

                // Reset the file input
                fileInput.value = '';
            }
        }
    </script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
