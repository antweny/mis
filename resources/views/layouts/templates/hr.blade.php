@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.hr')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('department_view')
                            <a class="nav-link" href="{{route('departments.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-building"></i></div>
                                Department
                            </a>
                        @endcan

                        @can('designation_view')
                            <a class="nav-link" href="{{route('designations.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-user-tag"></i></div>
                                Designation
                            </a>
                        @endcan

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="false" aria-controls="collapseHR">
                            <div class="nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            Leave Manage
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse bg-dark" id="collapseLeave" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sidenav-menu-nested nav">
                                @can('leave-type_view')
                                    <a class="nav-link" href="{{route('leaveTypes.index')}}">Type</a>
                                @endcan

                                @can('holiday_view')
                                    <a class="nav-link" href="{{route('holidays.index')}}">Holidays</a>
                                @endcan
                                <a class="nav-link" href="{{route('leaveApplications.index')}}">Applications</a>

                                @can('approve-leave')
                                    <a class="nav-link" href="{{route('leaveApproves.index')}}">Request To Approve</a>
                                @endcan
                            </nav>
                        </div>


                    @can('employee_view')
                            <a class="nav-link" href="{{route('employees.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                                Employees
                            </a>
                        @endcan

                        @can('visitor_view')
                            <a class="nav-link" href="{{route('visitors.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-walking"></i></div>
                                Visitors
                            </a>
                        @endcan

                        <a class="nav-link" href="{{route('timesheets.index')}}">
                            <div class="nav-link-icon"><i class="fa fa-calendar-check"></i></div>
                            Timesheets
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOR" aria-expanded="false" aria-controls="collapseHR">
                            <div class="nav-link-icon"><i class="fas fa-user-cog"></i></div>
                            Office Rooms
                            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse bg-dark" id="collapseOR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sidenav-menu-nested nav">
                                @can('room-category-view')
                                    <a class="nav-link" href="{{route('roomCategories.index')}}">Room Categories</a>
                                @endcan
                                @can('room-view')
                                    <a class="nav-link" href="{{route('rooms.index')}}">Rooms</a>
                                @endcan
                            </nav>
                        </div>

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
                            <i class="fa fa-user-circle"></i> <span>Human Resource Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

