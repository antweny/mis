<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Name" star="true" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$outcome"  />
    </div>
    <div class="col-md-3">
        <x-form.label name="Department" star="true" />
        <x-dropdown.department req="required" :model="$outcome"/>
    </div>
    <div class="col-md-3">
        <x-form.label name="Year" star="true" />
        <select class="form-control @error('year') is-invalid @enderror single-select" name="year" required id="year">
            @for($year = date('Y'); $year > 1953 ; $year--)
                <option value="{{$year}}" {{old('year',$outcome->year) == $year ? 'selected' : ''}}>{{$year}}</option>
            @endfor
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Descriptions" star="true" />
    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" required>{{old('desc',$outcome->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>


<div class="form-group">
    <x-form.label name="Indicators" star="true" />
    <x-dropdown.indicator :model="$outcome" />
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
