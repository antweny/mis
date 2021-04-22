@extends('layouts.backend')
@section('title','Outputs List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('output_create') <x-button.create label="Add Output" > {{route('outputs.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Outputs List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Year</th>
                <th scope="col">Outcome</th>
            </x-slot>
            <!-- table body -->
            @foreach ($outputs as $output)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$output->name}}</td>
                    <td  class="text-left">{{$output->desc}}</td>
                    <td  class="text-center">{{$output->year}}</td>
                    <td  class="text-left">{!! $output->outcome->outcome_name !!}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('output_update')
                                <x-button.edit>{{route('outputs.edit',$output)}}</x-button.edit>
                            @endcan
                            @can('output_read')
{{--                                <a href="{{route('outputs.destroy',$output)}}" class="btn btn-secondary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="View" >--}}
{{--                                    <i class="fa fa-eye"></i>--}}
{{--                                </a>--}}
                            @endcan
                            @can('output_delete')
                                <x-button.delete>{{route('outputs.destroy',$output)}}</x-button.delete>
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
