<div class="form-group row">
    <div class="col-md-6">
        <!-- Date -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Date" star="true" for="date" />
            </div>
            <div class="col-md-7">
                <x-form.input type="date" name="date" id="date" for="date" req="required" :model="$payment" />
            </div>
        </div>
        <!-- Payee -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Payee" star="true" for="payee" />
            </div>
            <div class="col-md-7">
                <x-dropdown.payee :model="$payment" />
            </div>
        </div>
        <!-- Bank Account -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Bank Account" star="true" for="bank_account" />
            </div>
            <div class="col-md-7">
                <x-dropdown.bank-account :model="$payment"/>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <!-- Voucher No -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Payment No" star="true" for="payment_no" />
            </div>
            <div class="col-md-7">
                <x-form.input type="number" name="payment_no" id="payment_no" for="payment_no" :model="$payment" req="required"/>
            </div>
        </div>
        <!-- Transaction Type -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Payment Type: <span class='star'>*</span> " for="payment_type" />
            </div>
            <div class="col-md-7">
                <select class="form-control @error('payment_type') is-invalid @enderror single-select" name="payment_type" required>
                    <option value="">---</option>
                    <option value="CHQ" {{old('payment_type',$payment->payment_type) == 'CHQ' ? 'selected' : ''}}>Cheque</option>
                    <option value="TT" {{old('payment_type',$payment->payment_type) == 'TT' ? 'selected' : ''}}>Transfer (TT)</option>
                </select>
            </div>
        </div>
        <!-- Currency -->
        <div class="row mb-3">
            <div class="col-md-5">
                <x-form.label name="Amount" star="true" for="amount" />
            </div>
            <div class="col-md-7">
                <x-form.input type="number" name="amount" id="amount" for="amount" :model="$payment" req="required" />
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Amount in Words" star="true" />
    <textarea name="amount_words" class="form-control @error('amount_words') is-invalid @enderror" id="amount_words" required>{{old('amount_words',$payment->amount_words)}}</textarea>
    @error('address') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back />
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
