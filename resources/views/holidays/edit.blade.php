@extends('layouts.templates.hr')
@section('title','Edit Holidays')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Holiday">

                {{ Form::model($holiday, array('route' => array('holidays.update',$holiday), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" :model="$holiday" req="required"   />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.input label="Date <span class='star'>*</span>" type="date" name="date" id="date" req="required" :model="$holiday"  />
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.label name="Repeat Yearly" />
                            <select class="form-control @error('repeat') is-invalid @enderror single-select" name="repeat" required>
                                <option value="0" {{$holiday->repeat == '0' ? 'selected' : ''}}>No</option>
                                <option value="1" {{$holiday->repeat == '1' ? 'selected' : ''}}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$holiday" />
                    </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back> {{route('holidays.index')}} </x-button.back>
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
