@extends('layouts.backend')
@section('title','Thematic Areas List')
@section('content')

    <!-- Start Card -->
    <x-card title="Thematic Areas List">

        <x-slot name="cardButton">
            @can('thematic-area_create') <x-button.create label="Add Thematic Area" modal="modal"> #new </x-button.create> @endcan
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
            @foreach ($thematicAreas as $thematicArea)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$thematicArea->name}}</td>
                    <td  class="text-center">{{$thematicArea->parent->name}}</td>
                    <td  class="text-left">{{$thematicArea->desc}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('thematic-area_update')
                                    <x-button.edit>{{route('thematicAreas.edit',$thematicArea)}}</x-button.edit>
                                @endcan
                                @can('thematic-area_delete')
                                    <x-button.delete>{{route('thematicAreas.destroy',$thematicArea)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('thematic-area_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Thematic Area">
            <!-- Start form -->
                <x-form action="{{route('thematicAreas.store')}}">
                    <div class="form-group">
                        <x-form.label name="Name" star="true" />
                        <x-form.input name="name" id="name" for="name" req="required"   />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Parent" />
                        <x-dropdown.thematic-sector />
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
