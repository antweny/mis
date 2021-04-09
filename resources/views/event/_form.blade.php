<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Event Name: <span class='star'>*</span>" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$event"  />
    </div>
    <div class="col-md-3">
        <x-form.label name="Category <span class='star'>*</span>" />
        <x-dropdown.event-category req="required" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Parent" />
        <x-dropdown.event name="parent_id" :model="$event" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Coordinators <span class='star'>*</span>" />
        <x-dropdown.coordinator req="multiple" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Organiser <span class='star'>*</span>" />
        <x-dropdown.organiser req="multiple" :model="$event" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Facilitators <span class='star'>*</span>" />
        <x-dropdown.facilitator req="multiple" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Activity" />

    </div>
    <div class="col-md-3">
        <x-form.label name="Start Date <span class='star'>*</span>" />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" :model="$event" />
    </div>
    <div class="col-md-3">
        <x-form.label name="End Date" />
        <x-form.input type="date" name="end_date" id="end_date" for="end_date"  :model="$event" />
    </div>
</div>


<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8">{{old('desc',$event->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
