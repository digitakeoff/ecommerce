@extends('layouts.app')


@section('content')
<div class="mx-3 mt-6">

        <h1 class="max-w-xl mx-auto mb-5 uppercase pb-2 w-full mt-20
        text-center bg-gray-200 text-gray-500 font-bold border-b-2 py-2 border-site-color">
            {{ __('log in') }}
        </h1>


        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" class="max-w-xl mx-auto" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('EMAIL ADDRESS')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('PASSWORD')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button class="ml-4 bg-site-color uppercase py-1 px-2 
                     rounded text-white hover:bg-green-900">
                    {{ __('LOG IN') }}
                </button>
            </div>
        </form>
</div>
@endsection
