@component('mail::message')
 <h1> Welcome to Cardek.COM.NG </h1>
 <p>Hi {{ucfirst($user->first_name)}} !!! You are welcome</p>
@component('mail::panel')
<x-mail::button :url="route('password.reset', ['token' => $token, 'email'=> $user->email])">
RESET YOUR PASSWORD
</x-mail::button>
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
