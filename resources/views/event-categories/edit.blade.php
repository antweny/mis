@extends('layouts.templates.event')
@section('title','Edit Event Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Event Category">

                {{ Form::model($eventCategory, array('route' => array('eventCategories.update',$eventCategory), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$eventCategory"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Sort" type="number" name="sort" id="sort" for="sort" :model="$eventCategory"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$eventCategory"/>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('eventCategories.index')}} </x-button.back>
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
