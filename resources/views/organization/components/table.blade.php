<!-- Table Start -->
<x-table.listing :collection="$organizations">
    <!-- table headers -->
    <x-slot name="thead" >
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Location</th>
        <th scope="col">Website</th>
        <th scope="col">Mobile</th>
        <th scope="col">Members</th>
    </x-slot>
    <!-- end table head -->

    <!-- table body -->
    @foreach ($organizations as $organization)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-left">{!! $organization->name_click !!}</td>
            <td class="text-center">{{$organization->organization_category->name}}</td>
            <td class="text-center">{{$organization->location->name}}</td>
            <td class="text-center">{{$organization->website}}</td>
            <td class="text-center">{{$organization->mobile}}</td>
            <td class="text-center"><a href="{{route('experiences.organization',$organization)}}">{{$organization->experience_count }}</a></td>
            <td  class="text-center">
                <div class="dropleft">
                    <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                    <div class="dropdown-menu">
                        @can('organization_update')
                            <x-button.edit>{{route('organizations.edit',$organization)}}</x-button.edit>
                        @endcan
                        @can('organization_delete')
                            <x-button.delete>{{route('organizations.destroy',$organization)}}</x-button.delete>
                        @endcan
                    </div>
                </div>
            </td>
        </tr>
@endforeach
<!-- end table body -->
</x-table.listing>
