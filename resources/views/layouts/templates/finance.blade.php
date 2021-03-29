@extends('layouts.backend')

@section('body')
    <!-- Main Container Section -->
    <div class="mainContainer" >

        <!-- Sidebar section-->
        <div class="sidebar">
            <nav class="sidenav accordion" id="sidenavAccordion">
                <div class="sidenav-menu sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('dashboard.finance')}}">
                            <div class="nav-link-icon"><i class="fa fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        @can('payee_view')
                            <a class="nav-link" href="{{route('payees.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-users"></i></div>
                                Payees
                            </a>
                        @endcan

                        @can('payment_view')
                            <a class="nav-link" href="{{route('payments.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-money-check"></i></div>
                                Payments
                            </a>
                        @endcan
                        @can('voucher_view')
                            <a class="nav-link" href="{{route('vouchers.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-file-invoice"></i></div>
                                Vouchers
                            </a>
                        @endcan

                        @can('bank_view')
                            <a class="nav-link" href="{{route('banks.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-university"></i></div>
                                Banks
                            </a>
                        @endcan
                        @can('bank-account_view')
                            <a class="nav-link" href="{{route('bankAccounts.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-coins"></i></div>
                                Bank Accounts
                            </a>
                        @endcan
                        @can('currency_view')
                            <a class="nav-link" href="{{route('currencies.index')}}">
                                <div class="nav-link-icon"><i class="fa fa-money-bill-alt"></i></div>
                                Currency
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
                            <i class="fa fa-file-invoice-dollar"></i> <span>Financial Management</span>
                        </div>
                    </div>

                    @yield('content')

                </div>
            </main>

            @include('layouts.includes.backend.footer')
        </div>

@endsection

