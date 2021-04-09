@extends('layouts.backend')
@section('title','Event Categories List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('event_category') <x-button.create label="Add Event Category" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Event Categories List">
        <!-- Table Start -->
        <x-table.listing id="table">
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
                                <x-button.edit>{{route('eventCategories.edit',$eventCategory)}}</x-button.edit>
                            @endcan
                            @can('event-category_delete')
                                <x-button.delete>{{route('eventCategories.destroy',$eventCategory)}}</x-button.delete>
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
                <x-form.label name="Name: <span class='star'>*</span>" />
                <x-form.input name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.label name="Sort" />
                <x-form.input type="number" name="sort" id="sort" for="sort" />
            </div>
            <div class="form-group">
                <x-form.label name="Description" />
                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            <div class="form-group text-right">
                <x-button.submit />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
