<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Name" star="true" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$activity" />
    </div>
    <div class="col-md-3">
        <x-form.label name="Activity Status" star="true" />
        <select class="form-control @error('status') is-invalid @enderror single-select" name="status" required>
            <option value="">--</option>
            <option value="NS" {{old('status',$activity->status) == 'NS' ? 'selected' : ''}}>Not Started</option>
            <option value="IP" {{old('status',$activity->status) == 'IP' ? 'selected' : ''}}>In Progress</option>
            <option value="COM" {{old('status',$activity->status) == 'COM' ? 'selected' : ''}}>Completed</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Parent Activity" />
        <x-dropdown.activity name="parent_id" :model="$activity"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Project" star="true" />
        <x-dropdown.project-multiple :model="$activity"/>
    </div>

{{--    <x-dropdown.project name="parent_id" :model="$activity"/>--}}
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Output" star="true" />
        <x-dropdown.output :model="$activity" req="required"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Employee" star="true" />
        <x-dropdown.employee label="Responsible Staff: <span class='star'>*</span>" :model="$activity" req="required" />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Descriptions" star="true" />
        <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" rows="5" required>{{old('desc',$activity->desc)}}</textarea>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <x-form.label name="Start Date" star="true" />
            <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required" :model="$activity" />
        </div>
        <div class="form-group">
            <x-form.label name="Due Date" star="true" />
            <x-form.input type="date" name="due_date" id="due_date" for="due_date" req="required" :model="$activity" />
        </div>
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
