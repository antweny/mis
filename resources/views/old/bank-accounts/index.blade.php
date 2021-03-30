@extends('layouts.templates.finance')
@section('title','Bank Accounts List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('bank-account_create') <x-button.create label="Add Bank Account" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Bank Accounts List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Bank</th>
                <th>Account Number</th>
                <th>Opening Date</th>
                <th>Balance</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Description</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($bankAccounts as $bankAccount)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{!! $bankAccount->name  !!} </td>
                    <td class="text-center">{!! $bankAccount->stakeholder->organization->name  !!} </td>
                    <td class="text-center">{{ $bankAccount->number}}</td>
                    <td class="text-center">{{humanDate($bankAccount->op)}}</td>
                    <td class="text-center">{{$bankAccount->balance}}</td>
                    <td class="text-center">{{$bankAccount->currency->acronym}}</td>
                    <td class="text-center">{!! $bankAccount->status !!}</td>
                    <td class="text-center">{{$bankAccount->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('bank-account_update')
                                <a href="{{route('bankAccounts.edit',$bankAccount)}}" class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('bank-account_delete')
                                <form method="POST" action="{{route('bankAccounts.destroy',$bankAccount)}}" class="form-horizontal" role="form" autocomplete="off">
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

    @can('bank-account_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Bank Account">
            <!-- Start form -->
            <x-form.post action="bankAccounts.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
                </div>

                <div class="form-group">
                    <x-form.elements.label name="Bank: <span class='star'>*</span>" />
                    <x-dropdown.bank req="required"/>
                </div>

                <div class="form-group">
                    <x-form.elements.input label="Account Number: <span class='star'>*</span>" type="number" name="number" id="number" for="number" req="required" />
                </div>

                <div class="form-group">
                    <x-form.elements.input label="Balance" type="number" name="balance" id="balance" for="balance"  />
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <x-form.elements.label name="Currency: <span class='star'>*</span>" />
                        <x-dropdown.currency />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.input label="Opening Date" type="date" name="op" id="op" for="op"  />
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
