<!-- Start Card -->
<x-card title="Activities List">

    <x-slot name="cardButton">
        @can('activity_create') <x-button.create label="Add Activity"> {{route('activities.create')}} </x-button.create> @endcan
    </x-slot>


    <!-- Table Start -->
    <x-table.listing id="table">
        <!-- table headers -->
        <x-slot name="thead" >
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Donor</th>
            <th scope="col">Staff</th>
            <th scope="col">Start</th>
            <th scope="col">Due</th>
            <th scope="col">Status</th>
        </x-slot>

        <!-- table body -->
        @foreach ($activities as $output => $parent)
            <td colspan="9" class="bg-dark text-white">{!! $output !!}</td>
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
                            <div class="dropleft">
                                <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                                <div class="dropdown-menu">
                                    @can('activity_read')
                                    <a href="{{route('activities.destroy',$activity)}}" class="dropdown-item" data-toggle="tooltip" data-placement="top" title="View" >
                                        <i class="fa fa-eye"></i> View
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
        <!-- end table body -->
        @endforeach
    </x-table.listing>
    <!--end listing of collection -->
</x-card>
<!-- end card area -->
