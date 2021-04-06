@extends('layouts.templates.individual')
@section('title','Resource Persons List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('resource-people_create') <x-button.create label="Add Resource Person"> {{route('resourcePeople.create')}} </x-button.create> @endcan
{{--            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general> @endcan--}}
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Resource People List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Full Name</th>
                <th scope="col">Mobile</th>
                <th scope="col">Group</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($resourcePeople as $resourcePerson)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{ $resourcePerson->individual->name }}</td>
                    <td class="text-center">{{ $resourcePerson->individual->mobile }}</td>
                    <td class="text-center">{{ $resourcePerson->individual_group->name }}</td>
                    <td class="text-center">{{ $resourcePerson->start }}</td>
                    <td class="text-center">{!!  $resourcePerson->end !!} </td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('resource-people_update')
                                <x-button.edit>{{route('resourcePeople.edit',$resourcePerson)}}</x-button.edit>
                            @endcan
                            @can('resource-people_delete')
                                <x-button.delete>{{route('resourcePeople.destroy',$resourcePerson)}}</x-button.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
        @endforeach
        <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>

    @can('resource-people_create')
        <!-- Start Modal -->
        <x-modal id="import" title="Import Resource Person">
            <!-- Start form -->
            <x-form.post action="resourcePeople.import">
                <div class="form-group">
                    <x-form.label name="Import File <span class='star'>*</span>" />
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
