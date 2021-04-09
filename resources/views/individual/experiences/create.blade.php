@extends('layouts.backend')
@section('title','New Individual Experience')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Individual Experience">
                <!-- Start form -->
                <x-form.post action="experiences.store">
                    @include('individual.experiences._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
