@extends('layouts.templates.finance')
@section('title','Edit Bank Account')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Bank">
                {{ Form::model($bankAccount, array('route' => array('bankAccounts.update',$bankAccount), 'method' => 'PUT')) }}
                @csrf

                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"  :model="$bankAccount" />
                </div>

                <div class="form-group">
                    <x-form.elements.label name="Bank Name: <span class='star'>*</span>" />
                    <x-dropdown.bank :model="$bankAccount" />
                </div>

                <div class="form-group">
                    <x-form.elements.input label="Account Number: <span class='star'>*</span>" type="number" name="number" id="number" for="number" req="required" :model="$bankAccount" />
                </div>

                <div class="form-group">
                    <x-form.elements.input label="Balance" type="number" name="balance" id="balance" for="balance"  :model="$bankAccount"/>
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <x-form.elements.label name="Currency: <span class='star'>*</span>" />
                        <x-dropdown.currency :model="$bankAccount"/>
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input label="Opening Date" type="date" name="op" id="op" for="op"  :model="$bankAccount"/>
                    </div>
                </div>

                <div class="form-group">
                    <x-form.elements.textarea label="Descriptions" name="desc" row="5" id="desc"  :model="$bankAccount"/>
                </div>


                <div class="form-group row">
                    <div class="col">
                        <div class="float-left">
                            <x-button.back> {{route('bankAccounts.index')}} </x-button.back>
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
