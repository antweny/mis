@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.file')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('job-type_view')
                            <a class="nav-link" href="{{route('jobTypes.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-images"></i></div>
                                Photos
                            </a>
                        @endcan
                        @can('job-title_view')
                            <a class="nav-link" href="{{route('jobTitles.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-heading"></i></div>
                                Job Titles
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
                    @include('layouts.includes.backend.breadcrumb',['title'=>'Files Manager','icon'=>'fa fa-folder'])

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

