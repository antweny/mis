@extends('layouts.templates.gender')
@section('title','Edit Gender Series')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Gender Series">
                <!-- Start form -->
                {{ Form::model($genderSeries, array('route' => array('genderSeries.update',$genderSeries), 'method' => 'PUT')) }}
                    @csrf
                    @include('gender-series._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
