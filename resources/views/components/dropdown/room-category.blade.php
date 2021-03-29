<select name="{{$name}}" id="roomCategory" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($roomCategories as $roomCategory)
        <option value={{$roomCategory->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $roomCategory->id ? 'selected' : ''}}>
            {{$roomCategory->name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

