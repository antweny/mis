@extends('layouts.backend')
@section('title','Activities List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('activity_create') <x-button.create label="Add Activity"> {{route('activities.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Activities List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Donor</th>
                <th scope="col">Staff</th>
                <th scope="col">Start</th>
                <th scope="col">Due</th>
                <th scope="col">Status</th>
            </x-slot>
            <!-- table body -->

            <!-- Group by Output -->
            @include('op.activities.groupBy-output')


            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

@endsection
