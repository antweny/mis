@extends('layouts.templates.job')
@section('title','Job Types List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('job-type_create') <x-button.create label="Add Job Type" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Job Types List">
        <!-- Table Start -->
        <x-table.listing :collection="$jobTypes">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($jobTypes as $jobType)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$jobType->name}}</td>
                    <td  class="text-left">{{$jobType->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('job-type_update')
                                <x-button.edit>{{route('jobTypes.edit',$jobType)}}</x-button.edit>
                            @endcan
                            @can('job-type_delete')
                                <x-button.delete>{{route('jobTypes.destroy',$jobType)}}</x-button.delete>
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

    @can('job-type_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Job Type">
            <!-- Start form -->
            <x-form.post action="jobTypes.store">
                <div class="form-group">
                    <x-form.label name="Name <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
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
