
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <a href="#" class="close btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
@endif

@if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {!! str_replace(array('[["','"]]'),'',session('errors')) !!}
        <a href="#" class="close btn" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </a>
    </div>
@endif


@if(session('failures'))
    <table class="table table-danger table-sm">
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>Errors</th>
                <th>Value</th>
            </tr>
            @foreach(session('failures') as $failure)
                <tr>
                    <td class="text-center">{{$failure->row()}}</td>
                    <td class="text-left">{{$failure->attribute()}}</td>
                    <td>
                        <ul>
                            @foreach($failure->errors() as $error)
                                {{$error}}
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $failure->values() [$failure->attribute()] }}</td>
                </tr>
            @endforeach

    </table>
@endif
