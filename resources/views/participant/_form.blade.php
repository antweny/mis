<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.label name="Event: <span class='star'>*</span>" />
        <x-dropdown.event  :model="$participant" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Participant: <span class='star'>*</span>" />
        <x-dropdown.individual  req="required" :model="$participant" />
    </div>
</div>


<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.input label="Engage Date: <span class='star'>*</span>" type="date" name="date" id="date" for="date" :model="$participant" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Participant Level"/>
        <select class="form-control @error('level') is-invalid @enderror single-select" name="level">
            <option value="">--</option>
            <option value="L" {{old('level',$participant->level) == 'L' ? 'selected' : '' }}>Local Participant</option>
            <option value="I" {{old('level',$participant->level) == 'I' ? 'selected' : '' }}>International Participant</option>
        </select>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Individual Group" />
        <x-dropdown.individual-group :model="$participant"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Participant Role" />
        <x-dropdown.participant-role :model="$participant"/>
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Organization/Group/Institute" />
        <x-dropdown.organization :model="$participant"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Where From" />
        <x-dropdown.location :model="$participant"/>
    </div>
</div>


<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('participants.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>

