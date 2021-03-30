@extends('layouts.templates.hr')
@section('title','Leave Remarks')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-7">
            <x-card title="Leave Remarks">
                <!-- Start form -->
                {{ Form::model($approveLeave, array('route' => array('approveLeaves.update',$approveLeave), 'method' => 'PUT')) }}
                    @csrf
                <div class="form-group">
                    <x-form.elements.textarea label="Remarks <span class='star'>*</span>" name="remarks" id="remarks" row="8" :model="$approveLeave" />
                    <input name="state" value="{{$state}}" type="hidden">
                </div>

                    <div class="form-group text-right">
                        <x-button.back> {{route('approveLeaves.index')}} </x-button.back>
                        <x-button label="Submit"/>
                    </div>
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection
