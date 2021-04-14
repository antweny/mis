<div class="row">
    <div class="col-md-9">
        <!-- Start Card -->
        <x-card title="Designations List">
            <!-- Table Start -->
            <x-table.listing >
                <!-- table headers -->
                <x-slot name="thead" >
                    <th scope="col">Name</th>
                    <th scope="col">Acronym</th>
                    <th scope="col">Descriptions</th>
                </x-slot>
                <!-- end table head -->

                <!-- table body -->
                @foreach ($designations as $designation)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="text-left">{{$designation->name}}</td>
                        <td class="text-center">{{$designation->acronym}}</td>
                        <td  class="text-left">{{$designation->desc}}</td>
                        <td  class="text-center">
                            <div class="btn-group btn-group-sm">
                                @can('designation_update')
                                    <x-button.edit>{{route('designations.edit',$designation)}}</x-button.edit>
                                @endcan
                                @can('designation_delete')
                                    <x-button.delete>{{route('designations.destroy',$designation)}}</x-button.delete>
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
    </div>


    <div class="col-md-3">
        form
    </div>
</div>
