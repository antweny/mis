@extends('layouts.backend')
@section('title','Item Categories List')
@section('content')

    <!-- Start Card -->
    <x-card title="Item Categories List">

        <x-slot name="cardButton">
            @can('item-category_create')
                <x-button.create label="Add Item Category" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Sort</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($itemCategories as $itemCategory)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$itemCategory->name}}</td>
                    <td  class="text-center">{{$itemCategory->sort}}</td>
                    <td  class="text-left">{{$itemCategory->desc}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('item-category_update')
                                    <x-button.edit>{{route('itemCategories.edit',$itemCategory)}}</x-button.edit>
                                @endcan
                                @can('item-category_delete')
                                    <x-button.delete>{{route('itemCategories.destroy',$itemCategory)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    <!-- Start Modal -->
    <x-modal id="new" title="New Item Category">
        <!-- Start form -->
        <x-form action="{{route('itemCategories.store')}}">
            <div class="form-group">
                <x-form.label name="Name" star="true" />
                <x-form.input name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.label name="Sort" />
                <x-form.input type="number" name="sort" id="sort" for="sort" />
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

@endsection
