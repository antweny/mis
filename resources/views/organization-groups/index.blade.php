@extends('layouts.templates.organization')
@section('title','Organization Groups List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('organization-group_create') <x-button.create label="Add Organization Group" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Organization Groups List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($organizationGroups as $organizationGroup)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$organizationGroup->name}}</td>
                    <td  class="text-left">{{$organizationGroup->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('organization-group_update')
                                <a href="{{route('organizationGroups.edit',$organizationGroup)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('organization-group_delete')
                                <form method="POST" action="{{route('organizationGroups.destroy',$organizationGroup)}}" class="form-horizontal" role="form" autocomplete="off">
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
            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

    @can('organization-group_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Organization Group">
            <!-- Start form -->
            <x-form.post action="organizationGroups.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
                </div>
                <div class="form-group">
                    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" />
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
