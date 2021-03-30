@extends('layouts.templates.hr')
@section('title','Rooms List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Room" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Rooms List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Room Category</th>
                <th>Room Name</th>
                <th>Room Number</th>
            </x-slot>
            <!-- table body -->
            @foreach ($rooms as $room)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$room->room_category->name}}</td>
                    <td class="text-left">{{$room->name}}</td>
                    <td class="text-center">{{$room->number}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('room_update')
                                <a href="{{route('rooms.edit',$room)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('room_delete')
                                <form method="POST" action="{{route('rooms.destroy',$room)}}" class="form-horizontal" role="form" autocomplete="off">
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

    <!-- Start Modal -->
    <x-modal id="new" title="New Room">
        <!-- Start form -->
        <x-form.post action="rooms.store">
            <div class="form-group">
                <x-form.elements.label name="Room Wing: <span class='star'>*</span>" />
                <x-dropdown.room-category req="required" />
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <x-form.elements.input label="Name" name="name" id="name" for="name"   />
                </div>
                <div class="col-md-6">
                    <x-form.elements.input type="number" label="Room No." name="number" id="number" for="number"   />
                </div>
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
