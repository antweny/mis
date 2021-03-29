<select name="{{$name}}" id="eventCategory" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($eventCategories as $eventCategory)
        <option value={{$eventCategory->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $eventCategory->id ? 'selected' : ''}}>
            {{$eventCategory->name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

