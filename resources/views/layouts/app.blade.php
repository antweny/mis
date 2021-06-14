<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MIS')</title>

    <!-- Styles -->
    @include('layouts.general.css')

</head>
<body>
    <!-- Header -->
    <header class="site-navbar sticky-top">
        @include('layouts.nav.top')
    </header>
    <!-- /.Header -->

    <!-- Main -->
    <main class="content">
        <div class="container">
            @yield('content')
        </div>
    </main>
    <!-- /.Main -->

    <footer class="footer bg-dark-gray">
        <div class="container-fluid">
            footer
        </div>
    </footer>


    @include('layouts.general.js')
</body>
</html>
