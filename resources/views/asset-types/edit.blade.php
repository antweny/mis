@extends('layouts.templates.asset')
@section('title','Edit Asset Types')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Asset Type">

                {{ Form::model($assetType, array('route' => array('assetTypes.update',$assetType), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$assetType"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Parent" />
                        <x-dropdown.asset-type name="parent_id" :model="$assetType" />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$assetType" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('assetTypes.index')}}  </x-button.back>
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
