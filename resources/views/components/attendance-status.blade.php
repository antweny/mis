

@if(isset($attendance))
    @if($attendance > 0)
        <a href="{{route('attendances.checkOut')}}" class="btn btn-danger  mr-3" >
            <i class="fas fa-sign-out-alt"></i>
            Check out
        </a>
    @else
        <a href="{{route('attendances.checkIn')}}" class="btn btn-success  mr-3">
            <i class="fas fa-sign-in-alt"></i>
            Check In
        </a>
    @endif
@endif
