@props(['car'])

<div class="shadow rounded overflow-hidden flex flex-col m-1 bg-black">
    <div class="relative">
        <img class="w-full h-48 block" 
            src="{{asset('storage/files/'.json_decode($car->images)[$car->main_image_index]->lg)}}" 
            alt="{{$car->slug}}">
        <p class="absolute top-0 text-xs bg-gray-900 text-gray-200 px-1 pr-4 rounded-br-full">
            {{ucfirst(implode(" ", explode('-', $car->condition)))}}
        </p>
    </div>
                
                <div class="flex flex-col bg-black 
                    text-white px-3 mb- md:grow-0 grow pt-1">
                    <!-- <div> -->
                        <p>{{$car->name}}</p>
                        <p class="text-yellow-500">{{$car->price}}</p>
                        <p  class="md:block hidden">{{$car->mileage}}</p>
                        <p class="md:block hidden">
                            <span class="fas fa-map-marker-alt"></span>
                            <span>{{ucwords(implode(" ", explode('-', $car->city)))}}</span>,
                            <span>{{ucwords(implode(" ", explode('-', $car->state)))}}</span>
                        </p>
                    <!-- </div> -->

                    <div style="font-size:20px" class="my-1 border-t flex justify-end 
                        border-site-color text-site-color pt-1">
                        <div class="mr-5">
                            <span class="fas fa-phone-square-alt"></span>
                        </div>

                        <div class="mr-5">
                            <span class="fab fa-whatsapp-square"></span>

                        </div>
                        <div class="mr-5">
                            <span class="fab fa-facebook-messenger"></span>

                        </div>

                        <div class="cursor-pointer">

                        <span class="fas fa-envelope"></span>
                        </div>
                        
                        
                    </div>
                </div>
                
</div>