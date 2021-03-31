@extends('layouts.templates.organization')
@section('title','Edit Individual Groups')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Organization Group">
                {{ Form::model($organizationGroup, array('route' => array('organizationGroups.update',$organizationGroup), 'method' => 'PUT')) }}

                    @csrf
                    <div class="form-group">
                        <x-form.label Name="Name: <span class='star'>*</span>" />
                        <x-form.input  name="name" id="name" for="name" req="required" :model="$organizationGroup"  />
                    </div>
                    <div class="form-group">
                        <x-form.label Name="Name: <span class='star'>*</span>" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$organizationGroup->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button.submit label="Update"/>
                            </div>
                        </div>
                    </div>

                {{Form::close()}}
            </x-card>
        </div>
    </div>

@endsection
