@extends('layouts.backend')
@section('title','Gender Series List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('participant_create') <x-button.create label="Add GDSS Participant"> {{route('genderSeriesParticipants.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Participants List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Participant</th>
                <th>Sex</th>
                <th>Age</th>
                <th>GDSS</th>
                <th>Organization</th>
                <th>Group</th>
                <th>Location</th>
                <th>Role</th>
            </x-slot>
            <!-- table body -->
{{--            @foreach ($allParticipants as $date => $genderSeriesParticipants)--}}
            @foreach($genderParticipants as $genderSeriesParticipant)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{ $genderSeriesParticipant->individual->name }}</a></td>
                    <td class="text-center">{{ $genderSeriesParticipant->individual->sex }}</td>
                    <td class="text-center">{{ $genderSeriesParticipant->individual->age_group }}</td>
                    <td class="text-left">{{ $genderSeriesParticipant->gender_series->topic }}</td>
                    <td class="text-center">{{ $genderSeriesParticipant->organization->org_name }}</td>
                    <td class="text-center">{{ $genderSeriesParticipant->individual_group->name }}</td>
                    <td class="text-center">{{ $genderSeriesParticipant->location->name }}</td>
                    <td class="text-center">{{ $genderSeriesParticipant->participant_role->name }}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('genderSeriesParticipants.edit',$genderSeriesParticipant)}}" class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                <i class="fa fa-edit"></i>
                            </a>
                            <form method="POST" action="{{route('genderSeriesParticipants.destroy',$genderSeriesParticipant)}}" class="form-horizontal" role="form" autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>


@endsection
