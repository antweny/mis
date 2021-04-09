@extends('layouts.backend')
@section('title','Edit Individual')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Edit Individual">
                <!-- Start form -->
                {{ Form::model($individual, array('route' => array('individuals.update',$individual), 'method' => 'PUT')) }}
                @csrf
                @include('individual._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
