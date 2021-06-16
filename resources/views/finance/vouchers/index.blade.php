@extends('layouts.backend')
@section('title','Vouchers List')
@section('content')

    <!-- Start Card -->
    <x-card title="Vouchers List">

        <x-slot name="cardButton">
            @can('voucher_create')
                <x-button.create label="Add Voucher"> {{route('vouchers.create')}} </x-button.create>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Voucher No.</th>
                <th scope="col">Payee</th>
                <th scope="col">Date Created</th>
                <th scope="col">Type</th>
                <th scope="col">Currency</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Prepared By</th>
            </x-slot>
            <!-- table body -->
            @foreach ($vouchers as $voucher)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{'CPV'.$voucher->payment->payment_format.''.$voucher->payment->payment_no}}</td>
                    <td class="text-left">{{$voucher->payment->payee->name}}</td>
                    <td class="text-center">{{humanDate($voucher->created_at)}}</td>
                    <td class="text-center">{{$voucher->payment->payment_type}}</td>
                    <td class="text-center">{{$voucher->payment->bank_account->currency->acronym}}</td>
                    <td class="text-center">{{$voucher->payment->amount}}</td>
                    <td class="text-center">{{$voucher->payment->amount}}</td>
                    <td class="text-center">{{$voucher->employee->name}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                <a href="{{route('vouchers.show',$voucher)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-info-circle"></i> view
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('vouchers.edit',$voucher)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-print"></i> print
                                </a>
                                @can('voucher_update')
                                    <x-button.edit>{{route('vouchers.edit',$voucher)}}</x-button.edit>
                                @endcan
                                @can('voucher_delete')
                                    <x-button.delete>{{route('vouchers.destroy',$voucher)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

@endsection
