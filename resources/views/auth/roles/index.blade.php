@extends('layouts.templates.auth')
@section('title','User Roles List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('role_create') <x-button.create label="Add Role" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Roles List">
        <!-- Table Start -->
        <x-table.listing :collection="$roles">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Guard</th>
                <th>Descriptions</th>
                <th>Permissions</th>
            </x-slot>
            <!-- table body -->
            @foreach ($roles as $role)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$role->name}}</td>
                    <td  class="text-center">{{$role->guard_name}}</td>
                    <td  class="text-left">{{$role->desc}}</td>
                    <td class="text-center">
                        <ul class="list list-inline">
                            @foreach($role->permission as $permission)
                                <li class="list-inline-item">{{$permission->name.' |'}} </li>
                            @endforeach
                        </ul>

                    </td>{{-- Retrieve array of roles associated to a role and convert to string --}}
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('role_update')
                                <x-button.edit>{{route('roles.edit',$role)}}</x-button.edit>
                            @endcan
                            @can('role_delete')
                                <x-button.delete>{{route('roles.destroy',$role)}}</x-button.delete>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('role_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Role" class="modal-xl">
            <!-- Start form -->
            <x-form.post action="roles.store">
                <div class="form-group">
                    <x-form.label name="Name: <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Description" />
                    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <x-form.label name="AssignPermission" />
                    </div>
                    <x-dropdown.permission />
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
