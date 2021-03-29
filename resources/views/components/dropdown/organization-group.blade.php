<select name="organization_group_id" id="organization_group" class="form-control @error('organization_group_id') is-invalid @enderror single-select" {{$req}}>
    @if(is_null($filter))
        <option value="">----</option>
    @endif
    @foreach($organizationGroups as $organizationGroup)
        @if(!is_null($filter))
            @if($organizationGroup->name == $filter)
                <option value={{$organizationGroup->id}} {{old($name,!is_null($model) ? $model->$name: '' ) == $organizationGroup->id ? 'selected' : ''}}>
                    {{$organizationGroup->name}}
                </option>
            @endif
        @else
            <option value={{$organizationGroup->id}} {{old($name,!is_null($model) ? $model->$name: '' ) == $organizationGroup->id ? 'selected' : ''}}>
                    {{$organizationGroup->name}}
            </option>
        @endif
    @endforeach
</select>
@error('organization_group_id') <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror


