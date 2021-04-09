@extends('layouts.backend')
@section('title','Edit Resource Person')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Resource Person">
                <!-- Start form -->
                {{ Form::model($resourcePeople, array('route' => array('resourcePeople.update',$resourcePeople), 'method' => 'PUT')) }}
                    @csrf
                    @include('individual.resource-people._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
