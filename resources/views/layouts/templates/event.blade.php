@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.event')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('event-category_view')
                            <a class="nav-link" href="{{route('eventCategories.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                Event Categories
                            </a>
                        @endcan

                        @can('event_view')
                            <a class="nav-link" href="{{route('events.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-calendar-alt"></i></div>
                                Events
                            </a>
                        @endcan

                        @can('participant-role_view')
                            <a class="nav-link" href="{{route('participantRoles.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-tag"></i></div>
                                Participant Roles
                            </a>
                        @endcan

                        @can('participant_view')
                            <a class="nav-link" href="{{route('participants.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-check"></i></div>
                                Event Participants
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
                            <i class="fa fa-calendar"></i> <span>Events Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

