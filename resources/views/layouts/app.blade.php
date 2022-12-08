<!DOCTYPE html>
<html class="bg-gray-" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
    
    <body >
        @include('layouts.navigation')

        @yield('content')
    </body>

    <footer class="w-full  fixed bottom-0">
        <p class="bg-gray-200 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-1">
            &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
        </p>
    </footer>
</html>
