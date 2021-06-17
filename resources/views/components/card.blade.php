<div class="card mt-3">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 ">
                <h4>{!! $title !!}</h4>
            </div>
            <div class="col-md-6 text-right">
                @if(!is_null($cardButton))
                    {{$cardButton}}
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <x-alert />
        {{ $slot }}
    </div>
</div>
