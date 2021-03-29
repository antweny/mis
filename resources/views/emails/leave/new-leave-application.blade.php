@component('mail::message')


Dear {{$data['receiver']['name']}},

I would like to apply {{$data['leave_type']}} for {{$data['days']}} days.

From {{humanDate($data['start_date'])}} and returning on {{humanDate($data['end_date'])}}.

{{$data['desc']}}

I hope you'll consider my request and grant me leaves for the above mentioned dates.

Looking forward to your approval.

@component('mail::button', ['url' => route('approveLeaves.show',encodeId($data['leave']['id']))])
View Leave Application
@endcomponent

Yours sincerely,<br>
{{$data['employee']}}
@endcomponent
