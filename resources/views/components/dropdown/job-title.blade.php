<select name="{{$name}}" id="jobTitle" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($jobTitles as $jobTitle)
        <option value={{$jobTitle->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $jobTitle->id ? 'selected' : ''}}>
            {{ $jobTitle->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
