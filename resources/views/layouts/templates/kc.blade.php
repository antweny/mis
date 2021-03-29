@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.kc')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('organization_view')
                            <a class="nav-link" href="{{route('knowledgeCenters.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                KC List
                            </a>
                        @endcan
                        @can('experience_view')
                            <a class="nav-link" href="{{route('knowledgeCenters.member')}}">
                                <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                                KC Members
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

                    @include('layouts.includes.backend.breadcrumb',['title'=>'KC Management','icon'=>'fa fa-people-arrows'])

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

