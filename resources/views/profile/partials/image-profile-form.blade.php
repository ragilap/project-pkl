<header>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Change Profile') }}
    </h2>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Change The Display For Only Coolest Newest Elegance"') }}
    </p>
</header>
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <x-input-label for="profile_image" :value="__('')" />
        <x-text-input id="profile_image" name="profile_image" type="file" class="mt-1 block w-full" />
    </div>

    <x-primary-button>{{ __('Save') }}</x-primary-button>
</form>
