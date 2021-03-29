<div class=" row form-group">
    <div class="col-md-6">
        <x-form.elements.label name="Individual: <span class='star'>*</span>" />
        <x-dropdown.individual req="required" :model="$experience" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Organization: <span class='star'>*</span>" />
        <x-dropdown.organization req="required" :model="$experience"/>
    </div>
</div>

<div class="row  form-group">
    <div class="col-md-6">
        <x-form.elements.label name="Title: <span class='star'>*</span>" />
        <x-dropdown.job-title :model="$employee" req="required" name="heading" :model="$experience"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Where: <span class='star'>*</span>" />
        <x-dropdown.location name="place" :model="$experience" />
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.input label="Start Date" type="date" name="start_date" id="start_date" for="start_date" :model="$experience" />
    </div>
    <div class="col-md-6">
        <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date"  :model="$experience" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="8" />
</div>


<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('experiences.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="Update"/>
        </div>
    </div>
</div>
