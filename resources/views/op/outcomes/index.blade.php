@extends('layouts.backend')
@section('title','Outcomes List')
@section('content')

    <!-- Start Card -->
    <x-card title="Outcomes List">

        <x-slot name="cardButton">
            @can('outcome_create') <x-button.create label="Add Outcome"> {{route('outcomes.create')}} </x-button.create> @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Year</th>
                <th scope="col">Department</th>
            </x-slot>
            <!-- table body -->
            @foreach ($outcomes as $outcome)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$outcome->name}}</td>
                    <td  class="text-left">{{$outcome->desc}}</td>
                    <td  class="text-center">{{$outcome->year}}</td>
                    <td  class="text-center">{{$outcome->department->name}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('outcome_update')
                                    <x-button.edit>{{route('outcomes.edit',$outcome)}}</x-button.edit>
                                @endcan
                                @can('outcome_delete')
                                    <x-button.delete>{{route('outcomes.destroy',$outcome)}}</x-button.delete>
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
