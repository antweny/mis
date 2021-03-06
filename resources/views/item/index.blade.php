@extends('layouts.backend')
@section('title','Items List')
@section('content')

    <!-- Start Card -->
    <x-card title="Items List">

        <x-slot name="cardButton">
            @can('item_create')
                <x-button.create label="Add Item"> {{route('items.create')}} </x-button.create>
            {{--            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>--}}
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('item_update')
                                    <x-button.edit>{{route('items.edit',$item)}}</x-button.edit>
                                @endcan
                                @can('item_delete')
                                    <x-button.delete>{{route('items.destroy',$item)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>


    <!-- Start Modal -->
    <x-modal id="import" title="Import Item">
        <!-- Start form -->
        <x-form action="{{route('items.import')}}">
            <div class="form-group">
                <x-form.label name="Import File" star="true" for="imported_file" />
                <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
            </div>
            <div class="form-group text-right">
                <x-button.submit />
            </div>
        </x-form>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->


@endsection
