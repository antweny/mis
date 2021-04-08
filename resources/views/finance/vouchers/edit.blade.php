@extends('layouts.templates.hr')
@section('title','Edit Voucher')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Voucher">
                <!-- Start form -->
                {{ Form::model($voucher, array('route' => array('vouchers.update',$voucher), 'method' => 'PUT')) }}
                    @csrf
                    @include('finance.vouchers._form',['buttonText'=>'Update'])
                {{ Form::close() }}
            </x-card>
        </div>
    </div>

@endsection


