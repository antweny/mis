@extends('layouts.backend')
@section('title','Employees List')
@section('content')

    <!-- Start Card -->
    <x-card title="Employees">

        <x-slot name="cardButton">
            @can('employee_create') <x-button.create label="New Employee" > {{route('employees.create')}}</x-button.create> @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Job Post</th>
                <th scope="col">Active</th>
                <th scope="col">Manager</th>
            </x-slot>
            <!-- end table head -->
            <!-- table body -->
            @foreach ($employees as $employee)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$employee->name}}</td>
                    <td  class="text-center">{{$employee->mobile}}</td>
                    <td  class="text-center">{{$employee->email}}</td>
                    <td  class="text-center">{{$employee->department->name}}</td>
                    <td  class="text-left">{{$employee->designation->name}}</td>
                    <td  class="text-center">{!! $employee->status !!}</td>
                    <td class="text-center">{{$employee->department->employee->name}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('employee_view')
                                    <a href="{{route('employees.show',$employee)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="View" >
                                        <i class="fa fa-eye"></i> View
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcan
                                @can('employee_update')
                                    <x-button.edit>{{route('employees.edit',$employee)}}</x-button.edit>
                                @endcan
                                @can('employee_delete')
                                    <x-button.delete>{{route('employees.destroy',$employee)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->


@endsection
