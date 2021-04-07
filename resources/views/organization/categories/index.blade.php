@extends('layouts.templates.organization')
@section('title','Organization Categories List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('organization-category_create') <x-button.create label="Add Organization Category" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Organization Categories List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Sort</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($organizationCategories as $organizationCategory)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$organizationCategory->name}}</td>
                    <td  class="text-center">{{$organizationCategory->sort}}</td>
                    <td  class="text-left">{{$organizationCategory->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('organization-category_update')
                                <x-button.edit>{{route('organizationCategories.edit',$organizationCategory)}}</x-button.edit>
                            @endcan
                            @can('organization-category_delete')
                                <x-button.delete>{{route('organizationCategories.destroy',$organizationCategory)}}</x-button.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('organization-category_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Organization Category">
            <!-- Start form -->
            <x-form.post action="organizationCategories.store">
                <div class="form-group">
                    <x-form.label Name="Name: <span class='star'>*</span>" />
                    <x-form.input name="name" id="name" for="name" req="required"   />
                </div>
                <div class="form-group">
                    <x-form.label Name="Sort" />
                    <x-form.input type="number" name="sort" id="sort" for="sort" />
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
