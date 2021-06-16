<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Item Name" />
        <input type="text" class="form-control" value="{{$itemOut->item->name}}" readonly/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Stock Quantity" />
        <input type="text" name="stock_quantity" class="form-control" value="{{$itemOut->item->quantity}}" readonly/>
    </div>
</div>

<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" readonly>{{$itemOut->desc}}</textarea>
    @error('desc') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="From" />
        <input type="text" class="form-control" value="{{$itemOut->employee->name}}" readonly/>
    </div>
    <div class="col-md-6">
        <x-form.label name="Requested Quantity" />
        <x-form.input name="req_quantity" req="readonly" :model="$itemOut"   />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.label name="Quantity to Issue" star="true" />
        <x-form.input type="number" name="quantity_out" id="quantity_out"  req="required" :model="$itemOut"  />
    </div>
    <div class="col-md-6">
        <x-form.label name="Issued at" star="true" />
        <x-form.input type="date" name="issued_at" id="date" req="required" :model="$itemOut" />
    </div>
</div>

<div class="form-group">
    <x-form.label name="Remarks"/>
    <x-form.textarea name="remarks" id="desc" row="5" :model="$itemOut" />
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
