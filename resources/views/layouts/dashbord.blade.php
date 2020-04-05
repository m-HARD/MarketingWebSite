<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('icomoon/style.css') }}" rel="stylesheet">
    @yield('header')

    <style>
    
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    </style>

</head>
<body  class="bg-gray-100">
    <div id="app">
        @include('layouts._nav')
        
        <main class="py-4">
            @yield('content')
        </main>
        <p class="text-center text-gray-500 text-xs py-6">
            &copy;2020 Designed by <span class="text-gray-700">baka_team</span>. All rights reserved.
        </p>
    </div>

    @yield('script')

    <script src="{{ asset('js/app.js') }}" async defer></script>
</body>
</html>
