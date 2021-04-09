@extends('layouts.backend')
@section('title','Participant Roles List')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Participant Role" modal="modal"> #new </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Participant Roles List">
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Descriptions</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($participantRoles as $participantRole)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$participantRole->name}}</td>
                    <td  class="text-left">{{$participantRole->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('participant-role_update')
                                <x-button.edit>{{route('participantRoles.edit',$participantRole)}}</x-button.edit>
                            @endcan
                            @can('participant-role_delete')
                                <x-button.delete>{{route('participantRoles.destroy',$participantRole)}}</x-button.delete>
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

    <!-- Start Modal -->
    <x-modal id="new" title="New Participant Role">
        <!-- Start form -->
        <x-form.post action="participantRoles.store">
            <div class="form-group">
                <x-form.label name="Name <span class='star'>*</span>" for="name" />
                <x-form.input name="name" id="name" for="name" req="required"   />
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

@endsection
