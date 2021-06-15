@foreach ($activities as $activity)
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
            <div class="dropleft">
                <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                <div class="dropdown-menu">
                    @can('activity_read')
                        <a href="{{route('activities.destroy',$activity)}}" class="dropdown" data-toggle="tooltip" data-placement="top" title="View" >
                            <i class="fa fa-eye"></i>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endcan
                    @can('activity_update')
                        <x-button.edit>{{route('activities.edit',$activity)}}</x-button.edit>
                    @endcan
                    @can('activity_delete')
                        <x-button.delete>{{route('activities.destroy',$activity)}}</x-button.delete>
                    @endcan
                </div>
            </div>
        </td>
    </tr>
@endforeach
