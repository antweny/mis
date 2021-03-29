
<div class="form-group row">
    <div class="col-md-6">
        <x-individual.individual label="Full name: <span class='star'>*</span>" req="required" class="single-select" :model="$visitor" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Location: <span class='star'>*</span>" />
        <x-dropdown.location name="place" req="required" :model="$visitor"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-organization.organization label="Organization" name="company" :model="$visitor"/>
    </div>
    <div class="col-md-6">
        <x-employee.employee label="Staff: <span class='star'>*</span>" req="required" :model="$visitor" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.input label="Check In: <span class='star'>*</span>" name="check_in" id="check_in" for="check_in" req="required" :model="$visitor" />
    </div>
    <div class="col-md-6">
        <x-form.elements.input label="Check Out" name="check_out" id="check_out" for="check_out" :model="$visitor" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.label name="Purpose: <span class='star'>*</span>"></x-form.elements.label>
    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" rows="5" required>{{old('desc',$visitor->desc)}}</textarea>
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('visitors.index')}}  </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>

