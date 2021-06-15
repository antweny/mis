{{Form::select('indicators[]',$indicators,is_null($model) ? null : $model->indicator,['id'=>'indicator','class'=>'form-control single-select', 'multiple','required'])}}
