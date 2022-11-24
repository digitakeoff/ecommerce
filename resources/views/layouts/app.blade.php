<!DOCTYPE html>
<html class="bg-gray-" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <link rel="stylesheet" href="/dev/fontawesome/css/all.css">
        <script src="https://cdn.tiny.cloud/1/uh2x3ha4bm2dmcmaq3itotcetfl3ab1aygudhjm49al61ong/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
        <script src="/dev/fontawesome/js/all.js"></script>
        <!-- Scripts -->
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body >
        @include('layouts.navigation')
        @yield('content')
    </body>

    <footer class="w-full  fixed bottom-0">
        <p class="bg-gray-200 w-80 mx-auto text-center rounded-tl-full text-gray-600 rounded-tr-full py-1">
            &copy;{{date('Y')}} | {{config('app.name')}}<sup>&reg;</sup>
        </p>
    </footer>
</html>
