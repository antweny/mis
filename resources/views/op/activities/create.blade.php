@extends('layouts.backend')
@section('title','New Activity')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Activity">
                <!-- Start form -->
                <x-form action="{{route('activities.store')}}">
                    @include('op.activities._form',['buttonText'=>'Save'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
