@extends('layouts.templates.finance')
@section('title','Edit Payees')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Payee">
                {{ Form::model($payee, array('route' => array('payees.update',$payee), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name: <span class='star'>*</span>"  />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$payee" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Mobile: <span class='star'>*</span>"  />
                        <x-form.input type="number" name="mobile" id="mobile" for="mobile" req="required" :model="$payee" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Email"  />
                        <x-form.input type="email" name="email" id="email" for="email" :model="$payee" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Group" for="group" />
                        <select class="form-control @error('group') is-invalid @enderror single-select" name="group">
                            <option value="">----</option>
                            <option value="Individual" {{old('group',$payee->group) == 'Individual' ? 'selected' : ''}}>Individual</option>
                            <option value="Company" {{old('group',$payee->group) == 'Company' ? 'selected' : ''}}>Company</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Address" />
                        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{$payee->address}}</textarea>
                        @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
