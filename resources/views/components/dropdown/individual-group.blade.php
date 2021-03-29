<select name="individual_group_id" id="individual_group" class="form-control @error('individual_group_id') is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($individualGroups as $individualGroup)
        @if(!is_null($filter))
            @if($individualGroup->name == $filter)
                <option value={{$individualGroup->id}} {{old($name,!is_null($model) ? $model->$name: '' ) == $individualGroup->id ? 'selected' : ''}}>{{$individualGroup->name}}</option>
            @endif
        @else
            <option value={{$individualGroup->id}} {{old($name,!is_null($model) ? $model->$name: '' ) == $individualGroup->id ? 'selected' : ''}}>{{$individualGroup->name}}</option>
        @endif
    @endforeach
</select>
@error('individual_group_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror


