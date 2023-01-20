@extends('layouts.app')


@section('content')
<div class="mx-auto border border-gray-300 h-auto p-3 max-w-screen-sm my-auto shadow rounded w-full">

        <h1 class="w-full mx-auto mb-5 uppercase
        text-center bg-gray-200 text-gray-500 font-bold border-b-2 py-2 border-site-color">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
</div>

@endsection
