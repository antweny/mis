@extends('layouts.backend')
@section('title','Items Received List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Receive New Item "> {{route('itemIn.create')}} </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Items Received List">
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
                        <div class="btn-group btn-group-sm">
                            @can('item-in_update')
                                <a href="{{route('itemIn.edit',$itemIn)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('item-in_delete')
                                <form method="POST" action="{{route('itemIn.destroy',$itemIn)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
