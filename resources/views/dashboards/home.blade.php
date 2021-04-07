@extends('layouts.backend')
@section('title','Dashboard')
@section('content')

    <div class="row " style="padding: 80px 30px 0 30px;">
        <div class="col-md-12">
            <x-alert />
        </div>

        <div class="col-md-12 dash-menu">
            <div class="row">

                @hasanyrole('Employee|superAdmin')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.op')}}" class="shortcut-icon">
                        <div>
                            <i class="fa fa-clipboard-list"></i>
                            <span>Operation Plan (OP)</span>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.project')}}" class="shortcut-icon">
                        <div>
                            <i class="fas fa-project-diagram"></i>
                            <span>Project Management</span>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @hasanyrole('Accountant|superAdmin|Finance Manager')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.finance')}}" class="shortcut-icon">
                        <div>
                            <i class="fas fa-file-invoice-dollar"></i>
                            <span>Financial Management</span>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.kc')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-people-arrows"></i>
                                <span>KC MANAGE</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.job')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-briefcase"></i>
                                <span>Job</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.individual')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-users"></i>
                                <span>Individuals</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.organization')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-building"></i>
                                <span>Organizations</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.location')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-map-marked"></i>
                                <span>Locations</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|Event Manager|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.event')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-calendar"></i>
                                <span>Events</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.gender')}}" class="shortcut-icon">
                        <div>
                            <i class="fa fa-people-arrows"></i>
                            <span>Gender Series (GDSS)</span>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @hasanyrole('Employee|superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.store')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-warehouse"></i>
                                <span>Store</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('superAdmin')
                    <div class="col-md-2 mb-4">
                        <a href="{{route('dashboard.auth')}}" class="shortcut-icon">
                            <div>
                                <i class="fa fa-user-shield"></i>
                                <span>Authentication</span>
                            </div>
                        </a>
                    </div>
                @endhasanyrole

                @hasanyrole('superAdmin')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.file')}}" class="shortcut-icon">
                        <div>
                            <i class="fa fa-folder"></i>
                            <span>Files Manager</span>
                        </div>
                    </a>
                </div>
                @endhasanyrole

                @role('superAdmin')
                <div class="col-md-2 mb-4">
                    <a href="{{route('dashboard.settings')}}" class="shortcut-icon">
                        <div>
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                        </div>
                    </a>
                </div>
                @endrole

            </div>

        </div>

    </div>


@endsection
