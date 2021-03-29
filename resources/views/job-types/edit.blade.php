@extends('layouts.templates.job')
@section('title','Edit Job Types')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Job Type">

                {{ Form::model($jobType, array('route' => array('jobTypes.update',$jobType), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$jobType"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$jobType" />
                    </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back> {{route('jobTypes.index')}}  </x-button.back>
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
