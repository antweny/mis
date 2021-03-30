@extends('layouts.templates.job')
@section('title','Job Titles List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('job-title_create') <x-button.create label="Add Job Title" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Job Titles List">
        <!-- Table Start -->
        <x-table.listing :collection="$jobTitles">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Acronym</th>
                <th scope="col">Type</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($jobTitles as $JobTitle)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$JobTitle->name}}</td>
                    <td class="text-center">{{$JobTitle->acronym}}</td>
                    <td  class="text-center">{{$JobTitle->title_type}}</td>
                    <td  class="text-left">{{$JobTitle->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('job-title_update')
                                <x-button.edit>{{route('jobTitles.edit',$JobTitle)}}</x-button.edit>
                            @endcan
                            @can('job-title_delete')
                                <x-button.delete>{{route('jobTitles.destroy',$JobTitle)}}</x-button.delete>
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

    @can('job-title_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Job Title">
            <!-- Start form -->
            <x-form.post action="jobTitles.store">
                <div class="form-group">
                    <x-form.label name="Name <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Acronym" for="acronym" />
                    <x-form.input name="acronym" id="acronym" />
                </div>
                <div class="form-group">
                    <x-form.label name="Type" for="type" />
                    <select class="form-control @error('type') is-invalid @enderror" name="type">
                        <option value="">--</option>
                        <option value="P" {{old('type') == 'P' ? 'selected' : ''}}> Professional </option>
                        <option value="L" {{old('type') == 'L' ? 'selected' : ''}}> Leadership </option>
                    </select>
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
