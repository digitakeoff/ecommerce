@props(['car'])

<div class="shadow rounded border border-black overflow-hidden flex flex-col">
    <div class="relative">
        <a href="{{route('cars.show', $car)}}">
            <img class="w-full h-48 block" 
                src="{{asset($car->images[$car->main_image_index]->src)}}" 
                alt="{{$car->slug}}">
            <p class="absolute top-0 text-xs bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full">
                {{ucfirst(condition($car->condition))}}
            </p>
        </a>
    </div>
                
    <div class="flex flex-col bg-black text-white px-2 mb- md:grow-0 grow pt-1">
        <a href="#">
            <p>{{$car->name}}</p>
            <p class="text-yellow-500">{{price($car->price)}}</p>
            <p  class="md:block hidden"><span class="fas fa-tachometer-alt"></span> {{$car->mileage}}</p>
            <p class="md:block hidden">
                <span class="fas fa-map-marker-alt"></span>
                <span>{{city($car->city_id)->name}}</span>,
                <span>{{state($car->state_id)->name}}</span>
            </p>
        </a>

        <div style="font-size:20px" class="my-1 border-t-2 flex justify-end 
                        border-site-color text-site-color pt-1">
            <div class="mr-5 cursor-pointer">
                <span class="fas fa-eye"></span>
            </div>

            <div class="mr-5 cursor-pointer">
                <span class="fab fa-whatsapp-square"></span>
            </div>       
        </div>
    </div>         
</div>