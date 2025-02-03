@extends('layouts.app')

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
            <div class="py-12" style="padding-top: 1px;">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6" style="margin-bottom:35px;">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg" style="padding-top:0px;">
                        <div class="max-w-xl" style="margin-top: 0px">
                   <div class="row" style="margin-left:35px; width:900px;">
                        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data"
                            class="mt-6 space-y-6" style="margin-top: 1px; width:900px; top:0;">
                            @csrf
                            @method('put')
                            <header style="margin-top:5px;">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100" >
                                    {{ __('Profile Information') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px">
                                    {{ __("Update your account's profile information and email address.") }}
                                </p>
                            </header>

                            <div style="margin-top: 1px;">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="form-group">
                                <x-input-label for="username" :value="__('Username')" />
                                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                                    value="{{ $user->username }}" required style=""/>
                            </div>


                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>

                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Update Password') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                                </p>
                            </header>

                            <div>
                                <x-input-label for="current_password" :value="__('Current Password')" />
                                <x-text-input id="current_password" name="current_password" type="password"
                                    class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('New Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                    class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>


                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Change Profile') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Change The Display For Only Coolest Newest Elegance"') }}
                                </p>
                            </header>
                            <div class="form-group">
                                <x-input-label for="profile_image" :value="__('')" />
                                <x-text-input id="profile_image" name="profile_image" type="file"
                                    class="mt-1 block w-full" />
                            </div>
                            <div class="form-group text-right" style="margin-top: 20px;
                            ">
                                <button class="btn btn-primary">Simpan</button>
                                @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                                <a class="btn btn-danger ml-2" href="{{ route('dashboard') }}">Kembali</a>
                            </div>
                        </div>
                        </div>
             </form>
               </div>
          </div>
        </div>

      @endsection
