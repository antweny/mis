@extends('layouts.backend')
@section('title','New Item Received')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item Received">
                <!-- Start form -->
                <x-form action="{{route('itemIn.store')}}">
                    @include('item.in._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
