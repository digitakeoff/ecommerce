<form x-data="modelcreate" id="modelcreate" enctype='multipart/form-data' method="post" 
class="mx-auto mb-12 sm:w-10/12 w-full p-2" x-on:submit.prevent="handleOnSubmit">

        <h1 class="text-center uppercase mb-5 border-b-2 pb-2 bg-gray-100 border-site-color">Add model</h1>
        <template x-if="errors != null">
            <div class="bg-gray-200 rounded p-2 mb-3">
                <template x-for="error in errors">
                    <template x-for="err in error">
                        <p class="text-red-500" x-text="err"></p>
                    </template>
                </template>
            </div>
        </template>
        <div x-data="fileupload" id="image" class="relative border rounded border border-gray-400">
            <div id="pic-upload panel" class="h-12 cursor-pointer text-center mt-10">
                <div x-on:click="$refs.image_upload_input.click()">
                    <span class="fas fa-plus"></span>
                </div>
                <input type="file" name="file" x-ref="image_upload_input" x-on:change="handleOnChange" 
                class="hidden">
            </div>    

            <div class="flex justify-center pb-5">
                
            <template x-if="images.length">
                <img  class="rounded border h-20 w-20" x-bind:src="images[images.length-1].url">
            </template>
            
            <p style="top:0px;right:0;left:0;width:300px" 
                class="py-0 rounded-bl rounded-br mx-auto border-l uppercase
                border-r border-b border-gray-400 text-center absolute">
                model Logo</p>
            </div>
        </div>
        
        <div class="py-1 w-full rounded mt-4">
            <x-input-label for="name" :value="__('NAME')" />

            <x-text-input id="name" class="block w-full py-1" type="text" 
            x-model="name" :value="old('name')" required />

        </div>

        <select x-model="make" class="py-1 w-full rounded mt-3 ">
            <option value="">-- SELECT MAKE --</option>
            <template x-for="make in makes">
                <option x-bind:value="make.id" x-text="make.name"></option>
            </template>
        </select>
        
        
        <button class="bg-site-color w-full py-2 mt-3 rounded text-white hover:bg-green-900">
            Submit
        </button>
    </form>