@extends('layouts.templates.finance')
@section('title','Payments List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('payment_create') <x-button.create label="Add Payment"> {{route('payments.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Payments List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Payee</th>
                <th scope="col">No.</th>
                <th scope="col">Type</th>
                <th scope="col">Account</th>
                <th scope="col">Currency</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Prepared By</th>
                <th scope="col">Date</th>
            </x-slot>
            <!-- table body -->
            @foreach ($payments as $payment)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$payment->payee->name}}</td>
                    <td  class="text-center">{{$payment->payment_format.$payment->payment_no}}</td>
                    <td  class="text-center">{{ $payment->payment_type }}</td>
                    <td  class="text-center">{{ $payment->bank_account->name }}</td>
                    <td  class="text-center">{{ $payment->bank_account->currency->acronym }}</td>
                    <td  class="text-center">{{$payment->amount}}</td>
                    <td  class="text-center">{{ $payment->status }}</td>
                    <td  class="text-center">{{ $payment->employee->name }}</td>
                    <td  class="text-center">{!! humanDate($payment->date) !!}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('payment_update')
                                <x-button.edit>{{route('payments.edit',$payment)}}</x-button.edit>
                            @endcan
                            @can('payment_delete')
                                <x-button.edit>{{route('payments.destroy',$payment)}}</x-button.edit>
                            @endcan
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
