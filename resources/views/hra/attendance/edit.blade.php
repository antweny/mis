@extends('layouts.backend')
@section('title','Edit Attendances')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Attendance">

                {{ Form::model($attendance, array('route' => array('attendances.update',$attendance), 'method' => 'PUT')) }}
                @csrf
                <div class="form-group">
                    <x-form.label name="Date" star="true" />
                    <x-form.input type="date" name="date" id="date" :model="$attendance"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Employee" star="true" />
                    <x-dropdown.employee :model="$attendance"/>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time In" star="true" />
                        <x-form.input name="time_in" id="time_from" for="time_out" req="required" :model="$attendance" />
                    </div>
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time To" star="true" />
                        <x-form.input name="time_out" id="time_to" for="time_out" req="required" :model="$attendance" />
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back />
                        </div>
                        <div class="float-right">
                            <x-button label="Update"/>
                        </div>
                    </div>
                </div>

                {{Form::close()}}
            </x-card>
        </div>
    </div>



@endsection
