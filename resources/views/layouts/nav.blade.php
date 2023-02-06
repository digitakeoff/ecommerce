<header x-data="{ open: false }" class="relative">
    
    <nav  class="md:px-6 px-3 md:border-b-0 shadow border-gray-400 py-1 md:py-2 bg-gray-200">
        <ul class="flex justify-between items-center">
            
            <li x-transition.duration.400ms x-on:click.outside="open = false" 
             class="relative right-0 left-0 mr-3">
            
                <a x-on:click="open = !open" href="#">
                    <span class="text-site-color fa-size">
                        <span class="fas fa-bars"></span>
                    </span>
                </a>

                <ul x-show="open" class="bg-gray-200 absolute p-2 rounded top-10 items-center">
                    <li class="w-full {{ Route::currentRouteName()=='products.index'? 'text-site-color':''}} 
                     uppercase ">
                        <a href="{{route('products.index')}}">Laptops</a>
                    </li>
                    <li class="w-full {{ Route::currentRouteName()=='products.index'? 'text-site-color':''}} 
                      border-site-color uppercase">
                        <a href="{{route('products.index')}}">Phone</a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="bg-black block rounded w-8 h-8 text-center overflow-hidden" 
                href="{{route('home')}}">
                    <div class=" text-site-color">
                        <span class="text-site-color fa-size">
                            <span class="fas fa-check-double"></span>
                        </span>
                    </div>
                </a>
            </li>

            <li class="w-full flex-grow-1 mx-2">
                <form action="" class="w-full flex-grow-1">
                    <input type="text" placeholder="{{config('app.name')}}" 
                    class="rounded py-1 border border-gray-300 w-full">
                </form>
            </li>

            <li>
                <a class="text-gray-600 flex items-center active:text-gray-500 hover:text-gray-500" 
                href="tel:+2347082683086">
                    <span class="text-site-color fa-size">
                    <span class="fas fa-shopping-cart"></span> 
                    </span>&nbsp;
                    <span class="hidden md:inline-block">Cart</span>
                </a>
            </li>

            <li x-data="{ open : false }" class="ml-3 relative">
                <a x-on:click="open = !open" class="flex items-center block text-gray-600 
                active:text-gray-500 hover:text-gray-500" href="#">
                <span class="text-site-color fa-size">

                    <span class="text-site-color fas fa-user"></span>
                </span> &nbsp;<span class="hidden md:inline-block ">User</span>
                </a>
                
                <ul x-show="open" class="z-20 rounded-br rounded-bl p-3 w-56 top-10 absolute bg-gray-200 right-0" 
                x-on:click.outside="open = false">
                    @if(auth()->check())

                        <li class="uppercase hover:pl-1 active:pl-2 border-b border-gray-300">
                            <a href="{{route('dashboard.profile')}}" >Orders</a>
                        </li>

                        <li x-data="{ open: false }" class="uppercase border-b border-gray-300 py-1">
                            <a x-on:click="open = ! open" class="flex justify-between items-center" href="#">
                                <span>Products</span> <span class="fas fa-chevron-down"></span>
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                <a href="{{route('admin.products.index')}}">All Products</a> 
                                </li>
                                <li>
                                    <a href="{{route('admin.products.create')}}">Add Product</a> 
                                </li>
                            </ul>
                        </li>

                        <li x-data="{ open: false }" class="uppercase border-b border-gray-300 py-1">
                            <a x-on:click="open = ! open" class="flex justify-between items-center" href="#">
                                <span>Users</span> <span class="fas fa-chevron-down"></span>
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                <a href="{{route('admin.models.index')}}">All Users</a> 
                                </li>
                                <li>
                                    <a href="{{route('admin.models.create')}}">Add User</a> 
                                </li>
                            </ul>
                        </li>

                        <li class="uppercase hover:pl-1 active:pl-2 border-site-color">
                            <a href="{{route('admin.home')}}" >Profile</a>
                        </li>
                        
                        
                        <li class="uppercase hover:pl-1 active:pl-2 border-site-color border-t pt-2 mt-2">
                            <a href="#" onclick="document.getElementById('logout').submit()">Log out</a>

                            <form class="hidden" method="post" id="logout" action="{{route('logout')}}">
                                @csrf
                            </form>
                        </li>
                    @else
                    <li class="hover:pl-1 active:pl-2 uppercase border-b">
                        <a href="{{route('login')}}">Log in</a>
                    </li>

                    <li class="uppercase border-y py-1 hover:pl-1 active:pl-2 border-site-color">
                        <a href="{{route('register')}}">Sign up</a>
                    </li>

                    <li class="uppercase hover:pl-1 active:pl-2 border-site-color">
                        <a href="{{route('password.request')}}">Reset password</a>
                    </li>
                    @endif


                </ul>
            </li>

        </ul>
    </nav>
</header>