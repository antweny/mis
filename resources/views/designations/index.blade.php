@extends('layouts.templates.hr')
@section('title','Designations List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('designation_create') <x-button.create label="Add Designation" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Designations List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Acronym</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($designations as $designation)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$designation->name}}</td>
                    <td class="text-center">{{$designation->acronym}}</td>
                    <td  class="text-left">{{$designation->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('designation_update')
                                <a href="{{route('designations.edit',$designation)}}" class="btn btn-success mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('designation_delete')
                                <form method="POST" action="{{route('designations.destroy',$designation)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger btn-delete" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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

    @can('designation_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Designation">
            <!-- Start form -->
            <x-form.post action="designations.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"  />
                </div>
                <div class="form-group">
                    <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym"  />
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
