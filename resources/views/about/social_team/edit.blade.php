@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Social Teams') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Social Teams For Your Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('socialteams.update', $socialteam->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            {{-- <input type="hidden" name="album" value="{{ $teamId->id }}"> --}}
            <div class="form-group">
                <label for="icon">Platform</label>
                <select class="form-control" name="icon" id="icon">
                    <!-- Add options for different social media icons -->
                    <option value="facebook" {{ $socialteam->icon == 'facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="twitter" {{ $socialteam->icon == 'twitter' ? 'selected' : '' }}>Twitter</option>
                    <option value="instagram" {{ $socialteam->icon == 'instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="linkedin" {{ $socialteam->icon == 'linkedin' ? 'selected' : '' }}>linkedin</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label>Link </label>
                <input type="text" class="form-control" style="border-radius: 4px" name="link"
                     placeholder="paragraf kedua" value="{{ old('link', $socialteam->link) }}">
            </div>
                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('socialteams.crud',['id' => $socialteam->parent_id]) }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>
        </form>
    </div>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
