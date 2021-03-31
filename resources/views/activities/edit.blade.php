@extends('layouts.templates.op')
@section('title','Edit Activity')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Edit Activity">
                <!-- Start form -->
                {{ Form::model($activity, array('route' => array('activities.update',$activity), 'method' => 'PUT')) }}
                    @csrf
                    @include('activities._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection


