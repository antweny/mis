<select name="leave_type_id" id="leaveType" class="form-control @error('leave_type_id') is-invalid @enderror single-select" {{$req}}>
    <option value="" >---</option>
    @foreach($leaveTypes as $leaveType)
        <option value={{$leaveType->id}} {{old('leave_type_id',!is_null($model) ? $model->leave_type_id: '' ) == $leaveType->id ? 'selected' : ''}}>{{$leaveType->name}}</option>
    @endforeach
</select>
@error('leave_type_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
