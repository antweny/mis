<div class="form-group">
    <x-form.label name="Name" star="true" />
    <x-form.input name="name" id="name" for="name" req="required" :model="$item"   />
</div>

<div class="row form-group">
    <div class="col-md-6">
        <x-form.label name="Category" star="true" />
        <x-dropdown.item-category req="required" :model="$item" />
    </div>
    <div class="col-md-6">
        <x-form.label name="Unit" star="true" />
        <x-dropdown.item-unit req="required" :model="$item" />
    </div>
</div>


<div class="row form-group">
    <div class="col-md-6">
        <x-form.label name="Re-Order Level" star="true" />
        <x-form.input type="number" name="order_level" id="order_level" for="order_level" req="required" :model="$item"   />
    </div>
    <div class="col-md-6">
        <x-form.label name="Quantity" star="true" />
        <x-form.input type="number" name="quantity" id="quantity" for="quantity" req="required" :model="$item"   />
    </div>
</div>


<div class="form-group">
    <x-form.label name="Description" />
    <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{old('desc',$item->desc)}}</textarea>
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




