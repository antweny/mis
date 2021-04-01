@extends('layouts.templates.finance')
@section('title','Banks List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('bank_create') <x-button.create label="Add Bank" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Banks List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Bank</th>
                <th>From</th>
                <th>To</th>
                <th>Status</th>
                <th>Description</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($banks as $bank)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{!! $bank->organization->name_click  !!} </td>
                    <td class="text-center">{{$bank->start}}</td>
                    <td class="text-center">{{$bank->end}}</td>
                    <td class="text-center">{{$bank->end}}</td>
                    <td class="text-center">{{$bank->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('bank_update')
                                <x-button.edit>{{route('banks.edit',$bank)}}</x-button.edit>
                            @endcan
                            @can('bank_delete')
                                <x-button.delete>{{route('banks.destroy',$bank)}}</x-button.delete>
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

    @can('bank_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Bank">
            <!-- Start form -->
            <x-form.post action="banks.store">
                <div class="form-group">
                    <x-form.label name="Organization: <span class='star'>*</span>" />
                    <x-dropdown.organization req="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Organization Group: <span class='star'>*</span>" />
                    <x-dropdown.organization-group req="required" filter="Bank"/>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <x-form.label name="Start Date: <span class='star'>*</span>" />
                        <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required" />
                    </div>
                    <div class="col">
                        <x-form.label name="End Date: <span class='star'>*</span>" />
                        <x-form.input type="date" name="end_date" id="end_date" for="end_date"  />
                    </div>
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
