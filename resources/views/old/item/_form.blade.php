<div class="form-group">
    <x-form.elements.input label="Name: <span class='star'>*</span>" name="name" id="name" for="name" req="required" :model="$item"   />
</div>


<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.label name="Category: <span class='star'>*</span>" />
        <x-dropdown.item-category req="required" :model="$item" />
    </div>
    <div class="col-md-6">
        <x-form.elements.label name="Unit: <span class='star'>*</span>" />
        <x-dropdown.item-unit req="required" :model="$item" />
    </div>
</div>


<div class="row form-group">
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Re-Order Level: <span class='star'>*</span>" name="order_level" id="order_level" for="order_level" req="required" :model="$item"   />
    </div>
    <div class="col-md-6">
        <x-form.elements.input type="number" label="Quantity: <span class='star'>*</span>" name="quantity" id="quantity" for="quantity" req="required" :model="$item"   />
    </div>
</div>


<div class="form-group">
    <x-form.elements.textarea label="Descriptions" name="desc" id="desc" row="5" :model="$item"/>
</div>


<div class="form-group row">
    <div class="col">
        <div class="float-left">
            <x-button.back> {{route('items.index')}} </x-button.back>
        </div>
        <div class="float-right">
            <x-button label="{{$buttonText}}"/>
        </div>
    </div>
</div>




