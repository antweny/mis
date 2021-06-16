@extends('layouts.backend')
@section('title','KC Members List')
@section('content')

    <!-- Start Card -->
    <x-card title="KC Members List">

        <x-slot name="cardButton">
            @can('experience_create')
                <x-button.create label="Add Member"> {{route('experiences.create')}} </x-button.create>
                {{--                <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>--}}
            @endcan
            @can('organization_view')
                <x-button.general label="KC List" class="btn btn-primary"> {{route('knowledgeCenters.index')}} </x-button.general>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Full Name</th>
                <th scope="col">Sex</th>
                <th scope="col">Age Group</th>
                <th scope="col">Mobile</th>
                <th scope="col">Title</th>
                <th scope="col">Organization/Group</th>
            </x-slot>
            <!-- end table head -->
            <!-- table body -->
            @foreach ($experiences as $experience)
                <tr>
                    <td class="text-left">{{$loop->iteration}}</td>
                    <td class="text-left">{{ $experience->individual->name }}</td>
                    <td class="text-center">{{ $experience->individual->sex }}</td>
                    <td class="text-center">{{ $experience->individual->age_group }}</td>
                    <td class="text-center">{{ $experience->individual->mobile }}</td>
                    <td class="text-center">{{ $experience->job_title->name }}</td>
                    <td class="text-center">{!! $experience->organization->name_click !!} </td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('experience_create')
                                    <x-button.edit>{{route('experiences.edit',$experience)}}</x-button.edit>
                                @endcan
                                @can('experience_create')
                                    <x-button.delete>{{route('experiences.destroy',$experience)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

        </x-table.listing>
    </x-card>

@endsection
