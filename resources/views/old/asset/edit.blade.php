@extends('layouts.templates.asset')
@section('title','Edit Asset')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Asset Type">

                {{ Form::model($asset, array('route' => array('assets.update',$asset), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.label name="Equipment <span class='star'>*</span>" />
                            <x-dropdown.equipment  req="required" :model="$asset"/>
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.input label="Serial No. <span class='star'>*</span>" name="serial_no" id="serial_no" for="serial_no" :model="$asset" />
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.elements.input label="Code No." name="code_number" id="code_number" for="code_number" :model="$asset"/>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.label name="Unit" />
                            <x-dropdown.item-unit  :model="$asset"/>
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.input label="Purchased Date" type="date" name="date" id="date" for="date" :model="$asset"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.elements.textarea label="Remarks" name="remarks" id="remarks" :model="$asset"/>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('assets.index')}}  </x-button.back>
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
