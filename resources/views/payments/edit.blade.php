@extends('layouts.templates.finance')
@section('title','Edit Payment')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Edit Payment">


                <!-- Start form -->
                {{ Form::model($payment, array('route' => array('payments.update',$payment), 'method' => 'PUT')) }}
                    @csrf
                    @include('payments._form',['buttonText'=>'Update'])
                {{ Form::close() }}


            </x-card>
        </div>
    </div>

@endsection


