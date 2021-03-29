@extends('layouts.templates.hr')
@section('title','Designations List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('designation_create') <x-button.create label="Add Designation" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Designations List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Acronym</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($designations as $designation)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$designation->name}}</td>
                    <td class="text-center">{{$designation->acronym}}</td>
                    <td  class="text-left">{{$designation->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('designation_update')
                                <x-button.edit>{{route('designations.edit',$designation)}}</x-button.edit>
                            @endcan
                            @can('designation_delete')
                                <x-button.delete>{{route('designations.destroy',$designation)}}</x-button.delete>
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

    @can('designation_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Designation">
            <!-- Start form -->
            <x-form.post action="designations.store">
                <div class="form-group">
                    <x-form.label name="Name <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Acronym" for="name" />
                    <x-form.input name="acronym" id="acronym" />
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
