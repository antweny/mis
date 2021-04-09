@extends('layouts.backend')
@section('title','New Event')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Event">

                <!-- Start form -->
                <x-form.post action="events.store">
                    @include('event._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->

            </x-card>
        </div>
    </div>

@endsection
