@extends('layouts.backend')
@section('title','Update Output')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-11">
            <x-card title="Update Output">

                {{ Form::model($output, array('route' => array('outputs.update',$output), 'method' => 'PUT')) }}
                    @csrf
                    @include('op.outputs._form',['buttonText'=>'Update'])
                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
