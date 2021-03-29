<select name="{{$name}}" id="participantRole" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($participantRoles as $participantRole)
        <option value={{$participantRole->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $participantRole->id ? 'selected' : ''}}>
            {{$participantRole->name}}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror

