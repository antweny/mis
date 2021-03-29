<select name="{{$name}}" id="jobType" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($jobTypes as $jobType)
        <option value={{$jobType->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $jobType->id ? 'selected' : ''}}>
            {{ $jobType->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
