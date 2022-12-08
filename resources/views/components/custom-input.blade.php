@props(['label', 'type'=>'text', 'name', 'autofocus'=>false, 'div_class'=>'', 'input_class'=>''])

<div x-data="{ open : false }" {{ $attributes->merge(['class'=>'relative '. $div_class]) }} 
    x-on:click.outside="open = false">
    <label for="{{$label}}" x-show="open"  
    {{ $attributes->merge(['class'=>'absolute -top-1 left-3 bg-white px-1']) }}>
        {{$label}} <span class="text-red-600">*</span>
    </label>

    <input type="{{$type}}" id="{{$name}}" x-model="{{$name}}" {{ $autofocus ? 'autofocus' : '' }} 
    x-on:focus="open = !open" x-bind:placeholder="open ? '' : '{{$label}}'" 
    {{ $attributes->merge(['class'=>'py-1 w-full rounded'. $input_class])}} >
</div>
