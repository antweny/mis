@extends('layouts.templates.event')
@section('title','Events List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Event"> {{route('events.create')}} </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Events List">
        <!-- Table Start -->
        <x-table.listing>
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
                        <div class="btn-group btn-group-sm">

                            @can('event_update')
                                <a href="{{route('events.edit',$event)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('event_delete')
                                <form method="POST" action="{{route('events.destroy',$event)}}" class="form-horizontal" role="form" autocomplete="off">
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
