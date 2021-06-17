<!-- Table Start -->
<x-table.listing id="table">
    <!-- table headers -->
    <x-slot name="thead" >
        <th>Name</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Sex</th>
        <th>Age Group</th>
        <th>Occupation</th>
        <th>Location</th>
        <th>Group</th>
        <th>Engagement</th>
    </x-slot>

    <!-- table body -->
    @foreach ($individuals as $individual)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-left">{{$individual->name}}</td>
            <td  class="text-center">{{$individual->mobile}}</td>
            <td  class="text-center">{{$individual->email}}</td>
            <td  class="text-center">{{$individual->sex}}</td>
            <td  class="text-center">{{$individual->age_group}}</td>
            <td  class="text-left">{{$individual->occupation}}</td>
            <td class="text-center">{{$individual->location->name}}</td>
            <td class="text-center">
                @foreach($individual->individual_group as $group)
                    {{$group->name.','}}
                @endforeach
            </td>
            <td class="text-center">
                <a href="{{route('participants.engagement',$individual)}}"> {{$individual->participant_count}} </a>
            </td>
            <td  class="text-center">
                <div class="dropleft">
                    <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                    <div class="dropdown-menu">
                        @can('individual_update')
                            <x-button.edit>{{route('individuals.edit',$individual)}}</x-button.edit>
                        @endcan
                        @can('individual_delete')
                            <x-button.delete>{{route('individuals.destroy',$individual)}}</x-button.delete>
                        @endcan
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
</x-table.listing>
