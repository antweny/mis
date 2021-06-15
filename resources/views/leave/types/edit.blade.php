@extends('layouts.backend')
@section('title','Edit Leave Types')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Leave Type">

                {{ Form::model($leaveType, array('route' => array('leaveTypes.update',$leaveType), 'method' => 'PUT')) }}
                    @csrf

                    <div class="form-group">
                        <x-form.label name="Name" star="true"  />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$leaveType" />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Days" star="true"  />
                        <x-form.input type="number" name="days" id="days" for="days" req="required" :model="$leaveType" />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" row="5">{{$leaveType->desc}}</textarea>
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
