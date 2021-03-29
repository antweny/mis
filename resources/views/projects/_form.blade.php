<div class="form-group row">
    <div class="col-md-9">
        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$project" />
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Active: <span class='star'>*</span>" for="active" />
        <select class="form-control" name="isActive" required>
            <option value="1" {{old('isActive',$project->isActive) == '1' ? 'selected' : ''}}>Yes</option>
            <option value="0" {{old('isActive',$project->isActive) == '0' ? 'selected' : ''}}>No</option>
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.elements.label name="Project Description: <span class='star'>*</span>" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8" required>{{old('desc',$project->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col-md-4">
        <x-form.elements.label name="Project Donor <span class='star'>*</span>" />
        <x-dropdown.bank req="required" :model="$project"/>
    </div>
    <div class="col-md-4">
        <x-form.elements.input label="Start Date: <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required" :model="$project" />
    </div>
    <div class="col-md-4">
        <x-form.elements.input label="End Date: <span class='star'>*</span>" type="date" name="end_date" id="end_date" for="end_date" req="required" :model="$project" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-8">
        <x-form.elements.label name="Project Coordinators <span class='star'>*</span>" />
        <x-dropdown.coordinator req="multiple" :model="$project" />
    </div>
    <div class="col-md-4">
        <x-form.elements.label name="Reporting Period: <span class='star'>*</span>" for="active" />
        <select class="form-control" name="reporting_period" required>
            <option value="">---</option>
            <option value="QRT" {{old('reporting_period',$project->reporting_period) == 'QRT' ? 'selected' : ''}}>Quarterly</option>
            <option value="BIA" {{old('reporting_period',$project->reporting_period) == 'BIA' ? 'selected' : ''}}>Biannual</option>
            <option value="ANN" {{old('reporting_period',$project->reporting_period) == 'ANN' ? 'selected' : ''}}>Annual</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('projects.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
