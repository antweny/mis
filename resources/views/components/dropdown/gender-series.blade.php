<select name="{{$name}}" id="genderSeries" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($genders as $genderSeries)
        <option value={{$genderSeries->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $genderSeries->id ? 'selected' : ''}}>
            {{ humanDate($genderSeries->date).' - '.$genderSeries->topic }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
