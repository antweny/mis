<select name="{{$name}}" id="organization" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($organizations as $organization)
        <option value={{$organization->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $organization->id ? 'selected' : ''}}>
            {{$organization->org_name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
