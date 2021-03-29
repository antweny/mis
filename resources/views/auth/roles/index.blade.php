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
        <x-table.listing>
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
                        @foreach($role->permission as $permission)
                            {{$permission->name.' | '}}
                        @endforeach
                    </td>{{-- Retrieve array of roles associated to a role and convert to string --}}
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('role_update')
                                <a href="{{route('roles.edit',$role)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('role_delete')
                                <form method="POST" action="{{route('roles.destroy',$role)}}" class="form-horizontal" role="form" autocomplete="off">
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
        </x-table.listing>
    </x-card>

    @can('role_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Role" class="modal-xl">
            <!-- Start form -->
            <x-form.post action="roles.store">
                <div class="form-group">
                    <x-form.elements.label name="Name: <span class='star'>*</span>" for="name" />
                    <x-form.elements.input name="name" id="name" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.elements.label name="Description" for="desc" />
                    <x-form.elements.textarea name="desc" id="desc"/>
                </div>
                <div class="form-group row">
                    <x-auth.permission />
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
