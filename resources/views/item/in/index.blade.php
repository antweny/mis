@extends('layouts.backend')
@section('title','Items Received List')
@section('content')
    <!-- Start Card -->
    <x-card title="Items Received List">

        <x-slot name="cardButton">
            <x-button.create label="Receive New Item "> {{route('itemIn.create')}} </x-button.create>
        </x-slot>


        <!-- Table Start -->
        <x-table.listing :collection="$itemIns">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Received at</th>
                <th>Name</th>
                <th>Desc</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Remarks</th>
            </x-slot>
            <!-- table body -->
            @foreach ($itemIns as $itemIn)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$itemIn->received_at}}</td>
                    <td class="text-left">{{$itemIn->item->name}}</td>
                    <td class="text-center">{{$itemIn->desc}}</td>
                    <td class="text-center">{{$itemIn->quantity_in}}</td>
                    <td class="text-center">{{$itemIn->unit_rate}}</td>
                    <td class="text-center">{{$itemIn->amount}}</td>
                    <td class="text-center">{{$itemIn->remarks}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('item-in_update')
                                    <x-button.edit>{{route('itemIn.edit',$itemIn)}}</x-button.edit>
                                @endcan
                                @can('item-in_delete')
                                    <x-button.delete>{{route('itemIn.destroy',$itemIn)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
