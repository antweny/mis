<button class="btn border-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

<!-- Navbar Search -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>

<ul class="navbar-nav ml-auto ml-md-0">
    @auth
        <li class="nav-item dropdown">
            <x-attendance-status />
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#"> <i class="fa fa-cogs"></i> Settings</a>
                <a class="dropdown-item" href="{{route('changePassword.form')}}"> <i class="fa fa-key"></i> Change Password</a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                <a class="dropdown-item logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> Logout
                </a>

            </div>
        </li>
    @endauth
</ul>
