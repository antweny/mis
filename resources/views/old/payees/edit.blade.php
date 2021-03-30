@extends('layouts.templates.finance')
@section('title','Edit Payees')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Payee">
                {{ Form::model($payee, array('route' => array('payees.update',$payee), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$payee" />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Mobile: <span class='star'>*</span>" type="number" name="mobile" id="mobile" for="mobile" req="required" :model="$payee"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Email" type="email" name="email" id="email" for="email" :model="$payee" />
                    </div>
                    <div class="form-group">
                        <x-form.elements.label name="Group" for="group" />
                        <select class="form-control @error('group') is-invalid @enderror single-select" name="group">
                            <option value="">----</option>
                            <option value="Individual" {{old('group',$payee->group) == 'Individual' ? 'selected' : ''}}>Individual</option>
                            <option value="Company" {{old('group',$payee->group) == 'Company' ? 'selected' : ''}}>Company</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Address" name="address"  id="address" :model="$payee" />
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('payees.index')}} </x-button.back>
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
