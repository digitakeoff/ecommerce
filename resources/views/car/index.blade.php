@extends('layouts.app')

@section('content')
<main  class="mb-10 md:mt-20">
    <h1 class="uppercase border-b border-site-color pb-1 text-center m-3">All cars</h1>
    <div x-data="carousel()" class="flex md:flex-row flex-col pr-3 pl-2 mt-8">
        <template x-for="(product, index) in products" x-bind:key="index">
            <div class="w-full md:w-1/5">
                <div class=" shadow rounded overflow-hidden flex flex-col m-1 bg-black">
                    <div class="relative">
                        <img class="w-full h-48 block" 
                        x-bind:src="'http://localhost:8000/dev/img/'+product.image" 
                        x-bind:alt="product.name">
                        <p class="absolute top-0 text-xs bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full" 
                        x-text="product.condition"></p>
                    </div>
                    
                    <div class="flex flex-col bg-black 
                        text-white px-3 mb- md:grow-0 grow pt-1">
                        <!-- <div> -->
                            <p x-text="product.name"></p>
                            <p class="text-yellow-500" x-text="product.amount"></p>
                            <p  class="md:block hidden" x-text="product.mileage"></p>
                            <p class="md:block hidden">
                                <span class="fas fa-map-marker-alt"></span>
                                <span x-text="product.location"></span>
                            </p>
                        <!-- </div> -->

                        <div style="font-size:20px" class="my-1 border-t flex justify-end 
                            border-site-color text-site-color pt-1">
                            <div class="mr-5 hover:text-green-700 active:text-green-800 cursor-pointer">
                                <span class="fas fa-phone-square-alt"></span>
                            </div>

                            <div class="mr-5 hover:text-green-700 active:text-green-800 cursor-pointer">
                                <span class="fab fa-whatsapp-square"></span>

                            </div>
                            <div class="mr-5 hover:text-green-700 active:text-green-800 cursor-pointer">
                                <span class="fab fa-facebook-messenger"></span>

                            </div>

                            <div class="hover:text-green-700 active:text-green-800 cursor-pointer">

                            <span class="fas fa-envelope inline-block"></span>
                            </div>
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>

        </template>
        
    </div>
</main>
@endsection
