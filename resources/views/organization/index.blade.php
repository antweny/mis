@extends('layouts.backend')
@section('title','Organizations List')
@section('content')

    <!-- Start Card -->
    <x-card title="Organizations List">

        <x-slot name="cardButton">
            @can('organization_create')
                <x-button.create label="Add Organization"> {{route('organizations.create')}} </x-button.create>
                <x-button.import> #import </x-button.import>
                <x-button.export route="organizations.export"/>
            @endcan
        </x-slot>

        @include('organization.components.table',$organizations)
        <!--end listing of collection -->
    </x-card>

    @can('organization_create')
        <!-- Start Modal -->
        <x-modal id="import" title="Import Organization">
            <!-- Start form -->
            <x-form.post action="organizations.import">
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

