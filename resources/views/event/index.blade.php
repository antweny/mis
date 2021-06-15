@extends('layouts.backend')
@section('title','Events List')
@section('content')

    <!-- Start Card -->
    <x-card title="Events List">

        <x-slot name="cardButton">
            @can('event_update')
                <x-button.create label="Add Event"> {{route('events.create')}} </x-button.create>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Category</th>
                <th>Organisers</th>
                <th>Facilitators</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Participants</th>
            </x-slot>
            <!-- table body -->

            @foreach ($events as $event)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$event->name}}</td>
                    <td class="text-left">{{$event->event_category->name}}</td>
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $event->organiser()->pluck('name')) !!}</td>
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $event->facilitator()->pluck('name')) !!} </td>
                    <td  class="text-center">{{$event->start}}</td>
                    <td  class="text-left">{{$event->end}}</td>
                    <td  class="text-left">{!! $event->status  !!}</td>
                    <td  class="text-center"><a href="{{route('participants.index',$event)}}">{!! $event->participant_count  !!}</a> </td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('event_update')
                                    <x-button.edit>{{route('events.edit',$event)}}</x-button.edit>
                                @endcan
                                @can('event_delete')
                                    <x-button.delete>{{route('events.destroy',$event)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>

@endsection
