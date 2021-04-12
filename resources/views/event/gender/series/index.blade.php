@extends('layouts.backend')
@section('title','Gender Series List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('gender-series_create') <x-button.create label="Add Gender Series"> {{route('genderSeries.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Gender Series List">
        <!-- Table Start -->
        <x-table.listing id="table">

            <!-- table headers -->
            <x-slot name="thead" >
                <th>Topic</th>
                <th>Coordinator</th>
                <th>Facilitator</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                <th>Participants</th>
            </x-slot>
            <!-- table body -->

            @foreach ($genders as $genderSeries)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$genderSeries->topic}}</td>
                    <td class="text-left">{{$genderSeries->employee->name}}</td>
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $genderSeries->facilitator()->pluck('name')) !!} </td>
                    <td  class="text-center">{{humanDate($genderSeries->date)}}</td>
                    <td  class="text-left">{!! $genderSeries->gender_status  !!}</td>
                    <td  class="text-left">{!! $genderSeries->action  !!}</td>
                    <td  class="text-center">#</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('gender-series_update')
                                <a href="{{route('genderSeries.edit',$genderSeries)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('gender-series_delete')
                                <form method="POST" action="{{route('genderSeries.destroy',$genderSeries)}}" class="form-horizontal" role="form" autocomplete="off">
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

@endsection
