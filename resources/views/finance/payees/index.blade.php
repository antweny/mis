@extends('layouts.backend')
@section('title','Payees List')
@section('content')

    <!-- Start Card -->
    <x-card title="Payees List">

        <x-slot name="cardButton">
            @can('payee_create')
                <x-button.create label="Add Payee" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>


        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('payee_update')
                                    <x-button.edit>{{route('payees.edit',$payee)}}</x-button.edit>
                                @endcan
                                @can('payee_delete')
                                    <x-button.delete>{{route('payees.destroy',$payee)}}</x-button.delete>
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

    @can('payee_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Payee">
            <!-- Start form -->
            <x-form action="{{route('payees.store')}}">
                <div class="form-group">
                    <x-form.label name="Name" star="true"  />
                    <x-form.input name="name" id="name" for="name" req="required"  />
                </div>
                <div class="form-group">
                    <x-form.label name="Mobile" star="true"  />
                    <x-form.input type="number" name="mobile" id="mobile" for="mobile" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Email"  />
                    <x-form.input type="email" name="email" id="email" for="email" />
                </div>
                <div class="form-group">
                    <x-form.label name="Group" for="group" />
                    <select class="form-control @error('group') is-invalid @enderror single-select" name="group">
                        <option value="">----</option>
                        <option value="Individual" {{old('group') == 'Individual' ? 'selected' : ''}}>Individual</option>
                        <option value="Company" {{old('group') == 'Company' ? 'selected' : ''}}>Company</option>
                    </select>
                </div>
                <div class="form-group">
                    <x-form.label name="Address" />
                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{old('address')}}</textarea>
                    @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
