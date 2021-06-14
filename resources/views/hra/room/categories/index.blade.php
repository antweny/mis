@extends('layouts.backend')
@section('title','Room Categories List')
@section('content')

    <!-- Start Card -->
    <x-card title="Room Categories List">

        <x-slot name="cardButton">
            @can('room-category_create')<x-button.create label="Add Room Category" modal="modal"> #new </x-button.create>@endcan
        </x-slot>
        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('room-category_update')
                                    <x-button.edit>{{route('roomCategories.edit',$roomCategory)}}</x-button.edit>
                                @endcan
                                @can('room-category_delete')
                                    <x-button.delete>{{route('roomCategories.destroy',$roomCategory)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    <!-- Start Modal -->
    <x-modal id="new" title="New Room Category">
        <!-- Start form -->
        <x-form action="{{route('roomCategories.store')}}">
            <div class="form-group">
                <x-form.label name="Name" star="true"/>
                <x-form.input name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.label name="Description" />
                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            <div class="form-group text-right">
                <x-button/>
            </div>
        </x-form>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
