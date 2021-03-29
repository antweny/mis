@extends('layouts.templates.location')
@section('title','Locations List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Location" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Locations List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Descriptions</th>
            </x-slot>

            <!-- table body -->
            @foreach ($locations as $location)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$location->name}}</td>
                    <td  class="text-center">{{$location->parent->name}}</td>
                    <td  class="text-left">{{$location->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('location_update')
                                <a href="{{route('locations.edit',$location)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('location_delete')
                                <form method="POST" action="{{route('locations.destroy',$location)}}" class="form-horizontal" role="form" autocomplete="off">
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


    <!-- Start Modal -->
    <x-modal id="new" title="New Location">
        <!-- Start form -->
        <x-form.post action="locations.store">
            <div class="form-group">
                <x-form.elements.input label="Model Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.elements.label name="Parent" />
                <x-dropdown.location name="parent_id" />
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


@endsection
