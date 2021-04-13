@extends('layouts.backend')
@section('title','Employees List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('employee_create') <x-button.create label="New Employee" > {{route('employees.create')}}</x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Employees">
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
                        @can('employee_update')
                            <a href="{{route('employees.edit',$employee)}}" class="btn btn-edit btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit" >
                                <i class="fa fa-edit"></i>
                            </a>
                        @endcan
                        @can('employee_read')
                            <a href="{{route('employees.show',$employee)}}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="View" >
                                <i class="fa fa-eye"></i>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->


@endsection
