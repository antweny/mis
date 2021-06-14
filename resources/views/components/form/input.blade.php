<input type="{{$type}}"
       name="{{$name}}"
       id="{{$id}}"
       class="form-control @error($name) is-invalid @enderror"
       value="{{old($name,!is_null($model) ? $model->$name : '' )}}"
       {{$req}}
/>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

