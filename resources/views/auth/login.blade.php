@extends('layouts.login')
@section('title','Please Login')
@section('content')

        <x-form.post action="login">
            <div class="form-group">
                <x-form.label name="Email <span class='star'>*</span>"  />
                <x-form.input name="email" req="required" />
            </div>
            <div class="form-group">
                <x-form.label name="Password <span class='star'>*</span>" />
                <x-form.input type="password" name="password" req="required" />
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-block text-white">
                    Login
                </button>
            </div>
        </x-form.post>

@endsection
