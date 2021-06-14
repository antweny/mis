<form method="{{$method}}" action="{{$action}}" role="form" autocomplete="off" enctype="multipart/form-data">
    @csrf

    {{$slot}}

</form>
