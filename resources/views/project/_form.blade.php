
<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Project Name" star="true" />
        <x-form.input label="" name="name" id="name" for="name" req="required" :model="$project" />
    </div>
    <div class="col-md-3">
        <x-form.label name="Active" star="true"  />
        <select class="form-control" name="isActive" required>
            <option value="1" {{old('isActive',$project->isActive) == '1' ? 'selected' : ''}}>Yes</option>
            <option value="0" {{old('isActive',$project->isActive) == '0' ? 'selected' : ''}}>No</option>
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Project Description" star="true"  />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8" required>{{old('desc',$project->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col-md-4">
        <x-form.label name="Project Donor" star="true"  />
        <x-dropdown.donor req="required" :model="$project"/>
    </div>
    <div class="col-md-4">
        <x-form.label name="Start Date" star="true"  />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required" :model="$project" />
    </div>
    <div class="col-md-4">
        <x-form.label name="End Date" star="true"  />
        <x-form.input type="date" name="end_date" id="end_date" for="end_date" req="required" :model="$project" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-8">
        <x-form.label name="Project Coordinators" star="true"  />
        <x-dropdown.coordinator req="multiple" :model="$project" />
    </div>
    <div class="col-md-4">
        <x-form.label name="Reporting Period" star="true"  />
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
            <x-button.back />
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
