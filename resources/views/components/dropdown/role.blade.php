@foreach ($roles as $role)
    <div class="col-md-4">
        <label class="label">
            {{ Form::checkbox('roles[]',  $role->id ) }}{{$role->name}}<span class="checkmark"></span>
        </label>
        @error('roles')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
    </div>
@endforeach
