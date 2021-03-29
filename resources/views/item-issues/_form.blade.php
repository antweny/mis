<div class="form-group row">
    <div class="col-md-6">
        <label class="form-label">Item Name</label>
        <input type="text" class="form-control" value="{{$itemIssue->item->name}}" readonly/>
    </div>
    <div class="col-md-6">
        <label class="form-label">Stock Quantity</label>
        <input type="text" name="stock_quantity" class="form-control" value="{{$itemIssue->item->quantity}}" readonly/>
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" :model="$itemIssue" req="readonly" />
</div>

<div class="form-group row">
    <div class="col-md-6">
        <label class="form-label">From</label>
        <input type="text" class="form-control" value="{{$itemIssue->employee->name}}" readonly/>
    </div>
    <div class="col-md-6">
        <x-form.elements.input label="Requested Quantity" name="req_quantity" req="readonly" :model="$itemIssue"   />
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Issue Quantity: <span class='star'>*</span>" name="quantity_out" id="quantity_out"  req="required" :model="$itemIssue"  />
    </div>
    <div class="col-md-6">
        <x-form.elements.input label="Issued at: <span class='star'>*</span>" type="date" name="issued_at" id="date" req="required" :model="$itemIssue" />
    </div>
</div>

<div class="form-group">
    <x-form.elements.textarea label="Remarks" name="remarks" id="desc" row="5" :model="$itemIssue" />
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('itemIssues.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
