@extends('layouts.templates.gender')
@section('title','New GDSS Participant')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New GDSS Participant">

                <!-- Start form -->
                <x-form.post action="genderSeriesParticipants.store">
                    @include('gender-series-participant._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->

            </x-card>
        </div>
    </div>

@endsection
