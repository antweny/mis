@extends('layouts.backend')
@section('title','Timesheets List')
@section('content')

    <!-- Start Card -->
    <x-card title="My Timesheets">

        <x-slot name="cardButton">
            <x-button.create label="Add Timesheet" modal="modal"> #new </x-button.create>
        </x-slot>

        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Date</th>
                <th scope="col">Time From</th>
                <th scope="col">Time To</th>
                <th scope="col">Hours</th>
                <th scope="col">Activity</th>
                <th scope="col">Description</th>
            </x-slot>
            <!-- end table head -->

            <!-- table body -->
            @foreach ($timesheets as $date => $userTimesheet)
                <tr>
                    <td colspan="3" class="bg-dark text-white">{{humanDate($date)}}</td>
                    <td colspan="5" class="bg-dark text-white">{{humanDate($date)}}</td>
                </tr>
                @foreach($userTimesheet as $timesheet)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-left">{{humanDate($timesheet->date)}}</td>
                        <td class="text-center">{{timeFormat($timesheet->time_from) }}</td>
                        <td class="text-center">{{ timeFormat($timesheet->time_to) }}</td>
                        <td class="text-center">{{ totalHours($timesheet->time_from,$timesheet->time_to) }}</td>
                        <td class="text-center">{{ $timesheet->activity->name }}</td>
                        <td  class="text-left">{{$timesheet->desc}}</td>
                        <td  class="text-center">
                            <div class="dropleft">
                                <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                                <div class="dropdown-menu">
                                    <x-button.edit>{{route('timesheets.edit',$timesheet)}}</x-button.edit>
                                    <x-button.delete>{{route('timesheets.destroy',$timesheet)}}</x-button.delete>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>
    <!-- end card area -->

        <!-- Start Modal -->
        <x-modal id="new" title="New Timesheet" class="modal-xl">
            <!-- Start form -->
            <x-form action="{{route('timesheets.store')}}" >
                <div class="form-group">
                    <x-form.label name="Date <span class='star'>*</span>" />
                    <input type="date" name="date" value="{{date('Y-m-d')}}" class="form-control @error('date') is-invalid @enderror" required />
                    @error('date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group">
                    <x-form.label name="Activity" />
                    <x-dropdown.activity />
                </div>
                <div class="row">
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time From <span class='star'>*</span>" />
                        <x-form.input name="time_from" id="time_from" for="time_from" req="required" />
                    </div>
                    <div class="col-md-6 form-group ">
                        <x-form.label name="Time To <span class='star'>*</span>" star="true" />
                        <x-form.input name="time_to" id="time_to" for="time_to" req="required" />
                    </div>
                </div>
                <div class="form-group">
                    <x-form.label name="Descriptions <span class='star'>*</span>" />
                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" rows="4" >{{old('desc')}}</textarea>
                    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
@endsection
