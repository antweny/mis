@extends('layouts.backend')
@section('title','Edit Item')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Item">
                <!-- Start form -->
                {{ Form::model($item, array('route' => array('items.update',$item), 'method' => 'PUT')) }}
                    @csrf
                    @include('item._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
