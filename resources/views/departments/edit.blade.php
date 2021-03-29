@extends('layouts.templates.hr')
@section('title','Edit Departments')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Department">

                {{ Form::model($department, array('route' => array('departments.update',$department), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name <span class='star'>*</span>" for="name" />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$department" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Acronym" for="name" />
                            <x-form.input name="acronym" id="acronym" :model="$department" />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Manager" />
{{--                            <x-dropdown.manager :model="$department" />--}}
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$department->desc}}</textarea>
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
