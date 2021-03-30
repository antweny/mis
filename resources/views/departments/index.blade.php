@extends('layouts.templates.hr')
@section('title','Departments List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('department_create') <x-button.create label="Add Department" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Departments List" >
        <!-- Table Start -->
        <x-table.listing :collection="$departments">
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
                                <x-button.edit>{{route('departments.edit',$department)}}</x-button.edit>
                            @endcan
                            @can('department_delete')
                                <x-button.delete>{{route('departments.destroy',$department)}}</x-button.delete>
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
                    <x-form.label name="Name <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Acronym" for="acronym" />
                        <x-form.input name="acronym" id="acronym" />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Manager" />
{{--                        <x-dropdown.manager />--}}
                    </div>
                </div>
                <div class="form-group">
                    <x-form.label name="Description" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
