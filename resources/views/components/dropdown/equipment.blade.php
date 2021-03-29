<select name="{{$name}}" id="equipment" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($equipments as $equipment)
        <option value={{$equipment->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $equipment->id ? 'selected' : ''}}>
            {{ $equipment->brand->name.' '.$equipment->model }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
