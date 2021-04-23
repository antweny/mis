<!-- table body -->
@foreach ($activities as $output => $parent)
    <td colspan="9" class="bg-dark text-white">{!! $output !!}</td>
    <!-- Table Start -->
{{--    @foreach ($parent as $parentActivity => $activityOutput)--}}
{{--        <td colspan="9" class="bg-dark text-white">{!! $parentActivity !!}</td>--}}
        @foreach ($parent as $activity)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-left">{{$activity->name}}</td>
                <td  class="text-left">{{$activity->desc}}</td>
                <td  class="text-center"></td>
                <td  class="text-center">{{ $activity->employee->name }}</td>
                <td  class="text-center">{{humanDate($activity->start_date )}}</td>
                <td  class="text-center">{{humanDate($activity->due_date )}}</td>
                <td  class="text-center">{{ $activity->status }}</td>
                <td  class="text-center">
                    <div class="btn-group btn-group-sm">
                        @can('activity_update')
                            <a href="{{route('activities.edit',$activity)}}" class="btn btn-edit btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="Edit" >
                                <i class="fa fa-edit"></i>
                            </a>
                        @endcan
                        @can('activity_read')
                            <a href="{{route('activities.destroy',$activity)}}" class="btn btn-secondary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="View" >
                                <i class="fa fa-eye"></i>
                            </a>
                        @endcan
                        @can('activity_delete')
                            <form method="POST" action="{{route('activities.destroy',$activity)}}" class="form-horizontal" role="form" autocomplete="off">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-delete " onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach

{{--    @endforeach--}}

@endforeach
