@extends('layouts.templates.location')
@section('title','Edit Locations')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Location">

                {{ Form::model($location, array('route' => array('locations.update',$location), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" :model="$location" req="required"   />
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Parent" />
                        <x-dropdown.location name="parent_id" :model="$location"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$location" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('locations.index')}} </x-button.back>
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
