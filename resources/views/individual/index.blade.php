@extends('layouts.backend')
@section('title','Individuals List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('individual_create') <x-button.create label="Add Individual"> {{route('individuals.create')}} </x-button.create> @endcan
{{--            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general> @endcan--}}
        </x-slot>
        <x-slot name="right">
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle btn btn-outline-black" id="export" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-download"></i> Export
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="export">
                        <a class="dropdown-item" href="{{route('individuals.export')}}"><i class="fa fa-file-excel"></i> Excel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('individuals.export','csv')}}"> <i class="fa fa-file-csv"></i> CSV </a>
                    </div>
                </li>
            </ul>
         </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Individuals List">
        <!-- Table Start -->
        <x-table.listing :model="$individuals">
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
                        <div class="btn-group btn-group-sm">
                            @can('individual_update')
                                <a href="{{route('individuals.edit',$individual)}} " class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('individual_delete')
                                <form method="POST" action="{{route('individuals.destroy',$individual)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete btn-sm" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-table.listing>
    </x-card>

    @can('individual_create')
        <x-modal id="import" title="Import Individual">
            <!-- Start form -->
            <x-form.post action="individuals.import">
                <div class="form-group">
                    <x-form.label name="Import File <span class='star'>*</span>" for="imported_file" />
                    <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button.submit />
                </div>
            </x-form.post>
        </x-modal>
    @endcan

@endsection
