@extends('layouts.templates.store')
@section('title','Issue an Item')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-card title="Issue Item">
                <!-- Start form -->
                {{ Form::model($itemIssue, array('route' => array('itemIssues.update',$itemIssue), 'method' => 'PUT')) }}
                    @csrf
                    @include('item-issues._form',['buttonText'=>'Issue'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
