@component('mail::message')
#Beste {{ $name }}

Uw account is aangemaakt voor Convatec. U kunt inloggen op [http://convatec.medicaldigitals.com](http://convatec.medicaldigitals.com) met onderstaande gegevens:

**Email adres:** `{{ $email }}`<br>
**Wachtwoord:** `{{ $password }}`

Mocht het inloggen niet lukken, gelieve dan contact op te nemen met uw regiomanager. Deze kan een nieuw account voor u creëren.

Met vriendelijke groet,<br>
{{ config('app.name') }}
@endcomponent
