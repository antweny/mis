@extends('layouts.backend')
@section('title','New Gender Series')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Gender Series">

                <!-- Start form -->
                <x-form.post action="genderSeries.store">
                    @include('event.gender.series._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->

            </x-card>
        </div>
    </div>

@endsection
