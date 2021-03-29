@extends('layouts.templates.hr')
@section('title','Edit Departments')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Department">

                {{ Form::model($department, array('route' => array('departments.update',$department), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$department"  />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym" :model="$department"  />
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.label name="Manager" />
                            <x-dropdown.manager :model="$department" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$department" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('departments.index')}} </x-button.back>
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
