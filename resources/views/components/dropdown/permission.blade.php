@foreach ($permissions as $permission)
    <div class="col-md-2">
        <label class="label">
            {{ Form::checkbox('permissions[]',  $permission->id ) }}{{$permission->name}}<span class="checkmark"></span>
        </label>
        @error('permissions')<span class="invalid-feedback" permission="alert"><strong>{{ $message }}</strong></span>@enderror
    </div>
@endforeach
