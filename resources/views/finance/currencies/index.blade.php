@extends('layouts.backend')
@section('title','Currencies List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('currency_create') <x-button.create label="Add Currency" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Currencies List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Acronym</th>
                <th>Symbol</th>
                <th>Main</th>
                <th>Desc</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($currencies as $currency)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{ $currency->name }} </td>
                    <td class="text-center">{{$currency->acronym}}</td>
                    <td class="text-center">{{$currency->symbol}}</td>
                    <td class="text-center">{!! $currency->status !!}</td>
                    <td class="text-left">{{$currency->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('currency_update')
                                <x-button.edit>{{route('currencies.edit',$currency)}}</x-button.edit>
                            @endcan
                            @can('currency_delete')
                                <x-button.delete>{{route('currencies.destroy',$currency)}}</x-button.delete>
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

    @can('currency_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Currency">
            <!-- Start form -->
            <x-form.post action="currencies.store">
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Name: <span class='star'>*</span>"  />
                        <x-form.input name="name" id="name" for="name" req="required"  />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Acronym: <span class='star'>*</span>"  />
                        <x-form.input name="acronym" id="acronym" for="acronym" req="required"  />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.label name="Symbol"  />
                        <x-form.input name="symbol" id="symbol" for="symbol"  />
                    </div>
                    <div class="col-md-6">
                        <x-form.label name="Main Currency: <span class='star'>*</span>" for="main" />
                        <select class="form-control @error('main') is-invalid @enderror single-select" name="main" required>
                            <option value="0" {{old('main') == '0' ? 'selected' : ''}}>No</option>
                            <option value="1" {{old('main') == '1' ? 'selected' : ''}}>Yes</option>
                        </select>
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
