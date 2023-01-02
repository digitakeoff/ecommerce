<!DOCTYPE html>
<html class="bg-gray-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')

    <body class="h-full">
        <div x-data="nav">
            <button x-on:click="triggerOpen" class="text-center w-full py-2 
            text-gray-600 bg-gray-300 block sm:hidden">
                <span class="fas fa-bars"></span>
            </button>
            <div x-show="open" x-on:click.outside="clickOutside" 
                class="sm:w-1/6 w-full p-5 bg-gray-700 sm:fixed h-full">
                <ul class="text-gray-300">
                    <li><a href="{{ route('home') }}">Home</a> </li> 
                    
                    <li><a href="{{ route('admin.home') }}">Dashboard</a> </li>
                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">
                        Cars
                        </a>
                        <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                            <li>
                            <a href="{{route('admin.cars.index')}}">All cars</a> 
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
                            <a href="{{route('admin.makes.index')}}">All Makes</a> 
                            </li>
                            <li>
                            <a href="{{route('admin.makes.create')}}">Add Make</a> 
                            </li>
                        </ul>
                    </li>

                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">
                            Body type
                        </a>
                        <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                            <li>                                
                            <a href="{{route('admin.bodytypes.index')}}">All Bodytypes</a> 
                            </li>
                            <li>
                            <a href="{{route('admin.bodytypes.create')}}">Add Bodytype</a> 
                            </li>
                        </ul>
                    </li>
                    
                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">
                            Models
                        </a>
                        <ul class="ml-3" x-show="open" x-on:click.outside="open = false">
                            <li>                                
                            <a href="{{route('admin.models.index')}}">All Models</a> 
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
                                <a href="{{route('admin.users.index')}}">All Users</a> 
                            </li>
                            <li>
                                <a href="{{route('admin.users.create')}}">Add User</a> 
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

        <main class="sm:w-5/6 w-full ml-auto h-full">
            @yield('content')
        </main>

        <footer class="w-full  fixed bottom-0">
            <p class="bg-gray-300 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-1">
                &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
            </p>
        </footer>
    </body>

</html>
