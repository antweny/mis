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
                            <x-form.label name="Name: <span class='star'>*</span>"  />
                            <x-form.input name="name" id="name" for="name" req="required" :model="$currency" />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Acronym: <span class='star'>*</span>"  />
                            <x-form.input name="acronym" id="acronym" for="acronym" req="required" :model="$currency" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Symbol"  />
                            <x-form.input name="symbol" id="symbol" for="symbol" :model="$currency" />
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Main Currency: <span class='star'>*</span>" for="main" />
                            <select class="form-control @error('active') is-invalid @enderror single-select" name="main" required>
                                <option value="0" {{old('main',$currency->main) == '0' ? 'selected' : ''}}>No</option>
                                <option value="1" {{old('main',$currency->main) == '1' ? 'selected' : ''}}>Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$currency->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
