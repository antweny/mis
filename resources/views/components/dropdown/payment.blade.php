<select name="payment_id" id="payment" class="form-control @error('payment_id') is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($payments as $payment)
        <option value={{$payment->id}} {{old('payment_id',!is_null($model) ? $model->payment_id : '' ) == $payment->id ? 'selected' : ''}}>
            {{$payment->payee->name.' ('.$payment->amount.')'}}
        </option>
    @endforeach
</select>
@error('payment_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
