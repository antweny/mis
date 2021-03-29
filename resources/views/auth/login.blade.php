@extends('layouts.login')
@section('title','Please Login')
@section('content')

    <x-form.post action="login">
        <div class="form-group">
            <x-form.elements.label name="Email <span class='star'>*</span>"  />
            <x-form.elements.input name="email" required="required" />
        </div>
        <div class="form-group">
            <x-form.elements.label name="Password <span class='star'>*</span>" />
            <x-form.elements.input type="password" name="password" required="required" />
        </div>
        <div class="form-group text-center">
            <x-button class="btn-primary btn-block" label="Login"/>
        </div>
    </x-form.post>
    <!-- end form -->

@endsection
