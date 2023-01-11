@extends('layouts.app')

@section('content')
    <div class="md:mx-4 md:mt-12 mt-5">
    @if(count($cars))
    <h1 class="mx-auto mb-5 uppercase pb-2 w-full
    text-center bg-gray-200 text-gray-500 font-bold border-b-2 py-2 border-site-color">
        All Cars
    </h1>
    
        <table class="w-full border-l md:pl-2">
            <thead>
                <tr class="border-b h-2 bg-gray-200 border-gray-500">
                    <td class="pl-2">S/N</td>
                    <td class="pl-2"><span class="fas fa-file-image"></span></td>
                    <td>Price</td>
                    <td>Views</td>
                    <td>&nbsp;</td>
                </tr>
            </thead>
            @foreach($cars as $key => $car)
            
            <tr>
                <td class="pl-2">{{$key+1}}</td>
                <td><img class="h-10 w-10" src="{{$car->images[$car->main_image_index]->src}}" ></td>
                <td>{{price($car->price)}}</td>
                <td>{{10}}</td>
                
                <td class="cursor-pointer pr-2">
                    <div class="cursor-pointer w-full h-full flex  items-center justify-between">
                        <div class="cursor-pointer">
                            <a href="{{route('cars.show', $car)}}">
                            <span class="text-green-500 fas fa-eye"></span>
                            </a>
                        </div>
                        <div class="cursor-pointer mx-2">
                            <a href="{{route('cars.edit', $car)}}">
                            <span class="text-blue-500 fas fa-pen"></span>
                            </a>
                        </div>
                        <div onclick="document.getElementById('car_{{$car->slug}}').submit()" 
                        class="cursor-pointer">
                            <span class="text-red-500 fas fa-times-circle"></span>
                        </div>

                        <form class="hidden" id="car_{{$car->slug}}" method="post"
                        action="{{route('admin.cars.destroy', $car)}}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
            <tr class="border-b bg-gray-300 border-gray-300">
            <td colspan="6" class="pl-2">{{$car->name}}</td>
            </tr>
            
            @endforeach
        </table>
        @else
        <p class="bg-gray-200 rounded py-2 text-center mt-20 w-60 mx-auto">
            No favorite
            <a class="bg-site-color text-white px-1 rounded" href="{{route('cars.index')}}">Add car to favorite</a> </p>
        @endif
    </div>
@endsection