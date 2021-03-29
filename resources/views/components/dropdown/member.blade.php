{{Form::select('individual_groups[]',$individual_groups,is_null($model) ? null : $model->individual_group,['id'=>'individual_group','class'=>'form-control single-select', 'multiple'])}}
