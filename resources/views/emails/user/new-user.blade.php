@component('mail::message')

<h4>Dear {{$name}},</h4>

<p>You have been registered</p>

<p>Your login details</p>
<p><strong>Email:</strong> <span class="text-blue">{{$email}}</span></p>
<p><strong>Password:</strong> <span class="text-danger">{{$password}}</span></p>

You can login

@component('mail::button', ['url' => route('login'),'color'=>'primary'])
    Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
