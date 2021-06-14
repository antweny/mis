@extends('layouts.backend')
@section('title','Visitors List')
@section('content')

    <!-- Start Card -->
    <x-card title="Visitors">

        <x-slot name="cardButton">
            @can('visitor_create') <x-button.create label="New Visitor" > {{route('visitors.create')}}</x-button.create> @endcan
        </x-slot>

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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('visitor_update')
                                    <x-button.edit>{{route('visitors.edit',$visitor)}}</x-button.edit>
                                @endcan
                                @can('visitor_delete')
                                    <x-button.delete>{{route('visitors.destroy',$visitor)}}</x-button.delete>
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
