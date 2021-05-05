<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Store')</title>

    <!-- CSS Style -->
    @include('layouts.common.css')

    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">

</head>
<body>
<!-- Top Navigation -->
<nav class="topnav navbar navbar-expand bg-white ">
    <a class="navbar-brand" href="{{url('/')}}" title="Visit Site"><i class="fa fa-globe"></i> Visit Site</a>
    <!-- include top navigation -->
    @include('layouts.nav.topBack')
</nav>


<!-- Main Container Section -->
<div class="mainContainer" >

    <!-- Sidebar section-->
    <div class="sidebar">
        @include('layouts.nav.sidebar')
    </div>

    <!-- main content area -->
    <div class="content">
        <main>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        <!-- footer section -->
        <footer class="py-4 mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; TGNP  <?php echo date('Y'); ?></div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.footer section -->
    </div>
</div>

<!-- JS Section -->
@include('layouts.common.js')
<script src="{{ asset('js/backend.js') }}" ></script>

</body>
</html>
