@component('mail::message')
# Bienvenu

@component('mail::panel')
Merci #{{ $user->nom }}
de email {{ $user->email }} pour l'inscription
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
