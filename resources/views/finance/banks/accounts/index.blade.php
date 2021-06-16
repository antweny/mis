@extends('layouts.backend')
@section('title','Bank Accounts List')
@section('content')

    <!-- Start Card -->
    <x-card title="Bank Accounts List">

        <x-slot name="cardButton">
            @can('bank-account_create')
                <x-button.create label="Add Bank Account" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('bank-account_update')
                                    <x-button.edit>{{route('bankAccounts.edit',$bankAccount)}}</x-button.edit>
                                @endcan
                                @can('bank-account_delete')
                                    <x-button.delete>{{route('bankAccounts.destroy',$bankAccount)}}</x-button.delete>
                                @endcan
                            </div>
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
            <x-form action="{{route('bankAccounts.store')}}">
                <div class="form-group">
                    <x-form.label name="Name" star="true" />
                    <x-form.input name="name" id="name" for="name" req="required"   />
                </div>

                <div class="form-group">
                    <x-form.label name="Bank" star="true" />
                    <x-dropdown.bank req="required"/>
                </div>

                <div class="form-group">
                    <x-form.label name="Account Number" star="true" />
                    <x-form.input name="number" id="number" for="number" req="required" />
                </div>

                <div class="form-group">
                    <x-form.label name="Balance" />
                    <x-form.input type="number" name="balance" id="balance" for="balance"  />
                </div>

                <div class="row form-group">
                    <div class="col-md-6">
                        <x-form.label name="Currency" star="true" />
                        <x-dropdown.currency />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Opening Date" />
                        <x-form.input type="date" name="op" id="op" for="op"  />
                    </div>
                </div>

                <div class="form-group">
                    <x-form.label name="Description" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>

                <div class="form-group text-right">
                    <x-button />
                </div>

            </x-form>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
