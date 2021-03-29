<option value="{{$value}}" {{old($name,!is_null($model) ? $model->$name : null) == $value ? 'selected' : ''}}>{{$optName}}</option>
