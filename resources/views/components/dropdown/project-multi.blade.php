{{Form::select($name,$projects,is_null($model) ? null : $model->project,['id'=>'project','class'=>'form-control single-select', 'required', $req ])}}
