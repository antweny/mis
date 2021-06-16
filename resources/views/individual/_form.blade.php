<div class="form-group row">
    <div class="col-md-4">
        <x-form.label name="Name" star="true" for="name" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$individual"  />
    </div>
    <div class="col-md-4">
        <x-form.label name="Sex" for="sex" />
        <select class="form-control @error('sex') is-invalid @enderror single-select" name="sex">
            <option value="">--</option>
            <option value="Male" {{old('sex',$individual->sex) == 'Male' ? 'selected' : ''}}>Male</option>
            <option value="Female" {{old('sex',$individual->sex) == 'Female' ? 'selected' : ''}}>Female</option>
        </select>
    </div>
    <div class="col-md-4">
        <x-form.label name="Age Group" for="age_group" />
        <select class="form-control @error('age_group') is-invalid @enderror single-select" name="age_group">
            <option value="">--</option>
            <option value="13-17" {{old('age_group',$individual->age_group) == '13-17' ? 'selected' : ''}}>13-17</option>
            <option value="18-25" {{old('age_group',$individual->age_group) == '18-25' ? 'selected' : ''}}>18-25</option>
            <option value="26-35" {{old('age_group',$individual->age_group) == '26-35' ? 'selected' : ''}}>26-35</option>
            <option value="36-45" {{old('age_group',$individual->age_group) == '36-45' ? 'selected' : ''}}>36-45</option>
            <option value="46-55" {{old('age_group',$individual->age_group) == '46-55' ? 'selected' : ''}}>46-55</option>
            <option value="55+" {{old('age_group',$individual->age_group) == '55+' ? 'selected' : ''}}>55+</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-4">
        <x-form.label name="Mobile" />
        <x-form.input name="mobile" id="mobile" for="mobile" :model="$individual"  />
    </div>
    <div class="col-md-4">
        <x-form.label name="Occupation" />
        <x-form.input name="occupation" id="occupation" for="occupation" :model="$individual"  />
    </div>
    <div class="col-md-4">
        <x-form.label name="Place" />
        <x-dropdown.location :model="$individual"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Email" />
        <x-form.input type="email" name="email" id="email" for="email" :model="$individual"  />
        <br/>
        <x-form.label name="Group Member" />
        <x-dropdown.individual-member :model="$individual" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Description" />
        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{old('address',$individual->address)}}</textarea>
        @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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

