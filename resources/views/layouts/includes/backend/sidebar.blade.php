<nav class="sidenav accordion" id="sidenavAccordion">
    <div class="sidenav-menu sb-sidenav-menu">
        <div class="nav">

            <a class="nav-link" href="{{route('dashboard.hr')}}">
                <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHR" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-user-circle"></i></div>
                Human Resource
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseHR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('department_view')
                        <a class="nav-link" href="{{route('departments.index')}}">Department</a>
                    @endcan
                    @can('designation_view')
                        <a class="nav-link" href="{{route('designations.index')}}">Designation</a>
                    @endcan
                    @can('employee_view')
                        <a class="nav-link" href="{{route('employees.index')}}">Employees</a>
                    @endcan
                    @can('visitor_view')
                        <a class="nav-link" href="{{route('visitors.index')}}">Visitors</a>
                    @endcan
                    <a class="nav-link" href="{{route('timesheets.index')}}">Timesheets</a>
                </nav>
            </div>

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

        </div>
    </div>
</nav>
