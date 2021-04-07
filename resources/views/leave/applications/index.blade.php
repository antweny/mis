@extends('layouts.backend')
@section('title','My Leave Applications')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Apply Leave"> {{route('leaveApplications.create')}} </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="My Leave Applications">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Send To</th>
                <th>From</th>
                <th>To</th>
                <th>Days</th>
                <th>App Date</th>
                <th>Type</th>
                <th>Reason</th>
                <th>Status</th>
            </x-slot>

            <!-- table body -->
            @foreach ($leaveApplications as $leaveApplication)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$leaveApplication->approver->name}}</td>
                    <td class="text-center">{{$leaveApplication->start}}</td>
                    <td class="text-center">{{$leaveApplication->end}}</td>
                    <td class="text-center">{{$leaveApplication->days}}</td>
                    <td class="text-center">{{$leaveApplication->created}}</td>
                    <td class="text-center">{{$leaveApplication->leave_type->name}}</td>
                    <td class="text-center">{{$leaveApplication->desc}}</td>
                    <td class="text-center">{!! $leaveApplication->leave_status !!}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @if($leaveApplication->status == 'Sub')
                                <x-button.edit> {{route('leaveApplications.edit',$leaveApplication)}} </x-button.edit>
                                <x-button.delete> {{route('leaveApplications.destroy',$leaveApplication)}} </x-button.delete>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>














@endsection
