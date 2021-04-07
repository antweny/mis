@extends('layouts.backend')
@section('title','Edit Individual')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Edit Leave Application">
                <!-- Start form -->
                {{ Form::model($leaveApplication, array('route' => array('leaveApplications.update',$leaveApplication), 'method' => 'PUT')) }}
                    @csrf
                    @include('leave.applications._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
