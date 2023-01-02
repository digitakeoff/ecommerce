@extends('layouts.app')

@section('content')
<main class="md:mt-20 mt-5 md:px-5 px-2">
    <h1 class="mb-3 uppercase pb-2 w-full text-center bg-gray-200 text-gray-500 
    font-bold border-b-2 py-2 border-site-color">
        {{__('All car')}}
    </h1>
    @if(count($cars))
        @foreach($cars->chunk(5) as $chunk)
        <div class="flex md:flex-col flex-row">
            @foreach($chunk as $car)
                <div class="md:w-1/5 w-full">
                    <x-car-card :car="$car"/>
                </div>
            @endforeach
        </div>
        @endforeach
    @endif
</main>
@endsection
