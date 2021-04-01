@extends('layouts.templates.hr')
@section('title','New Leave Application')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Apply Leave">
                <!-- Start form -->
                <x-form.post action="leaveApplications.store">
                    @include('leave-applications._form',['buttonText'=>'Apply'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
