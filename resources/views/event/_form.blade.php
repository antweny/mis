<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Event Name" star="true" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$event"  />
    </div>
    <div class="col-md-3">
        <x-form.label name="Category" star="true" />
        <x-dropdown.event-category req="required" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Parent" />
        <x-dropdown.event name="parent_id" :model="$event" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Coordinators" star="true" />
        <x-dropdown.coordinator req="multiple" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Organiser" star="true" />
        <x-dropdown.organiser req="multiple" :model="$event" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Facilitators" star="true" />
        <x-dropdown.facilitator req="multiple" :model="$event" />
    </div>
</div>


<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Activity" />

    </div>
    <div class="col-md-3">
        <x-form.label name="Start Date" star="true" />
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
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
