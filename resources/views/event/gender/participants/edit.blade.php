@extends('layouts.backend')
@section('title','Edit GDSS Participant')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit GDSS Participant">

                <!-- Start form -->
                {{ Form::model($genderSeriesParticipant, array('route' => array('genderSeriesParticipants.update',$genderSeriesParticipant), 'method' => 'PUT')) }}
                    @csrf
                    @include('event.gender.participants._form',['buttonText'=>'Update'])
                {{ Form::close() }}

            </x-card>
        </div>
    </div>

@endsection
