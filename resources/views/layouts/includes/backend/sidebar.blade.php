<nav class="sidenav accordion" id="sidenavAccordion" >
    <div class="sidenav-menu sb-sidenav-menu" >
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
                    @role('Employee')
                        <a class="nav-link" href="{{route('timesheets.index')}}">Timesheets</a>
                        <a class="nav-link" href="{{route('timesheets.index')}}">Attendance</a>
                    @endrole
                    @can('timesheet_view')
                        <a class="nav-link" href="{{route('timesheets.all')}}">Employee Timesheets</a>
                    @endcan
                    @can('attendance_view')
                        <a class="nav-link" href="{{route('attendances.index')}}">Attendance</a>
                    @endcan
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


            <!-- PROJECT MANAGE -->
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
            <!-- /.PROJECT MANAGE -->



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


            <!-- OPERATION PLAN -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOP" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-clipboard-list"></i></div>Operation Plan (OP)
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


            <!-- EVENT MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvent" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-calendar"></i></div>Event
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseEvent" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('event-category_view')
                        <a class="nav-link" href="{{route('eventCategories.index')}}">Event Categories</a>
                    @endcan
                    @can('event_view')
                        <a class="nav-link" href="{{route('events.index')}}">Events</a>
                    @endcan
                    @can('participant-role_view')
                        <a class="nav-link" href="{{route('participantRoles.index')}}">Participant Roles</a>
                    @endcan
                    @can('participant_view')
                        <a class="nav-link" href="{{route('participants.index')}}">Event Participants</a>
                    @endcan
                    @can('gender-series_view')
                        <a class="nav-link" href="{{route('genderSeries.index')}}">Gender Series (GDSS)</a>
                    @endcan
                    @can('participant_view')
                        <a class="nav-link" href="{{route('genderSeriesParticipants.index')}}">GDSS Participants</a>
                    @endcan
                </nav>
            </div>
            <!-- /.EVENT MANAGEMENT -->


            <!-- ORGANIZATION MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrganization" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-building"></i></div>Organizations/Groups
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseOrganization" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('organization-category_view')
                        <a class="nav-link" href="{{route('organizationCategories.index')}}">Categories</a>
                    @endcan
                    @can('organization_view')
                        <a class="nav-link" href="{{route('organizations.index')}}">Organizations</a>
                    @endcan
                    @can('organization-group_view')
                        <a class="nav-link" href="{{route('organizationGroups.index')}}">Groups</a>
                    @endcan
                    @can('stakeholder_view')
                        <a class="nav-link" href="{{route('stakeholders.index')}}">Stakeholders</a>
                    @endcan
                </nav>
            </div>
            <!-- /.ORGANIZATION MANAGEMENT -->


            <!-- KC MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKC" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-people-arrows"></i></div>KC Manage
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseKC" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('organization_view')
                        <a class="nav-link" href="{{route('knowledgeCenters.index')}}">KC List</a>
                    @endcan
                    @can('experience_view')
                        <a class="nav-link" href="{{route('knowledgeCenters.member')}}">KC Members</a>
                    @endcan
                </nav>
            </div>
            <!-- /.KC MANAGEMENT -->



            <!-- INDIVIDUAL MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIndividual" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-users"></i></div>Individuals
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseIndividual" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('individual-group_view')
                        <a class="nav-link" href="{{route('individualGroups.index')}}">Groups</a>
                    @endcan
                    @can('individual_view')
                        <a class="nav-link" href="{{route('individuals.index')}}">Individuals</a>
                    @endcan
                    @can('experience_view')
                        <a class="nav-link" href="{{route('experiences.index')}}">Experiences</a>
                    @endcan
                    @can('resource-people_view')
                        <a class="nav-link" href="{{route('resourcePeople.index')}}">Resource People</a>
                    @endcan
                </nav>
            </div>
            <!-- /.INDIVIDUAL MANAGEMENT -->



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



            <!-- STORE MANAGE -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStore" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-warehouse"></i></div>Store
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseStore" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('item-category_view')
                        <a class="nav-link" href="{{route('itemCategories.index')}}">Item Categories</a>
                    @endcan
                    @can('item-unit_view')
                        <a class="nav-link" href="{{route('itemUnits.index')}}"> Item Units</a>
                    @endcan
                    @can('item_view')
                        <a class="nav-link" href="{{route('items.index')}}">Items</a>
                    @endcan
                    @can('item-in_view')
                        <a class="nav-link" href="{{route('itemIn.index')}}">Item In</a>
                    @endcan
                    @can('item-request_view')
                        <a class="nav-link" href="{{route('itemRequests.index')}}">My Requests</a>
                    @endcan
                    @can('item-issue_view')
                        <a class="nav-link" href="{{route('itemOut.index')}}">Requests to Issue</a>
                    @endcan
                </nav>
            </div>
            <!-- /.STORE MANAGE -->


            <!-- LOCATION MANAGEMENT -->
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation" aria-expanded="false" aria-controls="collapseHR">
                <div class="nav-link-icon"><i class="fa fa-map-marked"></i></div>Locations
                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse bg-dark" id="collapseLocation" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sidenav-menu-nested nav">
                    @can('designation_view')
                        <a class="nav-link" href="{{route('locations.index')}}">Locations</a>
                    @endcan
                </nav>
            </div>
            <!-- /.LOCATION MANAGEMENT -->


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



            <!-- SETTINGS -->
            @role('superAdmin')
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetting" aria-expanded="false" aria-controls="collapseHR">
                    <div class="nav-link-icon"> <i class="fa fa-cogs"></i></div>Settings
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse bg-dark" id="collapseSetting" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('backups.index')}}">Backup</a>
                        <a class="nav-link" href="{{route('activityLogs.index')}}">User Activity Logs</a>
                        <a class="nav-link" href="{{route('jobTypes.index')}}">Monitoring</a>
                    </nav>
                </div>
            @endrole
            <!-- /.SETTINGS -->











        </div>
    </div>
</nav>
