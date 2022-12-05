<form x-data="useredit" id="useredit" enctype='multipart/form-data' method="post" 
class="mx-auto mb-12 sm:w-10/12 w-full p-2" x-on:submit.prevent="handleOnSubmit">
    <h1 class="text-center bg-gray-200 text-gray-500 
            font-bold uppercase my-5 border-b-2 py-2 border-site-color">
        EDIT {{$user->first_name}} {{$user->last_name}}
    </h1>
    <script>
        var user = <?php echo json_encode($user); ?>;
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

        <x-text-input id="address" class="block mt-1 w-full py-1" type="text" 
        x-model="address" x-model="address" required />

        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>

    @csrf
    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="state" :value="__('STATE')" />
            <select x-model="state" id="state" class="py-1 w-full rounded border border-gray-300">
                <option value="">-- SELECT STATE --</option>
                <template x-for="(state, index) in $store.location.getStates()">
                    <option x-bind:value="index" x-on:click="$store.location.selectState(index)" 
                        x-text="state" x-bind:selected="index == user.state" ></option>
                </template>
            </select>
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-4 sm:ml-1 ml-0 sm:w-1/2">
            <x-input-label for="city" :value="__('CITY')" />

            <select x-model="city" id="city" class="py-1 w-full rounded border border-gray-300"
            x-bind:class="!state? 'bg-gray-200 cursor-not-allowed':''" 
            x-bind:disabled="!state" >
            <option value="">-- SELECT CITY --</option>
            <template x-for="(city, index) in $store.location.getCities()">
                    <option x-bind:value="city.slug" 
                    x-on:click="$store.location.selectCity(index)"
                    x-bind:selected="city.slug == user.city"
                    x-text="city.name"></option>
            </template>
        </select>
        </div>
       
    </div>
    
    <div class="flex flex-col sm:flex-row mt-4">
        <div class="py-1 w-full rounded sm:mr-1 mr-0 sm:w-1/2">
            <x-input-label for="first_name" :value="__('FIRST NAME')" />

            <x-text-input id="first_name" class="block mt-1 w-full py-1" type="text" 
                x-model="first_name"  required />

            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <div class="py-1 w-full rounded sm:mt-0 mt-3 sm:ml-1 ml-0 sm:w-1/2">
        <x-input-label for="last_name" :value="__('LAST NAME')" />

        <x-text-input id="last_name" class="block mt-1 w-full py-1" type="text" 
            x-model="last_name"  required />

        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>
    </div>

   
    <div class="mt-4">
    
            <x-input-label for="role" :value="__('ROLE')" />

            <select x-model="role" id="role" class="py-1 w-full rounded border border-gray-300">
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

        <x-text-input id="phone" class="block mt-1 w-full py-1" type="text" 
            x-model="phone" :value="old('phone')" required />

        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('EMAIL ADDRESS')" />

        <x-text-input id="email" class="block mt-1 w-full py-1" type="text" 
            x-model="email" :value="old('email')" required />

        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="password" :value="__('PASSWORD')" />

        <x-text-input id="password" class="block mt-1 w-full py-1" type="text" 
            x-model="password" :value="old('password')"/>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
        

    <button class="bg-site-color uppercase w-full py-2 mt-2 rounded text-white hover:bg-green-900">
        Submit
    </button>
</form>