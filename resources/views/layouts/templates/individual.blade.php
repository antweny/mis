@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.individual')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('individual-group_view')
                            <a class="nav-link" href="{{route('individualGroups.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                Groups
                            </a>
                        @endcan

                        @can('individual_view')
                            <a class="nav-link" href="{{route('individuals.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                                Individuals
                            </a>
                        @endcan

                        @can('experience_view')
                            <a class="nav-link" href="{{route('experiences.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-briefcase"></i></div>
                                Experiences
                            </a>
                        @endcan

                        @can('resource-people_view')
                            <a class="nav-link" href="{{route('resourcePeople.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-tag"></i></div>
                                Resource People
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
                            <i class="fa fa-users"></i> <span>Individuals Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

