<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Please Login</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- General Styles -->
    <link href="{{ asset('css/general.css') }}" rel="stylesheet">

    <!-- Login Styles -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">


</head>
<body>
    <div class="main">

        <div class="container">
            <div class="middle">

                <div id="login">
                    @yield('content')
                </div>

                <div class="logo">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{url('/')}}">
                                <img src="{{asset('images/logo.png')}}">
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>

    </div>

    @include('layouts.includes.frontend.js')

</body>
</html>
