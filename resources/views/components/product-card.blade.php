@props(['product'])

<div class="shadow rounded overflow-hidden flex md:flex-col flex-row">
    <div class="relative md:w-full w-1/3">
        <a href="{{route('products.show', $product)}}">
            <img class="w-full h-full md:h-48 block" 
                src="{{asset($product->images[$product->main_image_index]->src)}}" 
                alt="{{$product->slug}}">
            <p class="absolute top-0 text-xs bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full">
                {{ucfirst(condition($product->condition))}}
            </p>
        </a>
    </div>
                
    <div class="flex flex-col justify-between bg-gray-300 text-white px-2 mb- md:grow-0 grow pt-1 md:w-full w-2/3">
        <a href="#">
                        <p class="text-gray-700">{{$product->name}}</p>
                        <p class="text-yellow-800">{{price($product->price)}}</p>
                        <p class="text-gray-700"><span class="fas fa-tachometer-alt"></span> {{$product->mileage}}</p>
                        <p class="md:block hidden text-gray-800">
                            <span class="fas fa-map-marker-alt"></span>
                            <span>{{city($product->city_id)->name}}</span>,
                            <span>{{state($product->state_id)->name}}</span>
                        </p>
        </a>

        <div style="font-size:20px" class="mt-2 border-t-2 flex justify-end 
                        border-site-color text-site-color pt-">
                        <div class="mr-5 cursor-pointer">
                            <span class="fas fa-phone-square-alt"></span>
                        </div>

                        <div class="cursor-pointer">
                            <span class="fab fa-whatsapp-square"></span>

                        </div>
                        
        </div>
    </div>
                
</div>