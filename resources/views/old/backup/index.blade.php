@extends('layouts.templates.setting')
@section('title','System Backups')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('backup_create') <x-button.create label="Create New Backup"> {{route('backups.create')}}</x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="System Backups List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Date</th>
                <th scope="col">Age</th>
            </x-slot>
            <!-- end table head -->
            <!-- start table head -->
                @foreach($backups as $backup)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-left">{{$backup['file_name']}}</td>
                        <td class="text-center">{{humanFilesize($backup['file_size'])}}</td>
                        <td class="text-center">{{$backup['last_modified']}}</td>
                        <td class="text-center">{{age($backup['last_modified'])}}</td>
                        <td class="text-center">
                            <!-- Default dropstart button -->
                            <div class="btn-group dropleft">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"></button>
                                <div class="dropdown-menu">
                                    <a href="{{route('backups.download',$backup['file_name'])}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="Download file" >
                                        <i class="fa fa-cloud-download-alt"></i> Download
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    @can('voucher_delete')
                                        <form method="POST" action="{{route('backups.delete',$backup['file_name'])}}" class="form-horizontal dropdown-item" role="form" autocomplete="off">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn del" onclick="return confirm('You want to delete this backup file')">
                                                <i class="fa fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                <!-- end table body -->

        <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

@endsection
