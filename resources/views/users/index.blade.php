@extends('layouts.templates.auth')
@section('title','Users List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('user_create') <x-button.create label="Add User" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Users List">
        <!-- Table Start -->
        <x-table.listing :collection="$users">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Fullname</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Status</th>
                <th>Last login</th>
            </x-slot>
            <!-- table body -->
            @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$user->name}}</td>
                    <td  class="text-center">{{$user->email}}</td>
                    <td  class="text-center">{!! str_replace(array('[', ']', '"'),' ', $user->role->pluck('name')) !!}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td  class="text-left"></td>
                    <td class="text-center"></td>{{-- Retrieve array of users associated to a user and convert to string --}}
                    <td  class="text-center">

                        <!-- Default dropstart button -->
                        <div class="btn-group dropleft">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu">
                                @can('user_update')
                                    <a href="{{route('users.edit',$user)}}" class="dropdown-item" data-toggle="tooltip" data-placement="right" title="Edit" >
                                        <i class="fa fa-edit"></i> edit
                                    </a>
                                @endcan
                                @can('user_update')
                                    <a href="{{route('passwordReset.form',$user)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Reset Password" >
                                        <i class="fa fa-key"></i> Reset Password
                                    </a>
                                @endcan
                                @can('user_update')
                                    <a href="{{route('users.sendLogin',$user)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Send Login" >
                                        <i class="fa fa-user-lock"></i> Send Login
                                    </a>
                                @endcan
                                <div class="dropdown-divider"></div>
                                @can('user_delete')
                                    <x-button.delete>{{route('users.destroy',$user)}}</x-button.delete>
                                @endcan
                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('user_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New user">
            <!-- Start form -->
            <x-form.post action="users.store">
                <div class="form-group">
                    <x-form.label name="Name: <span class='star'>*</span>" for="name" />
                    <x-form.input name="name" id="name" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Email: <span class='star'>*</span>" for="email" />
                    <x-form.input type="email" name="email" id="email" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Active: <span class='star'>*</span>" for="active" />
                    <select class="form-control @error('active') is-invalid @enderror single-select" name="active" required>
                        <option value="1" {{old('active') == '1' ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{old('active') == '0' ? 'selected' : ''}}>No</option>
                    </select>
                </div>
                <div class="form-group row">
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
