@extends('layouts.backend')
@section('title','Leave Remarks')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Leave Remarks">
                <!-- Start form -->
                {{ Form::model($leaveApprove, array('route' => array('leaveApproves.update',$leaveApprove), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Remarks <span class='star'>*</span>" />
                        <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">{{old('remarks',$leaveApprove->remarks)}}</textarea>
                        @error('remarks') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                        <input name="status" value="{{$state}}" type="hidden">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button.submit label="Submit"/>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
