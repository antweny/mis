@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.op')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('thematic-area_view')
                            <a class="nav-link" href="{{route('thematicAreas.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-traffic-light"></i></div>
                                Thematic Areas
                            </a>
                        @endcan

                        @can('indicator_view')
                            <a class="nav-link" href="{{route('indicators.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-traffic-light"></i></div>
                                Indicators
                            </a>
                        @endcan

                        @can('outcome_view')
                            <a class="nav-link" href="{{route('outcomes.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-building"></i></div>
                                Outcomes
                            </a>
                        @endcan

                        @can('output_view')
                            <a class="nav-link" href="{{route('outputs.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-tag"></i></div>
                                Output
                            </a>
                        @endcan

                        @can('activity_view')
                            <a class="nav-link" href="{{route('activities.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-toolbox"></i></div>
                                Activities
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
                            <i class="fa fa-clipboard-list"></i> <span>Operation Plan</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

