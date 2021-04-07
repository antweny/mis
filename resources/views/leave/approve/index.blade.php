@extends('layouts.templates.hr')
@section('title','Approve Leaves')
@section('content')

    <!-- Start Card -->
    <x-card title="Leave Request To Approve">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>From To</th>
                <th>From</th>
                <th>To</th>
                <th>Days</th>
                <th>App Date</th>
                <th>Type</th>
                <th>Status</th>
            </x-slot>

            <!-- table body -->
            @foreach ($leaveApproves as $leaveApprove)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$leaveApprove->employee->name}}</td>
                    <td class="text-center">{{$leaveApprove->start}}</td>
                    <td class="text-center">{{$leaveApprove->end}}</td>
                    <td class="text-center">{{$leaveApprove->total_days}}</td>
                    <td class="text-center">{{$leaveApprove->created}}</td>
                    <td class="text-center">{{$leaveApprove->leave_type->name}}</td>
                    <td class="text-center">{!! $leaveApprove->leave_status !!}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('approve-leave')
                                <a href="{{route('leaveApproves.show',$leaveApprove)}}" class="btn btn-edit btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Review" >
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>



@endsection
