@extends('layouts.templates.hr')
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
                        <a href="{{route('approveLeaves.index')}}" class="btn btn-outline-dark btn-sm"
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
                                <h5>{{$approveLeave->approver->name}}</h5>
                                <h6>{{$approveLeave->approver->email}}</h6>
                                <h6 class="text-primary font-weight-bolder">{{$approveLeave->created}}</h6>
                            </div>
                            <div class="float-right">
                                <span class="font-weight-bolder h4 mb-3 ">Status: </span> <br/>
                                {!! $approveLeave->leave_status !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h5 class="font-weight-bolder ">Subject: Request for {{$approveLeave->leave_type->name}}</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 pt-4" style="font-size: 16px; text-align: justify;">
                          <p>This is to inform you that I, <strong>{{$approveLeave->employee->name}}</strong> have bee working as
                              {{$approveLeave->employee->designation->name}} in your Organization TGNP. I would like to apply <strong>{{$approveLeave->days}} days</strong>
                              leave from <i>{{$approveLeave->start}} to {{$approveLeave->end}}</i></p>

                            <p>I hope you'll consider my request and grant me leaves for the above mentioned dates.</p>
                            <p>Regards</p>
                            <p>{{$approveLeave->employee->name}}</p>
                            <p>{{$approveLeave->employee->department->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-left">
                        @if(in_array($approveLeave->status,['Acc','Rev']))
                            <a href="{{route('approveLeaves.approve',[$approveLeave,'Rej'])}}" class="btn btn-danger">
                                Reject
                            </a>
                        @endif
                    </div>
                    <div class="float-right">
                        @if(in_array($approveLeave->status,['Rej','Rev']))
                            <a href="{{route('approveLeaves.approve',[$approveLeave,'Acc'])}}" class="btn btn-success">
                                Accept
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
