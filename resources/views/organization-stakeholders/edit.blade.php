@extends('layouts.templates.organization')
@section('title','Edit Stakeholders')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Edit Stakeholder">
                {{ Form::model($stakeholder, array('route' => array('stakeholders.update',$stakeholder), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Organization: <span class='star'>*</span>" />
                        <x-dropdown.organization req="required" :model="$stakeholder"/>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Organization Group: <span class='star'>*</span>" />
                        <x-dropdown.organization-group req="required" :model="$stakeholder"/>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <x-form.label name="Start Date: <span class='star'>*</span>" />
                            <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required"  :model="$stakeholder"/>
                        </div>
                        <div class="col">
                            <x-form.label name="End Date" />
                            <x-form.input type="date" name="end_date" id="end_date" for="end_date" :model="$stakeholder" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$stakeholder->desc}}</textarea>
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
