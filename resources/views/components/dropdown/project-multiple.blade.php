{{Form::select('projects[]',$projects,is_null($model) ? null : $model->project,['id'=>'project','class'=>'form-control single-select', 'multiple','required'])}}
