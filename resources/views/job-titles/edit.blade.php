@extends('layouts.templates.job')
@section('title','Edit Job Title')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Job Title">

                {{ Form::model($jobTitle, array('route' => array('jobTitles.update',$jobTitle), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$jobTitle"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym" :model="$jobTitle"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Type" for="type" />
                        <select class="form-control @error('type') is-invalid @enderror" name="type">
                            <option value="">--</option>
                            <option value="P" {{$jobTitle->type == 'P' ? 'selected' : ''}}> Professional </option>
                            <option value="L" {{$jobTitle->type == 'L' ? 'selected' : ''}}> Leadership </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$jobTitle" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('jobTitles.index')}}  </x-button.back>
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
