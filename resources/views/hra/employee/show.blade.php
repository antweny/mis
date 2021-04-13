@extends('layouts.backend')
@section('title',$employee->name)
@section('content')
    <x-row>
        <x-slot name="left">
            <x-button.general label="Employees" icon="fas fa-list" class="btn btn-dark mr-3"> {{route('employees.index')}} </x-button.general>
        </x-slot>
    </x-row>


@endsection
