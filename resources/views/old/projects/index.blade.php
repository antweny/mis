@extends('layouts.templates.project')
@section('title','Projects List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('project_create') <x-button.create label="Add Project"> {{route('projects.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Projects List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Project Name</th>
                <th>Donor</th>
                <th>Coordinator</th>
                <th>Status</th>
                <th>Start</th>
                <th>End</th>
                <th>Reporting Period</th>
            </x-slot>
            <!-- table body -->

            @foreach ($projects as $project)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$project->name}}</td>
                    <td class="text-left">{{$project->stakeholder->organization->org_name}}</td>
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $project->coordinator()->pluck('name')) !!} </td>
                    <td  class="text-center">{{$project->isActive}}</td>
                    <td  class="text-center">{{humanDate($project->start)}}</td>
                    <td  class="text-left">{{humanDate($project->end)}}</td>
                    <td  class="text-center">{{$project->report_period}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('project_update')
                                <a href="{{route('projects.edit',$project)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('project_delete')
                                <form method="POST" action="{{route('projects.destroy',$project)}}" class="form-horizontal" role="form" autocomplete="off">
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
