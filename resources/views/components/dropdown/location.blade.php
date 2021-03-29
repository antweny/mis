<select name="{{$name}}" id="location" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($locations as $location)
        <option value={{$location->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $location->id ? 'selected' : ''}}>
            {{ $location->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
