<select name="{{$name}}" id="designation" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($designations as $designation)
        <option value={{$designation->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $designation->id ? 'selected' : ''}}>
            {{ $designation->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
