@extends('layouts.backend')
@section('title','Gender Series List')
@section('content')
    <!-- Start Card -->
    <x-card title="Gender Series List">

        <x-slot name="cardButton">
            @can('gender-series_create') <x-button.create label="Add Gender Series"> {{route('genderSeries.create')}} </x-button.create> @endcan
        </x-slot>

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
                    <td  class="text-center">{!! $genderSeries->gender_status  !!}</td>
                    <td  class="text-left">{!! $genderSeries->action  !!}</td>
                    <td  class="text-center">#</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('gender-series_update')
                                    <x-button.edit>{{route('genderSeries.edit',$genderSeries)}}</x-button.edit>
                                @endcan
                                @can('gender-series_delete')
                                    <x-button.delete>{{route('genderSeries.destroy',$genderSeries)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>

@endsection
