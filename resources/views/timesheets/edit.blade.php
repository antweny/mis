@extends('layouts.templates.hr')
@section('title','Edit Timesheets')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit Timesheet">

                {{ Form::model($timesheet, array('route' => array('timesheets.update',$timesheet), 'method' => 'PUT')) }}
                    @csrf
                <div class="form-group">
                    <x-form.label name="Time From <span class='star'>*</span>" />
                    <x-form.input type="date" name="date" id="date" :model="$timesheet"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Activity" />
{{--                    <x-dropdown.activity :model="$timesheet"/>--}}
                </div>
                <div class="row">
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time From <span class='star'>*</span>" />
                        <x-form.input name="time_from" id="time_from" for="time_from" req="required" :model="$timesheet" />
                    </div>
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time To <span class='star'>*</span>" />
                        <x-form.input name="time_to" id="time_to" for="time_to" req="required" :model="$timesheet" />
                    </div>
                </div>

                <div class="form-group">
                    <x-form.label name="Descriptions <span class='star'>*</span>" />
                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" rows="4" >{{old('desc',$timesheet->desc)}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button.submit label="Update"/>
                            </div>
                        </div>
                    </div>

                {{Form::close()}}
            </x-card>
        </div>
    </div>



@endsection
