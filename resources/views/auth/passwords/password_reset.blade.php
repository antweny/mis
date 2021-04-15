@extends('layouts.backend')
@section('title','Reset Password')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="User Password Reset">
                {{ Form::model($user, array('route' => array('passwordReset.submit',$user), 'method' => 'PUT')) }}
                @csrf

                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Name: <span class='star'>*</span>" for="name" />
                        <x-form.input name="name" id="name" req="required readonly" :model="$user"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Email: <span class='star'>*</span>" for="email" />
                        <x-form.input name="email" id="email" req="required readonly" :model="$user"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="New Password: <span class='star'>*</span>" for="name" />
                        <x-form.input type="password" name="password" id="password" req="required"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Confirm Password: <span class='star'>*</span>" for="name" />
                        <x-form.input type="password" name="password_confirmation" id="password_confirmation" req="required"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back />
                        </div>
                        <div class="float-right">
                            <x-button.submit label="Change Password"/>
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </x-card>
        </div>
    </div>



@endsection
