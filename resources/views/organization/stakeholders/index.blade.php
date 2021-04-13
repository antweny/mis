@extends('layouts.backend')
@section('title','Stakeholders List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('stakeholder_create') <x-button.create label="Add Stakeholder" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Stakeholders List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Organization</th>
                <th>Group</th>
                <th>From</th>
                <th>To</th>
                <th>Description</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($stakeholders as $stakeholder)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{!! $stakeholder->organization->name_click  !!} </td>
                    <td class="text-center">{{$stakeholder->organization_group->name}}</td>
                    <td class="text-center">{{$stakeholder->start}}</td>
                    <td class="text-center">{!! $stakeholder->end !!}</td>
                    <td class="text-center">{{$stakeholder->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('stakeholder_update')
                                <x-button.edit>{{route('stakeholders.edit',$stakeholder)}}</x-button.edit>
                            @endcan
                            @can('stakeholder_delete')
                                <x-button.delete>{{route('stakeholders.destroy',$stakeholder)}}</x-button.delete>
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

    @can('stakeholder_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Stakeholder">
            <!-- Start form -->
            <x-form.post action="stakeholders.store">
                <div class="form-group">
                    <x-form.label name="Organization: <span class='star'>*</span>" />
                    <x-dropdown.organization req="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Organization Group: <span class='star'>*</span>" />
                    <x-dropdown.organization-group req="required"/>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <x-form.label name="Start Date: <span class='star'>*</span>" />
                        <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required" />
                    </div>
                    <div class="col">
                        <x-form.label name="End Date: <span class='star'>*</span>" />
                        <x-form.input type="date" name="end_date" id="end_date" for="end_date"  />
                    </div>
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
