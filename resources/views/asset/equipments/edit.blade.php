@extends('layouts.backend')
@section('title','Edit Equipments')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Equipment">

                {{ Form::model($equipment, array('route' => array('equipments.update',$equipment), 'method' => 'PUT')) }}
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Brand" star="true" />
                        <x-dropdown.brand req="required" :model="$equipment"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Model" star="true" />
                        <x-form.input name="model" id="model" for="model" req="required" :model="$equipment"  />
                    </div>
                </div>

                <div class="form-group">
                    <x-form.label name="Type" star="true" />
                    <x-dropdown.asset-type req="required" :model="$equipment" />
                </div>

                <div class="form-group">
                    <x-form.label name="Description" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$equipment->desc}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back />
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
