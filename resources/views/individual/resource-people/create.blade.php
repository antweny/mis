@extends('layouts.templates.individual')
@section('title','New esource Person')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="New Resource Person">
                <!-- Start form -->
                <x-form.post action="resourcePeople.store">
                    @include('individual.resource-people._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
