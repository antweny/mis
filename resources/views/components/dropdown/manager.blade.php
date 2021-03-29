<select name="manager" id="employee" class="form-control @error('manager') is-invalid @enderror single-select" {{$req}}>
    <option value="" >---</option>
    @foreach($managers as $manager)
        <option value={{$manager->id}} {{old('manager',!is_null($model) ? $model->manager: '' ) == $manager->id ? 'selected' : ''}}>{{$manager->name}}</option>
    @endforeach
</select>
@error('manager') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
