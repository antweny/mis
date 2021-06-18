<ul class="navbar-nav btns">
    <li class="nav-item dropdown">
        <a class="dropdown-toggle btn btn-outline-secondary" id="export" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-download"></i> Export
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="export">
            <a class="dropdown-item" href="{{route($route)}}"><i class="fa fa-file-excel"></i> Excel</a>
{{--            <div class="dropdown-divider"></div>--}}
{{--            <a class="dropdown-item" href="{{route($route,'Dompdf')}}"> <i class="fa fa-file-pdf"></i> PDF </a>--}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route($route,'Csv')}}"> <i class="fa fa-file-csv"></i> CSV </a>
        </div>
    </li>
</ul>
