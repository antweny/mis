@extends('layouts.templates.hr')
@section('title','Visitors List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('visitor_create') <x-button.create label="New Visitor" > {{route('visitors.create')}}</x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Visitors">
        <!-- Table Start -->
        <x-table.listing :collection="$visitors">

            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Date</th>
                <th scope="col">Fullname</th>
                <th scope="col">Organization</th>
                <th scope="col">From</th>
                <th scope="col">Staff</th>
                <th scope="col">Reason</th>
                <th scope="col">Check In</th>
                <th scope="col">Check Out</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($visitors as $visitor)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{humanDate($visitor->date)}}</td>
                    <td class="text-left">{{$visitor->individual->name}}</td>
                    <td  class="text-center">{{$visitor->organization->name}}</td>
                    <td  class="text-left">{{$visitor->location->name}}</td>
                    <td  class="text-center">{{$visitor->employee->name}}</td>
                    <td  class="text-center">{{$visitor->desc}}</td>
                    <td  class="text-center">{{$visitor->check_in}}</td>
                    <td  class="text-center">{{$visitor->check_out}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('visitor_update')
                                <a href="{{route('visitors.edit',$visitor)}}" class="btn btn-edit btn-sm mr-2" data-toggle="tooltip" data-placement="top" title="Edit" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('visitor_delete')
                                <form method="POST" action="{{route('visitors.destroy',$visitor)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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


@endsection
