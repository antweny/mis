<select name="{{$name}}" id="activity" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($activities as $activity)
        <option value={{$activity->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $activity->id ? 'selected' : ''}}>
            {!! $activity->activity_name !!}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
