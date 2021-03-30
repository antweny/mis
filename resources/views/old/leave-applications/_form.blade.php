<div class="form-group row">
    <div class="col-md-8">
        <x-form.elements.label name="Send To <span class='star'>*</span>" />
        <x-dropdown.employee name="send_to" req="required" :model="$leaveApplication"/>
{{--        <x-employee.employee label=""  />--}}
    </div>
    <div class="col-md-4">
        <x-form.elements.label name="Type <span class='star'>*</span>" />
        <x-dropdown.leave-type req="required" :model="$leaveApplication"/>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.input label="Start Date <span class='star'>*</span>" type="date" name="start_date" id="start_date" for="start_date" req="required" :model="$leaveApplication" />
    </div>
    <div class="col-md-6">
        <x-form.elements.input label="End Date <span class='star'>*</span>" type="date" name="end_date" id="end_date" for="end_date" req="required" :model="$leaveApplication" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="8" :model="$leaveApplication" />
</div>


<div class="form-group text-right">
    <x-button.back> {{route('leaveApplications.index')}} </x-button.back>
    <x-button label="{{$buttonText}}"/>
</div>
