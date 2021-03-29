@extends('layouts.templates.hr')
@section('title','Edit Designations')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Designation">

                {{ Form::model($designation, array('route' => array('designations.update',$designation), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$designation"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym" :model="$designation"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$designation" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('designations.index')}} </x-button.back>
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
