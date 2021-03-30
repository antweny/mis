@extends('layouts.templates.asset')
@section('title','Edit Equipments')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Equipment">

                {{ Form::model($equipment, array('route' => array('equipments.update',$equipment), 'method' => 'PUT')) }}
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.label name="Brand <span class='star'>*</span>" />
                        <x-dropdown.brand req="required" :model="$equipment" />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input label="Model: <span class='star'>*</span>" name="model" id="model" for="model" req="required" :model="$equipment" />
                    </div>
                </div>

                <div class="form-group">
                    <x-form.elements.label name="Type <span class='star'>*</span>" />
                    <x-dropdown.asset-type req="required" :model="$equipment" />
                </div>

                <div class="form-group">
                    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$equipment" />
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back> {{route('equipments.index')}} </x-button.back>
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
