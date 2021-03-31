<select name="manager" id="employee" class="form-control @error('manager') is-invalid @enderror single-select" {{$req}}>
    <option value="" >---</option>
    @foreach($employees as $employee)
        <option value={{$employee->id}} {{old('manager',!is_null($model) ? $model->manager: '' ) == $employee->id ? 'selected' : ''}}>{{$employee->name}}</option>
    @endforeach
</select>
@error('manager') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
