@extends('layouts.backend')
@section('title','Gender Series List')
@section('content')
    <!-- Start Card -->
    <x-card title="Participants List">
        <x-slot name="cardButton">
            @can('participant_create')
                <x-button.create label="Add GDSS Participant"> {{route('genderSeriesParticipants.create')}} </x-button.create>
            @endcan
        </x-slot>


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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('event_update')
                                    <x-button.edit>{{route('genderSeriesParticipants.edit',$genderSeriesParticipant)}}</x-button.edit>
                                @endcan
                                @can('event_delete')
                                    <x-button.delete>{{route('genderSeriesParticipants.destroy',$genderSeriesParticipant)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>


@endsection
