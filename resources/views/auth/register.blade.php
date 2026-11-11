<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white font-medium" />
            <x-text-input id="name" class="block mt-1 w-full bg-neutral-900 border-neutral-700 text-white focus:border-blue-500 focus:ring-blue-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-white font-medium" />
            <x-text-input id="email" class="block mt-1 w-full bg-neutral-900 border-neutral-700 text-white focus:border-blue-500 focus:ring-blue-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-white font-medium" />
            <x-text-input id="password" class="block mt-1 w-full bg-neutral-900 border-neutral-700 text-white focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-white font-medium" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-neutral-900 border-neutral-700 text-white focus:border-blue-500 focus:ring-blue-500"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="privacy_policy" class="inline-flex items-start">
                <input id="privacy_policy" type="checkbox" name="privacy_policy" required class="mt-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                <span class="ms-2 text-sm text-gray-600">
                He leído y acepto la <a href="{{ route('privacy') }}" target="_blank" class="underline text-indigo-600 hover:text-indigo-900">Política de Tratamiento de Datos Personales</a> y autorizo el uso de mis datos conforme a la Ley 1581 de 2012.
                </span>
            </label>
            <x-input-error :messages="$errors->get('privacy_policy')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 gap-2">
            <a class="underline text-sm text-blue-400 hover:text-blue-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-blue-600 text-white hover:bg-blue-700 active:bg-blue-900 focus:ring-blue-500 tracking-widest">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
