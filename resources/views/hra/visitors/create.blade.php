@extends('layouts.backend')
@section('title','New Visitor')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">

            <x-card title="New Visitor">

                <!-- Start form -->
                    <x-form.post action="visitors.store">
                        @include('hra.visitors._form',['buttonText'=>'Save'])
                    </x-form.post>
                <!-- end form -->

            </x-card>

        </div>
    </div>

@endsection
