<select name="item_category_id" id="itemCategory" class="form-control @error('item_category_id') is-invalid @enderror single-select" {{$req}}>
    @foreach($itemCategories as $itemCategory)
        <option value={{$itemCategory->id}} {{old('item_category_id',!is_null($model) ? $model->item_category_id : '' ) == $itemCategory->id ? 'selected' : ''}}>{{$itemCategory->name}}</option>
    @endforeach
</select>
@error('item_category_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
