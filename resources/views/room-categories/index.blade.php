@extends('layouts.templates.hr')
@section('title','Room Categories List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Room Category" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Room Categories List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($roomCategories as $roomCategory)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$roomCategory->name}}</td>
                    <td  class="text-left">{{$roomCategory->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('room-category_update')
                                <a href="{{route('roomCategories.edit',$roomCategory)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('room-category_delete')
                                <form method="POST" action="{{route('roomCategories.destroy',$roomCategory)}}" class="form-horizontal" role="form" autocomplete="off">
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
    <x-modal id="new" title="New Room Category">
        <!-- Start form -->
        <x-form.post action="roomCategories.store">
            <div class="form-group">
                <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.elements.textarea label="Descriptions" name="desc" id="desc" />
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
