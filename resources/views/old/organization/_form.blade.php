<div class="row">
    <div class="col form-group">
        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$organization"  />
    </div>
    <div class="col form-group">
        <x-form.elements.input label="Acronym" name="acronym" id="acronym" for="acronym" :model="$organization"  />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.elements.input label="Founded" name="founded" id="founded" for="founded" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.elements.label name="Category: <span class='star'>*</span>" />
        <x-dropdown.organization-category name="org_category" req="required" :model="$organization"/>
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.elements.label name="Place" />
        <x-dropdown.location name="place" :model="$organization"/>
    </div>
    <div class="col  form-group">
        <x-form.elements.input label="Mobile" name="mobile" id="mobile" for="mobile" :model="$organization" />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.elements.input type="email" label="Email" name="email" id="email" for="email" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.elements.input type="url" label="Website" name="website" id="website" for="website" :model="$organization" />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.elements.input label="Fax" name="fax" id="fax" for="fax" :model="$organization" />
    </div>
    <div class="col form-group">
        <x-form.elements.textarea label="Address" name="address" id="address" row="1" :model="$organization" />
    </div>
</div>
<div class="row">
    <div class="col form-group">
        <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="8" :model="$organization" />
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('organizations.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="Update"/>
        </div>
    </div>
</div>












