@extends('layouts.backend')
@section('title','New Visitor')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">

            <x-card title="New Visitor">

                <!-- Start form -->
                    <x-form action="{{route('visitors.store')}}">
                        @include('hra.visitors._form',['buttonText'=>'Save'])
                    </x-form>
                <!-- end form -->

            </x-card>

        </div>
    </div>

@endsection
