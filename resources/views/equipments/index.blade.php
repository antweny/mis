@extends('layouts.templates.asset')
@section('title','Equipments List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('equipment_create') <x-button.create label="Add Equipment" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Equipments List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Type</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($equipments as $equipment)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$equipment->brand->name}}</td>
                    <td class="text-center">{{$equipment->model}}</td>
                    <td class="text-center">{{ $equipment->asset_type->name }}</td>
                    <td  class="text-left">{{$equipment->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('equipment_update')
                                <x-button.edit>{{route('equipments.edit',$equipment)}}</x-button.edit>
                            @endcan
                            @can('equipment_delete')
                                <x-button.delete>{{route('equipments.destroy',$equipment)}}</x-button.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

    @can('equipment_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Equipment">
            <!-- Start form -->
            <x-form.post action="equipments.store">

                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Brand <span class='star'>*</span>" />
                        <x-dropdown.brand req="required" />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Model: <span class='star'>*</span>" />
                        <x-form.input name="model" id="model" for="model" req="required"  />
                    </div>
                </div>

                <div class="form-group">
                    <x-form.label name="Type <span class='star'>*</span>" />
                    <x-dropdown.asset-type req="required" />
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
    @endcan

@endsection
