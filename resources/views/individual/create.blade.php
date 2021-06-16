@extends('layouts.backend')
@section('title','New Individual')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Individual">
                <!-- Start form -->
                <x-form action="{{route('individuals.store')}}">
                    @include('individual._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
