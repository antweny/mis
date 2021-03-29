<select name="bank_account_id" id="bank_account" class="form-control @error('bank_account_id') is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($bankAccounts as $bankAccount)
        <option value={{$bankAccount->id}} {{old('bank_account_id',!is_null($model) ? $model->bank_account_id : '' ) == $bankAccount->id ? 'selected' : ''}}>
            {{$bankAccount->name.' ('.$bankAccount->currency->acronym.') '}}
        </option>
    @endforeach
</select>
@error('bank_account_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
