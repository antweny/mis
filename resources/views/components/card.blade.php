<div class="card mt-3">
    <div class="card-header text-white ">
        <h5 style="margin-bottom:0;">{!! $title !!}</h5>
    </div>
    <div class="card-body">

        <x-alert />
        {{ $slot }}
    </div>
</div>
