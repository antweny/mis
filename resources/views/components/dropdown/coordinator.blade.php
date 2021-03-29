{{Form::select($name,$coordinators,is_null($model) ? null : $model->coordinator,['id'=>'employee','class'=>'form-control single-select', 'required', $req ])}}
