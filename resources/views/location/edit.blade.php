@extends('layouts.backend')
@section('title','Edit Locations')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Location">

                {{ Form::model($location, array('route' => array('locations.update',$location), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name" star="true" for="name" />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$location" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Parent" />
                        <x-dropdown.location name="parent_id" :model="$location"/>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$location->desc}}</textarea>
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
