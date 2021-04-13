@extends('layouts.backend')
@section('title','Edit Room')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Room">

                {{ Form::model($room, array('route' => array('rooms.update',$room), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group">
                        <x-form.label name="Room Wing: <span class='star'>*</span>" />
                        <x-dropdown.room-category req="required" :model="$room" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Name" />
                            <x-form.input name="name" id="name" for="name" :model="$room"   />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Room No" />
                            <x-form.input type="number" name="number" id="number" :model="$room"   />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button.submit label="Update"/>
                            </div>
                        </div>
                    </div>

                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
