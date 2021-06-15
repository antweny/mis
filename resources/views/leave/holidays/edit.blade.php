@extends('layouts.backend')
@section('title','Edit Holidays')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Holiday">

                {{ Form::model($holiday, array('route' => array('holidays.update',$holiday), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name" star="true" />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$holiday" />
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <x-form.label name="Date" star="true" />
                            <x-form.input type="date" name="date" id="date" req="required" :model="$holiday"/>
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Repeat Yearly" />
                            <select class="form-control @error('repeat') is-invalid @enderror single-select" name="repeat" required>
                                <option value="0" {{$holiday->repeat == '0' ? 'selected' : ''}}>No</option>
                                <option value="1" {{$holiday->repeat == '1' ? 'selected' : ''}}>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$holiday->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>
                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back />
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
