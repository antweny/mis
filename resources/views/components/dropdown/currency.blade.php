<select name="currency_id" id="currency" class="form-control @error('currency_id') is-invalid @enderror single-select" {{$req}}>
    @foreach($currencies as $currency)
        <option value={{$currency->id}} {{old('currency_id',!is_null($model) ? $model->currency_id : '' ) == $currency->id ? 'selected' : ''}}>{{$currency->curr_name}}</option>
    @endforeach
</select>
@error('currency_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
