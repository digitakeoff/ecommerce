<form x-data="makecreate" enctype='multipart/form-data' method="post" 
class="mx-auto mb-12 sm:w-10/12 w-full p-2" 
    x-on:submit.prevent="handleOnSubmit">

        <h1 class="text-center uppercase mb-5 border-b-2 pb-2 bg-gray-100 border-site-color">Add Make</h1>
        
        <div x-data="fileupload" class="relative border rounded border border-gray-400">
            <div id="pic-upload panel" class="h-12 cursor-pointer text-center mt-10">
                <div x-on:click="$refs.image_upload_input.click()">
                    <span class="fas fa-plus"></span>
                </div>
                <input type="file" name="file" x-ref="image_upload_input" x-on:change="handleOnChange" 
                class="hidden">
            </div>    

            <div class="flex justify-center pb-5">
                <!-- <template x-if="images.length">
                    <template x-for="(image, index) in images" x-bind:key="index">
                        <div class="relative m-1 h-20 w-20 cursor-pointer" x-on:click="selectedIndex(index)"
                        x-bind:class="index == imgIndex ? 'rounded border ring-green-500 ring-2':''">
                            <div x-on:click="handleDeleteImage(image)" 
                            class="cursor-pointer -top-2 -right-2 z-50 text-red-500 absolute">
                                <span class="fas fa-times-circle"></span>
                            </div> -->

                            <img style="height:80px;width:80px" class="rounded border" 
                            x-bind:src="images[images.length-1].url">
                        <!-- </div>
                    </template>
                </template> -->

                <p style="top:0px;right:0;left:0;width:300px" 
                class="py-0 rounded-bl rounded-br mx-auto border-l uppercase
                border-r border-b border-gray-400 text-center absolute">
                Make Logo</p>

            </div>
        </div>
        
        <x-custom-input class="w-full mt-3" label="Name" name="name"/> 
        
        <button class="bg-site-color w-full py-2 mt-3 rounded text-white hover:bg-green-900">
            Submit
        </button>
    </form>