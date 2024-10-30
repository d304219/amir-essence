<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ekstra:wght@400;700&display=swap" rel="stylesheet">

    <link href="/resources/css/app.css" rel="stylesheet">


    <!-- Scripts -->
    @vite('resources/css/app.css')
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>

    <x-header/>

    <main>
        <div class="container">
            @yield('content')
        </div>

    </main>

    <x-footer/>


</body>
</html>
