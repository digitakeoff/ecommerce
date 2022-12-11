@extends('layouts.app')


@section('content')
<h1 class="max-w-xl mx-auto mb-10 uppercase pb-2 border-b border-site-color text-center w-full mt-20">
    sign up
</h1>
<form method="POST" id="register" x-data="userregister" class="max-w-xl mx-auto md:px-0 px-3 mb-20" 
action="{{ route('register') }}" x-on:submit.prevent="handleOnSubmit">
    @csrf

    @if(count($errors->all()))
        <div class="p-2 rounded bg-gray-200">
        @foreach($errors->all() as $error)
        <p class="text-red-600">{{$error}}</p>
        @endforeach
        </div>
    @endif

    <template x-if="errors != null">
        <div class="rounded bg-gray-100 p-2">
            <template x-for="error in errors">
                <template x-for="err in error">
                    <p class="text-red-500" x-text="err"></p>
                </template>
            </template>
        </div>
    </template>
    

    <div class="flex flex-col sm:flex-row mt-4">
        <x-custom-input div_class="w-full sm:w-1/2 sm:mr-1 mr-0" label="First name" name="first_name"/>

        <x-custom-input div_class="w-full sm:w-1/2 sm:ml-1 ml-0 mt-4 md:mt-0" label="Last name" name="last_name"/>
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        <x-custom-input div_class="w-full sm:w-1/2 sm:mr-1 mr-0"  label="Phone number" name="phone"/>

        <x-custom-input div_class="w-full sm:w-1/2 sm:ml-1 ml-0 mt-4 md:mt-0" label="Email address" name="email"/>
    </div>

    <x-custom-input  label="Address" div_class="mt-4" name="address"/>

    <div x-data class="flex flex-col sm:flex-row mt-4">
        <select x-model="state" id="state" class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <option value="" x-on:click="$store.location.selectState('')">-- SELECT STATE --</option>
            <template x-for="(state, index) in $store.location.getStates()">
                <option x-bind:value="index" x-bind:selected="index == localStorage.getItem('state')"
                x-on:click="$store.location.selectState(index)" x-text="state"></option>
            </template>
        </select>

        <select x-model="city" id="city"
            x-bind:class="!$store.location.state? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!$store.location.state" 
            class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
                <option value="">-- SELECT CITY --</option>
                <template x-for="(city, index) in $store.location.getCities()">
                    <option x-bind:value="city.slug" x-bind:selected="index == localStorage.getItem('city')" 
                    x-on:click="$store.location.selectCity(city.slug)" x-text="city.name"></option>
                </template>
        </select>
    </div>
    
    <x-custom-input  type="password" label="Password" class="mt-4" name="password"/>
    <x-custom-input  type="password" label="Confirm password" class="mt-4" name="password_confirmation"/>   

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already signed-up?') }}
        </a>

        <x-primary-button class="ml-4">
            {{ __('SIGN UP') }}
        </x-primary-button>
    </div>
</form>
@endsection
