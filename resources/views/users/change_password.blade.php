@extends('layouts.templates.auth')
@section('title','Password Change')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Change Password">
                {{ Form::model($user, array('route' => array('changePassword.submit',$user), 'method' => 'PUT')) }}
                @csrf

                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.label name="Fullname" star="true" for="name" />
                        <x-form.elements.input name="name" id="name" req="required readonly" :model="$user"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.label name="Email" star="true" for="email" />
                        <x-form.elements.input name="email" id="email" req="required readonly" :model="$user"/>
                    </div>
                </div>

                <div class="form-group">
                    <x-form.elements.label name="Old Password" star="true" for="name" />
                    <x-form.elements.input type="password" name="old_password" id="old_password" req="required"/>
                </div>

                <div class="form-group">
                    <x-form.elements.label name="New Password" star="true" for="name" />
                    <x-form.elements.input type="password" name="password" id="password" req="required"/>
                </div>

                <div class="form-group">
                    <x-form.elements.label name="Confirm Password" star="true" for="name" />
                    <x-form.elements.input type="password" name="password_confirmation" id="password_confirmation" req="required"/>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">

                        </div>
                        <div class="float-right">
                            <x-button label="Change Password"/>
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </x-card>
        </div>
    </div>



@endsection
