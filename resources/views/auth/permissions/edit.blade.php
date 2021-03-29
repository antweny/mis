@extends('layouts.templates.auth')
@section('title','Edit Permissions')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Edit permission">
                {{ Form::model($permission, array('route' => array('permissions.update',$permission), 'method' => 'PUT')) }}
                @csrf
                    <div class="form-group">
                        <x-form.elements.label name="Name: <span class='star'>*</span>" for="name" />
                        <x-form.elements.input name="name" id="name" required="required" :model="$permission"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Description" for="desc" />
                        <x-form.elements.textarea name="desc" id="desc" :model="$permission"/>
                    </div>
                    <div class="form-group row">
                        <x-auth.role />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back>  {{route('permissions.index')}} </x-button.back>
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
