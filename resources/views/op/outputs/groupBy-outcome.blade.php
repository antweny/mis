<!-- table body -->
@foreach ($outputs as $outcome => $outputOutComes)
    <td colspan="5" class="bg-dark text-white">{!! $outcome !!}</td>
        <!-- Table Start -->

    @foreach ($outputOutComes as $output)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td class="text-left">{{$output->name}}</td>
            <td  class="text-left">{{$output->desc}}</td>
            <td  class="text-center">{{$output->year}}</td>
            <td  class="text-center">
                <div class="dropleft">
                    <button type="button" class="btn btn-light" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i> </button>
                    <div class="dropdown-menu">
                        @can('output_update')
                            <x-button.edit>{{route('outputs.edit',$output)}}</x-button.edit>
                        @endcan
                            @can('output_delete')
                                <x-button.delete>{{route('outputs.destroy',$output)}}</x-button.delete>
                            @endcan
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endforeach
