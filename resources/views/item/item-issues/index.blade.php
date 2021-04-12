@extends('layouts.templates.store')
@section('title','Requests to Issue List')
@section('content')

    <!-- Start Card -->
    <x-card title="Requests to Issue List">
        <!-- Table Start -->
        <x-table.listing>
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
                        @can('item-issue_update')
                            @if($itemIssue->status == 'O')
                                <a href="{{route('itemIssues.edit',$itemIssue)}}" class="btn btn-edit btn-sm mr-3" data-toggle="tooltip" data-placement="top" title="Issue Item" >
                                    <i class="fa fa-upload"></i>
                                </a>
                            @endif

                            @if($itemIssue->status == 'I')
                                <a href="{{route('itemIssues.reject',$itemIssue)}}" onclick="return confirm('Reject Request?')" class="btn btn-delete btn-sm" data-toggle="tooltip" data-placement="top" title="Reject Request" >
                                    <i class="far fa-window-close"></i>
                                </a>
                            @endif
                        @endcan
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

@endsection
