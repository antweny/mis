{{Form::select('facilitators[]',$facilitators,is_null($model) ? null : $model->facilitator,['id'=>'individual','class'=>'form-control single-select', 'multiple','required'])}}
