@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.organization')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('organization-category_view')
                            <a class="nav-link" href="{{route('organizationCategories.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-project-diagram"></i></div>
                                Categories
                            </a>
                        @endcan

                        @can('organization_view')
                            <a class="nav-link" href="{{route('organizations.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-building"></i></div>
                                Organizations
                            </a>
                        @endcan

                        @can('organization-group_view')
                            <a class="nav-link" href="{{route('organizationGroups.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                Groups
                            </a>
                        @endcan

                        @can('stakeholder_view')
                            <a class="nav-link" href="{{route('stakeholders.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-sitemap"></i></div>
                                Stakeholders
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
                            <i class="fa fa-building"></i> <span>Organizations Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

