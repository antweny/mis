
<div class="form-group">
    <x-form.label name="Date" star="true" />
    <input type="date" name="date" value="{{old('date',$visitor->date)}}" class="form-control @error('date') is-invalid @enderror" required />
    @error('date') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Full name" star="true" />
        <x-dropdown.individual req="required" class="single-select" :model="$visitor" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Where From" star="true" />
        <x-dropdown.location req="required" :model="$visitor"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Organization/Group/Institute" />
        <x-dropdown.organization :model="$visitor"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Staff to See" star="true" />
        <x-dropdown.employee req="required" :model="$visitor" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Time In" star="true" />
        <x-form.input name="check_in" id="time_from" for="check_in" req="required" :model="$visitor" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Time Out" />
        <x-form.input name="check_out" id="time_to" for="check_out" :model="$visitor" />
    </div>
</div>

<div class="form-group">
    <x-form.label name="Description" star="true" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8" required>{{old('desc',$visitor->desc)}}</textarea>
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

