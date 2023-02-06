<form x-data="productcreate" enctype='multipart/form-data' method="post" id="productcreate"
        x-on:submit.prevent="handleOnSubmit" class="mx-2 sm:mx-4 py-2 md:mb-10">

        <div class="bg-gray-200 text-gray-500 mb-4 font-bold uppercase flex justify-center 
            pl-5 border-b-2 py-2 border-site-color">
                <a href="{{route('admin.products.index')}}">
                    <span class="fas fa-chevron-left"></span>
                </a>
                <h1 class="mx-auto">
                    Add Product
                </h1>
        </div>

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
        <div class="h-20 cursor-pointer text-center mt-10">
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
                border-r border-b border-gray-300 text-center absolute">
                Photo
            </p>

        </div>

        <p class="text-center py-1 text-gray-700 text-xs">
            <span class="text-red-500">*</span> Main image has green border. Click on image to select
        </p>

    </div>

    <div class="mt-4">
        <x-input-label for="address" :value="__('ADDRESS')" />

        <x-text-input name="address" id="address" class="block mt-1 w-full py-1" type="text" :value="old('address')" required />
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="state_id" :value="__('STATE')" />
            <select id="state_id" name="state_id" 
            x-on:change="$store.location.selectState(event)" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT STATE --</option>
                <template x-for="state in $store.location.locations">
                    <option x-bind:value="state.id"
                        x-text="state.name" 
                        x-bind:selected="state.id == localStorage.getItem('state_id')" >
                    </option>
                </template>
            </select>
        </div>
        
        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="city_id" :value="__('CITY')" />

            <select id="city_id" name="city_id"  x-bind:class="!$store.location.cities.length ? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!$store.location.cities.length" x-on:change="$store.location.selectCity(event)" 
            class="py-1 w-full rounded border border-gray-300">
            <option value="">-- SELECT CITY --</option>
            <!-- <template x-if="$store.location.cities.length"> -->
                <template x-for="city in $store.location.cities">
                        <option x-bind:value="city.id" 
                        x-bind:selected="city.id == localStorage.getItem('city_id')"
                        x-text="city.name"></option>
                </template>
            <!-- </template> -->
        </select>
        </div>
       
    </div>
        
    <div class="mt-4">
        <x-input-label for="price" :value="__('PRICE')" />

        <x-text-input name="price" id="price" class="block mt-1 w-full py-1" :value="old('price')" 
        type="text" required />

    </div>
      

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="year" :value="__('YEAR')" />
            
            <select name="year" id="year" class="w-full py-1 rounded border border-gray-300">
                <option value="">-- SELECT YEAR --</option>
                @for($i = 2000; $i <= date('Y'); $i++)
                    <option>{{$i}}</option>
                @endfor
            </select>
        </div>
            
        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:mt-0 mt-4 sm:w-1/2">
            <x-input-label for="condition" :value="__('CONDITION')" />

            <select name="condition" id="condition" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- CONDITION --</option>
                <option value="brand-new">NEW</option>
                <option value="foreign-used">USED</option>
                <option value="nigerian-used">REFURBISHED</option>
            </select>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="brand" :value="__('BRAND')" />
            
            <x-text-input name="brand" id="brand" placeholder="e.g Samsung" 
            class="block mt-1 w-full py-1" 
            :value="old('brand')" type="text" required />
        </div>
            
        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="model" :value="__('MODEL')" />
            
            <x-text-input name="model" id="model" placeholder="e.g Galaxy" 
            class="block mt-1 w-full py-1" 
            :value="old('model')" type="text" required />
        </div>
    </div>

    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/3">
            <x-input-label for="width" :value="__('WIDTH')" />
            
            <x-text-input name="width" id="width" placeholder="e.g 3 Ft" class="block mt-1 w-full py-1" 
            :value="old('width')" type="text" required />
        </div>
            
        <div class="py-1 w-full rounded sm:mx-1 mx-0 sm:w-1/3">
            <x-input-label for="height" :value="__('HEIGHT')" />
            
            <x-text-input name="height" id="height" placeholder="e.g 7.2 Ft" class="block mt-1 w-full py-1" 
            :value="old('height')" type="text" required />
        </div>

        <div class="py-1 w-full rounded sm:ml-1 ml-0 sm:w-1/3">
            <x-input-label for="length" :value="__('LENGTH')" />
            
            <x-text-input name="length" id="length" placeholder="e.g 2 Ft" class="block mt-1 w-full py-1" 
            :value="old('length')" type="text" required />
        </div>
    </div>

    <div class="mt-4">
        <x-input-label for="model" :value="__('COLOR')" />

        <x-text-input name="color" id="color" class="block mt-1 w-full py-1" :value="old('color')" 
        type="text" required />

    </div>

    <div class="mt-4">
        <x-input-label for="category" :value="__('CATEGORY')" />

        <select name="category"
        x-on:change="selectCategory(event)" id="category" 
        class="py-1 w-full rounded border border-gray-300">
                <option value="">-- CATEGORY --</option>
                <option value="laptops">LAPTOP</option>
                <option value="phone">PHONE</option>
        </select>
    </div>

    @if(count($categories))
        @foreach($categories as $cat_key => $category)
            <div x-show="'{{$cat_key}}' == category">
            @foreach($category as $cat_props_key => $cat_props)

                @php
                    $_props_key = Str::lower(Str::slug($cat_props_key, '_'));
                @endphp
                <div class="flex mt-4 flex-col">
                    <x-input-label class="uppercase" :value="__($cat_props_key)" />

                    <div class="flex flex-col uppercase border p-3 border-gray-300 rounded">
                        <div class="flex sm:flex-row flex-wrap flex-col">
                            @foreach($cat_props as $props)
                                @php
                                    $name = Str::lower(Str::slug($props['name'], '_'));
                                    $unit = array_key_exists('unit', $props)? ' ('.$props['unit'].')' : ""
                                @endphp
                                <div class="py-1 w-full rounded sm:px-2 px-0 sm:mt-0 mt-4">
                                    <x-input-label for="{{$name}}" :value="__($props['name']).__($unit)" />
                                    
                                    @if($props['input'] == 'radio')
                                    <div class="flex items-center bg-white justify-between 
                                    border border-gray-300 rounded py-1">
                                        @foreach($props['value'] as $prop)
                                            <div class="px-3 flex items-center justify-between">
                                                <input value="{{$prop}}" name="{{$_props_key}}[{{$name}}]" 
                                                type="radio"/>&nbsp; {{$prop}}
                                            </div>
                                        @endforeach
                                    </div>
                                    @endif

                                    @if($props['input'] == 'select')
                                        <select name="{{$_props_key}}[{{$name}}]" 
                                        class="border border-gray-300 block rounded w-full py-1">
                                            <option >--SELECT {{strtoupper($name)}}--</option>

                                            @foreach($props['value'] as $prop)
                                                <option >{{$prop}}</option>
                                            @endforeach
                                        </select>
                                    @endif

                                    @if($props['input'] == 'text')
                                        @php
                                            $ph = array_key_exists('ph', $props)? $props['ph'] : ""
                                        @endphp
                                        <div class="flex items-center justify-between">
                                            <x-text-input :placeholder="$ph" name="{{$_props_key}}[{{$name}}]" 
                                            class="block mt-1 w-full py-1" type="text" required />
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @endforeach
    @endif
    
    <button class="bg-site-color uppercase w-full py-2 mt-2 rounded text-white hover:bg-green-900">
        Add
    </button>
</form>