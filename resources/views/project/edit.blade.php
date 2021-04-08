@extends('layouts.backend')
@section('title','Edit Project')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Edit Project">
                <!-- Start form -->
                {{ Form::model($project, array('route' => array('projects.update',$project), 'method' => 'PUT')) }}
                    @csrf
                    @include('projects._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection


