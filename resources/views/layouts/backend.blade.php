<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Dashboard')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fontawesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
        <!-- DataTables Boostrap -->
        <link href="{{ asset('vendor/DataTables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <!-- Select2 -->
        <link href="{{ asset('vendor/select/select.min.css') }}" rel="stylesheet">
        <!-- Gijgo -->
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <!-- FullCalendar -->
        <link href="{{ asset('vendor/fullCalendar/fullCalendar.min.css') }}" rel="stylesheet">
        <!-- Livewire Style -->
        <livewire:styles />
        <!-- General-->
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        <!-- Backend -->
        <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    </head>
    <body>
        <!-- Top Navigation -->
        <nav class="topnav navbar navbar-expand bg-blue p-0">
            <a class="navbar-brand" href="{{url('/')}}" title="Visit Site"><i class="fa fa-globe"></i></a>
            <!-- include top navigation -->
            @include('layouts.includes.backend.topNav')
        </nav>


        <!-- Main Container Section -->
        <div class="mainContainer" >

            <!-- Sidebar section-->
            <div class="sidebar">
                @include('layouts.includes.backend.sidebar')
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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Livewire Scripts -->
        <livewire:scripts />
        <!-- Datatable -->
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
        <!-- Datatables  -->
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" ></script>
        <!-- Select2 -->
        <script src="{{ asset('vendor/select/select.min.js') }}" ></script>
        <!-- Gijgo -->
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <!-- Select2 -->
        <script src="{{ asset('vendor/fullCalendar/fullCalendar.min.js') }}" ></script>
        <!-- Backend Scripts -->
        <script src="{{ asset('js/backend.js') }}" ></script>

    </body>
</html>
