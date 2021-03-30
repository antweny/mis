@extends('layouts.templates.store')
@section('title','New Item Received')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item Received">
                <!-- Start form -->
                <x-form.post action="itemIn.store">
                    @include('item-in._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
