


<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Topic: <span class='star'>*</span>"/>
        <x-form.elements.input name="topic" id="topic" for="topic" req="required" :model="$genderSeries"  />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Coordinator: <span class='star'>*</span>" />
        <x-dropdown.employee req="required" :model="$genderSeries"/>
    </div>
</div>


<div class=" form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Facilitators <span class='star'>*</span>" />
        <x-dropdown.facilitator req="multiple" :model="$genderSeries" req="required"/>
    </div>
    <div class="col-md-3">
        <x-form.elements.input label="Date <span class='star'>*</span>" type="date" name="date" id="date" for="date" :model="$genderSeries" req="required" />
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Status" />
        <select name="status"  class="form-control @error('status') is-invalid @enderror">
            <option value="">---</option>
            <option value="UPC" {{old('status',$genderSeries->status) == 'UPC' ? 'selected' : ''}}>Upcoming</option>
            <option value="NOD" {{old('status',$genderSeries->status) == 'NOD' ? 'selected' : ''}}>Not Done</option>
            <option value="COMP" {{old('status',$genderSeries->status) == 'COMP' ? 'selected' : ''}}>Completed</option>
        </select>
        @error('status') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$genderSeries" />
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('genderSeries.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
