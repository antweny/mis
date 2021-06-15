@extends('layouts.backend')
@section('title','New Output')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-11">
            <x-card title="New Output">
                <!-- Start form -->
                <x-form action="{{route('outputs.store')}}">
                    @include('op.outputs._form',['buttonText'=>'Save'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
