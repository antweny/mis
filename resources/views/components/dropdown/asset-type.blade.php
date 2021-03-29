<select name="{{$name}}" id="assetType" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($assetTypes as $assetType)
        <option value={{$assetType->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $assetType->id ? 'selected' : ''}}>
            {{ $assetType->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
