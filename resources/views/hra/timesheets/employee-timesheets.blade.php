@extends('layouts.backend')
@section('title','Employee Timesheets')
@section('content')

    <x-row>
        <x-slot name="left">
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="My Timesheets">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Employee</th>
                <th scope="col">Date</th>
                <th scope="col">Time From</th>
                <th scope="col">Time To</th>
                <th scope="col">Hours</th>
                <th scope="col">Activity</th>
                <th scope="col">Description</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
                @foreach($timesheets as $timesheet)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-left">{{$timesheet->employee->name}}</td>
                        <td class="text-left">{{humanDate($timesheet->date)}}</td>
                        <td class="text-center">{{timeFormat($timesheet->time_from) }}</td>
                        <td class="text-center">{{ timeFormat($timesheet->time_to) }}</td>
                        <td class="text-center">{{ totalHours($timesheet->time_from,$timesheet->time_to) }}</td>
                        <td class="text-center">{{ $timesheet->activity->name }}</td>
                        <td  class="text-left">{{$timesheet->desc}}</td>
                        <td  class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="View" >
                                    <i class="fa fa-eye"></i>
                                </a>
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
