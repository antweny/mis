<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand" href="{{url('/')}}" >
            <img src="{{asset('img/logo.png')}}" class="navbar-brand-img" alt="..." width="60">
        </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>



        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fe fe-x"></i>
            </button>

            <!-- Button -->
            @auth
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<i class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            @auth
                                <a class="dropdown-item" href="{{url('dashboard')}}"> <i class="fa fa-cogs"></i> Dashboard</a>
                                <a class="dropdown-item" href="#"> <i class="fa fa-cogs"></i> Settings</a>
                                <a class="dropdown-item" href="{{route('changePassword.form')}}"> <i class="fa fa-key"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                                <a class="dropdown-item logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout
                                </a>
                            @endauth
                        </div>
                    </li>
                </ul>
            @else
                <a class="navbar-btn btn btn-lg btn-primary lift ml-auto" href="{{route('login')}}">
                    Login
                </a>
            @endauth

        </div>

    </div>
</nav>
