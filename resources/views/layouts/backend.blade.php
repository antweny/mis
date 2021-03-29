<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard')</title>

    @include('layouts.includes.backend.style')

</head>
<body>
    <!-- Top Navigation -->
    <nav class="topnav navbar navbar-expand bg-blue p-0">
        <a class="navbar-brand" href="{{url('dashboard')}}"><i class="fa fa-home"></i></a>
        <!-- include top navigation -->
        @include('layouts.includes.backend.topNav')
    </nav>


        @yield('body')


    @include('layouts.includes.backend.js')

</body>
</html>
