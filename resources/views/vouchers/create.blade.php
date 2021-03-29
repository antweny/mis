@extends('layouts.templates.finance')
@section('title','New Voucher')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Voucher">
                <!-- Start form -->
                <x-form.post action="vouchers.store">
                    @include('vouchers._form',['buttonText'=>'Save'])
                </x-form.post>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
