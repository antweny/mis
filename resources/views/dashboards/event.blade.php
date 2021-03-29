@extends('layouts.templates.event')

@section('content')

    <x-alert />

    <div class="row">
        <div class="col-md-12">
            <div id='eventCalendar'></div>
        </div>
        <div class="col-md-12">
           {{$events}}
        </div>
    </div>


@endsection
