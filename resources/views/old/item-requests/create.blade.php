@extends('layouts.templates.store')
@section('title','New Item Request')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item Request">
                <!-- Start form -->
                <x-form.post action="itemRequests.store">
                    @include('item-requests._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
