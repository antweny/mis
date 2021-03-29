@extends('layouts.templates.finance')
@section('title','New Payment')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Payment">
                <!-- Start form -->
                <x-form.post action="payments.store">
                    @include('payments._form',['buttonText'=>'Save'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
