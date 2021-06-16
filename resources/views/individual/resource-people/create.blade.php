@extends('layouts.backend')
@section('title','New esource Person')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="New Resource Person">
                <!-- Start form -->
                <x-form action="{{route('resourcePeople.store')}}">
                    @include('individual.resource-people._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
