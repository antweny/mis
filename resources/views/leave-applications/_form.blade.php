<div class="form-group row">
    <div class="col-md-8">
        <x-form.label name="Send To <span class='star'>*</span>" />
        <x-dropdown.employee name="send_to" req="required" :model="$leaveApplication"/>
    </div>
    <div class="col-md-4">
        <x-form.label name="Type <span class='star'>*</span>" />
        <x-dropdown.leave-type req="required" :model="$leaveApplication"/>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.label name="Start Date <span class='star'>*</span>" />
        <x-form.input type="date" name="start_date" id="start_date" for="start_date" req="required" :model="$leaveApplication" />
    </div>
    <div class="col-md-6">
        <x-form.label name="End Date <span class='star'>*</span>" />
        <x-form.input type="date" name="end_date" id="end_date" for="end_date" req="required" :model="$leaveApplication" />
    </div>
</div>

<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="8">{{$leaveApplication->desc}}</textarea>
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
