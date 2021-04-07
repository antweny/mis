@extends('layouts.templates.asset')
@section('title','Asset Types List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Asset Type" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Asset Types List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($assetTypes as $assetType)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{!is_null($assetType->parent_id) ? $assetType->parent->name.' > ' : '' }}{{$assetType->name}}</td>
                    <td  class="text-left">{{$assetType->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('asset-type_update')
                                <x-button.edit>{{route('assetTypes.edit',$assetType)}}</x-button.edit>
                            @endcan
                            @can('asset-type_delete')
                                <x-button.delete>{{route('assetTypes.destroy',$assetType)}}</x-button.delete>
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


    <!-- Start Modal -->
    <x-modal id="new" title="New Asset Type">
        <!-- Start form -->
        <x-form.post action="assetTypes.store">
            <div class="form-group">
                <x-form.label name="Name: <span class='star'>*</span>" />
                <x-form.input name="name" id="name" for="name" req="required"  />
            </div>
            <div class="form-group">
                <x-form.label name="Parent" />
                <x-dropdown.asset-type name="parent_id" />
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
