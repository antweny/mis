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
                <div class="btn-group btn-group-sm">
                    @can('output_update')
                        <x-button.edit>{{route('outputs.edit',$output)}}</x-button.edit>
                    @endcan
                    @can('output_read')
{{--                        <a href="{{route('outputs.destroy',$output)}}" class="btn btn-secondary btn-sm mr-1" data-toggle="tooltip" data-placement="top" title="View" >--}}
{{--                            <i class="fa fa-eye"></i>--}}
{{--                        </a>--}}
                    @endcan
                    @can('output_delete')
                        <x-button.delete>{{route('outputs.destroy',$output)}}</x-button.delete>
                    @endcan
                </div>
            </td>
        </tr>
    @endforeach
@endforeach
