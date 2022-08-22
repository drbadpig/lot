<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - leagueoftalks</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Icon -->
    <link rel="icon" href="{{ asset('lot logo.png') }}">

    <!-- Scripts -->
    <!-- Css files wih Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-text bg-primary">

<div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-primary">
        <div>
            <a href="{{route('home')}}">
                <x-application-logo class="w-20 h-20 fill-current"/>
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg backdrop-blur border border-slate-900/10 dark:border-slate-50/[0.06] bg-black/20 supports-backdrop-blur:bg-white/95 text-text">
					{{$slot}}
        </div>
    </div>
</div>

</body>
</html>
