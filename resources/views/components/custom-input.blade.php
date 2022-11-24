@props(['label', 'type'=>'text', 'name', 'autofocus'=>false, 'div_class'=>''])

<div x-data="{ open : false }" {{ $attributes->merge(['class'=>'relative']) }} 
    x-on:click.outside="open = false">
    <label for="{{$label}}" x-show="open" class="absolute -top-3 left-3 bg-white px-1">
        {{$label}} <span class="text-red-600">*</span>
    </label>

    <input type="{{$type}}" x-model="{{$name}}" {{ $autofocus ? 'autofocus' : '' }}
    x-on:focus="open = !open" x-bind:placeholder="open ? '' : '{{$label}}'" class="py-1 w-full rounded">

</div>
