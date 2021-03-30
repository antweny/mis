<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$outcome"  />
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Department: <span class='star'>*</span>" for="year" />
        <x-dropdown.department req="required" :model="$outcome"/>
    </div>
    <div class="col-md-3">
        <x-form.elements.label name="Year: <span class='star'>*</span>" for="year" />
        <select class="form-control @error('year') is-invalid @enderror single-select" name="year" required id="year">
            @for($year = date('Y'); $year > 1953 ; $year--)
                <option value="{{$year}}" {{old('year',$outcome->year) == $year ? 'selected' : ''}}>{{$year}}</option>
            @endfor
        </select>
    </div>
</div>

<div class="form-group">
    <x-form.elements.label name="Descriptions: <span class='star'>*</span>"></x-form.elements.label>
    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" required>{{old('desc',$outcome->desc)}}</textarea>
</div>


<div class="form-group">
    <x-form.elements.label name="Indicator: <span class='star'>*</span>" for="year" />
    <x-dropdown.indicator :model="$outcome" />
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('outcomes.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
