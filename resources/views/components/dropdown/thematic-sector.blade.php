<select name="{{$name}}" id="thematicSector" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="0">----</option>
    @foreach($thematicSectors as $thematicSector)
            <option value={{$thematicSector->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $thematicSector->id ? 'selected' : ''}}>{{$thematicSector->name}}</option>
        @endforeach
    </select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
