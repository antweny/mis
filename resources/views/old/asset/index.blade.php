@extends('layouts.templates.asset')
@section('title','Assets List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('asset_create')<x-button.create label="New Asset" modal="modal"> #new </x-button.create>@endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Assets List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Equipment Name</th>
                <th scope="col">Serial No.</th>
                <th scope="col">Type</th>
                <th scope="col">Code Number</th>
                <th scope="col">Unit</th>
                <th scope="col">Purchased Year</th>
                <th scope="col">Remarks</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($assets as $asset)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$asset->equipment->brand->name.' '.$asset->equipment->model}}</td>
                    <td  class="text-center">{{$asset->serial_no}}</td>
                    <td  class="text-center">
                        {{!is_null($asset->equipment->asset_type->parent_id) ? $asset->equipment->asset_type->parent->name.' > ' : '' }}{{$asset->equipment->asset_type->name}}
                    </td>
                    <td  class="text-center">{{$asset->code_number}}</td>
                    <td  class="text-center">{{$asset->item_unit->name}}</td>
                    <td  class="text-center">{{humanDate($asset->date)}}</td>
                    <td  class="text-left">{{$asset->remarks}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('asset_update')
                                <a href="{{route('assets.edit',$asset)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('asset_delete')
                                <form method="POST" action="{{route('assets.destroy',$asset)}}" class="form-horizontal" role="form" autocomplete="off">
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
            <!-- end table body -->

        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

    <!-- Start Modal -->
    <x-modal id="new" title="New Asset">

        <!-- Start form -->
        <x-form.post action="assets.store">

            <div class="form-group row">
                <div class="col-md-6">
                    <x-form.elements.label name="Equipment <span class='star'>*</span>" />
                    <x-dropdown.equipment  req="required"/>
                </div>
                <div class="col-md-6">
                    <x-form.elements.input label="Serial No. <span class='star'>*</span>" name="serial_no" id="serial_no" for="serial_no" />
                </div>
            </div>

            <div class="form-group">
                <x-form.elements.input label="Code No." name="code_number" id="code_number" for="code_number"/>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <x-form.elements.label name="Unit" />
                    <x-dropdown.item-unit  />
                </div>
                <div class="col-md-6">
                    <x-form.elements.input label="Purchased Date" type="date" name="date" id="date" for="date" />
                </div>
            </div>

            <div class="form-group">
                <x-form.elements.textarea label="Remarks" name="remarks" id="remarks" />
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>

        </x-form.post>
        <!-- end form -->

    </x-modal>
    <!-- end modal -->






@endsection
