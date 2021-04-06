<div class=" row form-group">
    <div class="col-md-6">
        <x-form.label name="Individual: <span class='star'>*</span>" />
        <x-dropdown.individual req="required" :model="$experience" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Organization: <span class='star'>*</span>" />
        <x-dropdown.organization req="required" :model="$experience"/>
    </div>
</div>

<div class="row  form-group">
    <div class="col-md-6">
        <x-form.label name="Title: <span class='star'>*</span>" />
        <x-dropdown.job-title :model="$employee" req="required" :model="$experience"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Where: <span class='star'>*</span>" />
        <x-dropdown.location :model="$experience" />
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.label name="Start Date" />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" :model="$experience" />
    </div>
    <div class="col-md-6">
        <x-form.label name="End Date" />
        <x-form.input type="date" name="end_date" id="end_date" for="end_date"  :model="$experience" />
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
            <x-button.submit label="{{$buttonText}}"/>
        </div>
    </div>
</div>
