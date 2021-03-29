@extends('layouts.templates.finance')
@section('title','Edit Banks')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Bank">
                {{ Form::model($bank, array('route' => array('banks.update',$bank), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.label name="Bank Name <span class='star'>*</span>" />
                        <x-dropdown.organization req="required" :model="$bank"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Organization Group: <span class='star'>*</span>" />
                        <x-dropdown.organization-group req="required" filter="Bank"/>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <x-form.elements.input label="Start Date: <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required"  :model="$bank"/>
                        </div>
                        <div class="col">
                            <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date" :model="$bank" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$bank" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('banks.index')}} </x-button.back>
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
