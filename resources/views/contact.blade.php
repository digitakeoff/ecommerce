@extends('layouts.app')

@section('content')
<main class="flex mx-auto w-full flex-col  w-72    justify-start  mt-20">
    <button class="text-site-color pl-4 py-2 bg-gray-200 hover:shadow 
    hover:bg-gray-100 active:mt-9 mt-10 rounded-full text-left">
        <span class="fab fa-whatsapp"></span> <span>WhatsApp</span>
    </button>    

    <button class="text-site-color mt-10 pl-4 py-2 bg-gray-200 hover:shadow 
    hover:bg-gray-100 active:mt-9 rounded-full text-left">
       <span class="fab fa-facebook-messenger"></span> Facebook chat
    </button>
    
    <button class="text-site-color mt-10 pl-4 py-2 bg-gray-200 hover:shadow 
    hover:bg-gray-100 active:mt-9 rounded-full text-left">
    <span class="fas fa-phone-square-alt"></span> Phone call
    </button>

    <button class="text-site-color pl-4 mt-10 py-2 bg-gray-200 hover:shadow 
    hover:bg-gray-100 active:mt-9 rounded-full text-left">
    <span class="fas fa-envelope"></span> Email
    </button> 
</main>
@endsection
