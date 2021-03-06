@extends('layouts.backend')
@section('title','Leave Types List')
@section('content')

    <!-- Start Card -->
    <x-card title="Leave Types List">

        <x-slot name="cardButton">
            @can('leave-type_create') <x-button.create label="Add Leave Type" modal="modal"> #new </x-button.create> @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing :collection="$leaveTypes">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Days</th>
                <th>Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($leaveTypes as $leaveType)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$leaveType->name}}</td>
                    <td class="text-center">{{$leaveType->days}}</td>
                    <td  class="text-left">{{$leaveType->desc}}</td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('leave-type_update')
                                    <x-button.edit>{{route('leaveTypes.edit',$leaveType)}}</x-button.edit>
                                @endcan
                                @can('leave-type_delete')
                                    <x-button.delete>{{route('leaveTypes.destroy',$leaveType)}}</x-button.delete>
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

    @can('leave-type_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Leave Type">
            <!-- Start form -->
            <x-form action="{{route('leaveTypes.store')}}">
                <div class="form-group">
                    <x-form.label name="Name" star="true" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Days" star="true" />
                    <x-form.input type="number" name="days" id="days" for="days" req="required" />
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
