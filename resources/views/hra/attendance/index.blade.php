@extends('layouts.backend')
@section('title','Attendances List')
@section('content')

    <!-- Start Card -->
    <x-card title="My Attendances">

        <x-slot name="cardButton">
            @can('attendance_create')<x-button.create label="Add Attendance" modal="modal"> #new </x-button.create>@endcan
        </x-slot>

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
                    <td class="text-center">{{$attendance->in_time }}</td>
                    <td class="text-center">{!! $attendance->out_time !!}</td>
                    <td class="text-center">{!! $attendance->total_hours !!}</td>
                    <td class="text-center">{!! $attendance->status !!} </td>
                    <td  class="text-center">
                        <div class="dropleft">
                            <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                            <div class="dropdown-menu">
                                @can('attendance_update')
                                    <x-button.edit>{{route('attendances.edit',$attendance)}}</x-button.edit>
                                @endcan
                                @can('attendance_delete')
                                    <x-button.delete>{{route('attendances.destroy',$attendance)}}</x-button.delete>
                                @endcan
                            </div>
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
            <x-form action="{{route('attendances.store')}}" >

                <div class="form-group">
                    <x-form.label name="Date" star="true" />
                    <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control @error('date') is-invalid @enderror" required />
                    @error('date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group">
                    <x-form.label name="Employee" star="true" />
                    <x-dropdown.employee req="required" />
                </div>

                <div class="row">
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time In" star="true" />
                        <x-form.input name="time_in" id="time_from" for="time_in" req="required" />
                    </div>
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time Out" star="true" />
                        <x-form.input name="time_out" id="time_to" for="time_out" req="required" />
                    </div>
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
