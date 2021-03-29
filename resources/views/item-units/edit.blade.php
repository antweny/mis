@extends('layouts.templates.store')
@section('title','Edit Item Units')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Item Unit">
                {{ Form::model($itemUnit, array('route' => array('itemUnits.update',$itemUnit), 'method' => 'PUT')) }}

                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$itemUnit"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$itemUnit" />
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('itemUnits.index')}} </x-button.back>
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
