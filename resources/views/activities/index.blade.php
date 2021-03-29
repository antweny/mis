@extends('layouts.templates.op')
@section('title','Activities List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('activity_create') <x-button.create label="Add Activity"> {{route('activities.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Activities List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Parent</th>
                <th scope="col">Outcome</th>
                <th scope="col">Staff</th>
                <th scope="col">Start Date</th>
                <th scope="col">Due Date</th>
                <th scope="col">Status</th>
            </x-slot>
            <!-- table body -->
            @foreach ($activities as $activity)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$activity->name}}</td>
                    <td  class="text-left">{{$activity->desc}}</td>
                    <td  class="text-center">{{$activity->parent->name}}</td>
                    <td  class="text-center">{!! $activity->output->name !!}</td>
                    <td  class="text-center">{{ $activity->employee->name }}</td>
                    <td  class="text-center">{{humanDate($activity->start_date )}}</td>
                    <td  class="text-center">{{humanDate($activity->due_date )}}</td>
                    <td  class="text-center">{{ $activity->status }}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('activity_update')
                                <a href="{{route('activities.edit',$activity)}}" class="btn btn-edit btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('activity_read')
                                <a href="{{route('activities.destroy',$activity)}}" class="btn btn-secondary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="View" >
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan
                            @can('activity_delete')
                                <form method="POST" action="{{route('activities.destroy',$activity)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete " onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endcan
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
