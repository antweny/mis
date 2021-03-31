<div class="form-group row">
    <div class="col-md-9">
        <x-form.label name="Name: <span class='star'>*</span>" />
        <x-form.input name="name" id="name" for="name" req="required" :model="$output"  />
    </div>

    <div class="col-md-3">
        <x-form.label name="Year: <span class='star'>*</span>" for="year" />
        <select class="form-control @error('year') is-invalid @enderror single-select" name="year" required id="year">
            @for($year = date('Y'); $year > 1953 ; $year--)
                <option value="{{$year}}" {{old('year', $output->year) == $year ? 'selected' : ''}}>{{$year}}</option>
            @endfor
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Descriptions: <span class='star'>*</span>"></x-form.label>
    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" required>{{old('desc',$output->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Outcome <span class='star'>*</span>" />
        <x-dropdown.outcome :model="$output" req="required"/>
    </div>
    <div class="col-md-6">
        <x-dropdown.indicator label="Indicators: <span class='star'>*</span>" :model="$output" />
    </div>
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
