@extends('layouts.backend')
@section('title','My Item Requests')
@section('content')

    <!-- Start Card -->
    <x-card title="Requests List">

        <x-slot name="cardButton">
            <x-button.create label="New Request Item"> {{route('itemRequests.create')}} </x-button.create>
        </x-slot>
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @if($itemRequest->status == 'I')
                                    <a href="{{route('itemIssues.reject',$itemRequest)}}" onclick="return confirm('Have you Collected your Items?')" class="dropdown-item" >
                                        <i class="fas fa-check"></i>
                                    </a>
                                @endif
                                @if($itemRequest->status == 'O')
                                    <a href="{{route('itemRequests.edit',$itemRequest)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <x-button.delete>{{route('itemRequests.destroy',$itemRequest)}}</x-button.delete>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
