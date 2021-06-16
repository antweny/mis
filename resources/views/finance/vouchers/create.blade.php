@extends('layouts.backend')
@section('title','New Voucher')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="New Voucher">
                <!-- Start form -->
                <x-form action="{{route('vouchers.store')}}">
                    @include('finance.vouchers._form',['buttonText'=>'Save'])
                </x-form>
                <!-- end form -->
            </x-card>
        </div>
    </div>

@endsection
