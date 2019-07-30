@component('mail::message')
# Information

@component('mail::button', ['url' => 'http://google.com','color'=>'success'])
Créer un compte
@endcomponent
@component('mail::panel')
User :{{ $contact->user->nom }} <br>
Email :{{ $contact->email }} <br>
Sujet :{{ $contact->sujet }} <br>
Message :{{ $contact->message }} <br>
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
