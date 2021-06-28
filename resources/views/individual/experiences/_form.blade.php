<div class=" row form-group">
    <div class="col-md-6">
        <x-form.label name="Individual" star="true" />
        <x-dropdown.individual req="required" :model="$experience" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Organization" star="true" />
        <x-dropdown.organization req="required" :model="$experience"/>
    </div>
</div>

<div class="row  form-group">
    <div class="col-md-6">
        <x-form.label name="Title" star="true" />
        <x-dropdown.job-title req="required" :model="$experience"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Where" star="true" />
        <x-dropdown.location :model="$experience" />
    </div>
</div>

<div class="row form-group">
    <div class="col-md-4">
        <x-form.label name="Start Date" star="true" />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" :model="$experience" />
    </div>
    <div class="col-md-4">
        <x-form.label name="End Date" />
        <x-form.input type="date" name="end_date" id="end_date" for="end_date"  :model="$experience" />
    </div>
    <div class="col-md-4">
        <x-form.label name="Is Active?" star="true" />
        <select class="form-control @error('active') is-invalid @enderror single-select" name="active" required>
            <option value="">----</option>
            <option value="1" {{old('active',$experience->active) == '1' ? 'selected' : ''}}>Yes</option>
            <option value="0" {{old('active',$experience->active) == '0' ? 'selected' : ''}}>No</option>
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8">{{old('desc',$experience->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
