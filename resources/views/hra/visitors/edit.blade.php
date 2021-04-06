@extends('layouts.templates.hr')
@section('title','Edit Visitor')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Edit Visitor">
                <!-- Start form -->
                {{ Form::model($visitor, array('route' => array('visitors.update',$visitor), 'method' => 'PUT')) }}
                    @csrf
                    @include('hra.visitors._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
