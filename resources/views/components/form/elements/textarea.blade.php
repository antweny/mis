<label for="{{$for}}" class="form-label">{!! $label !!}</label>
<textarea {{$attributes->merge(['name'=>$name,'id'=>$id,'rows'=>$row])}} class="form-control @error($name) is-invalid @enderror" {{$req}}>
    {{old($name,!is_null($model) ? $model->$name : null)}}
</textarea>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
