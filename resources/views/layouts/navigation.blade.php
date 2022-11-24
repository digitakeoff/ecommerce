<header class="relative">
    <nav class="px-4 border-b py-2 bg-gray-200">
        <ul class="flex justify-between items-center">
            <li>
                <a href="{{route('home')}}">LOGO</a>
            </li>

            <li class="w-full flex-grow-1 mx-3">
                <form action="" class="w-full flex-grow-1">
                    <input type="text" placeholder="{{config('app.name')}}" class="rounded md:py-2 py-1 border border-gray-300 w-full">
                </form>
            </li>

            <li>
                <a class="hidden md:block text-gray-600 active:text-gray-500 hover:text-gray-500" 
                href="tel:+234(0)7082683086">
                    +234(0)7082683086
                </a>

                <a class="md:hidden block text-gray-600 active:text-gray-500 hover:text-gray-500" 
                href="#">
                    <span class="fas fa-bars"></span>
                </a>
            </li>
        </ul>
    </nav>
    <nav style="z-index:2000;right:0;left:0"
    class="px-3 absolute overflow-hidden hidden -mt-1 
    md:border-t-0 border-t-2 border-site-colo md:block  
    bg-white bg-gray-200 md:rounded-bl-full border
    md:rounded-br-full md:w-8/12 w-full mx-auto text-gray-700">
        <ul class="flex py-2 justify-around md:flex-row flex-col md:text-center items-center">
            <li class="w-full {{ Route::currentRouteName()=='products.index'? 'text-site-color':''}} md:w-1/5 md:border-r-2 border-site-color">
                <a href="{{route('products.index')}}">Inventory</a>
            </li>

            <li class="w-full md:w-1/5 md:border-r-2 border-site-color {{ Route::currentRouteName()=='products.create'? 'text-site-color':''}}">
            <a class="w-full" href="{{route('products.create')}}">Sell your car</a>
            </li>
            <li class="w-full md:w-1/5 md:border-r-2 border-site-color">
            <a href="#">Loan</a>
            </li>

            <li class="w-full md:w-1/5 md:border-r-2 border-site-color">
            <a href="#">Blog</a>
            </li>

            <li class="w-full md:w-1/5 {{ Route::currentRouteName()=='contact' ? 'text-site-color':''}}">
            <a href="{{ route('contact') }}">Contact us</a>
            </li>
        </ul>
    </nav>
</header>