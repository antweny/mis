@extends('layouts.templates.store')
@section('title','Item Units List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Item Unit" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Item Units List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($itemUnits as $itemUnit)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$itemUnit->name}}</td>
                    <td  class="text-left">{{$itemUnit->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('item-unit_update')
                                <a href="{{route('itemUnits.edit',$itemUnit)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('item-unit_delete')
                                <form method="POST" action="{{route('itemUnits.destroy',$itemUnit)}}" class="form-horizontal" role="form" autocomplete="off">
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
    <x-modal id="new" title="New Item Unit">
        <!-- Start form -->
        <x-form.post action="itemUnits.store">
            <div class="form-group">
                <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.elements.textarea label="Descriptions" name="desc" id="desc" />
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form.post>
        <!-- end form -->
    </x-modal>
    <!-- end modal -->

@endsection
