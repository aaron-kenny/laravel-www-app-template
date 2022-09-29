@component('mail::message')

# Hey {{ $first_name }},
Please click the button below to verify your email address. If you don't recognize this email, no further action is required.

@component('mail::button', ['url' => $verification_url])
Verify Email Address
@endcomponent

<x-slot name="subcopy">
If you're having trouble clicking the button, copy and paste the URL below into your web browser:<br>
[{{ $verification_url}} ]({{ $verification_url }})
</x-slot>
@endcomponent
