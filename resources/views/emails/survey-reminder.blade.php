@component('mail::message')
#Beste {{ $doctor->name }},

Recent heeft u deelgenomen aan een klinisch evaluatie onderzoek, waarbij u 10 patiënten hebt geëvalueerd middels het gebruik van een AQUACEL® schuimverband / Foam LITE verband. Wij danken u voor uw deelname en zijn benieuwd of u deze verbanden in de toekomst wenst te blijven gebruiken of zou aanraden aan collega’s? Hiervoor vragen wij u om 4 vragen te beantwoorden via onderstaande link.<br>

<a href="{{ $url }}">Beantwoord hier de vragen</a>

Dit kost u slechts 2 minuten van uw tijd.

Vriendelijk dank namens het ConvaTec team!
@endcomponent
