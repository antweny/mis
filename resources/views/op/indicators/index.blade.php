@extends('layouts.backend')
@section('title','Indicators List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('indicator_create') <x-button.create label="Add Indicator" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Indicators List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($indicators as $indicator)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$indicator->name}}</td>
                    <td  class="text-left">{{$indicator->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('indicator_update')
                                <x-button.edit>{{route('indicators.edit',$indicator)}}</x-button.edit>
                            @endcan
                            @can('indicator_delete')
                                <x-button.delete>{{route('indicators.destroy',$indicator)}}</x-button.delete>
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

    @can('indicator_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Indicator">
            <!-- Start form -->
            <x-form.post action="indicators.store">
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
