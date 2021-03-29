@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.asset')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @can('asset-type_view')
                            <a class="nav-link" href="{{route('assetTypes.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-layer-group"></i></div>
                                Asset Type
                            </a>
                        @endcan

                        @can('brand_view')
                            <a class="nav-link" href="{{route('brands.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-copyright"></i></div>
                                Brands
                            </a>
                        @endcan

                        @can('equipment_view')
                            <a class="nav-link" href="{{route('equipments.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-toolbox"></i></div>
                                Equipments
                            </a>
                        @endcan

                        @can('asset_view')
                            <a class="nav-link" href="{{route('assets.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-warehouse"></i></div>
                                Assets
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
                            <i class="fa fa-gem"></i> <span>Asset Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

