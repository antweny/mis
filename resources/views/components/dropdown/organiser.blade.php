{{Form::select('organisers[]',$organizations,is_null($model) ? null : $model->organiser,['id'=>'organization','class'=>'form-control single-select', 'multiple','required'])}}
