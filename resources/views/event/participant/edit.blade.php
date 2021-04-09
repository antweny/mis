@extends('layouts.backend')
@section('title','Edit Event Participant')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Event Participant">

                <!-- Start form -->
                {{ Form::model($participant, array('route' => array('participants.update',$participant), 'method' => 'PUT')) }}

                    @csrf
                    @include('event.participant._form',['buttonText'=>'Update'])

                {{ Form::close() }}

            </x-card>
        </div>
    </div>

@endsection
