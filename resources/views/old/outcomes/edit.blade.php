@extends('layouts.templates.op')
@section('title','Update Outcome')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <x-card title="Update Outcome">

                {{ Form::model($outcome, array('route' => array('outcomes.update',$outcome), 'method' => 'PUT')) }}
                    @csrf
                    @include('outcomes._form',['buttonText'=>'Update'])
                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
