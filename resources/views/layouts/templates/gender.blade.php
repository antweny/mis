@extends('layouts.backend')
@section('title','Gender Series')
@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.gender')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('gender-series_view')
                            <a class="nav-link" href="{{route('genderSeries.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-people-carry"></i></div>
                                GDSS
                            </a>
                        @endcan

                        @can('participant_view')
                            <a class="nav-link" href="{{route('genderSeriesParticipants.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-check"></i></div>
                                GDSS Participants
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
                            <i class="fa fa-people-arrows"></i> <span>Gender Series</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

