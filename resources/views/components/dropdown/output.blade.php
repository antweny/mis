<select name="{{$name}}" id="output" class="form-control @error($name) is-invalid @enderror single-select" {{$req}}>
    <option value="">---</option>
    @foreach($outputs as $output)
        <option value={{$output->id}} {{old($name,!is_null($model) ? $model->$name : '' ) == $output->id ? 'selected' : ''}}>
            {!! $output->output_name !!}
        </option>
    @endforeach
</select>
@error($name) <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
