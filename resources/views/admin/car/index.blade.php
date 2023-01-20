@extends('layouts.admin')

@section('content')

<div class="mx-auto md:my-12 px-2 md:px-8 w-full p-2" >
    <h1 class="text-center bg-gray-200 text-gray-500 
            font-bold uppercase my-5 border-b-2 py-2 border-site-color">All cars</h1>
    
        <table class="w-full">
            <thead class="bg-gray-300">
                <tr class="border-b border-gray-400">
                    <td class="pr-3 py-2"> <input class="rounded" type="checkbox"> Name</td>
                    <td class="mdd:hidden">Price</td>
                    <td class="mdd:hidden">Make</td>
                    <td class="mdd:hidden">Model</td>
                    <td class="mdd:hidden">Body</td>

                    <td class="mdd:hidden">Views</td>
                    
                    <td class="mdd:hidden">Stock</td>
                </tr>
            </thead>

            <tfoot class="bg-gray-300">
                <tr class="border-b border-gray-400">
                    <td class="pl-"> <input class="rounded" type="checkbox"> Name</td>
                    <td class="mdd:hidden">Price</td>
                    <td class="mdd:hidden">Make</td>
                    <td class="mdd:hidden">Model</td>
                    <td class="mdd:hidden">Body</td>
                    <td class="mdd:hidden">Views</td>
                    
                    <td class="mdd:hidden">Stock</td>
            </tfoot>
            
            <tbody class="w-full">
                @foreach($cars as $car)
                    <tr x-data="{ open : false, cascade : true }" 
                    x-on:mouseenter="open = true"  x-on:mouseleave="open = false" 
                    class="border-b border-gray-300 relative mdd:flex mdd:flex-col  w-full mdd:flex-wrap"> 

                        <th class="absolute top-1">
                            <input class="rounded" type="checkbox">
                        </th>
                        <td class="pl-6 flex justify-between py-2">
                            <div >                           
                                <a href="{{route('admin.cars.show', $car)}}">
                                    {{$car->name}}
                                </a>
                                <div x-show="open">
                                    <a class="text-blue-700" href="{{route('admin.cars.edit', $car)}}">Edit</a> | 
                                    <a class="text-green-700" href="{{route('cars.show', $car)}}">View</a> |
                                    @if(request()->user()->role == 'manager' || request()->user()->role == 'admin')
                                    <a class="text-red-700" href="{{route('admin.cars.edit', $car)}}">Delete</a>
                                    @endif
                                </div>
                            </div>
 
                            <button x-on:click="cascade = !cascade" class="hidden mdd:block">
                                <div class="text-white bg-gray-800 rounded-full w-6 p-0">
                                    <span class="fas fa-caret-down"></span>
                                </div>
                            </button>
                        </td>
                       
                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">price</span>
                            {{price($car->price)}}
                        </td>

                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">Make</span>
                            {{$car->make->name}}
                        </td>

                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">Model</span>
                            {{$car->model->name}}
                        </td>
                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">Body</span>
                            {{$car->bodytype->name}}
                        </td>
                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">Views</span>
                            {{0}}
                        </td>
                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex text-green-500 mdd:justify-between">
                            <span class="hidden mdd:block">Stock</span>
                            In stock
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
@endsection
