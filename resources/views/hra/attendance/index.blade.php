@extends('layouts.backend')
@section('title','Attendances List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('attendance_create')<x-button.create label="Add Attendance" modal="modal"> #new </x-button.create>@endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="My Attendances">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Employee</th>
                <th scope="col">Date</th>
                <th scope="col">Time In</th>
                <th scope="col">Time Out</th>
                <th scope="col">Working Hours</th>
                <th scope="col">Status</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($attendances as $attendance)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$attendance->employee->name}}</td>
                    <td class="text-left">{{humanDate($attendance->date)}}</td>
                    <td class="text-center">{{timeFormat($attendance->time_in) }}</td>
                    <td class="text-center">{{ timeFormat($attendance->time_out) }}</td>
                    <td class="text-center">{{ $attendance->total_hours }}</td>
                    <td class="text-center">{!! $attendance->status !!} </td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('attendance_update')
                                <a href="{{route('attendances.edit',$attendance)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('attendance_delete')
                                <form method="POST" action="{{route('attendances.destroy',$attendance)}}" class="form-horizontal" role="form" autocomplete="off">
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

    @can('attendance_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Attendance" class="modal-xl">
            <!-- Start form -->
            <x-form.post action="attendances.store" >

                <div class="form-group">
                    <x-form.label name="Date <span class='star'>*</span>" />
                    <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control @error('date') is-invalid @enderror" required />
                    @error('date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group">
                    <x-form.label name="Employee" />
                    <x-dropdown.employee req="required" />
                </div>

                <div class="row">
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time In <span class='star'>*</span>" />
                        <x-form.input name="time_in" id="time_from" for="time_in" req="required" />
                    </div>
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time Out <span class='star'>*</span>" />
                        <x-form.input name="time_out" id="time_to" for="time_out" req="required" />
                    </div>
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
