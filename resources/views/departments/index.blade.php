@extends('layouts.templates.hr')
@section('title','Departments List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('department_create') <x-button.create label="Add Department" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Departments List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Acronym</th>
                <th scope="col">Manager</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($departments as $department)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$department->name}}</td>
                    <td class="text-center">{{$department->acronym}}</td>
                    <td class="text-center">{{ $department->employee->name }}</td>
                    <td  class="text-left">{{$department->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('department_update')
                                <a href="{{route('departments.edit',$department)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('department_delete')
                                <form method="POST" action="{{route('departments.destroy',$department)}}" class="form-horizontal" role="form" autocomplete="off">
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

    @can('department_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Department">
            <!-- Start form -->
            <x-form.post action="departments.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"  />
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym"  />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.label name="Manager" />
                        <x-dropdown.manager />
                    </div>
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
