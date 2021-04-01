@component('mail::message')

Dear {{$data['name']}},

<p>The leave request you submitted on {{humanDate($data['date'])}} has been <strong class="text-uppercase">{{$data['status']}}</strong></p>

{{$data['remarks']}}

@component('mail::button', ['url' => route('leaveApplications.index')])
    View My Applications
@endcomponent

Yours sincerely,<br>
{{$data['employee']}}
@endcomponent
