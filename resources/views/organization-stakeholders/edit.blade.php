@extends('layouts.templates.organization')
@section('title','Edit Stakeholders')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Stakeholder">
                {{ Form::model($stakeholder, array('route' => array('stakeholders.update',$stakeholder), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.label name="Organization: <span class='star'>*</span>" />
                        <x-dropdown.organization req="required" :model="$stakeholder"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Organization Group: <span class='star'>*</span>" />
                        <x-dropdown.organization-group req="required" :model="$stakeholder"/>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <x-form.elements.input label="Start Date: <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required"  :model="$stakeholder"/>
                        </div>
                        <div class="col">
                            <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date" :model="$stakeholder" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$stakeholder" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('stakeholders.index')}} </x-button.back>
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
