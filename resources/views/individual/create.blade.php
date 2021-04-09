@extends('layouts.backend')
@section('title','New Individual')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="New Individual">
                <!-- Start form -->
                <x-form.post action="individuals.store">
                    @include('individual._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
