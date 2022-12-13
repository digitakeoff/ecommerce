<form x-data="carcreate" enctype='multipart/form-data' method="post" id="carcreate"
class="mx-auto  sm:w-10/12 w-full p-2" x-on:submit.prevent="handleOnSubmit">
    <h1 class="text-center bg-gray-200 text-gray-500 
            font-bold uppercase my-5 border-b-2 py-2 border-site-color">
        Sell car
    </h1>

    <template x-if="errors != null">
        <div class="bg-gray-200 rounded p-2 mb-3">
            <template x-for="error in errors">
                <template x-for="err in error">
                    <p class="text-red-500" x-text="err"></p>
                </template>
            </template>
        </div>
    </template>
    
    <div x-data="fileupload" class="relative border rounded  border border-gray-300">
        <div class="h-20  cursor-pointer text-center mt-10">
            <div x-on:click="$refs.image_upload_input.click()">
                <span class="fas fa-plus"></span>
            </div>
            <input type="file" name="file" x-ref="image_upload_input" x-on:change="handleOnChange" 
            class="hidden">
        </div>    

        <div class="flex justify-center flex-wrap">
            <template x-if="images.length">
                <template x-for="(image, index) in images" x-bind:key="index">
                    <div class="relative m-1 h-12 w-12 cursor-pointer mt-2" x-on:click="selectedIndex(index)"
                        x-bind:class="index == imgIndex ? 'rounded border ring-green-500 ring-2':''">
                        <div x-on:click="handleDeleteImage(image)" 
                            class="cursor-pointer -top-3 left-4 text-red-500 absolute">
                            <span class="fas fa-times-circle"></span>
                        </div>

                        <img class="rounded border h-full w-full" x-bind:src="image.url">
                    </div>
                </template>
            </template>

            <p class="py-0 top-0 right-0 w-40 left-0 rounded-bl text-gray-500 rounded-br mx-auto border-l 
                border-r border-b border-gray-400 text-center absolute">
                Photo
            </p>

        </div>

        <p class="text-center py-1 text-gray-700 text-xs">
            <span class="text-red-500">*</span> Main image has green border. Click on image to select
        </p>

    </div>

    <div class="mt-4">
        <x-input-label for="address" :value="__('ADDRESS')" />

        <x-text-input id="address" class="block mt-1 w-full py-1" type="text" 
        x-model="address" x-model="address"  required />
    </div>

    <div x-data class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="state_id" :value="__('STATE')" />
            <select x-model="state_id" id="state_id" x-on:change="$store.location.selectState(event)" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT STATE --</option>
                <template x-for="state in $store.location.locations">
                    <option x-bind:value="state.id"
                        x-text="state.name" x-bind:selected="state.id == localStorage.getItem('state_id')" ></option>
                </template>
            </select>
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="city_id" :value="__('CITY')" />

            <select x-model="city_id" id="city_id" x-on:change="$store.location.selectCity" 
            class="py-1 w-full rounded border border-gray-300"
            x-bind:class="!state_id? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!state_id" >
            <option value="">-- SELECT CITY --</option>
            <template x-if="$store.location.state_id">
                <template x-for="city in $store.location.cities">
                        <option x-bind:value="city.id" 
                        
                        x-bind:selected="city.id == localStorage.getItem('city_id')"
                        x-text="city.name"></option>
                </template>
            </template>
        </select>
        </div>
       
    </div>
        
    <div class="mt-4">
        <x-input-label for="price" :value="__('PRICE')" />

        <x-text-input id="price" class="block mt-1 w-full py-1" type="text" 
            x-model="price"  required />

    </div>

    <div x-data class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="make_id" :value="__('MAKE')" />
            <select x-model="make_id" id="make_id" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT MAKE --</option>
                <template x-for="make in makes">
                    <option x-bind:value="make.id"  
                    x-bind:selected="make.id == localStorage.getItem('make_id')"
                    x-text="make.name"></option>
                </template>
            </select>
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-3 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="model_id" :value="__('MODEL')" />
            <select x-model="model_id" id="model_id" x-bind:class="!models.length ? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!models.length"  class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT MODEL --</option>
                <template x-if="make_id && models.length">
                    <template x-for="model in getModelOfMake">
                    <option x-bind:value="model.id" 
                    x-bind:selected="model.id == localStorage.getItem('model_id')"
                    x-text="model.name"></option>
                    </template>
                </template>
            </select>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row mt-3">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="ext_color" :value="__('EXTERIOR COLOR')" />

            <x-text-input id="ext_color" class="block mt- w-full py-1" type="text" 
                x-model="ext_color" required />
        </div>


        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="int_color" :value="__('INTERIOR COLOR')" />

            <x-text-input id="int_color" class="block w-full py-1" type="text" x-model="int_color" 
                 required />
        </div>
    </div>
        

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="year" :value="__('YEAR')" />
            
            <select x-model="year" id="year" class="w-full py-1 rounded border border-gray-300">
                <option value="">-- SELECT YEAR --</option>
                @for($i = 2000; $i <= date('Y'); $i++)
                    <option x-text="{{$i}}" x-bind:selected="'{{$i}}' == localStorage.getItem('year')"></option>
                @endfor
            </select>
        </div>
            
        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:mt-0 mt-4 sm:w-1/2">
            <x-input-label for="condition" :value="__('CONDITION')" />

            <select x-model="condition" id="condition" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- CONDITION --</option>
                <option value="brand-new">BRAND NEW</option>
                <option value="foreign-used">FOREIGN USED</option>
                <option value="nigerian-used">NIGERIAN USED</option>
            </select>
        </div>
            
    </div>


    <div class="mt-4">
        <x-input-label for="mileage" :value="__('MILEAGE')" />

        <x-text-input id="mileage" class="block mt-1 w-full py-1" type="text" 
            x-model="mileage" required />
    </div>

    <div class="mt-4">
        <x-input-label for="vin" :value="__('VEHICLE IDENTIFICATION NUMBER')" />

        <x-text-input id="vin" class="block mt-1 w-full py-1" type="text" 
            x-model="vin"  required />
    </div>

    <div class="mt-4">
        <x-input-label for="drivetrain" :value="__('DRIVETRAIN')" />

        <select x-model="drivetrain" id="drivetrain" 
            class="w-full py-1 rounded border border-gray-300">
            <option value="">-- SELECT DRIVETRAIN --</option>
            <option value="two-wd">TWO WHEEL DRIVE</option>
            <option value="four-wd">FOUR WHEEL DRIVE</option>
            <option value="awd">ALL WHEEL DRIVE</option>
            <option value="fwd">FRONT WHEEL DRIVE</option>
            <option value="rwd">REAR WHEEL DRIVE</option>
        </select>
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="fuel_type" :value="__('FUEL TYPE')" />
            
            <select x-model="fuel_type" id="fuel_type" 
            class="w-full py-1 rounded border border-gray-300">
                <option value="">-- SELECT FUEL TYPE --</option>
                <option value="petrol">PETROL</option>
                <option value="diesel">DIESEL</option>
                <option value="electric">ELECTRIC</option>
            </select>
        </div>
            
        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:mt-0 mt-4 sm:w-1/2">
            <x-input-label for="vehicle_drive" :value="__('VEHICLE DRIVE')" />

            <x-text-input id="vehicle_drive" class="block w-full py-1" type="text" 
             x-model="vehicle_drive" required />

        </div>
    </div>

    
    <div class="flex mt-4 sm:flex-row flex-col">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:mt-0 mt-4 sm:w-1/2">
            <x-input-label for="transmission" :value="__('TRANSMISSION')" />
            <select x-model="transmission" id="transmission"
                class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT TRANSMISSION --</option>
                <option value="manual">MANUAL</option>
                <option value="automatic">AUTOMATIC</option>
            </select>
        </div>
        
        
        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:mt-0 mt-4 sm:w-1/2">
            <x-input-label for="bodytype_id" :value="__('BODY TYPE')" />
            <select x-model="bodytype_id" id="bodytype_id"
                class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT BODY TYPE --</option>
                <template x-for="body in body_types">
                    <option x-bind:value="body.id"
                    x-bind:selected="body.id == localStorage.getItem('bodytype_id')"
                    x-text="body.name"></option>
                </template>
            </select>
        </div>
    </div>

    <div class="mt-4 w-full">
        <x-input-label for="description" :value="__('DESCRIPTION')" />

        <textarea rows=6 x-model="description" x-model="description" id="description" 
            placeholder="Description" class="w-full py-1 rounded border border-gray-300"></textarea>
    </div>
        

    <button class="bg-site-color uppercase w-full py-2 mt-2 rounded text-white hover:bg-green-900">
        Submit
    </button>
</form>