@extends('layouts.templates.event')
@section('title','Event Categories List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Event Category" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Event Categories List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Sort</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($eventCategories as $eventCategory)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$eventCategory->name}}</td>
                    <td  class="text-center">{{$eventCategory->sort}}</td>
                    <td  class="text-left">{{$eventCategory->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('event-category_update')
                                <a href="{{route('eventCategories.edit',$eventCategory)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('event-category_delete')
                                <form method="POST" action="{{route('eventCategories.destroy',$eventCategory)}}" class="form-horizontal" role="form" autocomplete="off">
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
    <x-modal id="new" title="New Event Category">
        <!-- Start form -->
        <x-form.post action="eventCategories.store">
            <div class="form-group">
                <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.elements.input label="Sort" type="number" name="sort" id="sort" for="sort" />
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
