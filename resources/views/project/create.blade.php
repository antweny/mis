@extends('layouts.backend')
@section('title','New Project')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Project">
                <!-- Start form -->
                <x-form.post action="projects.store">
                    @include('projects._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
