@extends('layouts.backend')
@section('title','New Item Request')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item Request">
                <!-- Start form -->
                <x-form action="{{route('itemRequests.store')}}">
                    @include('item.requests._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
