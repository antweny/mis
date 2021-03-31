@extends('layouts.templates.project')
@section('title','Projects List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('project_create')
                <x-button.create label="Add Project"> {{route('projects.create')}} </x-button.create>
            @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Projects List">
        <!-- Table Start -->
        <x-table.listing id="table">
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
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $project->coordinator->pluck('name')) !!} </td>
                    <td  class="text-center">{{$project->isActive}}</td>
                    <td  class="text-center">{{humanDate($project->start)}}</td>
                    <td  class="text-left">{{humanDate($project->end)}}</td>
                    <td  class="text-center">{{$project->report_period}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('project_update')
                                <x-button.edit>{{route('projects.edit',$project)}}</x-button.edit>
                            @endcan
                            @can('project_delete')
                                <x-button.delete>{{route('projects.destroy',$project)}}</x-button.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>


@endsection
