@extends('layouts.backend')
@section('title','Individuals List')
@section('content')

{{--    <x-row>--}}
{{--      --}}
{{--        <x-slot name="right">--}}
{{--            <ul class="navbar-nav ml-auto ml-md-0">--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="dropdown-toggle btn btn-outline-black" id="export" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="fa fa-download"></i> Export--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="export">--}}
{{--                        <a class="dropdown-item" href="{{route('individuals.export')}}"><i class="fa fa-file-excel"></i> Excel</a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                        <a class="dropdown-item" href="{{route('individuals.export','csv')}}"> <i class="fa fa-file-csv"></i> CSV </a>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--         </x-slot>--}}
{{--    </x-row>--}}

    <!-- Start Card -->
    <x-card title="Individuals List">
        <x-slot name="cardButton">
            @can('individual_create')
                <x-button.create label="Add Individual"> {{route('individuals.create')}} </x-button.create>
                <x-button.general label="Export" class="btn-primary"> {{route('individuals.export')}} </x-button.general>
            @endcan
        </x-slot>
        <!-- Table Start -->
        <x-table.listing id="table">
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Mobile</th>
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
                    <td  class="text-center">{{$individual->sex}}</td>
                    <td  class="text-center">{{$individual->age_group}}</td>
                    <td  class="text-left">{{$individual->occupation}}</td>
                    <td class="text-center">{{$individual->location->name}}</td>
                    <td class="text-center">
                        @foreach($individual->individual_group as $group)
                            {{$group->name.' | '}}
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
    </x-card>

    @can('individual_create')
        <x-modal id="import" title="Import Individual">
            <!-- Start form -->
            <x-form action="{{route('individuals.import')}}">
                <div class="form-group">
                    <x-form.label name="Import File" star="true" for="imported_file" />
                    <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form>
        </x-modal>
    @endcan

@endsection
