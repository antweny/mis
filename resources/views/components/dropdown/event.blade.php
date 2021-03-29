<select name="{{$name}}" id="event" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($events as $event)
        <option value={{$event->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $event->id ? 'selected' : ''}}>
            {{$event->name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
