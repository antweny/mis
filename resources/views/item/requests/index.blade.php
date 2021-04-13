@extends('layouts.backend')
@section('title','My Item Requests')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="New Request Item"> {{route('itemRequests.create')}} </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Requests List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Request At</th>
                <th>Item Name</th>
                <th>Required</th>
                <th>Issued Quantity</th>
                <th>Status</th>
                <th>Issued At</th>
                <th>Remarks</th>
            </x-slot>
            <!-- table body -->
            @foreach ($itemRequests as $itemRequest)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$itemRequest->created_at}}</td>
                    <td class="text-left">{{$itemRequest->item->name}}</td>
                    <td class="text-center">{{$itemRequest->req_quantity}}</td>
                    <td class="text-center">{{$itemRequest->quantity_out}}</td>
                    <td class="text-center">{!! $itemRequest->item_status !!}</td>
                    <td class="text-center">{{$itemRequest->issued}}</td>
                    <td class="text-center">{{$itemRequest->remarks}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @if($itemRequest->status == 'O')
                                <a href="{{route('itemRequests.edit',$itemRequest)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="{{route('itemRequests.destroy',$itemRequest)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endif
                            @if($itemRequest->status == 'I')
                                <a href="{{route('itemIssues.reject',$itemRequest)}}" onclick="return confirm('Have you Collected your Items?')" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Items Collected" >
                                    <i class="fas fa-check"></i>
                                </a>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
