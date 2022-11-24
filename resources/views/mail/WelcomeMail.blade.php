@component('mail::message')
<h1>Opa Campeão!</h1>

<p><span>{{ $user->name }}</span>, você recebeu um novo email de <b>{{ config('app.name') }}</b></p>

@endcomponent