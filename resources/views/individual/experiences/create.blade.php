@extends('layouts.backend')
@section('title','New Individual Experience')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Individual Experience">
                <!-- Start form -->
                <x-form action="{{route('experiences.store')}}">
                    @include('individual.experiences._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
