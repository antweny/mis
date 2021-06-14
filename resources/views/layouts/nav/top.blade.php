
    <nav class="navbar navbar-expand-md bg-dark-gray">
        <div class="w-75 mr-auto order-0">
            <a class="navbar-brand mx-auto text-white" href="{{url('/')}}"> <H1>TGNP MIS</H1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="navbar-collapse collapse w-75 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}"><i class="fas fa-home"></i> HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> ABOUT</a>
                </li>
            </ul>
        </div>

        <div class="navbar-collapse collapse w-25 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{url('/dashboard')}}"> <i class="fa fa-user"></i> Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>
                            <a class="dropdown-item logout" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout
                            </a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-lg" href="{{route('login')}}">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
