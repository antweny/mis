@extends('layouts.backend')
@section('title','New Outcome')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Outcome">
                <!-- Start form -->
                <x-form.post action="outcomes.store">
                    @include('op.outcomes._form',['buttonText'=>'Save'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
