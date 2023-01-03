@props(['car'])

<div class="shadow rounded overflow-hidden flex md:flex-col flex-row">
    <div class="relative md:w-full w-1/3">
        <a href="{{route('cars.show', $car)}}">
            <img class="w-full h-full md:h-48 block" 
                src="{{asset($car->images[$car->main_image_index]->src)}}" 
                alt="{{$car->slug}}">
            <p class="absolute top-0 text-xs bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full">
                {{ucfirst(condition($car->condition))}}
            </p>
        </a>
    </div>
                
    <div class="flex flex-col justify-between bg-gray-300 text-white px-2 mb- md:grow-0 grow pt-1 md:w-full w-2/3">
        <a href="#">
                        <p class="text-gray-700">{{$car->name}}</p>
                        <p class="text-yellow-800">{{price($car->price)}}</p>
                        <p class="text-gray-700"><span class="fas fa-tachometer-alt"></span> {{$car->mileage}}</p>
                        <p class="md:block hidden text-gray-800">
                            <span class="fas fa-map-marker-alt"></span>
                            <span>{{city($car->city_id)->name}}</span>,
                            <span>{{state($car->state_id)->name}}</span>
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