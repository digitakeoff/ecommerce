<header x-data="nav" class="relative">
    <nav x-bind:class="open? 'border-b':''" 
        class="md:px-6 px-3 md:border-b-0 shadow border-gray-400 py-2 bg-gray-200">
        <ul class="flex justify-between items-center">
            <li>
                <a class="block h-9 text-center rounded-full w-9 border border-black bg-black" href="{{route('home')}}">
                    <div style="font-size:23px" class="text-white">
                        <span class="fas fa-car-side"></span>
                    </div>
                </a>
            </li>

            <li class="w-full flex-grow-1 mx-2">
                <form action="" class="w-full flex-grow-1">
                    <input type="text" placeholder="{{config('app.name')}}" 
                    class="rounded py-1 border border-gray-300 w-full">
                </form>
            </li>

            <li class="hidden md:inline-block mr-3">
                <a class="text-gray-600 flex items-center active:text-gray-500 hover:text-gray-500" 
                href="tel:+234(0)7082683086">
                    <span class="text-site-color fas fa-phone-square-alt"></span> &nbsp;
                    <span>+234(0)7082683086</span>
                </a>
            </li>

            <li x-data="{ open : false }" class="mr-4 ml-1 md:mr-0 md:ml-0 relative">
                <a x-on:click="open = !open" class="flex items-center block text-gray-600 
                active:text-gray-500 hover:text-gray-500" 
                href="#">
                    <span class="text-site-color fas fa-user"></span>&nbsp;<span class="hidden md:inline-block ">Agent</span>
                </a>

                
                <ul x-show="open" class="z-20 rounded-br rounded-bl p-3 w-56 top-10 absolute bg-gray-200 right-0" 
                x-on:click.outside="open = false">
                    @if(auth()->check())
                    <!-- <li class="uppercase hover:pl-1 active:pl-2 border-site-color">
                        <p>Signed as: Akan udosen</p>
                    </li> -->
                    <li class="uppercase hover:pl-1 active:pl-2 my-2 border-site-color">
                        <a href="{{route('dashboard.listings')}}" >Listings ({{count(request()->user()->cars)}})</a>
                    </li>

                    <li class="uppercase hover:pl-1 active:pl-2 border-site-color">
                        <a href="{{route('dashboard.profile')}}" >Profile</a>
                    </li>

                    

                    <li class="uppercase hover:pl-1 active:pl-2 border-site-color">
                        <a href="#" >Leads (0)</a>
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

            <li class="block md:hidden">

                <a x-on:click="triggerOpen" class="md:hidden block text-gray-600 active:text-gray-500 hover:text-gray-500" 
                href="#">
                    <span class="fas fa-bars"></span>
                </a>
            </li>
        </ul>
    </nav>

    <nav x-show="open" x-transition.duration.400ms x-on:click.outside="clickOutside" 
        style="right:0;left:0"
        class="px-3 z-10 absolute md:overflow-hidden  md:-mt-1  
        md:border-t-0 border-t-2 border-site-colo md:block  shadow-t-none
        bg-white bg-gray-200 md:rounded-bl-full border md:rounded-br-full md:w-8/12 w-full mx-auto text-gray-700">
        <ul class="flex py-2 justify-around md:flex-row flex-col md:text-center items-center">

            <li class="w-full {{ Route::currentRouteName()=='cars.index'? 'text-site-color':''}} 
            md:w-1/5 md:border-r-2 
            border-site-color md:border-b-0 uppercase border-b">
                <a href="{{route('cars.index')}}">All cars</a>
            </li>

            <li class="w-full md:border-b-0 border-b uppercase md:w-1/5 md:border-r-2 border-site-color {{ Route::currentRouteName()=='cars.create'? 'text-site-color':''}}">
            <a class="w-full" href="{{route('cars.create')}}">Sell your car</a>
            </li>
            <li class="w-full md:border-b-0 uppercase border-b md:w-1/5 md:border-r-2 border-site-color">
            <a href="#">Loan</a>
            </li>

            <li class="w-full md:border-b-0 border-b uppercase md:w-1/5 md:border-r-2 border-site-color">
            <a href="#">Blog</a>
            </li>

            <li class="w-full md:border-b-0 border-b uppercase md:w-1/5 {{ Route::currentRouteName()=='contact' ? 'text-site-color':''}}">
            <a href="{{ route('contact') }}">Contact us</a>
            </li>
        </ul>
    </nav>
</header>