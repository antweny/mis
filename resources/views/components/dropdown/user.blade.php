<select name="{{$name}}" id="user" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($users as $user)
        <option value={{$user->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $user->id ? 'selected' : ''}}>
            {{ $user->name }}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
