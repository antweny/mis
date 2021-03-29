<select name="{{$name}}" id="brand" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($brands as $brand)
        <option value={{$brand->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $brand->id ? 'selected' : ''}}>
            {{ $brand->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
