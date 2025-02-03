@extends('layouts.app')
@section('main')
    <div class="col-md-12 col-sm-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6"
        style="margin-bottom:30px; padding-left:40px; padding-top:15px; padding-right:20px; padding-bottom: 30px;">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Update Coloumn Contact-us') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                {{ __('Update Your Coloumn Informations.') }}
            </p>
        </header>

        <form method="post" action="{{ route('contact.update', $contact->id) }}">
            @csrf
            @method('put')
            <input type="hidden" name="type" id="selectedType" value="{{ $contact->type }}">
            {{-- <div class="form-group">
                <label class="form-group" for="type">Type:</label>
                <select  class="form-control" name="type" id="type" required>
                    @foreach ($contactTypes as $key => $label)
                        <option value="{{ $key }}" {{ $contact->type === $key ? 'selected' : '' }}>
                            {{ $label }}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="form-group">
            <label for="value" class="form-group-">Value:</label>
            <input type="text" class="form-control" name="value" id="value"
                value="{{ old('value', $contact->value) }}" required>
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
