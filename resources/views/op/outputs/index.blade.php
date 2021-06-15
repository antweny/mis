@extends('layouts.backend')
@section('title','Outputs List')
@section('content')

    <!-- Start Card -->
    <x-card title="Outputs List">

        <x-slot name="cardButton">
            @can('output_create') <x-button.create label="Add Output" > {{route('outputs.create')}} </x-button.create> @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Year</th>
            </x-slot>

            <!-- table body -->
            @include('op.outputs.groupBy-outcome')

        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

@endsection
