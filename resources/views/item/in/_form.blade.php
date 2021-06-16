
<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Received at" star="true" />
        <x-form.input type="date" name="received_at" id="date" for="received_at" req="required" :model="$itemIn" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Item" star="true" />
        @if(isset($state) && $state== 'update')
            <input type="text" class="form-control" value="{{$itemIn->item->name}}" readonly/>
            <x-form.input type="number" name="item_id" for="received_at" req="required readonly hidden" :model="$itemIn" />
        @else
            <x-dropdown.item req="required" :model="$itemIn" />
        @endif
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <x-form.label name="Description" />
        <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" rows="5">{{old('desc',$itemIn->desc)}}</textarea>
        @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.label name="Quantity In" star="true" />
        <x-form.input type="number" name="quantity_in" id="quantity_in" for="quantity_in" req="required" :model="$itemIn"   />
    </div>
    <div class="col-md-6">
        <x-form.label name="Unit Rate" star="true" />
        <x-form.input type="number" name="unit_rate" id="unit_rate" for="unit_rate" req="required" :model="$itemIn"   />
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <x-form.label name="Remarks" />
        <textarea name="remarks" id="remarks" class="form-control @error('remarks') is-invalid @enderror" rows="5">{{old('remarks',$itemIn->remarks)}}</textarea>
        @error('remarks') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
    </div>
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
