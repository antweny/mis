@extends('layouts.backend')
@section('title','New Employee')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="New Employee">
                <!-- Start form -->
                <x-form.post action="employees.store">
                    @include('hra.employee._form',['buttonText'=>'Save'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
