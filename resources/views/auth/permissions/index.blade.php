@extends('layouts.backend')
@section('title','Roles Permissions')
@section('content')

    <!-- Start Card -->
    <x-card title="Roles Permissions List">

        <x-slot name="cardButton">
            @can('permission_create')
                <x-button.create label="Add Permission" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>


        <!-- Table Start -->
        <x-table.listing :collection="$permissions">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Guard</th>
                <th>Descriptions</th>
                <th>Roles</th>
            </x-slot>
            <!-- table body -->
            @foreach ($permissions as $permission)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$permission->name}}</td>
                    <td  class="text-center">{{$permission->guard_name}}</td>
                    <td  class="text-left">{{$permission->desc}}</td>
                    <td class="text-center"> @foreach($permission->role as $role) {{$role->name}} @endforeach </td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('permission_update')
                                    <x-button.edit>{{route('permissions.edit',$permission)}}</x-button.edit>
                                @endcan
                                    @can('permission_delete')
                                    <x-button.delete>{{route('permissions.destroy',$permission)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('permission_create')
            <!-- Start Modal -->
        <x-modal id="new" title="New Permission">
            <!-- Start form -->
            <x-form.post action="permissions.store">
                <div class="form-group">
                    <x-form.label name="Name" star="true" for="name" />
                    <x-form.input name="name" id="name" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Description" for="desc" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <x-form.label name="Assign Roles" />
                    </div>
                    <x-dropdown.role />
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
