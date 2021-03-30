@extends('layouts.templates.op')
@section('title','Edit Thematic Areas')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Thematic Area">

                {{ Form::model($thematicArea, array('route' => array('thematicAreas.update',$thematicArea), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" :model="$thematicArea" req="required"   />
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Parent" />
                        <x-dropdown.thematic-sector :model="$thematicArea" />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$thematicArea" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('thematicAreas.index')}} </x-button.back>
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
