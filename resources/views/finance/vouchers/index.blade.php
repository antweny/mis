@extends('layouts.backend')
@section('title','Vouchers List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('voucher_create') <x-button.create label="Add Voucher"> {{route('vouchers.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Vouchers List">
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
                        <!-- Default dropstart button -->
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu">
                                <a href="{{route('vouchers.show',$voucher)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-info-circle"></i> view
                                </a>
                                <a href="{{route('vouchers.edit',$voucher)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-print"></i> print
                                </a>
                                @can('voucher_update')
                                    <a href="{{route('vouchers.edit',$voucher)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Edit" >
                                        <i class="fa fa-edit"></i> edit
                                    </a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('voucher_delete')
                                    <form method="POST" action="{{route('vouchers.destroy',$voucher)}}" class="form-horizontal dropdown-item" role="form" autocomplete="off">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn del" onclick="return confirm('Confirm Deletion')">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
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
