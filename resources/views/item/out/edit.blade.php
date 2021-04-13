@extends('layouts.backend')
@section('title','Issue an Item')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Issue Item Form">
                <!-- Start form -->
                {{ Form::model($itemOut, array('route' => array('itemOut.issue',$itemOut), 'method' => 'PUT')) }}
                    @csrf
                    @include('item.out._form',['buttonText'=>'Issue'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
