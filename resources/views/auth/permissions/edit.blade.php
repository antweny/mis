@extends('layouts.templates.auth')
@section('title','Edit Permissions')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit permission">
                {{ Form::model($permission, array('route' => array('permissions.update',$permission), 'method' => 'PUT')) }}
                @csrf
                    <div class="form-group">
                        <x-form.label name="Name: <span class='star'>*</span>" for="name" />
                        <x-form.input name="name" id="name" required="required" :model="$permission"/>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" for="desc" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$permission->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <x-form.label name="Assign Roles" />
                        </div>
                        <x-dropdown.role />
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
