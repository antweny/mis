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
    <main>
        <div class="row justify-content-center ">
            <div class="col-md-3">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 text-center logo">
                                <img src="{{asset('images/logo.png')}}">
                            </div>
                            <div class="col-md-12 text-center">
                                <h4>User Login</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-alert />
                        <div class="row">
                            <div class="col-md-12">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{--    <div class="main">--}}
{{--        <div class="container">--}}
{{--

{{--        </div>--}}
{{--    </div>--}}

    @include('layouts.common.js')

</body>
</html>
