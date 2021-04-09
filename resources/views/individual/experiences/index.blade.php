@extends('layouts.backend')
@section('title','Experiences List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('experience_create')
                <x-button.create label="Add Experience"> {{route('experiences.create')}} </x-button.create>
{{--                <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>--}}
            @endcan
        </x-slot>
{{--        <x-slot name="right">--}}
{{--            @can('organization_view')--}}
{{--                <x-button.general label="Organizations List" class="btn btn-primary"> {{route('organizations.index')}} </x-button.general>--}}
{{--            @endcan--}}
{{--        </x-slot>--}}
    </x-row>

    <!-- Start Card -->
    <x-card title="Experiences List">
        <!-- Table Start -->
        <x-table.listing id="$experiences">
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
                            @can('experience_create')
                                <a href="{{route('experiences.edit',$experience)}} " class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('experience_create')
                                <form method="POST" action="{{route('experiences.destroy',$experience)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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


    @can('experience_create')
        <!-- Start Modal -->
        <x-modal id="import" title="Import Experience">
            <!-- Start form -->
            <x-form.post action="experiences.import">
                <div class="form-group">
                    <x-form.label name="Import File <span class='star'>*</span>"></x-form.label>
                    <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button.submit />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
