@extends('layouts.backend')
@section('title','Edit Thematic Areas')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <x-card title="Edit Thematic Area">

                {{ Form::model($thematicArea, array('route' => array('thematicAreas.update',$thematicArea), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name: <span class='star'>*</span>" />
                        <x-form.input name="name" id="name" for="name" :model="$thematicArea" req="required"   />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Parent" />
                        <x-dropdown.thematic-sector :model="$thematicArea" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$thematicArea->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button.submit label="Update"/>
                            </div>
                        </div>
                    </div>
                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
