@extends('layouts.backend')
@section('title','Locations List')
@section('content')

    <!-- Start Card -->
    <x-card title="Locations List">

        <x-slot name="cardButton">
            @can('location_create')
                <x-button.create label="Add Location" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>


        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Parent</th>
                <th scope="col">Descriptions</th>
            </x-slot>

            <!-- table body -->
            @foreach ($locations as $location)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$location->name}}</td>
                    <td  class="text-center">{{$location->parent->name}}</td>
                    <td  class="text-left">{{$location->desc}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('location_update')
                                    <x-button.edit>{{route('locations.edit',$location)}}</x-button.edit>
                                @endcan
                                @can('location_delete')
                                    <x-button.delete>{{route('locations.destroy',$location)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>


    @can('location_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Location">
            <!-- Start form -->
            <x-form action="{{route('locations.store')}}">
                <div class="form-group">
                    <x-form.label name="Name" star="true" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Parent" />
                    <x-dropdown.location name="parent_id" />
                </div>
                <div class="form-group">
                    <x-form.label name="Description" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
