@extends('layouts.templates.kc')
@section('title','KC Members List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('experience_create')
                <x-button.create label="Add Experience"> {{route('experiences.create')}} </x-button.create>
                <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>
            @endcan
        </x-slot>
        <x-slot name="right">
            @can('organization_view')
                <x-button.general label="KC List" class="btn btn-primary"> {{route('knowledgeCenters.index')}} </x-button.general>
            @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="KC Members List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Full Name</th>
                <th scope="col">Sex</th>
                <th scope="col">Age Group</th>
                <th scope="col">Mobile</th>
                <th scope="col">Title</th>
                <th scope="col">Organization/Group</th>
            </x-slot>
            <!-- end table head -->
            <!-- table body -->
            @foreach ($experiences as $experience)
                <tr>
                    <td class="text-left">{{$loop->iteration}}</td>
                    <td class="text-left">{{ $experience->individual->name }}</td>
                    <td class="text-center">{{ $experience->individual->sex }}</td>
                    <td class="text-center">{{ $experience->individual->age_group }}</td>
                    <td class="text-center">{{ $experience->individual->mobile }}</td>
                    <td class="text-center">{{ $experience->job_title->name }}</td>
                    <td class="text-center">{!! $experience->organization->name_click !!} </td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @permission('experience_create')
                                <a href="{{route('experiences.edit',$experience)}} " class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endpermission
                            @permission('experience_create')
                                <form method="POST" action="{{route('experiences.destroy',$experience)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endpermission

                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>

@endsection
