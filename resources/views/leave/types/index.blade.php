@extends('layouts.backend')
@section('title','Leave Types List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('leave-type_create') <x-button.create label="Add Leave Type" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Leave Types List">
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
                        <div class="btn-group btn-group-sm">
                            @can('leave-type_update')
                                <a href="{{route('leaveTypes.edit',$leaveType)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('leave-type_delete')
                                <form method="POST" action="{{route('leaveTypes.destroy',$leaveType)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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

    @can('leave-type_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Leave Type">
            <!-- Start form -->
            <x-form.post action="leaveTypes.store">
                <div class="form-group">
                    <x-form.label name="Name <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" for="name" req="required" />
                </div>
                <div class="form-group">
                    <x-form.label name="Days: <span class='star'>*</span>" />
                    <x-form.input type="number" name="days" id="days" for="days" req="required" />
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
