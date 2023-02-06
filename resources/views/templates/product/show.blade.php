<main class="mb-20 p-2">
    <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-9/12">
            <!-- <h1>{{$car->name}}</h1> -->

            <script>
                var car = <?php echo json_encode($car); ?>
            </script>
            
            <div class="w-full border border-site-color rounded">
            <img class="w-full" src="{{$car->images[$car->main_image_index]->src}}" alt="{{$car->name}}">

            </div>

            <div class="flex justify-between mt-3">
                @foreach($car->images as $image)
                    <div class="border border-site-color  rounded">
                        <img class="h-10 w-10" src="{{$image->src}}" alt="{{$car->name}}">
                    </div>
                @endforeach
            </div>


            
        </div>

        <div class="md:w-3/12 sm:ml-3 w-full md:px-5 p-2 md:mt-0 mt-2 rounded bg-gray-200">
            <h1 class="my-3 font-bold text-center">{{$car->name}}</h1>
            <p class="my-3 rounded-full text-center bg-white py-1 p-10">{{price($car->price)}}</p>

            <!-- <a 
            href="https://wa.me/{{'234'.ltrim('07082683086', '0')}}?text={{urlencode('I\'m interested in this '). $car->name .' '.route('cars.show', $car)}}. Let's talk" class="block my-5 cursor-pointer text-center 
            text-site-color p-2  rounded border border-site-color">
                <span class="fab fa-whatsapp-square"></span>
                <span>WhatsApp</span>
            </a> -->

            <a aria-label="Chat on WhatsApp" class="w-full" href="https://wa.me/{{'234'.ltrim($car->user->phone, '0')}}?text={{urlencode('I\'m interested in this '). $car->name .' '.route('cars.show', $car)}}. Let's talk"> 
                <img alt="Chat on WhatsApp" class="w-full" src="/WhatsAppButtonGreenMedium.svg" /> 
            </a>
            <a href="tel:+234{{ltrim($car->user->phone, '0')}}" 
            class="block cursor-pointer text-center 
            bg-site-color p-2 rounded border uppercase text-white mt-4 border-site-color">
                <span class="fas fa-phone-square-alt"></span>
                <span>Call me</span>
            </a>

            <p class="md:block hidden mt-5 text-gray-800
             py-2 rounded-full border border-site-color text-center">
                <span class="fas fa-map-marker-alt"></span>
                <span>{{city($car->city_id)->name}}</span>,
                <span>{{state($car->state_id)->name}}</span>
            </p>


            @include('templates.loancal')
        </div>
    </div>

    <div class="flex flex-col md:flex-row mt-8">
        <div class="w-full md:w-9/12 p-3 border border-site-color rounded bg-white">
            <h2 class="mb-5 border-b-2 border-site-color">Details</h2>
            
            <div class="flex flex-col sm:flex-row">
                <div class="md:w-1/2 w-full sm:mr-10">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{ucfirst($car->make->name)}}</p>
                            <p class="text-gray-400 uppercase">Make</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{ucfirst($car->model->name)}}</p>
                            <p class="text-gray-400 uppercase">Model</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 w-full sm:ml-10 mt-3 md:mt-0">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{ucfirst($car->transmission)}}</p>
                            <p class="text-gray-400 uppercase">Transmission</p>
                        </div>
                        <div class="">
                            <p class="">{{$car->year}}</p>
                            <p class="text-gray-400 uppercase">Year</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row mt-3">
                <div class="md:w-1/2 w-full sm:mr-10">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{ucfirst($car->fuel_type)}}</p>
                            <p class="text-gray-400 uppercase">Fuel</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{ucfirst(drivetrain($car->drivetrain))}}</p>
                            <p class="text-gray-400 uppercase">DRIVETRAIN</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 w-full sm:ml-10 mt-3 md:mt-0">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{ucfirst(condition($car->condition))}}</p>
                            <p class="text-gray-400 uppercase">Condition</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{$car->bodytype->name}}</p>
                            <p class="text-gray-400 uppercase">BODY TYPE</p>
                        </div>
                    </div>
                </div>

                
            </div>  

            <div class="flex flex-col sm:flex-row mt-3">
                <div class="md:w-1/2 w-full sm:mr-10">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{ucfirst($car->ext_color)}}</p>
                            <p class="text-gray-400 uppercase">EXTERIOR color</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{ucfirst($car->int_color)}}</p>
                            <p class="text-gray-400 uppercase">INTERIOR color</p>
                        </div>
                    </div>
                </div>

                <div class="md:w-1/2 w-full sm:ml-10 mt-3 md:mt-0">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <p class="">{{$car->seats}}</p>
                            <p class="text-gray-400 uppercase">SEATS</p>
                        </div>
                        <div class="text-right">
                            <p class="">{{$car->mileage}}</p>
                            <p class="text-gray-400 uppercase">MILEAGE</p>
                        </div>
                    </div>
                </div>
            </div>  

            <div class="flex flex-col sm:flex-row mt-3">
                <div class="md:w-1/2 w-full sm:mr-10 mt-3 md:mt-0">
                        <div class="flex w-full justify-between">
                            <div class="">
                                <p class="">{{$car->airbags}}</p>
                                <p class="text-gray-400 uppercase">Airbags</p>
                            </div>
                            <div class="text-right">
                                <p class="">{{$car->doors}}</p>
                                <p class="text-gray-400 uppercase">Door</p>
                            </div>
                        </div>
                </div>

                <div class="md:w-1/2 w-full sm:ml-10 mt-3 md:mt-0">
                   
                </div>
            </div>  
        </div> 

        <div class="md:w-3/12 sm:ml-3 w-full md:px-5 p-2 md:mt-0 mt-2 rounded bg-gray-200">
        </div>
    </div>
</main>