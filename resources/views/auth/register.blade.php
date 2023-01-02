@extends('layouts.app')


@section('content')
<div class="mx-3 mt-6">

<h1 class="max-w-xl mx-auto mb-5 uppercase pb-2 w-full mt-20
text-center bg-gray-200 text-gray-500 font-bold border-b-2 py-2 border-site-color">
    sign up
</h1>
<form method="POST" id="register" x-data="userregister" class="max-w-xl mx-auto md:px-0 mb-20" 
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
    

    <div class="flex flex-col sm:flex-row mt-3">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="first_name" :value="__('FIRST NAME')" />

            <x-text-input id="first_name" class="block mt- w-full py-1" type="text" 
                x-model="first_name" required />
        </div>


        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="last_name" :value="__('LAST NAME')" />

            <x-text-input id="last_name" class="block w-full py-1" type="text" x-model="last_name" 
                 required />
        </div>
    </div>

    <div class="flex flex-col sm:flex-row mt-3">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="phone" :value="__('PHONE NUMBER')" />

            <x-text-input id="phone" class="block mt- w-full py-1" type="text" 
                x-model="phone" required />
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="email" :value="__('EMAIL ADDRESS')" />

            <x-text-input id="email" class="block w-full py-1" type="text" x-model="email" 
                 required />
        </div>
    </div>

    <div class="mt-3">
            <x-input-label for="address" :value="__('ADDRESS')" />

            <x-text-input id="address" class="block w-full py-1" type="text" x-model="address" 
                 required />
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="state_id" :value="__('STATE')" />
            <select x-model="state_id" id="state_id" 
            x-on:change="$store.location.selectState(event)" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT STATE --</option>
                <template x-for="state in $store.location.locations">
                    <option x-bind:value="state.id"
                        x-text="state.name" 
                        x-bind:selected="state.id == localStorage.getItem('state_id')" >
                    </option>
                </template>
            </select>
        </div>
        
        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="city_id" :value="__('CITY')" />

            <select x-model="city_id" id="city_id"  x-bind:class="!$store.location.cities.length ? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!$store.location.cities.length" x-on:change="$store.location.selectCity(event)" 
            class="py-1 w-full rounded border border-gray-300">
            <option value="">-- SELECT CITY --</option>
            <!-- <template x-if="$store.location.cities.length"> -->
                <template x-for="city in $store.location.cities">
                        <option x-bind:value="city.id" 
                        x-bind:selected="city.id == localStorage.getItem('city_id')"
                        x-text="city.name"></option>
                </template>
            <!-- </template> -->
        </select>
        </div>
       
    </div>
    
    <div class="mt-3">
            <x-input-label for="password" :value="__('PASSWORD')" />

            <x-text-input id="password" class="block w-full py-1" type="password" x-model="password" 
                 required />
    </div>

    <div class="mt-3">
            <x-input-label for="password_confirmation" :value="__('CONFIRM PASSWORD')" />

            <x-text-input id="password_confirmation" class="block w-full py-1" type="password" 
            x-model="password_confirmation" 
                 required />
    </div>   

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already signed-up?') }}
        </a>

        <button class="ml-4 bg-site-color uppercase py-1 px-2 
        mt-2 rounded text-white hover:bg-green-900">
            {{ __('SIGN UP') }}
        </button>

    </div>
</form>
</div>
@endsection
