@extends('layouts.backend')
@section('title','Edit Donors')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Donor">
                {{ Form::model($donor, array('route' => array('donors.update',$donor), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Organization" star="true" />
                        <x-dropdown.organization req="required" :model="$donor"/>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Organization Group" star="true" />
                        <x-dropdown.organization-group req="required" filter="Donor" :model="$donor"/>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <x-form.label name="Start Date" star="true" />
                            <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required"  :model="$donor"/>
                        </div>
                        <div class="col">
                            <x-form.label name="End Date" star="true" />
                            <x-form.input type="date" name="end_date" id="end_date" for="end_date" :model="$donor" req="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$donor->desc}}</textarea>
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
