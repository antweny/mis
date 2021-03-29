@extends('layouts.templates.hr')
@section('title','New Visitor')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <x-card title="New Visitor">

                <!-- Start form -->
                    <x-form.post action="visitors.store">
                        @include('visitors._form',['buttonText'=>'Save'])
                    </x-form.post>
                <!-- end form -->

            </x-card>

        </div>
    </div>

@endsection
