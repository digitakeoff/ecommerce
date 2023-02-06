<!DOCTYPE html>
<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body class="h-full">
        @include('layouts.nav')
       
        <main class="w-full h-full">
            @yield('content')
        </main>

        <footer class="w-full  fixed bottom-0">
            <p class="bg-gray-300 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-1">
                &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
            </p>
        </footer>
    </body>

</html>
