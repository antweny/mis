@extends('layouts.backend')
@section('title','Approve Leave')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4>Application</h4>
                    </div>
                    <div class="float-right">
                        <a href="{{route('leaveApproves.index')}}" class="btn btn-outline-dark btn-sm"
                           data-toggle="tooltip" data-placement="left" title="Close" >
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="float-left">
                                <h4>To</h4>
                                <h5>{{$leaveApprove->approver->name}}</h5>
                                <h6>{{$leaveApprove->approver->email}}</h6>
                                <h6 class="text-primary font-weight-bolder">{{$leaveApprove->created}}</h6>
                            </div>
                            <div class="float-right">
                                <span class="font-weight-bolder h4 mb-3 ">Status: </span> <br/>
                                {!! $leaveApprove->leave_status !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h5 class="font-weight-bolder ">Subject: Request for {{$leaveApprove->leave_type->name}}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 pt-4" style="font-size: 16px; text-align: justify;">
                          <p>This is to inform you that I, <strong>{{$leaveApprove->employee->name}}</strong> have bee working as
                              {{$leaveApprove->employee->designation->name}} in your Organization TGNP. I would like to apply <strong>{{$leaveApprove->days}} days</strong>
                              leave from <i>{{$leaveApprove->start}} to {{$leaveApprove->end}}</i></p>

                            <p>I hope you'll consider my request and grant me leaves for the above mentioned dates.</p>
                            <p>Regards</p>
                            <p>{{$leaveApprove->employee->name}}</p>
                            <p>{{$leaveApprove->employee->department->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                        @if(in_array($leaveApprove->status,['Acc','Rev']))
                            <a href="{{route('leaveApproves.approve',[$leaveApprove,'Rej'])}}" class="btn btn-danger">
                                Reject
                            </a>
                        @endif
                    </div>
                    <div class="float-right">
                        @if(in_array($leaveApprove->status,['Rej','Rev']))
                            <a href="{{route('leaveApproves.approve',[$leaveApprove,'Acc'])}}" class="btn btn-success">
                                Accept
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
