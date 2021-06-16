@extends('layouts.backend')
@section('title','New Item')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Item">
                <!-- Start form -->
                <x-form action="{{route('items.store')}}">
                    @include('item._form',['buttonText'=>'Create'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
