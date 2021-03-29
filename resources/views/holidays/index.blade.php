@extends('layouts.templates.hr')
@section('title','Holidays List')
@section('content')

    <x-row>
        <x-slot name="left">
            @can('holiday_create') <x-button.create label="Add Holiday" modal="modal"> #new </x-button.create> @endcan
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="Public Holidays List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Repeat</th>
                <th scope="col">Active</th>
                <th scope="col">Descriptions</th>
            </x-slot>

            <!-- table body -->
            @foreach ($holidays as $holiday)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$holiday->name}}</td>
                    <td  class="text-center">{{$holiday->tarehe}}</td>
                    <td  class="text-center">{!! $holiday->yearly !!}</td>
                    <td  class="text-center">{!! $holiday->is_active !!}</td>
                    <td  class="text-left">{{$holiday->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            @can('holiday_update')
                                <a href="{{route('holidays.edit',$holiday)}}" class="btn mr-2 btn-edit" data-toggle="tooltip" data-placement="top" title="Edit item" >
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('holiday_delete')
                                <form method="POST" action="{{route('holidays.destroy',$holiday)}}" class="form-horizontal" role="form" autocomplete="off">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-delete" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
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


    @can('holiday_create')
        <!-- Start Modal -->
        <x-modal id="new" title="New Holiday">
            <!-- Start form -->
            <x-form.post action="holidays.store">
                <div class="form-group">
                    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <x-form.elements.input label="Date <span class='star'>*</span>" type="date" name="date" id="date" req="required"  />
                    </div>
                    <div class="col-md-6">
                        <x-form.elements.label name="Repeat Yearly" />
                        <select class="form-control @error('repeat') is-invalid @enderror single-select" name="repeat" required>
                            <option value="0" {{old('repeat') == '0' ? 'selected' : ''}}>No</option>
                            <option value="1" {{old('repeat') == '1' ? 'selected' : ''}}>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" />
                </div>
                <div class="form-group text-right">
                    <x-button />
                </div>
            </x-form.post>
            <!-- end form -->
        </x-modal>
        <!-- end modal -->
    @endcan


@endsection
