<!DOCTYPE html>
<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    
    <body>
        <div id="app">
    	    <!-- <main class="w-full ml-auto bg-gray-100 py-5 sm:py-20 mb-20 h-full"> -->
                @yield('content')
            <!-- </main> -->

            <footer class="w-full fixed bottom-0">
                <p class="bg-gray-300 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-0">
                    &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
                </p>
            </footer>
        </div>
    </body>
</html>
