<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.label name="GDSS Topic and Date: <span class='star'>*</span>" />
        <x-dropdown.gender-series  req="required" :model="$genderSeriesParticipant" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Participant: <span class='star'>*</span>" />
        <x-dropdown.individual  req="required" :model="$genderSeriesParticipant" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Individual Group" />
        <x-dropdown.individual-group :model="$genderSeriesParticipant"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Participant Role" />
        <x-dropdown.participant-role :model="$genderSeriesParticipant"/>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Organization/Group/Institute" />
        <x-dropdown.organization :model="$genderSeriesParticipant"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Where From" />
        <x-dropdown.location :model="$genderSeriesParticipant"/>
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('genderSeriesParticipants.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
