<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MIS')</title>

    @include('layouts.includes.frontend.style')

</head>
<body>
<!-- Top bar -->
<div class="container-fluid bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-3 pb-3">
                fdsafsaf
            </div>
        </div>
    </div>
</div>
<!-- /.Top bar -->

<!-- Top bar -->

    @include('layouts.includes.frontend.topNav')

<!-- /.Top bar -->


<div class="container">

    @yield('content')

</div>


@include('layouts.includes.frontend.js')
</body>
</html>
