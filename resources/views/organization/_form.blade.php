<div class="row">
    <div class="col form-group">
        <x-form.label name="Name: <span class='star'>*</span>" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$organization"  />
    </div>
    <div class="col form-group">
        <x-form.label name="Acronym" />
        <x-form.input name="acronym" id="acronym" for="acronym" :model="$organization"  />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.label name="Founded" />
        <x-form.input name="founded" id="founded" for="founded" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.label name="Category: <span class='star'>*</span>" />
        <x-dropdown.organization-category req="required" :model="$organization"/>
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.label name="Location" />
        <x-dropdown.location :model="$organization"/>
    </div>
    <div class="col  form-group">
        <x-form.label name="Mobile" />
        <x-form.input name="mobile" id="mobile" for="mobile" :model="$organization" />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.label name="Email" />
        <x-form.input type="email" label="Email" name="email" id="email" for="email" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.label name="Website" />
        <x-form.input type="url" name="website" id="website" for="website" :model="$organization" />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.label name="Fax" />
        <x-form.input name="fax" id="fax" for="fax" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.label name="Address" />
        <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror">{{old('address',$organization->address)}}</textarea>
        @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.label name="Description" />
        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8">{{old('desc',$organization->desc)}}</textarea>
        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
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












