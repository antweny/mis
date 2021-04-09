@extends('layouts.backend')
@section('title','Edit Event Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Event Category">

                {{ Form::model($eventCategory, array('route' => array('eventCategories.update',$eventCategory), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.label name="Name: <span class='star'>*</span>" />
                        <x-form.input name="name" id="name" for="name" req="required" :model="$eventCategory"   />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Sort" />
                        <x-form.input type="number" name="sort" id="sort" for="sort" :model="$eventCategory" />
                    </div>
                    <div class="form-group">
                        <x-form.label name="Description" />
                        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{$eventCategory->desc}}</textarea>
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
