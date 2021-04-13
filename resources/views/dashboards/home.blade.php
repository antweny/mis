@extends('layouts.backend')
@section('title','Dashboard')
@section('content')

    <div class="row " style="padding: 80px 30px 0 30px;">
        <div class="col-md-12">
            <x-alert />
        </div>

        <div class="col-md-12 text-center">
            @livewire('counter')
        </div>

    </div>


@endsection
