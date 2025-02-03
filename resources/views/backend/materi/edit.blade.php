@extends('layouts.app')
@section('main')
<div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" >
                {{ __('Update Your Lesson') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __("Update your Lesson informations.") }}
            </p>
        </header>
        <form method="post" action="{{ route('materi.update',$materi->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            {{-- <input type="hidden" value="{{ $materi->id }}" name="id"> --}}
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" class="form-control" value="{{ old('judul', $materi->judul) }}" name="judul"
                    placeholder="Judul artikel">
            </div>
            <div class="form-group">
                <label>Intro</label>
                <input type="text" class="form-control" value="{{ old('intro', $materi->intro) }}" name="intro"
                    placeholder="Judul artikel">
            </div>
            <div class="form-group">
                <label>Isi Artikel</label>
                <textarea class="form-control summernote" name="deskripsi" rows="10">{{ $materi->deskripsi }}
            </textarea>
            </div>
            <div class="form-group">
                <label>Image</label>
                <img id="previewImage" src="{{ asset('storage/' . $materi->image_path) }}" alt="gambar"
                    style="max-width: 200px; max-height: 200px;">
                <input type="file" class="form-control m-2" value="{{ old('image', $materi->image_path) }}"
                    name="image" placeholder="Judul artikel">
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
                <input type="datetime-local" class="form-control" name="scheduled_at" id="scheduled_at" value="{{$materi->scheduled_at  ?: \Carbon\Carbon::now()}}">

                    <script> document.addEventListener('DOMContentLoaded', function() {
                        flatpickr("#scheduled_at", {
                            enableTime: true,
                            time_24hr: true,
                            showClearButton: true
                        });
                        var scheduledAtInput = document.querySelector("#scheduled_at");
                        scheduledAtInput.style.background = "#fff";
                    });</script>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" {{ old('status', $materi->draft ?? 0) == 0 ? 'selected' : '' }}>Publikasi</option>
                    <option value="1" {{ old('status', $materi->draft ?? 0) == 1 ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('materi.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
 </div>

    </div>
    <script>
        function previewFile() {
            var preview = document.getElementById('previewImage');
            var fileInput = document.getElementById('image');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }

            console.log('Function previewFile() called.');
            console.log('Selected file:', file);
            console.log('Preview src:', preview.src);
        }
    </script>
@endsection

 @section('styles')
 <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css')}}">
 <script src="{{asset('https://cdn.jsdelivr.net/npm/flatpickr')}}"></script>
 @endsection
