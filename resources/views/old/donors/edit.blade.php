@extends('layouts.templates.project')
@section('title','Edit Donors')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Donor">
                {{ Form::model($donor, array('route' => array('donors.update',$donor), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.label name="Organization: <span class='star'>*</span>" />
                        <x-dropdown.organization req="required" :model="$donor"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Organization Group: <span class='star'>*</span>" />
                        <x-dropdown.organization-group req="required" filter="Donor" :model="$donor"/>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <x-form.elements.input label="Start Date: <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required"  :model="$donor"/>
                        </div>
                        <div class="col">
                            <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date" :model="$donor" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$donor" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('donors.index')}} </x-button.back>
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
