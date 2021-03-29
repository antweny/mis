<select name="{{$name}}" id="employee" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="" >---</option>
    @foreach($employees as $employee)
        <option value={{$employee->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $employee->id ? 'selected' : ''}}>{{$employee->name}}</option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
