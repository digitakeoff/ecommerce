<div class="mx-auto mb-12 sm:w-10/12 w-full p-2" >
    <h1 class="text-center uppercase mb-5 border-b-2 pb-2 bg-gray-100 border-site-color">All models</h1>
        <table class="w-full">
        <thead>
            <tr class="border-b border-gray-400">
                <td class="pl-2"><span class="fas fa-file-image"></span></td>
                <td>Name</td>
                <td>Cars</td>
                <td>Make</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        @foreach($models as $model)
            <tr class="border-b border-gray-300">
                <td>
                <img class="w-10 h-10" src="{{($model->image != null)?asset($model->image->src):''}}" alt="{{$model->name}}">
                </td>
                <td>
                    <a href="{{route('models.index')}}">
                    {{$model->name}}
                    </a>
                </td>
                <td>
                    <a href="{{route('cars.index')}}">
                    {{count($model->cars)}}
                    </a>
                </td>
                <td>
                    <a href="{{route('models.index')}}">
                    {{$model->make->name}}
                    </a>
                </td>
                <td class="cursor-pointer">
                    <a href="{{route('models.edit', $model)}}">
                    <span class="text-blue-500 fas fa-pen"></span>
                    </a>
                </td>
                <td class="cursor-pointer">
                    <div onclick="document.getElementById('model_{{$model->slug}}').submit()" 
                    class="cursor-pointer">
                        <span class="text-red-500 fas fa-times-circle"></span>
                    </div>

                    <form class="hidden" id="model_{{$model->slug}}" method="post"
                    action="{{route('admin.models.destroy', $model)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>

</div>