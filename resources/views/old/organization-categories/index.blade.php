@extends('layouts.templates.organization')
@section('title','Organization Categories List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('organization-category_create') <x-button.create label="Add Organization Category" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Organization Categories List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Sort</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($organizationCategories as $organizationCategory)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$organizationCategory->name}}</td>
                    <td  class="text-center">{{$organizationCategory->sort}}</td>
                    <td  class="text-left">{{$organizationCategory->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('organization-category_update')
                                <a href="{{route('organizationCategories.edit',$organizationCategory)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('organization-category_delete')
                                <form method="POST" action="{{route('organizationCategories.destroy',$organizationCategory)}}" class="form-horizontal" role="form" autocomplete="off">
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

    @can('organization-category_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Organization Category">
            <!-- Start form -->
            <x-form.post action="organizationCategories.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
                </div>
                <div class="form-group">
                    <x-form.elements.input label="Sort" type="number" name="sort" id="sort" for="sort" />
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
