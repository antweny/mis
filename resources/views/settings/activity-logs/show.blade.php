@extends('layouts.backend')
@section('title','View User Activity Logs')
@section('content')

    <x-row>
        <x-slot name="right">
            <x-button.create label="Go Back"> {{url()->previous()}} </x-button.create>
        </x-slot>
    </x-row>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- Start Card -->
            <x-card title="User Activity Logs">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>Log Name</td>
                        <td>{{$activity->log_name}}</td>
                    </tr>
                    <tr>
                        <th >Action</th>
                        <td >{{$activity->description}}</td>
                    </tr>
                    <tr>
                        <th >Model</th>
                        <td >{{$activity->subject_type}}</td>
                    </tr>
                    <tr>
                        <th >Performed By</th>
                        <td >{{$activity->user->name}}</td>
                    </tr>
                    <tr>
                        <th >Date</th>
                        <td >{{humanDate($activity->created_at)}}</td>
                    </tr>
                    <tr>
                        <th >Descriptions</th>
                        <td>@php echo wordwrap($activity->properties,15,"<br>\n")@endphp  </td>
                    </tr>
                    </tbody>
                </table>
            </x-card>
        </div>
    </div>


@endsection
