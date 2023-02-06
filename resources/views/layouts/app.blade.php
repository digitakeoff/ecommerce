<!DOCTYPE html>
<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    
    <body>
        <div class="flex flex-col w-full h-full">

            @include('layouts.nav')

            <!-- <main class="w-full h-auto"> -->
            @yield('content')
            <!-- </main> -->
            <!-- fixed bottom-0 -->
            <footer class="w-full fixed bottom-0">
                <p class="bg-gray-300 w-80 mx-auto text-center rounded-tl-full 
                text-gray-600 rounded-tr-full py-">
                    &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
                </p>
            </footer>
        </div>
    </body>
</html>
