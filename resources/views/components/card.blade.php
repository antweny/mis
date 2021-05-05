<div class="card mt-3">
    <div class="card-header">
        <div class="float-left">
            <h4>{!! $title !!}</h4>
        </div>
        <div class="float-right">
            @if(!is_null($cardButton))
                {{$cardButton}}
            @endif
        </div>
    </div>
    <div class="card-body">
        <x-alert />
        {{ $slot }}
    </div>
</div>
