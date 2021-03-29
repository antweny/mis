<select name="item_id" id="item" class="form-control @error('item_id') is-invalid @enderror single-select" {{$req}}>
    @foreach($items as $item)
        <option value={{$item->id}} {{old('item_id',!is_null($model) ? $model->item_id : '' ) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
    @endforeach
</select>
@error('item_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
