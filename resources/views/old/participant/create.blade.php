@extends('layouts.templates.event')
@section('title','New Event Participant')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Event Participant">

                <!-- Start form -->
                <x-form.post action="participants.store">
                    @include('participant._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->

            </x-card>
        </div>
    </div>

@endsection
