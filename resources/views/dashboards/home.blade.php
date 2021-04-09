@extends('layouts.backend')
@section('title','Dashboard')
@section('content')

    <div class="row " style="padding: 80px 30px 0 30px;">
        <div class="col-md-12">
            <x-alert />
        </div>

        <div class="col-md-12 dash-menu">
            <div class="row">

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

                            <span>Settings</span>
                        </div>
                    </a>
                </div>
                @endrole

            </div>

        </div>

    </div>


@endsection
