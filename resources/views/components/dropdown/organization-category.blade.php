<select name="{{$name}}" id="organizationCategory" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($organizationCategories as $organizationCategory)
        <option value={{$organizationCategory->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $organizationCategory->id ? 'selected' : ''}}>
            {{$organizationCategory->name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

