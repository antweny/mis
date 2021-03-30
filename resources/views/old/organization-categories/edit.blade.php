@extends('layouts.templates.organization')
@section('title','Edit Organization Category')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <x-card title="Edit Organization Category">

                {{ Form::model($organizationCategory, array('route' => array('organizationCategories.update',$organizationCategory), 'method' => 'PUT')) }}
                    @csrf
                    <div class="form-group">
                        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$organizationCategory"  />
                    </div>
                    <div class="form-group">
                        <x-form.elements.input label="Sort" type="number" name="sort" id="sort" for="sort" :model="$organizationCategory"/>
                    </div>
                    <div class="form-group">
                        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$organizationCategory"/>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <div class="float-left">
                                <x-button.back> {{route('organizationCategories.index')}} </x-button.back>
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
