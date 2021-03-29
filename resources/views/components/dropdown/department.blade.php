<select name="{{$name}}" id="department" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($departments as $department)
        <option value={{$department->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $department->id ? 'selected' : ''}}>
            {{ $department->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
