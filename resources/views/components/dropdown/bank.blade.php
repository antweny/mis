<select name="stakeholder_id" id="stakeholder" class="form-control @error('stakeholder_id') is-invalid @enderror single-select" {{$req}}>
    <option value="" >---</option>
    @foreach($banks as $bank)
        <option value={{$bank->id}} {{old('stakeholder_id',!is_null($model) ? $model->stakeholder_id : '' ) == $bank->id ? 'selected' : ''}}>{{$bank->organization->name}}</option>
    @endforeach
</select>
@error('stakeholder_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
