@extends('layouts.templates.op')
@section('title','Thematic Areas List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Thematic Area" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Thematic Areas List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Descriptions</th>
            </x-slot>

            <!-- table body -->
            @foreach ($thematicAreas as $thematicArea)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$thematicArea->name}}</td>
                    <td  class="text-center">{{$thematicArea->parent->name}}</td>
                    <td  class="text-left">{{$thematicArea->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('thematic-area_update')
                                <a href="{{route('thematicAreas.edit',$thematicArea)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('thematic-area_delete')
                                <form method="POST" action="{{route('thematicAreas.destroy',$thematicArea)}}" class="form-horizontal" role="form" autocomplete="off">
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
    <x-modal id="new" title="New Thematic Area">
        <!-- Start form -->
            <x-form.post action="thematicAreas.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
                </div>
                <div class="form-group">
                    <x-form.elements.label name="Parent" />
                    <x-dropdown.thematic-sector />
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
