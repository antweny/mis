@extends('layouts.backend')
@section('title','New Payment')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="New Payment">
                <!-- Start form -->
                <x-form action="{{route('payments.store')}}">
                    @include('finance.payments._form',['buttonText'=>'Save'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
