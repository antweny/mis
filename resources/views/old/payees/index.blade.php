@extends('layouts.templates.finance')
@section('title','Payees List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('payee_create') <x-button.create label="Add Payee" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Payees List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Email</th>
                <th>Group</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($payees as $payee)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{ $payee->name  }} </td>
                    <td class="text-center">{{$payee->mobile}}</td>
                    <td class="text-center">{{$payee->address}}</td>
                    <td class="text-center">{{$payee->email}}</td>
                    <td class="text-center">{{$payee->group}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('payee_update')
                                <a href="{{route('payees.edit',$payee)}}" class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('payee_delete')
                                <form method="POST" action="{{route('payees.destroy',$payee)}}" class="form-horizontal" role="form" autocomplete="off">
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

    @can('payee_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Payee">
            <!-- Start form -->
            <x-form.post action="payees.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"  />
                </div>
                <div class="form-group">
                    <x-form.elements.input label="Mobile: <span class='star'>*</span>" type="number" name="mobile" id="mobile" for="mobile" req="required" />
                </div>
                <div class="form-group">
                    <x-form.elements.input label="Email" type="email" name="email" id="email" for="email" />
                </div>
                <div class="form-group">
                    <x-form.elements.label name="Group" for="group" />
                    <select class="form-control @error('group') is-invalid @enderror single-select" name="group">
                        <option value="">----</option>
                        <option value="Individual" {{old('group') == 'Individual' ? 'selected' : ''}}>Individual</option>
                        <option value="Company" {{old('group') == 'Company' ? 'selected' : ''}}>Company</option>
                    </select>
                </div>
                <div class="form-group">
                    <x-form.elements.textarea label="Address" name="address"  id="address" />
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
