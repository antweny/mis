@extends('layouts.templates.hr')
@section('title','Edit Room')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Room">

                {{ Form::model($room, array('route' => array('rooms.update',$room), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group">
                        <x-form.elements.label name="Room Wing: <span class='star'>*</span>" />
                        <x-dropdown.room-category req="required" :model="$room" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.input label="Name" name="name" id="name" for="name" :model="$room"   />
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.input type="number" label="Room No." name="number" id="number" for="number" :model="$room"   />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('rooms.index')}} </x-button.back>
                            </div>
                            <div class="float-right">
                                <x-button label="Update"/>
                            </div>
                        </div>
                    </div>

                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
