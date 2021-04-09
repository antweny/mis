@extends('layouts.backend')
@section('title','Edit Event')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Edit Event">
                <!-- Start form -->
                {{ Form::model($event, array('route' => array('events.update',$event), 'method' => 'PUT')) }}
                @csrf
                @include('event._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
