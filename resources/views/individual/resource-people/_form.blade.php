<div class="form-group">
    <x-form.label name="Individual" star="true" />
    <x-dropdown.individual req="required" :model="$resourcePeople" />
</div>

<div class="form-group">
    <x-form.label name="Group" star="true" />
    <x-dropdown.individual-group req="required" :model="$resourcePeople" />
</div>

<div class="row form-group">
    <div class="col">
        <x-form.label name="Start Date" />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" :model="$resourcePeople" />
    </div>
    <div class="col">
        <x-form.label name="End Date" />
        <x-form.input label="" type="date" name="end_date" id="end_date" for="end_date"  :model="$resourcePeople" />
    </div>
</div>

<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8">{{old('desc',$resourcePeople->desc)}}</textarea>
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
