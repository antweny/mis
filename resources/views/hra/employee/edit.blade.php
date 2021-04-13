@extends('layouts.backend')
@section('title','Edit Employee')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Edit Employee">
                <!-- Start form -->
                {{ Form::model($employee, array('route' => array('employees.update',$employee), 'method' => 'PUT')) }}
                    @csrf
                    @include('hra.employee._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
