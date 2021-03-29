@extends('layouts.backend')

@section('body')

  <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">

                        @role('superAdmin')
                            <a class="nav-link" href="{{route('dashboard.auth')}}">
                                <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        @endrole

                        @can('user_view')
                            <a class="nav-link" href="{{route('users.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                                Users
                            </a>
                        @endcan

                        @can('role_view')
                            <a class="nav-link" href="{{route('roles.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-lock"></i></div>
                                Roles
                            </a>
                        @endcan

                        @can('permission_view')
                            <a class="nav-link" href="{{route('permissions.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-unlock-alt"></i></div>
                                Permissions
                            </a>
                        @endcan

                    </div>
                </div>
            </nav>
        </div>

        <!-- main content area -->
        <div class="content">
            <main>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 breadcrumb">
                            <i class="fa fa-user-shield"></i> <span>Authentication & Authorization Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>



@endsection
