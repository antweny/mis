
<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.input label="Event Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$event"  />
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Parent" />
        <x-dropdown.event name="parent_id" :model="$event" />
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Category <span class='star'>*</span>" />
        <x-dropdown.event-category req="required" :model="$event" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Coordinators <span class='star'>*</span>" />
        <x-dropdown.coordinator req="multiple" :model="$event" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Organiser <span class='star'>*</span>" />
        <x-dropdown.organiser req="multiple" :model="$event" />
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <x-form.elements.label name="Facilitators <span class='star'>*</span>" />
        <x-dropdown.facilitator req="multiple" :model="$event" />
    </div>
    <div class="col-md-3 form-group ">
        <x-form.elements.input label="Start Date <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" :model="$event" />
    </div>
    <div class="col-md-3 form-group ">
        <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date"  :model="$event" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$event" />
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('events.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="Update"/>
        </div>
    </div>
</div>
