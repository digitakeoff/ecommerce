@extends('layouts.app')

@section('content')
<main  class="mb-10">
    <div  class="md:h-96 h-56 flex overflow-hidden">

        <div x-data="carousel()" class="w-full h-full md:w-3/5">
            <template x-if="products.length">
                <div class="relative h-full">
                    <a x-ref="img" class="h-full" x-bind:href="'/products/'+products[selected].slug">
                        <img class="h-full w-full" x-bind:src="products[selected].images[0].src" 
                        x-bind:alt="products[selected].name" />

                        <p class="bg-gray-900 hover:bg-opacity-100 text-white md:mx-auto md:w-80 
                        bg-opacity-75 rounded md:py-3 py-1
                        text-center absolute hover:bottom-12 active:pl-3 bottom-10 left-3 right-3">
                            <span x-text="products[selected].name"></span>
                            <span class="text-yellow-500" x-text="'&#x20A6;'+products[selected].price.number_format()"></span>
                        </p>
                    </a>

                    <button x-on:click="prev()" class="bg-gray-900 h-full absolute 
                    left-0 top-0 text-gray-600 hover:text-gray-300 bg-opacity-0 hover:bg-opacity-75 px-6">
                        <span class="fas fa-chevron-left"></span>
                    </button>

                    <button x-on:click="next()" class="bg-gray-900 h-full absolute 
                    right-0 top-0 text-gray-600 hover:text-gray-300 bg-opacity-0 hover:bg-opacity-75 px-6">
                        <span class="fas fa-chevron-right"></span>
                    </button>

                    <div class="flex justify-center absolute bottom-0 right-0 left-0 pb-3">
                        <template x-for="(product, index) in products" x-bind:key="index">
                            <button x-on:click="selected = index" x-on:mouseover="pause(index)" x-on:mouseout="play()"
                            x-bind:class="{'bg-gray-300': selected == index, 'bg-site-color': selected != index}"
                            class="h-5 w-5 mx-2 rounded-full ring-2 ring-gray-300"></button>
                        </template>
                    </div>
                </div>
            </template>
        </div>

    </div>
    
    <div class="flex sm:flex-row flex-col p-2">
        @foreach($latestproducts as $product)
            <div class="md:w-1/6">
                <x-product-card :product="$product"/>
            </div>
        @endforeach
    </div>
</main>
@endsection