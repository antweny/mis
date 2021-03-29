@extends('layouts.templates.organization')
@section('title','Edit Organization')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Organization">
                <!-- Start form -->
                {{ Form::model($organization, array('route' => array('organizations.update',$organization), 'method' => 'PUT')) }}
                    @csrf

                    @include('organization._form',['buttonText'=>'Update'])

                {{ Form::close() }}

            </x-card>
        </div>
    </div>

@endsection
