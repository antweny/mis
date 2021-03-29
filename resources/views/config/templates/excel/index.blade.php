@extends('layouts.dashboard')
@section('title','Excel Templates')
@section('content')

    <x-row>
        <x-slot name="left">
            <x-button.create label="Add Excel Template" modal="modal"> #import </x-button.create>
        </x-slot>
    </x-row>

    <!-- Start Card -->
    <x-card title="<i class='fa fa-file-excel'></i> Excel Templates List">
        <!-- Table Start -->
        <x-table.listing>
            <!-- table headers -->
            <x-slot name="thead" >
                <th>Name</th>
                <th>Description</th>
            </x-slot>

            <!-- table body -->
            @foreach ($templates as $template)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-left">{{$template->name}}</td>
                    <td  class="text-left">{{$template->desc}}</td>
                    <td  class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('excelTemplates.download',$template->path)}}" class="btn btn-primary btn-sm mr-3" data-toggle="tooltip" data-placement="top" title="Download file" >
                                <i class="fa fa-download"></i>
                            </a>

                            <x-button.delete> {{route('excelTemplates.destroy',$template)}} </x-button.delete>
                        </div>
                    </td>
                </tr>
            @endforeach





        </x-table.listing>
    </x-card>

    <x-modal id="import" title="Add Excel Template">
        <!-- Start form -->
        <x-form.post action="excelTemplates.store">
            <div class="form-group">
                <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required"   />
            </div>
            <div class="form-group">
                <x-form.elements.label name="Import File <span class='star'>*</span>" for="imported_file" />
                <x-form.elements.input type="file" name="imported_file" id="imported_file" required="required"/>
            </div>
            <div class="form-group">
                <x-form.elements.textarea label="Descriptions" name="desc" row="5" id="desc" />
            </div>
            <div class="form-group text-right">
                <x-button />
            </div>
        </x-form.post>
    </x-modal>


@endsection
