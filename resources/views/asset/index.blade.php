@extends('layouts.backend')
@section('title','Assets List')
@section('content')
    <!-- Start Card -->
    <x-card title="Assets List">

        <x-slot name="cardButton">
            @can('asset_create')<x-button.create label="New Asset" modal="modal"> #new </x-button.create>@endcan
        </x-slot>


        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('asset_update')
                                    <x-button.edit>{{route('assets.edit',$asset)}}</x-button.edit>
                                @endcan
                                @can('asset_delete')
                                    <x-button.delete>{{route('assets.destroy',$asset)}}</x-button.delete>
                                @endcan
                            </div>
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
        <x-form action="{{route('assets.store')}}">

            <div class="form-group row">
                <div class="col-md-6">
                    <x-form.label name="Equipment" star="true" />
                    <x-dropdown.equipment  req="required"/>
                </div>
                <div class="col-md-6">
                    <x-form.label name="Serial No" star="true" />
                    <x-form.input name="serial_no" id="serial_no" for="serial_no" />
                </div>
            </div>
            <div class="form-group">
                <x-form.label name="Code No." />
                <x-form.input name="code_number" id="code_number" for="code_number"/>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <x-form.label name="Unit" />
                    <x-dropdown.item-unit  />
                </div>
                <div class="col-md-6">
                    <x-form.label name="Aquisation Date" />
                    <x-form.input type="date" name="date" id="date" for="date" />
                </div>
            </div>
            <div class="form-group">
                <x-form.label name="Remarks" />
                <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror">{{old('remarks')}}</textarea>
                @error('remarks') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form>
        <!-- end form -->

    </x-modal>
    <!-- end modal -->






@endsection
