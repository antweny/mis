@extends('layouts.backend')
@section('title','New Project')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Project">
                <!-- Start form -->
                <x-form action="{{route('projects.store')}}">
                    @include('project._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
