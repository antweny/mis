@extends('layouts.backend')
@section('title','Organizations List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('organization_create')
                <x-button.create label="Add Organization"> {{route('organizations.create')}} </x-button.create>
                <x-button.create label="Import" modal="modal"> #import </x-button.create>
{{--            <x-button.general label="Import" icon="fas fa-file-upload" modal="modal" class="btn btn-dark"> #import </x-button.general>  --}}
            @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Organizations List">
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
                        <div class="btn-group btn-group-sm">
                            @can('organization_update')
                                <a href="{{route('organizations.edit',$organization)}} " class="btn btn-edit mr-2" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('organization_delete')
                                <form method="POST" action="{{route('organizations.destroy',$organization)}}" class="form-horizontal" role="form" autocomplete="off">
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
        <!-- end table body -->
        </x-table.listing>
        <!--end listing of collection -->
    </x-card>

    @can('organization_create')
        <!-- Start Modal -->
        <x-modal id="import" title="Import Organization">
            <!-- Start form -->
            <x-form.post action="organizations.import">
                <div class="form-group">
                    <x-form.label name="Import File <span class='star'>*</span>" for="imported_file" />
                    <x-form.input type="file" name="imported_file" id="imported_file" required="required"/>
                </div>
                <div class="form-group text-right">
                    <x-button.submit />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan
@endsection

