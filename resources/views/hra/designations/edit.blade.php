@extends('layouts.backend')
@section('title','Edit Designations')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Designation">

                {{ Form::model($designation, array('route' => array('designations.update',$designation), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group">
                        <x-form.label name="Name" star="true"/>
                        <x-form.input name="name" id="name" for="name" req="required" :model="$designation" />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Acronym" for="name" />
                        <x-form.input name="acronym" id="acronym" :model="$designation" />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$designation->desc}}</textarea>
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
