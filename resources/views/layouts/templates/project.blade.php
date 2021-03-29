@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="{{route('dashboard.project')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('donor_view')
                            <a class="nav-link" href="{{route('donors.index')}}">
                                <div class="nav-link-icon"><i class="fas fa-donate"></i></div>
                                Donors
                            </a>
                        @endcan

                        @can('project_view')
                            <a class="nav-link" href="{{route('projects.index')}}">
                                <div class="nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                                Projects
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
                            <i class="fas fa-project-diagram"></i> <span>Project Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

