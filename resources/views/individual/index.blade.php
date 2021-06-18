@extends('layouts.backend')
@section('title','Individuals List')
@section('content')

    <!-- Start Card -->
    <x-card title="Individuals List">
        <x-slot name="cardButton">
            @can('individual_create')
                <x-button.create> {{route('individuals.create')}} </x-button.create>
                <x-button.import> #import </x-button.import>
                <x-button.export route="individuals.export"/>
            @endcan
        </x-slot>

        @include('individual.components.table',$individuals)

    </x-card>

    @can('individual_create')
        <x-modal id="import" title="Import Individual">
            <!-- Start form -->
            <x-form action="{{route('individuals.import')}}">
                <div class="form-group">
                    <x-form.label name="Import File" star="true" for="imported_file" />
                    <x-form.input type="file" name="import_file" id="import_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button label="Import"/>
                </div>
            </x-form>
        </x-modal>
    @endcan

@endsection
