
<div class="form-group row">
    <div class="col-md-6">
        <x-form.elements.input label="Received at: <span class='star'>*</span>" type="date" name="received_at" id="date" for="received_at" req="required" :model="$itemIn" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Item <span class='star'>*</span>" />
        @if(isset($state) && $state== 'update')
            <input type="text" class="form-control" value="{{$itemIn->item->name}}" readonly/>
            <x-form.elements.input type="number" name="item_id" for="received_at" req="required readonly hidden" :model="$itemIn" />
        @else
            <x-dropdown.item req="required" :model="$itemIn" />
        @endif
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <x-form.elements.textarea label="Descriptions <span class='star'>*</span>" name="desc" id="desc" row="3" :model="$itemIn"/>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Quantity In <span class='star'>*</span>" name="quantity_in" id="quantity_in" for="quantity_in" req="required" :model="$itemIn"   />
    </div>
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Unit Rate <span class='star'>*</span>" name="unit_rate" id="unit_rate" for="unit_rate" req="required" :model="$itemIn"   />
    </div>
</div>

<div class="form-group">
    <div class="form-group">
        <x-form.elements.textarea label="Remarks" name="remarks" id="remarks" row="3" :model="$itemIn"/>
    </div>
</div>

<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('itemIn.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="Update"/>
        </div>
    </div>
</div>
