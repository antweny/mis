<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Items List" star="true" />
        <x-dropdown.item-request-list req="required" :model="$itemRequest"/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Required Quantity" star="true" />
        <x-form.input type="number" name="req_quantity" id="req_quantity" for="req_quantity" req="required" :model="$itemRequest"   />
    </div>
</div>


<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc',$itemRequest->desc)}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
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
