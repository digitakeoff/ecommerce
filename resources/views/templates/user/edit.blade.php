<form x-data="useredit" id="useredit" enctype='multipart/form-data' method="post" 
class="mx-auto my-12 sm:w-10/12 w-full p-2" x-on:submit.prevent="handleOnSubmit">
    <div class="bg-gray-200 text-gray-500 font-bold uppercase my-5 flex justify-center 
    pl-5 border-b-2 py-2 border-site-color">
        <a href="{{route('users.index')}}">
            <span class="fas fa-chevron-left"></span>
        </a>
        <h1 class="mx-auto">
            EDIT | {{$user->getFullName()}}
        </h1>
    </div>
    <script>
        var user = <?php echo json_encode($user); ?>;
        var state_id = user.state.id;
    </script>
    <template x-if="errors != null">
        <div class="bg-gray-200 rounded p-2 mb-3">
            <template x-for="error in errors">
                <template x-for="err in error">
                    <p class="text-red-500" x-text="err"></p>
                </template>
            </template>
        </div>
    </template>
    
    
    <div class="mt-4">
        <x-input-label for="address" :value="__('ADDRESS')" />

        <x-text-input id="address" class="focus:bg-gray-100 bg-gray-200 block mt-1 w-full py-1" type="text" 
        x-model="address" x-model="address" required />

        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    @csrf
    <div x-data class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="state" :value="__('STATE')" />
            <select x-model="state_id" id="state" x-on:change="$store.location.selectState(event)" 
            class="focus:bg-gray-100 bg-gray-200 py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT STATE --</option>
                <template x-for="state in $store.location.locations">
                    <option x-bind:value="state.id"
                        x-text="state.name" x-bind:selected="state.id == user.state.id" >
                    </option>
                </template>
            </select>
        </div>
        
        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="city" :value="__('CITY')" />

            <select x-model="city_id" id="city" 
            x-bind:class="!$store.location.cities.length ? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!$store.location.cities.length" x-on:change="$store.location.selectCity(event)" 
            class="focus:bg-gray-100 bg-gray-200 py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT CITY --</option>
                <!-- <template x-if="$store.location.cities.length"> -->
                    <template x-for="city in $store.location.cities">
                            <option x-bind:value="city.id" 
                            x-bind:selected="city.id == user.city.id"
                            x-text="city.name"></option>
                    </template>
                <!-- </template> -->
            </select>
        </div>
       
    </div>
    
    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="first_name" :value="__('FIRST NAME')" />

            <x-text-input id="first_name" class="focus:bg-gray-100 bg-gray-200 block mt-1 w-full py-1" type="text" 
                x-model="first_name"  required />

            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-3 sm:ml-1 ml-0 sm:w-1/2">
        <x-input-label for="last_name" :value="__('LAST NAME')" />

        <x-text-input id="last_name" class="focus:bg-gray-100 bg-gray-200 block mt-1 w-full py-1" type="text" 
            x-model="last_name"  required />

        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>
    </div>

   
    <div class="mt-4">
    
            <x-input-label for="role" :value="__('ROLE')" />

            <select x-model="role" x-bind:disabled="'{{request()->user()->role}}' != 'admin'" x-bind:class="'{{request()->user()->role}}' != 'admin'? 'cursor-not-allowed':''" id="role" class="focus:bg-gray-100 bg-gray-200 py-1 w-full rounded border border-gray-300">
                <option x-bind:selected="user.role == ''" value="">-- ROLE --</option>
                <option x-bind:selected="user.role == 'customer'" value="customer">CUSTOMER</option>
                <option x-bind:selected="user.role == 'agent'" value="agent">AGENT</option>
                <option x-bind:selected="user.role == 'dealer'" value="dealer">DEALER</option>
                <option x-bind:selected="user.role == 'manager'" value="manager">MANAGER</option>
                <option x-bind:selected="user.role == 'admin'" value="admin">ADMIN</option>
            </select>
            
    </div>


    <div class="mt-4">
        <x-input-label for="phone" :value="__('PHONE NUMBER')" />

        <x-text-input id="phone" class="focus:bg-gray-100 bg-gray-200 block mt-1 w-full py-1" type="text" 
            x-model="phone" :value="old('phone')" required />

        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('EMAIL ADDRESS')" />

        <x-text-input id="email" class="focus:bg-gray-100 bg-gray-200 block mt-1 w-full py-1" type="text" 
            x-model="email" :value="old('email')" required />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" :value="__('PASSWORD')" />

        <x-text-input id="password" class="block mt-1 w-full py-1" type="text" 
            x-model="password" placeholder="Add new password" :value="old('password')"/>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
        

    <button class="bg-site-color uppercase w-full py-2 mt-2 rounded text-white hover:bg-green-900">
       Update profile
    </button>
</form>