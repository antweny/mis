@extends('layouts.templates.asset')
@section('title','Brands List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('brand_create') <x-button.create label="Add Brand" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Brands List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($brands as $brand)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$brand->name}}</td>
                    <td  class="text-left">{{$brand->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('brand_update')
                                <x-button.edit>{{route('brands.edit',$brand)}}</x-button.edit>
                            @endcan
                            @can('brand_delete')
                                <x-button.delete>{{route('brands.destroy',$brand)}}</x-button.delete>
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


    @can('brand_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Brand">
            <!-- Start form -->
            <x-form.post action="brands.store">
                <div class="form-group">
                    <x-form.label name="Name: <span class='star'>*</span>" />
                    <x-form.input name="name" id="name" for="name" req="required"  />
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
