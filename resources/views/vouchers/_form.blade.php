<div class="form-group">
    <x-form.label name="Payment: <span class='star'>*</span>" for="payment" />
    <x-dropdown.payment :model="$voucher" />
</div>

<div class="form-group">
    <x-form.label name="Descriptions: <span class='star'>*</span>" />
    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="desc" rows="4" required>{{old('desc',$voucher->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group">
    <x-form.label name="Particulars" />
    <textarea name="particulars" class="form-control @error('particulars') is-invalid @enderror" id="particulars" rows="4" >{{old('particulars',$voucher->particulars)}}</textarea>
    @error('particulars') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>
    
<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back />
        </div>
        <div class="float-right">
            <x-button.submit label="{{$buttonText}}"/>
        </div>
    </div>
</div>
