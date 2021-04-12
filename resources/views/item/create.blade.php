@extends('layouts.backend')
@section('title','New Item')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item">
                <!-- Start form -->
                <x-form.post action="items.store">
                    @include('item._form',['buttonText'=>'Create'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
