<div class="form-group">
    <x-form.elements.label name="Individual: <span class='star'>*</span>" />
    <x-dropdown.individual req="required" :model="$resourcePeople" />
</div>

<div class="form-group">
    <x-form.elements.label name="Group: <span class='star'>*</span>" />
    <x-dropdown.individual-group req="required" :model="$resourcePeople" />
</div>

<div class="row form-group">
    <div class="col">
        <x-form.elements.input label="Start Date" type="date" name="start_date" id="start_date" for="start_date" :model="$resourcePeople" />
    </div>
    <div class="col">
        <x-form.elements.input label="End Date" type="date" name="end_date" id="end_date" for="end_date"  :model="$resourcePeople" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="8" />
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('resourcePeople.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="Update"/>
        </div>
    </div>
</div>
