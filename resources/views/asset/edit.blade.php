@extends('layouts.templates.asset')
@section('title','Edit Asset')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Asset Type">

                {{ Form::model($asset, array('route' => array('assets.update',$asset), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Equipment <span class='star'>*</span>" />
                            <x-dropdown.equipment  req="required" :model="$asset" />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Serial No. <span class='star'>*</span>" />
                            <x-form.input name="serial_no" id="serial_no" for="serial_no" :model="$asset" />
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Code No." />
                        <x-form.input name="code_number" id="code_number" for="code_number" :model="$asset" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Unit" />
                            <x-dropdown.item-unit :model="$asset" />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Aquisation Date" />
                            <x-form.input type="date" name="date" id="date" for="date" :model="$asset" />
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Remarks" />
                        <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">{{$asset->remarks}}</textarea>
                        @error('remarks') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
