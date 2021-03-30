@extends('layouts.templates.store')
@section('title','Items List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Item"> {{route('items.create')}} </x-button.create>
            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Items List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Category</th>
                <th>Unit</th>
                <th>Unit Quantity</th>
                <th>Order Level</th>
                <th>Remain Quantity</th>
                <th>Status</th>
            </x-slot>
            <!-- table body -->
            @foreach ($items as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$item->name}}</td>
                    <td class="text-center">{{$item->item_category->name}}</td>
                    <td class="text-center">{{$item->item_unit->name}}</td>
                    <td class="text-center">{{$item->unit_quantity}}</td>
                    <td class="text-center">{{$item->order_level}}</td>
                    <td class="text-center">{{$item->quantity}}</td>
                    <td class="text-center">{!!$item->status!!}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('item_update')
                                <a href="{{route('items.edit',$item)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('item_delete')
                                <form method="POST" action="{{route('items.destroy',$item)}}" class="form-horizontal" role="form" autocomplete="off">
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
    <x-modal id="import" title="Import Item">
        <!-- Start form -->
        <x-form.post action="items.import">
            <div class="form-group">
                <x-form.elements.label name="Import File <span class='star'>*</span>" for="imported_file" />
                <x-form.elements.input type="file" name="imported_file" id="imported_file" required="required"/>
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->


@endsection
