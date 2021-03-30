@extends('layouts.templates.auth')
@section('title','Roles Permissions')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('permission_create') <x-button.create label="Add Permission" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Roles Permissions List">
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
                    <td class="text-center">
                        @foreach($permission->role as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('permission_update')
                                <a href="{{route('permissions.edit',$permission)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('permission_delete')
                                <form method="POST" action="{{route('permissions.destroy',$permission)}}" class="form-horizontal" permission="form" autocomplete="off">
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

    @can('permission_create')
            <!-- Start Modal -->
        <x-modal id="new" title="New Permission">
            <!-- Start form -->
            <x-form.post action="permissions.store">
                <div class="form-group">
                    <x-form.label name="Name: <span class='star'>*</span>" for="name" />
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
                    <x-button.submit />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan

@endsection
