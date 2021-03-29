@extends('layouts.templates.individual')
@section('title','Edit Individual Experience')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Individual Experience">
                <!-- Start form -->
                {{ Form::model($experience, array('route' => array('experiences.update',$experience), 'method' => 'PUT')) }}
                    @csrf
                    @include('individual-experiences._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
