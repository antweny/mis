@if(!is_null($label))
    <label for="{{$for}}" class="form-label">{!! $label !!}</label>
@endif
<input {{$attributes->merge(['type'=>$type,'name'=>$name,'id'=>$id])}} class="form-control @error($name) is-invalid @enderror"
       value="{{old($name,!is_null($model) ? $model->$name : '' )}}" {{$req}} />
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
