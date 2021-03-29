<select name="payee_id" id="payee" class="form-control @error('payee_id') is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($payees as $payee)
        <option value={{$payee->id}} {{old('payee_id',!is_null($model) ? $model->payee_id : '' ) == $payee->id ? 'selected' : ''}}>
            {{$payee->name}}
        </option>
    @endforeach
</select>
@error('payee_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
