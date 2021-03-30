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
        <x-table.listing>
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
                    <td class="text-center">{{humanDate($bank->start_date)}}</td>
                    <td class="text-center">{{humanDate($bank->end_date)}}</td>
                    <td class="text-center">{{humanDate($bank->end_date)}}</td>
                    <td class="text-center">{{$bank->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('bank_update')
                                <a href="{{route('banks.edit',$bank)}}" class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('bank_delete')
                                <form method="POST" action="{{route('banks.destroy',$bank)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
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
                    <x-form.elements.label name="Bank Name <span class='star'>*</span>" />
                    <x-dropdown.organization req="required"/>
                </div>
                <div class="form-group">
                    <x-form.elements.label name="Organization Group: <span class='star'>*</span>" />
                    <x-dropdown.organization-group req="required" filter="Bank"/>
                </div>
                <div class="row form-group">
                    <div class="col">
                        <x-form.elements.input label="Start Date: <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required" />
                    </div>
                    <div class="col">
                        <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date"  />
                    </div>
                </div>
                <div class="form-group">
                    <x-form.elements.textarea label="Descriptions" name="desc" row="5" id="desc" />
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
