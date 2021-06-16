@extends('layouts.backend')
@section('title','Users List')
@section('content')

    <!-- Start Card -->
    <x-card title="Users List">

        <x-slot name="cardButton">
            @can('user_create')
                <x-button.create label="Add User" modal="modal"> #new </x-button.create>
            @endcan
        </x-slot>

        <!-- Table Start -->
        <x-table.listing id="table">
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
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('user_update')
                                    <x-button.edit>{{route('users.edit',$user)}}</x-button.edit>
                                    <a href="{{route('passwordReset.form',$user)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Reset Password" >
                                        <i class="fa fa-key"></i> Reset Password
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="{{route('users.sendLogin',$user)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Send Login" >
                                        <i class="fa fa-user-lock"></i> Send Login
                                    </a>
                                    <div class="dropdown-divider"></div>
                                @endcan
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
            <x-form action="{{route('users.store')}}">
                <div class="form-group">
                    <x-form.label name="Name" star="true" for="name" />
                    <x-form.input name="name" id="name" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Email" star="true" for="email" />
                    <x-form.input type="email" name="email" id="email" required="required"/>
                </div>
                <div class="form-group">
                    <x-form.label name="Active" star="true" for="active" />
                    <select class="form-control @error('active') is-invalid @enderror single-select" name="active" required>
                        <option value="1" {{old('active') == '1' ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{old('active') == '0' ? 'selected' : ''}}>No</option>
                    </select>
                </div>
                <div class="form-group row">
                    <x-dropdown.role />
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
