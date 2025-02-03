@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12" style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; ">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Your Brand Contact Footer') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Contact Footer For Your Brand Informations.') }}
            </p>
        </header>
        <form method="post" action="{{ route('contactfooter.update', $contact->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" style="border-radius:4px" name="alamat"
                    placeholder="Alamat" value="{{ old('alamat', $contact->alamat) }}">
            </div>
            <div class="form-group">
                <label>Kota</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="kota"
                     placeholder="Kota/provinsi" value="{{ old('kota', $contact->kota) }}">
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="provinsi"
                     placeholder="provinsi/negara" value="{{ old('provinsi', $contact->provinsi) }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="phone"
                     placeholder="paragraf kedua" value="{{ old('phone', $contact->phone) }}">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" style="border-radius: 4px" name="email"
                     placeholder="paragraf kedua" value="{{ old('email', $contact->email) }}">
            </div>

                <div class="flex justify-end col-mt-8">
                    <button type="submit" class="bg-blue-500 text-white px-10 py-2 rounded">Post</button>
                    <a href="{{ route('contact.crud') }}" class="bg-red-500 text-white ml-4 px-4 py-2 rounded">Kembali</a>
                </div>



        </form>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/flatpickr') }}"></script>
@endsection
