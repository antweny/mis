@extends('layouts.backend')
@section('title','User Activity Logs')
@section('content')


    <!-- Start Card -->
    <x-card title="User Activity Logs">

        <!-- Table Start -->
        <x-table.listing :collection="$activities">

            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Log name</th>
                <th scope="col">Action Performed</th>
                <th scope="col">Model</th>
                <th scope="col">Performed By</th>
                <th scope="col">Action Date</th>
            </x-slot>
            <!-- end table head -->

            <!-- start table head -->
            @foreach ($activities as $activity)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$activity->log_name}}</td>
                    <td class="text-center">{{$activity->description}}</td>
                    <td class="text-center">{{$activity->subject_type}}</td>
                    <td class="text-center">{{$activity->user->name}}</td>
                    <td class="text-center">{{humanDate($activity->created_at)}}</td>
                    <td class="text-center p-0">
                        <a class="text-dark" href="{{route('activityLogs.show',$activity)}}" title="View"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
            @endforeach
            <!-- end table body -->

        </x-table.listing>
        <!--end listing of collection -->

    </x-card>
    <!-- end card area -->

@endsection
