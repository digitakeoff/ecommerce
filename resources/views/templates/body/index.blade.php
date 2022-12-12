<div class="mx-auto mb-12 sm:w-10/12 w-full p-2" >
    <h1 class="text-center uppercase mb-5 border-b-2 pb-2 bg-gray-100 border-site-color">All bodytype</h1>
        <table class="w-full">
        <thead>
            <tr class="border-b border-gray-400">
                <td class="pl-2"><span class="fas fa-file-image"></span></td>
                <td>Name</td>
                <td>Cars</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        @foreach($bodies as $body)
            <tr class="border-b border-gray-300">
                <td>
                <img class="w-10 h-10" src="{{($body->image != null)?asset($body->image->src):''}}" alt="{{$body->name}}">
                </td>
                <td>
                    <a href="{{route('bodytypes.index')}}">
                    {{$body->name}}
                    </a>
                </td>
                <td>
                    <a href="{{route('bodytypes.show', $body)}}">
                    {{count($body->cars)}}
                    </a>
                </td>
                
                <td class="cursor-pointer">
                    <a href="{{route('bodytypes.edit', $body)}}">
                    <span class="text-blue-500 fas fa-pen"></span>
                    </a>
                </td>
                <td class="cursor-pointer">
                    <div onclick="document.getElementById('body_{{$body->slug}}').submit()" 
                    class="cursor-pointer">
                        <span class="text-red-500 fas fa-times-circle"></span>
                    </div>

                    <form class="hidden" id="body_{{$body->slug}}" method="post"
                    action="{{route('admin.bodytypes.destroy', $body)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>

</div>