@extends('layouts.backend')
@section('title','New Event Participant')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Event Participant">


                <!-- Start form -->
                <x-form action="{{route('participants.store')}}">
                    @include('event.participant._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->


            </x-card>
        </div>
    </div>

@endsection
