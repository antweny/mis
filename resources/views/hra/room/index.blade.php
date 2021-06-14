@extends('layouts.backend')
@section('title','Rooms List')
@section('content')

    <!-- Start Card -->
    <x-card title="Rooms List">

        <x-slot name="cardButton">
            @can('room_create')<x-button.create label="Add Room" modal="modal"> #new </x-button.create>@endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('room_update')
                                    <x-button.edit>{{route('rooms.edit',$room)}}</x-button.edit>
                                @endcan
                                @can('room_delete')
                                    <x-button.delete>{{route('rooms.destroy',$room)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>


    @can('room_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Room">
            <!-- Start form -->
            <x-form action="{{route('rooms.store')}}">
                <div class="form-group">
                    <x-form.label name="Room Wing" star="true" />
                    <x-dropdown.room-category req="required" />
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Name" star="true" />
                        <x-form.input name="name" id="name" for="name"   />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Room No" />
                        <x-form.input type="number" name="number" id="number" for="number"   />
                    </div>
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
