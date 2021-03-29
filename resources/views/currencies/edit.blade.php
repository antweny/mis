@extends('layouts.templates.finance')
@section('title','Edit Currencies')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Currency">
                {{ Form::model($currency, array('route' => array('currencies.update',$currency), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$currency" />
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.input label="Acronym: <span class='star'>*</span>" name="acronym" id="acronym" for="acronym" req="required" :model="$currency"  />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.elements.input label="Symbol" name="symbol" id="symbol" for="symbol" :model="$currency" />
                        </div>
                        <div class="col-md-6">
                            <x-form.elements.label name="Main Currency: <span class='star'>*</span>" for="main" />
                            <select class="form-control @error('active') is-invalid @enderror single-select" name="main" required>
                                <option value="0" {{old('main',$currency->main) == '0' ? 'selected' : ''}}>No</option>
                                <option value="1" {{old('main',$currency->main) == '1' ? 'selected' : ''}}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" row="5" id="desc" :model="$currency"/>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('currencies.index')}} </x-button.back>
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
