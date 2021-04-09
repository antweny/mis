@extends('layouts.backend')
@section('title','New Organization')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Organization">
                <!-- Start form -->
                <x-form.post action="organizations.store">
                    @include('organization._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
