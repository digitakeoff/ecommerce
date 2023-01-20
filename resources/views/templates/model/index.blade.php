<div class="mx-auto md:my-12 px-2 md:px-8 w-full p-2" >
    <h1 class="text-center bg-gray-200 text-gray-500 
            font-bold uppercase my-5 border-b-2 py-2 border-site-color">All models</h1>

        <table class="w-full">
            <thead class="bg-gray-300">
                <tr class="border-b border-gray-400">
                    <td class="pr-3 py-2"> <input class="rounded" type="checkbox"> Name</td>
                    <td class="mdd:hidden">Sales</td>
                    
                    <td class="mdd:hidden">Cars</td>
                </tr>
            </thead>

            <tfoot class="bg-gray-300">
                <tr class="border-b border-gray-400">
                    <td class="pl-"> <input class="rounded" type="checkbox"> Name</td>
                    <td class="mdd:hidden">Sales</td>
                    <td class="mdd:hidden">Cars</td>
                </tr>
            </tfoot>
            
            <tbody class="w-full">
                @foreach($models as $model)
                    <tr x-data="{ open : false, cascade : true }" 
                    x-on:mouseenter="open = true"  x-on:mouseleave="open = false" 
                    class="border-b border-gray-300 relative mdd:flex mdd:flex-col  w-full mdd:flex-wrap"> 

                        <th class="absolute top-1">
                            <input class="rounded" type="checkbox">
                        </th>
                        <td class="pl-6 flex justify-between py-2">
                            <div >                           
                                <a href="{{route('admin.models.show', $model)}}">
                                    {{$model->name}}
                                </a>
                                <div x-show="open">
                                    <a class="text-blue-700" href="{{route('admin.models.edit', $model)}}">Edit</a> | 
                                    <a class="text-green-700" href="{{route('admin.models.edit', $model)}}">View</a> |
                                    @if($model->email != 'udosenakane@gmail.com')
                                    <a class="text-red-700" href="{{route('admin.models.edit', $model)}}">Delete</a> |
                                    @endif
                                    
                                    <a class="text-yellow-600" href="{{route('admin.models.edit', $model)}}">Send password reset</a>
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
                            <span class="hidden mdd:block">Sales</span>
                            <a href="{{route('admin.models.show', $model)}}">
                            {{count($model->cars)}}
                            </a>
                        </td>

                        <td x-bind:class="cascade? 'mdd:hidden':''"
                        class="mdd:pl-6 mdd:flex mdd:justify-between">
                            <span class="hidden mdd:block">Cars</span>
                            <a href="{{route('admin.models.show', $model)}}">
                            {{count($model->cars)}}
                            </a>
                        </td>
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>