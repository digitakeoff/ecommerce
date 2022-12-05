<div class="mx-auto mb-12 sm:w-10/12 w-full p-2" >
    <h1 class="text-center uppercase mb-5 border-b-2 pb-2 bg-gray-100 border-site-color">All users</h1>
        <table class="w-full">
        <thead>
            <tr class="border-b border-gray-400">
                <td>Name</td>
                <td>Cars</td>
                <td>Phone</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="border-b border-gray-300">
                
                <td>
                    <a href="{{route('admin.users.show', $user)}}">
                    {{$user->first_name}}
                    </a>
                </td>
                <td>
                    <a href="{{route('admin.users.show', $user)}}">
                    {{count($user->cars)}}
                    </a>
                </td>
                <td>
                    <a href="tel:+237{{$user->phone}}">
                    {{$user->phone}}
                    </a>
                </td>
                <td class="cursor-pointer">
                    <a href="{{route('users.edit', $user)}}">
                    <span class="text-blue-500 fas fa-pen"></span>
                    </a>
                </td>
                <td class="cursor-pointer">
                    <div onclick="document.getElementById('users_{{$user->slug}}').submit()" 
                    class="cursor-pointer">
                        <span class="text-red-500 fas fa-times-circle"></span>
                    </div>

                    <form class="hidden" id="users_{{$user->slug}}" method="post"
                    action="{{route('admin.users.destroy', $user)}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
</table>

</div>