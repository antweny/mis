@extends('layouts.backend')
@section('title','Requests to Issue List')
@section('content')

    <!-- Start Card -->
    <x-card title="Requests to Issue List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Request At</th>
                <th>From</th>
                <th>Item Name</th>
                <th>Required</th>
                <th>Issued Quantity</th>
                <th>Status</th>
                <th>Updated at</th>
                <th>Remarks</th>
            </x-slot>
            <!-- table body -->
            @foreach ($itemIssues as $itemIssue)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{humanDate($itemIssue->created_at)}}</td>
                    <td class="text-center">{{$itemIssue->employee->name}}</td>
                    <td class="text-center">{{$itemIssue->item->name}}</td>
                    <td class="text-center">{{$itemIssue->req_quantity}}</td>
                    <td class="text-center">{{$itemIssue->quantity_out}}</td>
                    <td class="text-center">{!! $itemIssue->item_status !!}</td>
                    <td class="text-center">{{humanDate($itemIssue->updated_at)}}</td>
                    <td class="text-center">{{$itemIssue->remarks}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('item-issue_update')
                                    @if($itemIssue->status == 'O')
                                        <x-button.edit>{{route('itemOut.edit',$itemIssue)}}</x-button.edit>
                                    @endif
                                @endcan
                                @if($itemIssue->status == 'I')
                                    <a href="{{route('itemOut.reject',$itemIssue)}}" onclick="return confirm('Reject Request?')" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Reject Request" >
                                        <i class="far fa-window-close"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
