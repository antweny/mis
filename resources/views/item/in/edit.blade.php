@extends('layouts.backend')
@section('title','Edit Received Item')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Received Item">
                <!-- Start form -->
                {{ Form::model($itemIn, array('route' => array('itemIn.update',$itemIn), 'method' => 'PUT')) }}
                    @csrf
                    @include('item.in._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
