@extends('layouts.backend')
@section('title','Edit Organization Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Organization Category">

                {{ Form::model($organizationCategory, array('route' => array('organizationCategories.update',$organizationCategory), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name" star="true" />
                        <x-form.input  name="name" id="name" for="name" req="required" :model="$organizationCategory"  />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Sort" />
                        <x-form.input  type="number" name="sort" id="sort" for="sort" :model="$organizationCategory"/>
                    </div>
                    <div class="form-group">
                        <x-form.label name="Descriptions" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$organizationCategory->desc}}</textarea>
                        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back />
                            </div>
                            <div class="float-right">
                                <x-button label="Update"/>
                            </div>
                        </div>
                    </div>
                {{Form::close()}}

            </x-card>
        </div>
    </div>



@endsection
