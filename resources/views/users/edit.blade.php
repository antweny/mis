@extends('layouts.templates.auth')
@section('title','Edit Users')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit User">
            {{ Form::model($user, array('route' => array('users.update',$user), 'method' => 'PUT')) }}
                @csrf
                    <div class="form-group row">
                        <div class="col-md-8">
                            <x-form.label name="Name: <span class='star'>*</span>" for="name" />
                            <x-form.input name="name" id="name" required="required" :model="$user"/>
                        </div>
                        <div class="col-md-4">
                            <x-form.label name="Active: <span class='star'>*</span>" for="active" />
                            <select class="form-control @error('active') is-invalid @enderror single-select" name="active" required>
                                <option value="1" {{old('active',$user->active) == '1' ? 'selected' : ''}}>Yes</option>
                                <option value="0" {{old('active',$user->active) == '0' ? 'selected' : ''}}>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Email: <span class='star'>*</span>" for="email" />
                        <x-form.input name="email" id="email" required="required" :model="$user"/>
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
