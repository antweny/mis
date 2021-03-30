@extends('layouts.login')
@section('title','Please Login')
@section('content')

    <x-form.post action="login">
        <div class="form-group">
            <x-form.label name="Email <span class='star'>*</span>"  />
            <x-form.input name="email" required="required" />
        </div>
        <div class="form-group">
            <x-form.label name="Password <span class='star'>*</span>" />
            <x-form.input type="password" name="password" required="required" />
        </div>
        <div class="form-group text-center">
            <x-button.submit class="btn-block" label="Login"/>
        </div>
    </x-form.post>
    <!-- end form -->

@endsection
