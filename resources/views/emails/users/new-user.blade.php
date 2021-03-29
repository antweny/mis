@component('mail::message')

<h4>Dear {{$user['name']}},</h4>

<p>You have been registered on <strong>TGNP MIS</strong></p>

<p>Your login details</p>
<p><strong>Email:</strong> <span class="text-blue">{{$user['email']}}</span></p>
<p><strong>Password:</strong> <span class="text-danger">{{$user['password']}}</span></p>

You can login

@component('mail::button', ['url' => route('login') ])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
