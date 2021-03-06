@extends('layouts.backend')
@section('title','Organization Groups List')
@section('content')

    <!-- Start Card -->
    <x-card title="Organization Groups List">

        <x-slot name="cardButton">
            @can('organization-group_create')
                <x-button.create label="Add Organization Group" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>


        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($organizationGroups as $organizationGroup)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$organizationGroup->name}}</td>
                    <td  class="text-left">{{$organizationGroup->desc}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('organization-group_update')
                                    <x-button.edit>{{route('organizationGroups.edit',$organizationGroup)}}</x-button.edit>
                                @endcan
                                @can('organization-group_delete')
                                    <x-button.delete>{{route('organizationGroups.destroy',$organizationGroup)}}</x-button.delete>
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

    @can('organization-group_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Organization Group">
            <!-- Start form -->
            <x-form action="{{route('organizationGroups.store')}}">
                <div class="form-group">
                    <x-form.label Name="Name" star="true" />
                    <x-form.input name="name" id="name" for="name" req="required"   />
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
    @endcan

@endsection
