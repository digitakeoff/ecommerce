<!DOCTYPE html>
<html class="bg-gray-" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link rel="stylesheet" href="/dev/fontawesome/css/all.css">
        <script src="https://cdn.tiny.cloud/1/uh2x3ha4bm2dmcmaq3itotcetfl3ab1aygudhjm49al61ong/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
            selector: '#description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
        <script src="/dev/fontawesome/js/all.js"></script>
        <!-- Scripts -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body >
        <div class="flex sm:flex-row flex-col">
            <div class="sm:block hidden">
                <button x-on:click="open = ! open" class="text-center w-full py-2 
                text-gray-600 bg-gray-300 block sm:hidden">
                    <span class="fas fa-bars"></span>
                </button>
                <div x-show="open" x-on:click.outside="open = false" 
                class="sm:w-1/6 w-full p-5 bg-gray-700 sm:fixed h-full">
                    <ul class="text-gray-300">
                        <li>
                            <a href="{{ route('admin.home') }}">Dashboard</a> 
                        </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                               Cars
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    All cars
                                </li>
                                <li>
                                <a href="{{route('admin.cars.create')}}">Add car</a> 
                                </li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                                Makes
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                    All Makes
                                </li>
                                <li>
                                <a href="{{route('admin.makes.create')}}">Add Make</a> 
                                </li>
                            </ul>
                        </li>
                        
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                                Models
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                    All Models
                                </li>
                                <li>
                                    <a href="{{route('admin.models.create')}}">Add Model</a> 
                                </li>
                            </ul>
                        </li>

                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                            Users
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    
                                    All users
                                </li>
                                <li>
                                <a href="#">Add user</a> 
                                </li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                            Orders
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    
                                    All orders
                                </li>
                                <li>
                                <a href="#">Add order</a> 
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="block sm:hidden" x-data="{ open:false }">
                <button x-on:click="open = ! open" class="text-center w-full py-2 
                text-gray-600 bg-gray-300 block sm:hidden">
                    <span class="fas fa-bars"></span>
                </button>
                <div x-show="open" x-on:click.outside="open = false" 
                class="sm:w-1/6 w-full p-5 bg-gray-700 sm:fixed h-full">
                    <ul class="text-gray-300">
                        <li><a href="{{ route('admin.home') }}">Dashboard</a> </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                               Cars
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    All cars
                                </li>
                                <li>
                                <a href="{{route('admin.cars.create')}}">Add car</a> 
                                </li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                                Makes
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                    All Makes
                                </li>
                                <li>
                                <a href="{{route('admin.makes.create')}}">Add Make</a> 
                                </li>
                            </ul>
                        </li>
                        
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                                Models
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>                                
                                    All Models
                                </li>
                                <li>
                                    <a href="{{route('admin.models.create')}}">Add Model</a> 
                                </li>
                            </ul>
                        </li>

                        
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                            Users
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    
                                    All users
                                </li>
                                <li>
                                <a href="#">Add user</a> 
                                </li>
                            </ul>
                        </li>
                        <li x-data="{ open: false }">
                            <a x-on:click="open = ! open" href="#">
                            Orders
                            </a>
                            <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                                <li>
                                    
                                    All orders
                                </li>
                                <li>
                                <a href="#">Add order</a> 
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            
            <main class="sm:w-5/6 w-full ml-auto bg-gray-100 h-full">
                @yield('content')
            </main>
        </div>

    </body>

    <footer class="w-full  fixed bottom-0">
        <p class="bg-gray-200 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-1">
            &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
        </p>
    </footer>
</html>
