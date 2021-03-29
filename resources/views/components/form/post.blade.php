<form method="POST" action="{{route($action)}}" class="{{$class}}" role="form" autocomplete="off" enctype="multipart/form-data">

    @csrf
    {{$slot}}

</form>
