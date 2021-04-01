@extends('layouts.templates.finance')
@section('title','Edit Bank Account')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Bank">
                {{ Form::model($bankAccount, array('route' => array('bankAccounts.update',$bankAccount), 'method' => 'PUT')) }}
                @csrf

                    <div class="form-group">
                        <x-form.label name="Name: <span class='star'>*</span>" />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$bankAccount"   />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Bank: <span class='star'>*</span>" />
                        <x-dropdown.bank req="required" :model="$bankAccount"/>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Account Number: <span class='star'>*</span>" />
                        <x-form.input name="number" id="number" for="number" req="required" :model="$bankAccount" />
                    </div>

                    <div class="form-group">
                        <x-form.label name="Balance" />
                        <x-form.input type="number" name="balance" id="balance" for="balance" :model="$bankAccount" />
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <x-form.label name="Currency: <span class='star'>*</span>" />
                            <x-dropdown.currency :model="$bankAccount"/>
                        </div>
                        <div class="col-md-6">
                            <x-form.label name="Opening Date" />
                            <x-form.input type="date" name="op" id="op" for="op" :model="$bankAccount" />
                        </div>
                    </div>

                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$bankAccount->desc}}</textarea>
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
