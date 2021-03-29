<textarea name="{{$name}}" id="{{$id}}" rows="{{$row}}" class="form-control @error($name) is-invalid @enderror" {{$req}}>
    {{old($name)}}
</textarea>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

{{--{{old($name,!is_null($model) ? $model->$name:'')}}--}}
