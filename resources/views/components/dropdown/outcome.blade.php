<select name="{{$name}}" id="outcome" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($outcomes as $outcome)
        <option value={{$outcome->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $outcome->id ? 'selected' : ''}}>
            {!! $outcome->outcome_name !!}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
