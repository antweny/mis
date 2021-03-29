<select name="{{$name}}" id="individual" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($individuals as $individual)
        <option value={{$individual->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $individual->id ? 'selected' : ''}}>
            {{$individual->individual_name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
