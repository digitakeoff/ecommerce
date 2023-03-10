@extends('layouts.app')

@section('content')
<div class="mx-auto border border-gray-300 h-auto p-3 max-w-screen-sm my-auto shadow rounded w-full">

        <h1 class="w-full mx-auto mb-5 uppercase
        text-center bg-gray-200 text-gray-500 font-bold border-b-2 py-2 border-site-color">
        {{ __('Forgot your password?') }}
       
        </h1>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <form method="POST" class="max-w-xl mx-auto" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('EMAIL ADDRESS')" />

                <x-text-input id="email" class="block mt-1 py-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <button class="ml-4 bg-site-color uppercase py-1 px-2 
        mt-2 rounded text-white hover:bg-green-900">
        {{ __('Email Password Reset Link') }}
        </button>
            </div>
        </form>
</div>
@endsection
