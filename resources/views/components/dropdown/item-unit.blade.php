<select name="item_unit_id" id="itemUnit" class="form-control @error('item_unit_id') is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($itemUnits as $itemUnit)
        <option value={{$itemUnit->id}} {{old('item_unit_id',!is_null($model) ? $model->item_unit_id : '' ) == $itemUnit->id ? 'selected' : ''}}>{{$itemUnit->name}}</option>
    @endforeach
</select>
@error('item_unit_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
