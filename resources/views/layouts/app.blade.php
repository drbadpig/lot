<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@isset($title){{ $title }} -@endisset leagueoftalks</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Icon -->
        <link rel="icon" href="{{ asset('lot logo.png') }}">

        <!-- Scripts -->
        <!-- Css files wih Tailwind -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="{{asset('js/summernote/summernote-ru-RU.js')}}"></script>
    </head>
    <body class="antialiased text-text bg-primary">

            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

    </body>
</html>
