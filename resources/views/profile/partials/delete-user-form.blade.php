<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <!-- Formulario directo (sin modal) -->
    <form method="POST" action="{{ route('profile.destroy') }}" class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
        @csrf
        @method('DELETE')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Confirm Account Deletion') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Please enter your password to confirm you want to delete your account.') }}
        </p>

        <div class="mt-4">
            <x-input-label for="password" value="{{ __('Password') }}" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-full"
                placeholder="{{ __('Your current password') }}"
                required
            />

            @error('password')
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            @enderror
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ url()->previous() }}" class="px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                {{ __('Cancel') }}
            </a>

            <x-danger-button class="ml-3">
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>
    </form>
</section>