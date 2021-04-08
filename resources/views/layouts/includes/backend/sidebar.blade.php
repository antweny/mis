<nav class="sidenav accordion" id="sidenavAccordion">
    <div class="sidenav-menu sb-sidenav-menu">
        <div class="nav">

            <a class="nav-link" href="{{route('dashboard.index')}}">
                <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <!-- HUMAN RESOURCE -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHR" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-user-circle"></i></div>Human Resource
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
                    @can('room-category-view')
                        <a class="nav-link" href="{{route('roomCategories.index')}}">Room Categories</a>
                    @endcan
                    @can('room-view')
                        <a class="nav-link" href="{{route('rooms.index')}}">Office Rooms</a>
                    @endcan
                </nav>
            </div>
            <!-- /.HUMAN RESOURCE -->

            <!-- LEAVE MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fas fa-calendar-alt"></i></div>Leave
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
            <!-- /.LEAVE MANAGEMENT -->


            <!-- OPERATION PLAN -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOP" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-clipboard-list"></i></div>Operation Plane (OP)
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseOP" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('thematic-area_view')
                        <a class="nav-link" href="{{route('thematicAreas.index')}}">Thematic Areas</a>
                    @endcan
                    @can('indicator_view')
                        <a class="nav-link" href="{{route('indicators.index')}}">Indicators</a>
                    @endcan
                    @can('outcome_view')
                        <a class="nav-link" href="{{route('outcomes.index')}}">Outcomes</a>
                    @endcan
                    @can('output_view')
                        <a class="nav-link" href="{{route('outputs.index')}}">Output</a>
                    @endcan
                    @can('activity_view')
                        <a class="nav-link" href="{{route('activities.index')}}">Activities</a>
                    @endcan
                </nav>
            </div>
            <!-- /.OPERATION PLAN -->


            <!-- ASSET MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAsset" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-gem"></i></div>Asset
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseAsset" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('asset-type_view')
                        <a class="nav-link" href="{{route('assetTypes.index')}}">Type</a>
                    @endcan
                    @can('brand_view')
                        <a class="nav-link" href="{{route('brands.index')}}">Brands</a>
                    @endcan
                    @can('equipment_view')
                        <a class="nav-link" href="{{route('equipments.index')}}">Equipments</a>
                    @endcan
                    @can('asset_view')
                        <a class="nav-link" href="{{route('assets.index')}}">Assets</a>
                    @endcan
                </nav>
            </div>
            <!-- /.ASSET MANAGEMENT -->


            <!-- ASSET MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProject" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fas fa-project-diagram"></i></div>Project Manage
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseProject" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('donor_view')
                        <a class="nav-link" href="{{route('donors.index')}}">Donors</a>
                    @endcan
                    @can('project_view')
                        <a class="nav-link" href="{{route('projects.index')}}">Projects</a>
                    @endcan
                </nav>
            </div>
            <!-- /.ASSET MANAGEMENT -->


            <!-- FINANCE -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFinance" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fas fa-file-invoice-dollar"></i></div>Finance
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseFinance" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('currency_view')
                        <a class="nav-link" href="{{route('currencies.index')}}">Currency</a>
                    @endcan
                    @can('bank_view')
                        <a class="nav-link" href="{{route('banks.index')}}">Banks</a>
                    @endcan
                    @can('bank-account_view')
                        <a class="nav-link" href="{{route('bankAccounts.index')}}">Bank Accounts</a>
                    @endcan
                    @can('payee_view')
                        <a class="nav-link" href="{{route('payees.index')}}">Payees</a>
                    @endcan
                    @can('payment_view')
                        <a class="nav-link" href="{{route('payments.index')}}">Payments</a>
                    @endcan
                    @can('voucher_view')
                        <a class="nav-link" href="{{route('vouchers.index')}}">Vouchers</a>
                    @endcan
                </nav>
            </div>
            <!-- /.FINANCE -->

            <!-- JOB MANAGE -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJob" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-briefcase"></i></div>Job
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseJob" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('job-type_view')
                        <a class="nav-link" href="{{route('jobTypes.index')}}">Job Type</a>
                    @endcan
                    @can('job-title_view')
                        <a class="nav-link" href="{{route('jobTitles.index')}}">Job Titles</a>
                    @endcan
                </nav>
            </div>
            <!-- /.JOB MANAGE -->


            <!-- JOB MANAGE -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJob" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-briefcase"></i></div>Job
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseJob" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('job-type_view')
                        <a class="nav-link" href="{{route('jobTypes.index')}}">Job Type</a>
                    @endcan
                    @can('job-title_view')
                        <a class="nav-link" href="{{route('jobTitles.index')}}">Job Titles</a>
                    @endcan
                </nav>
            </div>
            <!-- /.JOB MANAGE -->


            <!-- AUTHENTICATION AND AUTHORIZATION -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuth" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-user-shield"></i></div>Auth
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('user_view')
                        <a class="nav-link" href="{{route('users.index')}}">Users</a>
                    @endcan
                    @can('role_view')
                        <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
                    @endcan
                    @can('permission_view')
                        <a class="nav-link" href="{{route('permissions.index')}}">Permissions</a>
                    @endcan
                </nav>
            </div>
            <!-- /.AUTHENTICATION AND AUTHORIZATION -->











        </div>
    </div>
</nav>
