@extends('layouts.templates.hr')
@section('title','Edit Leave Types')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Leave Type">

                {{ Form::model($leaveType, array('route' => array('leaveTypes.update',$leaveType), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$leaveType"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input type="number" label="Days: <span class='star'>*</span>" name="days" id="days" for="days" req="required" :model="$leaveType"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$leaveType" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('leaveTypes.index')}} </x-button.back>
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
