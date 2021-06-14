@extends('layouts.app')
@section('title','Please Login')
@section('content')

    <div class="row justify-content-center" style="margin-top: 50px;">
        <div class="col-md-4">
            <x-card title="Please Login">
                <x-form action="{{route('login')}}">
                    <div class="form-group">
                        <x-form.label name="Email" star="true" />
                        <x-form.input name="email" req="required" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Password"  star="true" />
                        <x-form.input type="password" name="password" req="required" />
                    </div>
                    <div class="form-group text-center">
                        <x-button label="Login" class="btn-block"/>
                    </div>
                </x-form>
            </x-card>
        </div>
    </div>

@endsection
