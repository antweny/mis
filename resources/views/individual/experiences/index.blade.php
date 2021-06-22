@extends('layouts.backend')
@section('title','Experiences List')
@section('content')

    <!-- Start Card -->
    <x-card title="Experiences List">

        <x-slot name="cardButton">
            @can('experience_create')
                <x-button.create label="Add Experience"> {{route('experiences.create')}} </x-button.create>
                <x-button.import> #import </x-button.import>
                <x-button.export route="experiences.export"/>
            @endcan
        </x-slot>

        @include('individual.experiences.components.table',$experiences)

    </x-card>


    @can('experience_create')
        <!-- Start Modal -->
        <x-modal id="import" title="Import Experience">
            <!-- Start form -->
            <x-form.post action="experiences.import">
                <div class="form-group">
                    <x-form.label name="Import File" star="true" />
                    <x-form.input type="file" name="import_file" id="import_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
