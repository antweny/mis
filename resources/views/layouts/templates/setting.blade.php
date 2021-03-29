@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.settings')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @role('superAdmin')
                            <a class="nav-link" href="{{route('backups.index')}}">
                                <div class="nav-link-icon"><i class="fas fa-hdd"></i></div>
                                Backup
                            </a>
                        @endrole

                        @role('superAdmin')
                            <a class="nav-link" href="{{route('activityLogs.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-history"></i></div>
                                User Activity Logs
                            </a>
                        @endrole

                        @role('superAdmin')
                            <a class="nav-link" href="{{route('jobTypes.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-images"></i></div>
                                Monitoring
                            </a>
                        @endrole

                    </div>
                </div>
            </nav>
        </div>

        <!-- main content area -->
        <div class="content">
            <main>
                <div class="container-fluid">
                    @include('layouts.includes.backend.breadcrumb',['title'=>'System Settings','icon'=>'fa fa-cogs'])

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

