@extends('layouts.backend')
@section('title','Individuals List')
@section('content')

    <!-- Start Card -->
    <x-card title="Individuals List">
        <x-slot name="cardButton">
            @can('individual_create')
                <x-button.create> {{route('individuals.create')}} </x-button.create>
                <x-button.general label="Import" class="btn-outline-primary" icon="fa fa-upload" modal="modal"> #import </x-button.general>
                <ul class="navbar-nav btns">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle btn btn-outline-secondary" id="export" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-download"></i> Export
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="export">
                            <a class="dropdown-item" href="{{route('individuals.export')}}"><i class="fa fa-file-excel"></i> Excel</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('individuals.export','Dompdf')}}"> <i class="fa fa-file-pdf"></i> PDF </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('individuals.export','Csv')}}"> <i class="fa fa-file-csv"></i> CSV </a>
                        </div>
                    </li>
                </ul>
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
