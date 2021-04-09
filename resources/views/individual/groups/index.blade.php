@extends('layouts.backend')
@section('title','Individual Groups List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('individual-group_create') <x-button.create label="Add Individual Group" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Individual Groups List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($individualGroups as $individualGroup)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$individualGroup->name}}</td>
                    <td  class="text-left">{{$individualGroup->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('individual-group_update')
                                <x-button.edit>{{route('individualGroups.edit',$individualGroup)}}</x-button.edit>
                            @endcan
                            @can('individual-group_delete')
                                <x-button.delete>{{route('individualGroups.destroy',$individualGroup)}}</x-button.delete>
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

    @can('individual-group_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Individual Group">
            <!-- Start form -->
            <x-form.post action="individualGroups.store">
                <div class="form-group">
                    <x-form.label name="Name: <span class='star'>*</span>" />
                    <x-form.input name="name" id="name" for="name" req="required"   />
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
