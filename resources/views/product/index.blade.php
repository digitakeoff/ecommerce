@extends('layouts.app')

@section('content')
<main  class="mb-10">
    
    <div x-data="carousel()" class="flex md:flex-row flex-col pr-3 pl-2 mt-8">
        <template x-for="(product, index) in products" x-bind:key="index">
            <div class="w-full md:w-1/5 shadow relative rounded overflow-hidden flex 
            md:flex-col flex-row m-1 bg-black">
                <!-- <div class="w-2"> -->

                <img class="md:w-full md:h-56 w-28 h-28 block" 
                x-bind:src="'http://localhost:8000/dev/img/'+product.image" 
                x-bind:alt="product.name">

                <p class="absolute bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full" 
                x-text="product.condition"></p>
                <!-- </div> -->
                
                <div class="bg-black text-white px-3 mb-3 md:grow-0 grow pt-1">
                    <p x-text="product.name"></p>
                    <p class="text-yellow-500" x-text="product.amount"></p>
                    <p  x-text="product.mileage"></p>
                    <p>
                        <span class="fas fa-map-marker-alt"></span>
                        <span x-text="product.location"></span>
                    </p>

                    <button class="p-1 md:block hidden uppercase border  hover:mt-1 rounded mt-2 border-site-color text-site-color w-full">
                    <span class="fas fa-phone-alt"></span>
                    <span>contact us</span>
                </button>
                </div>
                
            </div>
        </template>
        
    </div>
</main>
@endsection
