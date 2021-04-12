<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.label name="Items List: <span class='star'>*</span>" />
        <x-dropdown.item-request-list req="required" :model="$itemRequest"/>
    </div>
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Required Quantity: <span class='star'>*</span>" name="req_quantity" id="req_quantity" for="req_quantity" req="required" :model="$itemRequest"   />
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <x-form.elements.textarea label="Description" name="desc" id="desc" row="5" :model="$itemRequest"/>
    </div>
</div>


<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('itemRequests.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>
