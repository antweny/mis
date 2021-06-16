@component('mail::message')

<h4>Dear {{$name}},</h4>

<p>Your new Password is <strong>{{$password}}</strong> </p>

<p>Make Sure you change the password after login </p>

@component('mail::button', ['url' => route('login')])
    Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

