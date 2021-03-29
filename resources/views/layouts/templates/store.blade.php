@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.store')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('item-category_view')
                            <a class="nav-link" href="{{route('itemCategories.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                Item Categories
                            </a>
                        @endcan

                        @can('item-unit_view')
                            <a class="nav-link" href="{{route('itemUnits.index')}}">
                                <div class="nav-link-icon"><i class="fab fa-uniregistry"></i></div>
                                Item Units
                            </a>
                        @endcan

                        @can('item_view')
                            <a class="nav-link" href="{{route('items.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-sitemap"></i></div>
                                Items
                            </a>
                        @endcan

                        @can('item-in_view')
                            <a class="nav-link" href="{{route('itemIn.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-sign-in-alt"></i></div>
                                Item In
                            </a>
                        @endcan

                        @can('item-request_view')
                            <a class="nav-link" href="{{route('itemRequests.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-flag"></i></div>
                                My Requests
                            </a>
                        @endcan

                        @can('item-issue_view')
                            <a class="nav-link" href="{{route('itemIssues.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-sign-out-alt"></i></div>
                                Requests to Issue
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
                            <i class="fa fa-warehouse"></i> <span>Store Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

