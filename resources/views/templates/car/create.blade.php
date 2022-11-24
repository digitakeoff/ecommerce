<form x-data="carcreate" enctype='multipart/form-data' method="post" 
class="mx-auto mb-12 sm:w-10/12 w-full p-2" x-on:submit.prevent="handleOnSubmit">

        <h1 class="text-center uppercase mb-5 border-b-2 pb-2 border-site-color">Add product</h1>

        <div x-data="fileupload" class="relative border rounded  border border-gray-400">
            <div id="pic-upload panel" class="h-24 cursor-pointer text-center mt-10">
                <div x-on:click="$refs.image_upload_input.click()">
                    <span class="fas fa-plus"></span>
                </div>
                <input type="file" name="file" x-ref="image_upload_input" x-on:change="handleOnChange" 
                class="hidden">
            </div>    

            <div class="flex justify-center">
                <template x-if="images.length">
                    <template x-for="(image, index) in images" x-bind:key="index">
                        <div class="relative m-1 h-20 w-20 cursor-pointer" x-on:click="selectedIndex(index)"
                        x-bind:class="index == imgIndex ? 'rounded border ring-green-500 ring-2':''">
                            <div x-on:click="handleDeleteImage(image)" 
                            class="cursor-pointer -top-2 -right-2 z-50 text-red-500 absolute">
                                <span class="fas fa-times-circle"></span>
                            </div>

                            <img style="height:80px;width:80px" 
                            class="rounded border" x-bind:src="image.url">
                        </div>
                    </template>
                </template>

                <p style="top:0px;right:0;left:0;width:150px" 
                class="py-0 rounded-bl rounded-br mx-auto border-l 
                border-r border-b border-gray-400 text-center absolute">
                Photo</p>

            </div>

            <p class="text-center py-1 text-gray-700">
                <span class="text-red-500">*</span> Main image has green border. Click on image to select
            </p>

        </div>

        <x-custom-input class="mt-3 w-full" label="Name" name="name" value="{{ old('name')}}" /> 

        <x-custom-input class="mt-3 w-full" label="Address" name="location.address" value="{{ old('location.address')}}"/>
        @csrf
        <div x-data class="flex flex-col sm:flex-row mt-3">
            <select x-model="location.state" class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
                <option value="">-- SELECT STATE --</option>
                <template x-for="(state, index) in $store.location.getStates()">
                    <option x-bind:value="index" x-on:click="$store.location.selectState(index)" 
                    x-text="state"></option>
                </template>
            </select>

            <select x-model="location.city" 
            x-bind:class="!location.state? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!location.state" 
            class="py-1 w-full rounded sm:mt-0 mt-3 sm:ml-1 ml-0 sm:w-1/2">
                <option value="">-- SELECT CITY --</option>
                <template x-for="(city, index) in $store.location.getCities()">
                    <option x-bind:value="city.slug" x-text="city.name"></option>
                </template>
            </select>
        </div>
        
        <x-custom-input class="mt-3 w-full" label="Price" name="price" value="{{ old('price')}}"/>

        <div x-data class="flex flex-col sm:flex-row mt-3">
            <select x-model="make" class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
                <option value="">-- SELECT MAKE --</option>
                <template x-for="make in makes">
                    <option x-bind:value="make.id" x-text="make.name"></option>
                </template>
            </select>

            <select x-model="model" x-bind:class="!make? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!make" 
            class="py-1 w-full rounded sm:mt-0 mt-3 sm:ml-1 ml-0 sm:w-1/2">
                <option value="">-- SELECT MODEL --</option>
                <template x-if="make && models.length">
                    <template x-for="model in getModelOfMake">
                    <option x-bind:value="model.id" x-text="model.name"></option>
                    </template>
                </template>
            </select>
        </div>

        <div class="flex flex-col sm:flex-row mt-3">
            <x-custom-input class="w-full sm:w-1/2 sm:mr-1 mr-0" value="{{ old('ext_color')}}" 
            label="Exterior color" name="ext_color"/>

            <x-custom-input class="w-full sm:w-1/2 sm:ml-1 ml-0" value="{{ old('int_color')}}" label="Interior color" name="int_color"/>
        </div>
        

        <div class="flex flex-col sm:flex-row mt-3">
            <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
                
                <select x-model="year" class="w-full py-1 rounded">
                    <option value="">-- SELECT YEAR --</option>
                    @for($i = 2000; $i <= date('Y'); $i++)
                        <option>{{$i}}</option>
                    @endfor
                </select>
            </div>
            
            <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:w-1/2">
                <select x-model="condition" class="py-1 w-full rounded">
                    <option value="">-- CONDITION --</option>
                    <option value="brand-new">BRAND NEW</option>
                    <option value="foreign-used">FOREIGN USED</option>
                    <option value="local-used">LOCAL USED</option>
                </select>
            </div>
            
        </div>


        <x-custom-input class="mt-3 w-full" label="Mileage" value="{{ old('mileage')}}" name="mileage"/>

        <x-custom-input class="mt-3 w-full" label="VIN" value="{{ old('vin')}}" name="vin"/>


        <x-custom-input class="mt-3 w-full" label="Vehicle drive" value="{{ old('vehicle_drive')}}" 
        name="vehicle_drive"/>

        
        <div class="flex mt-3 sm:flex-row flex-col">
            <select x-model="transmission" 
                
                class="py-1 w-full rounded sm:mt-0 mt-3 sm:mr-1 m w-full r-0 sm:w-1/2">
                <option value="">-- SELECT TRANSMISSION --</option>
                <option value="manual">Manual</option>
                <option value="semi-automatic">Semi Automatic</option>
                <option value="automatic">Automatic</option>
               
            </select>

            <select x-model="body_type"
                class="py-1 w-full rounded sm:mt-0 mt-3 w-full sm:ml-1 ml-0 sm:w-1/2">
                <option value="">-- SELECT BODY TYPE --</option>
                <template x-for="body in body_types">
                    <option x-bind:value="body.slug" x-text="body.name"></option>
                </template>
            </select>
        </div>

            <div class="mt-3 w-full">
                <label for="description"></label>
                <textarea rows=6 x-model="description" name="description" value="{{ old('description')}}" id="description" 
                placeholder="Description" class="w-full py-1 rounded"></textarea>
            </div>
        

        <button class="bg-site-color w-full py-2 mt-2 rounded text-white hover:bg-green-900">
            Submit
        </button>
    </form>