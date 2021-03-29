<label for="{{$for}}" class="form-label">{!! $label !!}</label>
<select {{$attributes->merge(['name'=>$name,'id'=>$id])}} class="form-control @error($name) is-invalid @enderror {{$class}}" {{$req}}>
    <option value="" >---</option>
    @foreach($users as $user)
        <option value={{$user->id}} {{old($name,!is_null($model) ? $model->$name: '' ) == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
    @endforeach
</select>
