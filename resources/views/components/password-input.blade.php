<div class="mt-4">
                <x-input-label for="password" :value="__('PASSWORD')" />
                
                <div x-data="{ type:'password', faeye:'fa-eye', toggle(){
                        if(this.type == 'password'){
                            this.type = 'text' 
                            this.$refs.eye.classList.toggle('fa-eye-slash', 'fa-eye')                  

                        } else {
                            this.type = 'password'
                            this.$refs.eye.classList.toggle('fa-eye', 'fa-eye-slash')                  
                            
                        }
                    } 
                }" class="relative">

                <x-text-input id="password" class="block mt-1 py-1 w-full"
                                x-bind:type="type"
                                name="password"
                                required autocomplete="current-password" />
                <div x-on:click="toggle()" class="text-gray-600 absolute cursor-pointer right-2 top-1">
                    <span x-ref="eye" class="fas fa-eye"></span>
                </div>
                </div>
                

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>