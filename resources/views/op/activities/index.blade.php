@extends('layouts.backend')
@section('title','Activities List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('activity_create') <x-button.create label="Add Activity"> {{route('activities.create')}} </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Group by Output -->
    @include('op.activities.groupBy-output')


@endsection
