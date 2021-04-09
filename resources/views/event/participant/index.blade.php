@extends('layouts.backend')
@section('title','Participants List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Event Participant"> {{route('participants.create')}} </x-button.create>
{{--            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>--}}
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Participants List">
        <!-- Table Start -->
        <x-table.listing id="$participants">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Participant</th>
                <th>Sex</th>
                <th>Age</th>
                <th>Event</th>
                <th>Organization</th>
                <th>Group</th>
                <th>Level</th>
                <th>Date</th>
                <th>Location</th>
                <th>Role</th>
            </x-slot>
            <!-- table body -->
{{--            @foreach ($allParticipants as $date => $participants)--}}
                @foreach($participants as $participant)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-left">{{ $participant->individual->name }}</a></td>
                        <td class="text-center">{{ $participant->individual->sex }}</td>
                        <td class="text-center">{{ $participant->individual->age_group }}</td>
                        <td class="text-left"><a href="{{route('participants.index',$participant->event_id)}}">{{ $participant->event->name }}</a> </td>
                        <td class="text-center">{{ $participant->organization->org_name }}</td>
                        <td class="text-center">{{ $participant->individual_group->name }}</td>
                        <td class="text-center">{{ $participant->participant_level}}</td>
                        <td class="text-center">{{ humanDate($participant->date)}}</td>
                        <td class="text-center">{{ $participant->location->name }}</td>
                        <td class="text-center">{{ $participant->participant_role->name }}</td>
                        <td  class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{route('participants.edit',$participant)}}" class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form method="POST" action="{{route('participants.destroy',$participant)}}" class="form-horizontal" role="form" autocomplete="off">
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

    <!-- Start Modal -->
    <x-modal id="import" title="Import Participant">
        <!-- Start form -->
        <x-form.post action="participants.import">
            <div class="form-group">
                <x-form.label name="Import File <span class='star'>*</span>" for="imported_file" />
                <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
            </div>
            <div class="form-group text-right">
                <x-button.submit />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
